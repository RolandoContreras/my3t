<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_academy extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("otros_model","obj_otros");
        $this->load->model("messages_model","obj_messages");
        $this->load->model("product_model","obj_product");
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
        //GET CUSTOMER_ID  FROM $_SESSION
        $customer_id = $_SESSION['customer']['customer_id'];
        
        //GET TOTAL MESSAGE
         $all_message = $this->get_total_messages($customer_id);
         //GET TOTAL MESSAGE
         $obj_message = $this->get_messages($customer_id);

        
        //VERIFIRY GET SESSION    
         $this->get_session();
            $params = array(
                            "select" =>"customer.customer_id,
                                        customer.parents_id,
                                        customer.username,
                                        customer.email,
                                        customer.created_at,
                                        customer.position_temporal,
                                        customer.phone,
                                        customer.position,
                                        customer.password,
                                        customer.first_name,
                                        customer.last_name,
                                        customer.dni,
                                        customer.birth_date,
                                        customer.address,
                                        customer.identificador,
                                        customer.point_left,
                                        customer.point_rigth,
                                        customer.point_calification_left,
                                        customer.point_calification_rigth,
                                        customer.city,
                                        customer.active,
                                        customer.status_value,
                                        paises.nombre as pais,
                                        franchise.franchise_id,
                                        franchise.name as franchise
                                        ",
                            "where" => "customer.customer_id = $customer_id and paises.id_idioma = 7",
                            "join" => array('paises, customer.country = paises.id',
                                            'franchise, customer.franchise_id = franchise.franchise_id')
                                            );
             $obj_customer = $this->obj_customer->get_search_row($params);  
             
          //GET PRICE BTC
            $params_price_btc = array(
                                    "select" =>"",
                                     "where" => "otros_id = 1");
                
           $obj_otros = $this->obj_otros->get_search_row($params_price_btc); 
           $price_btc = "$".number_format($obj_otros->precio_btc,2);   
            
        $this->tmp_backoffice->set("price_btc",$price_btc);   
        $this->tmp_backoffice->set("obj_message",$obj_message);
        $this->tmp_backoffice->set("all_message",$all_message);    
        $this->tmp_backoffice->set("obj_customer",$obj_customer);
        $this->tmp_backoffice->render("backoffice/b_academy");
	}
        
        public function courses(){
        //VERIFIRY GET SESSION    
        $this->get_session();    
        //GET CUSTOMER_ID  FROM $_SESSION
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET TOTAL MESSAGE
        $all_message = $this->get_total_messages($customer_id);
        //GET TOTAL MESSAGE
        $obj_message = $this->get_messages($customer_id);
        //GET URL
        $url = explode("/",uri_string());
        //TEST ISSET PRODUCT_ID
        $product_id = isset($url['3'])?$url['3']:"";
        
            //SELECT WHERE AND TYPE GET ROW Y RENDER VIEW
            if($product_id != ""){
                $where = "product.product_id = $product_id and product.status_value = 1 and category.category_id = 1";
                $type = "get_search_row";
            }else{
                $where = "product.status_value = 1 and category.category_id = 1";
                $type = "search";
            }
            
         $params = array(
                            "select" =>"product.product_id,
                                        product.name,
                                        product.img,
                                        product.summary,
                                        product.description,
                                        product.video,
                                        product.author,
                                        product.date,
                                        ",
                            "where" => "$where",
                            "join" => array('category, product.category_id = category.category_id'),
                            "order" => "product.date DESC"
                                            );
                            
        $obj_product = $this->obj_product->$type($params); 
     
        
         //GET PRICE BTC
            $params_price_btc = array(
                                    "select" =>"",
                                     "where" => "otros_id = 1");
                
           $obj_otros = $this->obj_otros->get_search_row($params_price_btc); 
           $price_btc = "$".number_format($obj_otros->precio_btc,2);   
            
        $this->tmp_backoffice->set("price_btc",$price_btc); 
        $this->tmp_backoffice->set("obj_product",$obj_product); 
        $this->tmp_backoffice->set("obj_message",$obj_message);
        $this->tmp_backoffice->set("all_message",$all_message);    
        $this->tmp_backoffice->render("backoffice/b_academy_courses");
            
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
                        "order" => "date DESC",
                        "limit" => "3",
                                        );
            $obj_message = $this->obj_messages->search($params); 
            //GET ALL MESSAGE   
            return $obj_message;
        }
}
