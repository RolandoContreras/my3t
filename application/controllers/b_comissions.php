<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class b_comissions extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("commissions_model","obj_commissions");
        $this->load->model("otros_model","obj_otros");
        $this->load->model("messages_model","obj_messages");
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
        //GET CUSTOMER_ID $_SESSION  
        $this->get_session();
        //GET CUSTOMER_ID    
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET URL
        $bonus_id = 0;
        //GET TOTAL MESSAGE
        $all_message = $this->get_total_messages($customer_id);
        //GET TOTAL MESSAGE
        $obj_message = $this->get_messages($customer_id);
        //GET MESSAGE INFORMATIVE
        $messages_informative = $this->get_messages_informative();
        //GET PRICE BTC
        $price_btc = $this->btc_price();
         
         $url = explode("/", uri_string());
            if (isset($url[2])) {
                $type = $url[2];
                
                switch ($type) {
                    case "referred":
                        $bonus_id = "1";
                        break;
                    case "pay_dialy":
                        $bonus_id = "2";
                        break;
                    case "binary":
                        $bonus_id = "3";
                        break;
                }
                $params = array(
                        "select" =>"customer.username,
                                    customer.first_name,
                                    customer.last_name,
                                    commissions.amount,
                                    commissions.date,
                                    commissions.status_value,
                                    bonus.name as bonus",
                            "join" => array('customer, commissions.customer_id = customer.customer_id',
                                             'bonus, commissions.bonus_id = bonus.bonus_id'),
                             "where" => "customer.customer_id = $customer_id and bonus.bonus_id = $bonus_id",
                             "order" => "commissions.date DESC");
    
                            //GET DATA FROM CUSTOMER
                            $obj_commissions  = $this->obj_commissions->search($params);  
                    
                //Select params
            }else{
                
                $params = array(
                        "select" =>"customer.username,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.dni,
                                    commissions.amount,
                                    commissions.date,
                                    commissions.status_value,
                                    bonus.name as bonus",
               "join" => array('customer, commissions.customer_id = customer.customer_id',
                                'bonus, commissions.bonus_id = bonus.bonus_id'),
                "where" => "customer.customer_id = $customer_id",
                "order" => "commissions.date DESC",
                "limit" => "50");
           //GET DATA FROM CUSTOMER
        $obj_commissions = $this->obj_commissions->search($params);
        }
           
        $this->tmp_backoffice->set("messages_informative",$messages_informative);
        $this->tmp_backoffice->set("obj_message",$obj_message);
        $this->tmp_backoffice->set("all_message",$all_message);    
        $this->tmp_backoffice->set("bonus_id",$bonus_id);
        $this->tmp_backoffice->set("price_btc",$price_btc);
        $this->tmp_backoffice->set("obj_commissions",$obj_commissions);
        $this->tmp_backoffice->render("backoffice/b_comissions");
        
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
    
    public function get_messages_informative(){
            $params = array(
                            "select" =>"",
                             "where" => "status_value = 1 and page = 6 and active = 1",
                            "order" => "position ASC");
                
           $messages_informative = $this->obj_otros->search($params); 
            return $messages_informative;
    }
        

        public function consultar(){
        if($this->input->is_ajax_request()){   
            $bonus_id = trim($this->input->post('concepto'));
            $customer_id = $_SESSION['customer']['customer_id'];
            
                if(count($bonus_id) > 0){
                    
                     //SELECT ID FROM CUSTOMER
                            $params = array(
                        "select" =>"customer.username,
                                    customer.first_name,
                                    customer.last_name,
                                    commissions.amount,
                                    commissions.date,
                                    commissions.status_value,
                                    bonus.name as bonus",
                            "join" => array('customer, commissions.customer_id = customer.customer_id',
                                             'bonus, commissions.bonus_id = bonus.bonus_id'),
                             "where" => "customer.customer_id = $customer_id and bonus.bonus_id = $bonus_id",
                             "order" => "commissions.date DESC",
                             "limit" => "50");
    
                            //GET DATA FROM CUSTOMER
                            $commissions['commissions'] = $this->obj_commissions->search($params);  
                            
                            if(count($commissions['commissions']) > 0){
                                //SEND DATA
                                $data['message'] = "true";
                                $data['print'] =  $commissions['commissions'];
                            }else{
                                $data['message'] = "false";
                            }
                            
                }
                echo json_encode($data);            
        exit();
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
