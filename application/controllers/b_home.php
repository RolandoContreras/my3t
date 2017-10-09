<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_home extends CI_Controller {
     function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("commissions_model","obj_commissions");
        $this->load->model("otros_model","obj_otros");
        $this->load->model("franchise_model","obj_franchise");
    }

    public function index()
    {
        //GET SESION ACTUALY
        $this->get_session();
        /// VISTA
        $customer_id = $_SESSION['customer']['customer_id'];
        
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
                                    customer.calification,
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
                                    franchise.name as franchise,
                                    ",
                         "where" => "customer.customer_id = $customer_id",
                         "join" => array('franchise, customer.franchise_id = franchise.franchise_id',)
                                        );
            $obj_customer = $this->obj_customer->get_search_row($params);
            
            $points_left = $obj_customer->point_left / 0.12;
            $points_rigth = $obj_customer->point_rigth / 0.12;
           
                //GET TOTAL AMOUNT
                $params_total = array(
                        "select" =>"sum(amount) as total,
                                    (select sum(amount) FROM commissions WHERE status_value <= 2 and customer_id = $customer_id) as balance",
                         "where" => "commissions.customer_id = $customer_id",
                    );
             $obj_commissions = $this->obj_commissions->get_search_row($params_total); 
             
             //GET PRICE BTC
            $params_price_btc = array(
                                    "select" =>"",
                                     "where" => "otros_id = 1");
                
           $obj_otros = $this->obj_otros->get_search_row($params_price_btc); 
           $price_btc = "$".number_format($obj_otros->precio_btc,2);
           
           $obj_total = $obj_commissions->total;
           $obj_balance = $obj_commissions->balance;
           
           //GET DATE END CONTRACT
             $date_end_contract = $obj_customer->date_end;
             
              //SELECT FRANCHISE_ID 
              
                switch ($obj_customer->franchise_id) {
                    case 1:
                        $images_franchise = "beginner.png";
                        $text_franchise = "Beginner";
                        break;
                    case 2:
                        $images_franchise = "start.png";
                        $text_franchise = "Start";
                        break;
                    case 3:
                        $images_franchise = "general.png";
                        $text_franchise = "General";
                        break;
                    case 4:
                        $images_franchise = "vip.png";
                        $text_franchise = "VIP";
                        break;
                    case 5:
                        $text_franchise = "Premium";
                        $images_franchise = "premium.png";
                        break;
                    case 6:
                        $text_franchise = "Master";
                        $images_franchise = "master.png";
                        break;
                    case 7:
                        $images_franchise = "membership.png";
                        $text_franchise = "Membership";
                        break;
                }
              
                $this->tmp_backoffice->set("text_franchise",$text_franchise);
                $this->tmp_backoffice->set("images_franchise",$images_franchise);
                $this->tmp_backoffice->set("price_btc",$price_btc);
                $this->tmp_backoffice->set("date_end_contract",$date_end_contract);
                $this->tmp_backoffice->set("obj_total",$obj_total);
                $this->tmp_backoffice->set("obj_balance",$obj_balance);
                $this->tmp_backoffice->set("points_left",$points_left);
                $this->tmp_backoffice->set("points_rigth",$points_rigth);
                $this->tmp_backoffice->set("obj_customer",$obj_customer);
                $this->tmp_backoffice->render("backoffice/b_home");
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
                                            'point_calification_left' => 50,
                                            'point_calification_rigth' => 50,
                                            'updated_by' => $customer_id,
                                            'updated_at' => date("Y-m-d H:i:s")
                                        ); 
                                        $this->obj_customer->update($customer_id,$data);
                            }elseif($franchise_id == 2){
                                //CHANGE TO EXECUTIVE
                                 $data = array(
                                            
                                            'franchise_id' => 2,
                                            'point_calification_left' => 100,
                                            'point_calification_rigth' => 100,
                                            'updated_by' => $customer_id,
                                            'updated_at' => date("Y-m-d H:i:s")
                                        ); 
                                        $this->obj_customer->update($customer_id,$data);
                            }elseif($franchise_id == 3){
                                //CHANGE TO SENIOR EXECUTIVE
                                 $data = array(
                                            'franchise_id' => 3,
                                            'point_calification_left' => 300,
                                            'point_calification_rigth' => 300,
                                            'updated_by' => $customer_id,
                                            'updated_at' => date("Y-m-d H:i:s")
                                        ); 
                                        $this->obj_customer->update($customer_id,$data);
                            }elseif($franchise_id == 4){
                                //CHANGE TO MASTER
                                 $data = array(
                                            'franchise_id' => 4,
                                            'point_calification_left' => 500,
                                            'point_calification_rigth' => 500,
                                            'updated_by' => $customer_id,
                                            'updated_at' => date("Y-m-d H:i:s")
                                        ); 
                                        $this->obj_customer->update($customer_id,$data);
                            }elseif($franchise_id == 5){
                                //CHANGE TO MASTER
                                 $data = array(
                                            'franchise_id' => 5,
                                            'point_calification_left' => 1000,
                                            'point_calification_rigth' => 1000,
                                            'updated_by' => $customer_id,
                                            'updated_at' => date("Y-m-d H:i:s")
                                        ); 
                                        $this->obj_customer->update($customer_id,$data);
                            }elseif($franchise_id == 6){
                                //CHANGE TO MASTER
                                 $data = array(
                                            'franchise_id' => 6,
                                            'point_calification_left' => 5000,
                                            'point_calification_rigth' => 5000,
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
}


    
