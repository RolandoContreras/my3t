<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_upgrade extends CI_Controller {
    function __construct() {
        parent::__construct();
         $this->load->model("franchise_model","obj_franchise");
         $this->load->model("commissions_model","obj_commissions");
         $this->load->model("pay_commission_model","obj_pay_commission");
         $this->load->model("pay_model","obj_pay");
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
        //GET PRICE FROM FRANCHISE
        $franchise_id = $_SESSION['customer']['franchise_id'];
        $customer_id = $_SESSION['customer']['customer_id'];
        
        
        //GET TOTAL MESSAGE
        $all_message = $this->get_total_messages($customer_id);
        //GET TOTAL MESSAGE
        $obj_message = $this->get_messages($customer_id);
        //GET MESSAGE INFORMATIVE
        $messages_informative = $this->get_messages_informative();
        
        $params = array(
                        "select" =>"price",
                        "where" => "franchise_id = '$franchise_id' and status_value = 1",
                        );
         $obj_price = $this->obj_franchise->get_search_row($params);  
         
        //GET ALL ACCOUNT > A FRANCHISE_ID
        $param = array( "select" =>"franchise_id,name,price,img",
                        "where" => "price > $obj_price->price and status_value = 1",
                        "order" => "price ASC");
         $obj_franchise = $this->obj_franchise->search($param);  
         //GET BALANCE DISPONIBLE
         $obj_balance_disponible = $this->balance($customer_id);
         //GET PRICE BTC
         $price_btc = $this->btc_price(); 
         //SEND DATA TO VIEW  
         $this->tmp_backoffice->set("messages_informative",$messages_informative); 
         $this->tmp_backoffice->set("obj_message",$obj_message);
         $this->tmp_backoffice->set("all_message",$all_message);   
         $this->tmp_backoffice->set("obj_balance_disponible",$obj_balance_disponible);
         $this->tmp_backoffice->set("obj_franchise",$obj_franchise);
         $this->tmp_backoffice->set("price_btc",$price_btc);
         $this->tmp_backoffice->render("backoffice/b_upgrade");
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
                             "where" => "status_value = 1 and page = 4 and active = 1",
                            "order" => "position ASC");
                
           $messages_informative = $this->obj_otros->search($params); 
            return $messages_informative;
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
                        "where" => "customer_id = $customer_id and active = 1 and status_value = 1 and support <> 1",
                        
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
                        "where" => "customer_id = $customer_id and status_value = 1 and support <> 1",
                        "order" => "messages_id DESC",
                        "limit" => "3",
                                        );
            $obj_message = $this->obj_messages->search($params); 
            //GET ALL MESSAGE   
            return $obj_message;
        }
        public function balance($customer_id){
             //GET TOTAL AMOUNT
                $params_total = array(
                        "select" =>"sum(amount) as balance",
                    "where" => "status_value <= 2 and customer_id = $customer_id"
                    );
           $obj_data = $this->obj_commissions->get_search_row($params_total); 
           return $obj_data->balance;
           
        }
}
