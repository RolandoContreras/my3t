<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_messages extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("messages_model","obj_messages");
        $this->load->model("otros_model","obj_otros");
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        
        //VERIFIRY GET SESSION    
        $this->get_session();
        /// VISTA
        
        $customer_id = $_SESSION['customer']['customer_id'];
        $params = array(
                        "select" =>"messages_id,
                                    customer_id,
                                    date,
                                    subject,
                                    label,
                                    messages,
                                    type,
                                    type_send",
                        "where" => "customer_id = $customer_id and status_value = 1",
                        "order" => "messages_id DESC",
                        "limit" => "20",
                                        );

            $obj_message = $this->obj_messages->search($params);  
         
         //COUNT ALL MESSAGE
         $all_message = count($obj_message);
         
         
         //GET PRICE BTC
            $params_price_btc = array(
                                    "select" =>"",
                                     "where" => "otros_id = 1");
                
           $obj_otros = $this->obj_otros->get_search_row($params_price_btc); 
           $price_btc = "$".number_format($obj_otros->precio_btc,2);
         
         //SEND DATA TO VIEW  
         $this->tmp_backoffice->set("price_btc",$price_btc);
         $this->tmp_backoffice->set("all_message",$all_message);
         $this->tmp_backoffice->set("obj_message",$obj_message);
         $this->tmp_backoffice->render("backoffice/b_message");
	}
        
        public function message_type()
	{
            
        //VERIFIRY GET SESSION    
        $this->get_session();
        
        //GET URL
        $url = explode("/",uri_string());
        $type =  $url['2'];
        
        switch ($type) {
        case "bonus":
            $type =  1;
            break;
        case "support":
            $type =  2;
            break;
        case "social":
            $type =  3;
            break;
        default :
            $type =  1;
        }
        

            //GET CUSTOMER_ID
            $customer_id = $_SESSION['customer']['customer_id'];
            $params = array(
                        "select" =>"count(messages_id) as total",
                        "where" => "customer_id = $customer_id and status_value = 1",
                        
                                        );
            $obj_message = $this->obj_messages->get_search_row($params);
            //GET ALL MESSAGE   
            $all_message = $obj_message->total;
            
            //GET PRICE BTC
            $params_price_btc = array(
                                    "select" =>"",
                                     "where" => "otros_id = 1");
                
           $obj_otros = $this->obj_otros->get_search_row($params_price_btc); 
           $price_btc = "$".number_format($obj_otros->precio_btc,2);
            
           //GET TOTAL MESSAGE
           $obj_message = $this->get_messages($customer_id);
            
            //IF ISSET MESSAGE_ID
            if(isset($url['3'])){
                //GET ALL MESAGGE OF TYPE (BONUS - SUPPORT - SOCIAL) FROM MESSAGE_ID
                $message_id = $url['3'];
                $params = array(
                        "select" =>"messages_id,
                                    customer_id,
                                    date,
                                    subject,
                                    label,
                                    messages,
                                    type,
                                    type_send",
                        "where" => "customer_id = $customer_id and status_value = 1 and type = $type and messages_id = $message_id",
                        "order" => "date DESC",
                        "limit" => "20",
                                        );

            $obj_get_message = $this->obj_messages->get_search_row($params);  
            
            //SEND DATA TO VIEW  
            $this->tmp_backoffice->set("obj_message",$obj_message);
            $this->tmp_backoffice->set("price_btc",$price_btc);
            $this->tmp_backoffice->set("all_message",$all_message);
            $this->tmp_backoffice->set("obj_get_message",$obj_get_message);
            $this->tmp_backoffice->render("backoffice/b_view_message");
            
            }else{
                
                //GET ALL MESAGGE OF TYPE (BONUS - SUPPORT - SOCIAL)
                $params = array(
                        "select" =>"messages_id,
                                    customer_id,
                                    date,
                                    subject,
                                    label,
                                    messages,
                                    type,
                                    type_send",
                        "where" => "customer_id = $customer_id and status_value = 1 and type = $type",
                        "order" => "date DESC",
                        "limit" => "20",
                                        );

            $obj_message = $this->obj_messages->search($params); 
            
            //SEND DATA TO VIEW
            $this->tmp_backoffice->set("price_btc",$price_btc);
            $this->tmp_backoffice->set("all_message",$all_message);
            $this->tmp_backoffice->set("obj_message",$obj_message);
            $this->tmp_backoffice->render("backoffice/b_message");
            }
        }    
        
        public function compose_message(){
            
        //VERIFIRY GET SESSION    
        $this->get_session();
        
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
        $params = array(
                        "select" =>"count(messages_id) as total",
                        "where" => "customer_id = $customer_id and status_value = 1",
                        
                                        );
        $obj_message = $this->obj_messages->get_search_row($params);
        //GET ALL MESSAGE   
        $all_message = $obj_message->total;
        
        //GET PRICE BTC
            $params_price_btc = array(
                                    "select" =>"",
                                     "where" => "otros_id = 1");
                
           $obj_otros = $this->obj_otros->get_search_row($params_price_btc); 
           $price_btc = "$".number_format($obj_otros->precio_btc,2);
           
           //SEND DATA TO VIEW  
         $this->tmp_backoffice->set("price_btc",$price_btc);
         $this->tmp_backoffice->set("all_message",$all_message);
         $this->tmp_backoffice->render("backoffice/b_compose_message");
        
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
