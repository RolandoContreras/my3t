<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_product extends CI_Controller {
     function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("commissions_model","obj_commissions");
        $this->load->model("otros_model","obj_otros");
        $this->load->model("messages_model","obj_messages");
        $this->load->model("franchise_model","obj_franchise");
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
        
        $params = array(
                        "select" =>"customer.customer_id,
                                    customer.username,
                                    customer.first_name,
                                    customer.franchise_magic,
                                    customer.last_name,
                                    customer.active,
                                    customer.created_at,
                                    customer.status_value,
                                    customer.franchise_id,
                                    franchise.price,
                                    franchise.name as franchise,
                                    ",
                         "where" => "customer.customer_id = $customer_id",
                         "join" => array('franchise, customer.franchise_id = franchise.franchise_id',)
                                        );
            $obj_customer = $this->obj_customer->get_search_row($params);

            //GET PRICE BTC
            $params_price_btc = array(
                                    "select" =>"",
                                     "where" => "otros_id = 1");
                
           $obj_otros = $this->obj_otros->get_search_row($params_price_btc); 
           $price_btc = "$".number_format($obj_otros->precio_btc,2);
           
           
           //GET MESSAGE INFORMATIVE FOR HOME
           $params = array( "select" =>"",
                             "where" => "status_value = 1 and page = 3",
                            "order" => "position ASC");
           $messages_informative = $this->obj_otros->search($params); 
           
        $this->tmp_backoffice->set("messages_informative",$messages_informative);    
        $this->tmp_backoffice->set("obj_message",$obj_message);
        $this->tmp_backoffice->set("all_message",$all_message);  
        $this->tmp_backoffice->set("price_btc",$price_btc);
        $this->tmp_backoffice->set("obj_customer",$obj_customer);
        $this->tmp_backoffice->render("backoffice/b_product");
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
                        "where" => "customer_id = $customer_id and status_value = 1",
                        
                                        );
            $obj_message = $this->obj_messages->get_search_row($params);
            //GET TOTAL MESSAGE ACTIVE   
            $all_message = $obj_message->total;
            return $all_message;
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


    
