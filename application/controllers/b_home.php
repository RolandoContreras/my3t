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
                        "select" =>"(select count(customer_id) from customer where parents_id = $customer_id) as direct,
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
                                    customer.point_left,
                                    customer.point_rigth,
                                    customer.date_start,
                                    customer.date_stand_by,
                                    customer.date_end,
                                    customer.created_at,
                                    customer.address,
                                    customer.status_value,
                                    customer.franchise_id,
                                    franchise.price,
                                    franchise.img,
                                    franchise.name as franchise,
                                    ranges.range_id,
                                    ranges.name as ranges
                                    ",
                         "where" => "customer.customer_id = $customer_id",
                         "join" => array('franchise, customer.franchise_id = franchise.franchise_id',
                                         'ranges, customer.range_id = ranges.range_id')
                                        );
            $obj_customer = $this->obj_customer->get_search_row($params);

            //GET NEXT RANGE
            $range_id = $obj_customer->range_id;
            $next_range = $this->next_range($range_id);
            
            //GET TOTAL AMOUNT
            $params_total = array(
                                "select" =>"sum(amount) as total,
                                            (select sum(amount) FROM commissions WHERE status_value <= 2 and customer_id = $customer_id) as balance",
                                 "where" => "commissions.customer_id = $customer_id",
                                );
             $obj_commissions = $this->obj_commissions->get_search_row($params_total); 
             
             $obj_total = $obj_commissions->total;
             $obj_balance = $obj_commissions->balance;
             
             //GET PRICE BTC
             $price_btc = $this->btc_price();
             
              //SELECT FRANCHISE_ID 
              
                switch ($obj_customer->franchise_id) {
                    case 1:
                        $images_franchise = "basic.png";
                        $text_franchise = "BASIC";
                        break;
                    case 2:
                        $images_franchise = "executive.png";
                        $text_franchise = "EXECUTIVE";
                        break;
                    case 3:
                        $images_franchise = "investor.png";
                        $text_franchise = "INVESTOR";
                        break;
                    case 4:
                        $images_franchise = "business.png";
                        $text_franchise = "BUSINESS";
                        break;
                    case 5:
                        $images_franchise = "master.png";
                        $text_franchise = "MASTER";
                        break;
                    case 6:
                        $images_franchise = "membership.png";
                        $text_franchise = "MEMBERSHIP";
                        break;
                    case 7:
                        $images_franchise = "apertura.png";
                        $text_franchise = "PRE APERTURA";
                        break;
                    case 8:
                        $images_franchise = "apertura_elite.png";
                        $text_franchise = "PRE APERTURA ELITE";
                        break;
                }
                
                $this->tmp_backoffice->set("next_range",$next_range);
                $this->tmp_backoffice->set("messages_informative",$messages_informative);
                $this->tmp_backoffice->set("obj_message",$obj_message);
                $this->tmp_backoffice->set("all_message",$all_message);
                $this->tmp_backoffice->set("text_franchise",$text_franchise);
                $this->tmp_backoffice->set("images_franchise",$images_franchise);
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
    
    public function next_range($range_id){
            $params = array(
                        "select" =>"range_id,
                                    name,
                                    point_grupal",
                         "where" => "range_id > $range_id");
            $next_range = $this->obj_ranges->get_search_row($params);
            return $next_range;
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
                                            'updated_by' => $customer_id,
                                            'updated_at' => date("Y-m-d H:i:s")
                                        ); 
                                        $this->obj_customer->update($customer_id,$data);
                            }elseif($franchise_id == 2){
                                //CHANGE TO EXECUTIVE
                                 $data = array(
                                            
                                            'franchise_id' => 2,
                                            'updated_by' => $customer_id,
                                            'updated_at' => date("Y-m-d H:i:s")
                                        ); 
                                        $this->obj_customer->update($customer_id,$data);
                            }elseif($franchise_id == 3){
                                //CHANGE TO SENIOR EXECUTIVE
                                 $data = array(
                                            'franchise_id' => 3,
                                            'updated_by' => $customer_id,
                                            'updated_at' => date("Y-m-d H:i:s")
                                        ); 
                                        $this->obj_customer->update($customer_id,$data);
                            }elseif($franchise_id == 4){
                                //CHANGE TO MASTER
                                 $data = array(
                                            'franchise_id' => 4,
                                            'updated_by' => $customer_id,
                                            'updated_at' => date("Y-m-d H:i:s")
                                        ); 
                                        $this->obj_customer->update($customer_id,$data);
                            }elseif($franchise_id == 5){
                                //CHANGE TO MASTER
                                 $data = array(
                                            'franchise_id' => 5,
                                            'updated_by' => $customer_id,
                                            'updated_at' => date("Y-m-d H:i:s")
                                        ); 
                                        $this->obj_customer->update($customer_id,$data);
                            }elseif($franchise_id == 7){
                                //CHANGE TO APERTURA
                                 $data = array(
                                            'franchise_id' => 7,
                                            'updated_by' => $customer_id,
                                            'updated_at' => date("Y-m-d H:i:s")
                                        ); 
                                        $this->obj_customer->update($customer_id,$data);
                            }elseif($franchise_id == 8){
                                //CHANGE TO ELITE   
                                 $data = array(
                                            'franchise_id' => 8,
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


    
