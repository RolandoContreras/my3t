<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_unilevel extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
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
        
        //VERIFIRY GET SESSION    
        $this->get_session();    
        $url = explode("/",uri_string());
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET TOTAL MESSAGE
        $all_message = $this->get_total_messages($customer_id);
        //GET TOTAL MESSAGE
        $obj_message = $this->get_messages($customer_id);
        //GET MESSAGE INFORMATIVE
        $messages_informative = $this->get_messages_informative();
        //GET PRICE BTC
        $price_btc = $this->btc_price();
        
        if(isset($url[2])){
            $customer_id = $url[2];
        }else{
            $customer_id = $_SESSION['customer']['customer_id'];
        }    
        
        /// GET DATA CUSTOMER SESSION
        $params = array(
                        "select" =>"(select count(customer_id) from customer where parents_id = $customer_id) as direct,
                                    customer.customer_id,
                                    customer.parents_id,
                                    customer.username,
                                    customer.created_at,
                                    franchise.franchise_id,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.active,
                                    paises.nombre as pais,
                                    franchise.name as franchise,
                                    franchise.img",
                        "where" => "customer.customer_id = $customer_id and paises.id_idioma = 7",
                        "join" => array('paises, customer.country = paises.id',
                                        'franchise, customer.franchise_id = franchise.franchise_id')
                                        );
         $obj_customer = $this->obj_customer->get_search_row($params);  

         //GET CUSTOMER BY PARENTS_ID
         $params_parents = array(
                        "select" =>"customer.username",
                        "where" => "customer.customer_id = $obj_customer->parents_id");
         $obj_customer_parent = $this->obj_customer->get_search_row($params_parents);  
         
         $params_customer_n2 = array(
                        "select" =>"customer.customer_id,
                                    customer.parents_id,
                                    customer.username,
                                    customer.created_at,
                                    customer.position_temporal,
                                    customer.first_name,
                                    customer.last_name,
                                    franchise.franchise_id,
                                    customer.active,
                                    paises.nombre as pais,
                                    franchise.name as franchise,
                                    franchise.img
                                    ",
                        "where" => "customer.parents_id = $customer_id and paises.id_idioma = 7",
                        "join" => array('paises, customer.country = paises.id',
                                        'franchise, customer.franchise_id = franchise.franchise_id')
                                        );
         $obj_customer_n2 = $this->obj_customer->search($params_customer_n2);
         $this->tmp_backoffice->set("obj_customer_n2",$obj_customer_n2);
         
         //GET CUSTOMER BY PARENTS_ID 3 LEVEL
         if(count($obj_customer_n2) > 0){
             $customer_id_n2 = "";
                 foreach ($obj_customer_n2 as $key => $value) {
                        $customer_id_n2 .= $value->customer_id.",";
                 }
                 //DELETE LAST CARACTER ON STRING
                 $customer_id_n2 = substr ($customer_id_n2, 0, strlen($customer_id_n2) - 1);
                 if(count($customer_id_n2) > 0){
                     $params_customer_n3 = array(
                                "select" =>"customer.customer_id,
                                            customer.parents_id,
                                            customer.username,
                                            customer.created_at,
                                            customer.position_temporal,
                                            customer.first_name,
                                            customer.last_name,
                                            franchise.franchise_id,
                                            customer.active,
                                            paises.nombre as pais,
                                            franchise.name as franchise,
                                            franchise.img
                                            ",
                                "where" => "customer.parents_id in ($customer_id_n2)  and paises.id_idioma = 7",
                                "join" => array('paises, customer.country = paises.id',
                                                'franchise, customer.franchise_id = franchise.franchise_id')
                                                );
                 $obj_customer_n3 = $this->obj_customer->search($params_customer_n3);
                 $direct_3 = count($obj_customer_n3);
                 $this->tmp_backoffice->set("direct_3",$direct_3);
                 $this->tmp_backoffice->set("obj_customer_n3",$obj_customer_n3);
                 
                 //GET CUSTOMER BY PARENTS_ID 3 LEVEL
                 if(count($obj_customer_n3) > 0){
                    $customer_id_n3 = "";
                    foreach ($obj_customer_n3 as $key => $value) {
                           $customer_id_n3 .= $value->customer_id.",";
                    }
                 //DELETE LAST CARACTER ON STRING
                 $customer_id_n3 = substr ($customer_id_n3, 0, strlen($customer_id_n3) - 1);
                    
                         $params_customer_n3 = array(
                                "select" =>"customer.customer_id,
                                            customer.parents_id,
                                            customer.username,
                                            customer.created_at,
                                            customer.position_temporal,
                                            customer.first_name,
                                            customer.last_name,
                                            franchise.franchise_id,
                                            customer.active,
                                            paises.nombre as pais,
                                            franchise.name as franchise,
                                            franchise.img
                                            ",
                                "where" => "customer.parents_id in ($customer_id_n3)  and paises.id_idioma = 7",
                                "join" => array('paises, customer.country = paises.id',
                                                'franchise, customer.franchise_id = franchise.franchise_id')
                                                );
                            $obj_customer_n4 = $this->obj_customer->search($params_customer_n3);
                            $direct_4 = count($obj_customer_n4);
                            $this->tmp_backoffice->set("direct_4",$direct_4);
                            $this->tmp_backoffice->set("obj_customer_n4",$obj_customer_n4);   
                    }  
                 }
            }
            
          
          
         $this->tmp_backoffice->set("messages_informative",$messages_informative);   
         $this->tmp_backoffice->set("obj_message",$obj_message);
         $this->tmp_backoffice->set("all_message",$all_message);   
         $this->tmp_backoffice->set("price_btc",$price_btc);
         $this->tmp_backoffice->set("obj_customer_parent",$obj_customer_parent);
         $this->tmp_backoffice->set("obj_customer",$obj_customer);
         $this->tmp_backoffice->render("backoffice/b_unilevel");
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
    
        public function get_messages_informative(){
            $params = array(
                            "select" =>"",
                             "where" => "status_value = 1 and page = 5 and active = 1",
                            "order" => "position ASC");
                
           $messages_informative = $this->obj_otros->search($params); 
            return $messages_informative;
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
