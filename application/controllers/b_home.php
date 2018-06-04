<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_home extends CI_Controller {
     function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("commissions_model","obj_commissions");
        $this->load->model("otros_model","obj_otros");
        $this->load->model("franchise_model","obj_franchise");
        $this->load->model("post_model","obj_post");
        $this->load->model("messages_model","obj_messages");
        $this->load->model("ranges_model","obj_ranges");
    }

    public function index()
    {
        //GET SESION ACTUALY
        $this->get_session();
        /// VISTA
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET TOTAL MESSAGE
        $all_message = $this->get_total_messages($customer_id);
        //GET TOTAL MESSAGE
        $obj_message = $this->get_messages($customer_id);
        //GET MESSAGE INFORMATIVE
        $messages_informative = $this->get_messages_informative();
        
        $params = array(
                        "select" =>"(select count(customer_id) from customer where parents_id = $customer_id and status_value = 1) as direct,
                                    (select sum(point_left) from binarys where customer_id = $customer_id and status_value = 1) as point_left,
                                    (select sum(point_rigth) from binarys where customer_id = $customer_id) as point_rigth,
                                    customer.customer_id,
                                    customer.parents_id,
                                    customer.username,
                                    customer.email,
                                    customer.password,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.active,
                                    customer.dni,
                                    customer.birth_date,
                                    customer.binary,
                                    customer.point_calification_left,
                                    customer.point_calification_rigth,
                                    customer.date_start,
                                    customer.date_stand_by,
                                    customer.date_end,
                                    customer.created_at,
                                    customer.address,
                                    customer.status_value,
                                    customer.franchise_id,
                                    franchise.price,
                                    franchise.img as franchise_img,
                                    franchise.name as franchise,
                                    ranges.range_id,
                                    ranges.name as ranges,
                                    ranges.img
                                    ",
                         "where" => "customer.customer_id = $customer_id",
                         "join" => array('franchise, customer.franchise_id = franchise.franchise_id',
                                         'ranges, customer.range_id = ranges.range_id')
                                        );
            $obj_customer = $this->obj_customer->get_search_row($params);
            
            //GET FRANCHISE ACTIVE
            if($obj_customer->active == 0){
                $obj_franchise = $this->franchise();
                $this->tmp_backoffice->set("obj_franchise",$obj_franchise);
            }
            
            //GET NEXT RANGE
            $range_id = $obj_customer->range_id;
            $next_range = $this->next_range($range_id);
            
            //GET TOTAL AMOUNT
            $obj_commissions = $this->total_amount($customer_id);
            $obj_total = $obj_commissions->total;
            $obj_balance = $obj_commissions->balance;
             
             //GET PRICE BTC
             $price_btc = $this->btc_price();
             
                $this->tmp_backoffice->set("next_range",$next_range);
                
                $this->tmp_backoffice->set("messages_informative",$messages_informative);
                $this->tmp_backoffice->set("obj_message",$obj_message);
                $this->tmp_backoffice->set("all_message",$all_message);
                $this->tmp_backoffice->set("price_btc",$price_btc);
                $this->tmp_backoffice->set("obj_total",$obj_total);
                $this->tmp_backoffice->set("obj_balance",$obj_balance);
                $this->tmp_backoffice->set("obj_customer",$obj_customer);
                $this->tmp_backoffice->render("backoffice/b_home");
    }
    
    public function btc_price(){
             $url = "https://www.bitstamp.net/api/ticker";
             $fgc = file_get_contents($url);
             $json = json_decode($fgc, true);
             $price_btc = $json['last'];
             $open = $json['open'];
             
             if($open > $price_btc){
                 //PRICE WENT UP
                 $color = "red";
                 $changes = $price_btc - $open;
                 $percent = $changes / $open;
                 $percent = $percent * 100;
                 $percent_change = number_format($percent, 2); 
             }else{
                 //PRICE WENT DOWN
                 $color = "green";
                 $changes = $open - $price_btc;
                 $percent = $changes / $open;
                 $percent = $percent * 100;
                 $percent_change = number_format($percent, 2);   
             }
             
             return "<span style='color:#D4AF37'>"."$".$price_btc."</span>&nbsp;&nbsp;<span style='color:".$color.";font-size: 14px;font-weight: bold;'>$percent_change</span>";
    }
    
    public function franchise(){
            $params = array(
                        "select" =>"franchise_id,
                                    name,
                                    price,
                                    point,
                                    img",
                         "where" => "status_value = 1 and franchise_id <> 6");
            $obj_franchise = $this->obj_franchise->search($params);
            return $obj_franchise;
    }
    
    public function next_range($range_id){
            $params = array(
                        "select" =>"range_id,
                                    name,
                                    img,
                                    point_grupal",
                         "where" => "range_id > $range_id");
            $next_range = $this->obj_ranges->get_search_row($params);
            return $next_range;
    }
    
    public function total_amount($customer_id){
            $params_total = array(
                                "select" =>"sum(amount) as total,
                                            (select sum(amount) FROM commissions WHERE status_value <= 2 and customer_id = $customer_id) as balance",
                                 "where" => "commissions.customer_id = $customer_id",
                                );
             $obj_commissions = $this->obj_commissions->get_search_row($params_total); 
             return $obj_commissions;
    }
    
    public function make_pedido(){

             if($this->input->is_ajax_request()){   
                //SELECT ID FROM CUSTOMER
               $franchise_id = $this->input->post('franchise_id');
               $customer_id = $_SESSION['customer']['customer_id'];
               
               if($franchise_id != "" && $customer_id != ""){
                            //UPDATE DATA EN CUSTOMER TABLE
                            if($franchise_id == 1){
                                //CHANGE TO BASIC
                                 $data = array(
                                            'franchise_id' => 1,
                                            'point_calification_left' => 93,
                                            'point_calification_rigth' => 93,
                                            'updated_by' => $customer_id,
                                            'updated_at' => date("Y-m-d H:i:s")
                                        ); 
                                        $this->obj_customer->update($customer_id,$data);
                            }elseif($franchise_id == 2){
                                //CHANGE TO EXECUTIVE
                                 $data = array(
                                            'franchise_id' => 2,
                                            'point_calification_left' => 187,
                                            'point_calification_rigth' => 187,                                     
                                            'updated_by' => $customer_id,
                                            'updated_at' => date("Y-m-d H:i:s")
                                        ); 
                                        $this->obj_customer->update($customer_id,$data);
                            }elseif($franchise_id == 3){
                                //CHANGE TO SENIOR EXECUTIVE
                                 $data = array(
                                            'franchise_id' => 3,
                                            'point_calification_left' => 525,
                                            'point_calification_rigth' => 525,
                                            'updated_by' => $customer_id,
                                            'updated_at' => date("Y-m-d H:i:s")
                                        ); 
                                        $this->obj_customer->update($customer_id,$data);
                            }elseif($franchise_id == 4){
                                //CHANGE TO MASTER
                                 $data = array(
                                            'franchise_id' => 4,
                                            'point_calification_left' => 750,
                                            'point_calification_rigth' => 750,
                                            'updated_by' => $customer_id,
                                            'updated_at' => date("Y-m-d H:i:s")
                                        ); 
                                        $this->obj_customer->update($customer_id,$data);
                            }elseif($franchise_id == 5){
                                //CHANGE TO MASTER
                                 $data = array(
                                            'franchise_id' => 5,
                                            'point_calification_left' => 1424,
                                            'point_calification_rigth' => 1424,
                                            'updated_by' => $customer_id,
                                            'updated_at' => date("Y-m-d H:i:s")
                                        ); 
                                        $this->obj_customer->update($customer_id,$data);
                            }elseif($franchise_id == 7){
                                //CHANGE TO APERTURA
                                 $data = array(
                                            'franchise_id' => 7,
                                            'point_calification_left' => 224,
                                            'point_calification_rigth' => 224,
                                            'updated_by' => $customer_id,
                                            'updated_at' => date("Y-m-d H:i:s")
                                        ); 
                                        $this->obj_customer->update($customer_id,$data);
                            }elseif($franchise_id == 8){
                                //CHANGE TO ELITE   
                                 $data = array(
                                            'franchise_id' => 8,
                                            'point_calification_left' => 749,
                                            'point_calification_rigth' => 749,
                                            'updated_by' => $customer_id,
                                            'updated_at' => date("Y-m-d H:i:s")
                                        ); 
                                        $this->obj_customer->update($customer_id,$data);
                            }elseif($franchise_id == 9){
                                //CHANGE TO ELITE   
                                 $data = array(
                                            'franchise_id' => 9,
                                            'point_calification_left' => 1498,
                                            'point_calification_rigth' => 1498,
                                            'updated_by' => $customer_id,
                                            'updated_at' => date("Y-m-d H:i:s")
                                        ); 
                                        $this->obj_customer->update($customer_id,$data);
                            }elseif($franchise_id == 10){
                                //CHANGE TO ELITE   
                                 $data = array(
                                            'franchise_id' => 10,
                                            'point_calification_left' => 487,
                                            'point_calification_rigth' => 487,
                                            'updated_by' => $customer_id,
                                            'updated_at' => date("Y-m-d H:i:s")
                                        ); 
                                        $this->obj_customer->update($customer_id,$data);
                            }elseif($franchise_id == 11){
                                //CHANGE TO ELITE   
                                 $data = array(
                                            'franchise_id' => 11,
                                            'point_calification_left' => 975,
                                            'point_calification_rigth' => 975,
                                            'updated_by' => $customer_id,
                                            'updated_at' => date("Y-m-d H:i:s")
                                        ); 
                                        $this->obj_customer->update($customer_id,$data);
                            }elseif($franchise_id == 12){
                                //CHANGE TO ELITE   
                                 $data = array(
                                            'franchise_id' => 12,
                                            'point_calification_left' => 2925,
                                            'point_calification_rigth' => 2925,
                                            'updated_by' => $customer_id,
                                            'updated_at' => date("Y-m-d H:i:s")
                                        ); 
                                        $this->obj_customer->update($customer_id,$data);
                            }else{
                                //CHANGE MEMBERSHIP
                                 $data = array(
                                            'franchise_id' => 6,
                                            'updated_by' => $customer_id,
                                            'updated_at' => date("Y-m-d H:i:s")
                                        ); 
                                        $this->obj_customer->update($customer_id,$data);
                            }
                             $data['message'] = "true";
                             echo json_encode($data); 
                             exit();
               }else{
                     $data['message'] = "true";
                     echo json_encode($data); 
                     exit();
               }
            }
        }
    
    public function get_session(){          
        if (isset($_SESSION['customer'])){
            if($_SESSION['customer']['logged_customer']=="TRUE" && $_SESSION['customer']['status']=='1'){               
                return true;
            }else{
                redirect(site_url().'home');
            }
        }else{
            redirect(site_url().'home');
        }
    }
    
    public function get_total_messages($customer_id){
        $params = array(
                        "select" =>"count(messages_id) as total",
                        "where" => "customer_id = $customer_id and active = 1 and status_value = 1",
                                        );
            $obj_message = $this->obj_messages->get_search_row($params);
            //GET TOTAL MESSAGE ACTIVE   
            $all_message = $obj_message->total;
            return $all_message;
    }
    
    public function get_messages_informative(){
            $params = array(
                            "select" =>"",
                             "where" => "status_value = 1 and page = 1 and active = 1",
                            "order" => "position ASC");
                
           $messages_informative = $this->obj_otros->search($params); 
            return $messages_informative;
    }
    
    public function get_messages($customer_id){
        $params = array(
                        "select" =>"messages_id,
                                    date,
                                    subject,
                                    label,
                                    type,
                                    messages",
                        "where" => "customer_id = $customer_id and status_value = 1",
                        "order" => "messages_id DESC",
                        "limit" => "3",
                                        );
            $obj_message = $this->obj_messages->search($params); 
            
            //GET ALL MESSAGE   
            return $obj_message;
    }
}


    
