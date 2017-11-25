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
        
        if(isset($url[2])){
            $customer_id = $url[2];
        }else{
            $customer_id = $_SESSION['customer']['customer_id'];
        }    
        
        /// VISTA
        $params = array(
                        "select" =>"(select count(customer_id) from customer where parents_id = $customer_id) as direct,
                                    customer.customer_id,
                                    customer.parents_id,
                                    customer.username,
                                    customer.email,
                                    customer.created_at,
                                    customer.position_temporal,
                                    customer.phone,
                                    customer.password,
                                    franchise.franchise_id,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.dni,
                                    customer.birth_date,
                                    customer.address,
                                    customer.city,
                                    customer.active,
                                    customer.status_value,
                                    paises.nombre as pais,
                                    franchise.name as franchise
                                    ",
                        "where" => "customer.customer_id = $customer_id and paises.id_idioma = 7",
                        "join" => array('paises, customer.country = paises.id',
                                        'franchise, customer.franchise_id = franchise.franchise_id')
                                        );
         $obj_customer = $this->obj_customer->get_search_row($params);  
         
         $params_parents = array(
                        "select" =>"customer.username",
                        "where" => "customer.customer_id = $obj_customer->parents_id");
         $obj_customer_parent = $this->obj_customer->get_search_row($params_parents);  
         
         //GET CUSTOMER BY PARENTS_ID
         $params_customer_n2 = array(
                        "select" =>"customer.customer_id,
                                    customer.parents_id,
                                    customer.username,
                                    customer.email,
                                    customer.created_at,
                                    customer.position_temporal,
                                    customer.phone,
                                    customer.password,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.dni,
                                    franchise.franchise_id,
                                    customer.birth_date,
                                    customer.address,
                                    customer.city,
                                    customer.active,
                                    customer.status_value,
                                    paises.nombre as pais,
                                    franchise.name as franchise
                                    ",
                        "where" => "customer.parents_id = $customer_id and paises.id_idioma = 7",
                        "join" => array('paises, customer.country = paises.id',
                                        'franchise, customer.franchise_id = franchise.franchise_id')
                                        );

         $obj_customer_n2 = $this->obj_customer->search($params_customer_n2);
         
         //GET PRICE BTC
                $params_price_btc = array(
                        "select" =>"",
                         "where" => "otros_id = 1",
                    );
                
           $obj_otros = $this->obj_otros->get_search_row($params_price_btc); 
           $price_btc = "$".number_format($obj_otros->precio_btc,2);
           
         $this->tmp_backoffice->set("obj_message",$obj_message);
         $this->tmp_backoffice->set("all_message",$all_message);   
         $this->tmp_backoffice->set("price_btc",$price_btc);
         $this->tmp_backoffice->set("obj_customer_n2",$obj_customer_n2);
         $this->tmp_backoffice->set("obj_customer_parent",$obj_customer_parent);
         $this->tmp_backoffice->set("obj_customer",$obj_customer);
         $this->tmp_backoffice->render("backoffice/b_unilevel");
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
