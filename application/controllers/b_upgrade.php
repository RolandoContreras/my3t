<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_upgrade extends CI_Controller {
    function __construct() {
        parent::__construct();
         $this->load->model("franchise_model","obj_franchise");
         $this->load->model("commissions_model","obj_commissions");
         $this->load->model("pay_commission_model","obj_pay_commission");
         $this->load->model("pay_model","obj_pay");
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
        
        $params = array(
                        "select" =>"price",
                        "where" => "franchise_id = '$franchise_id' and status_value = 1");
         $obj_price = $this->obj_franchise->get_search_row($params);  
         
         
         //GET ALL ACCOUNT > A FRANCHISE_ID
        $param = array( "select" =>"franchise_id,name,price",
                        "where" => "price > $obj_price->price and status_value = 1");
         $obj_franchise = $this->obj_franchise->search($param);  
         
         //GET TOTAL AMOUNT
                $params_total = array(
                        "select" =>"(select sum(amount) FROM commissions WHERE status_value <= 2 and customer_id = $customer_id) as balance",
                         "where" => "commissions.customer_id = $customer_id and status_value <= 2",
                    );
                
           $obj_data = $this->obj_commissions->get_search_row($params_total);              
           $obj_balance_disponible = number_format($obj_data->balance, 2);
           
          //GET PRICE BTC
            $params_price_btc = array(
                                    "select" =>"",
                                     "where" => "otros_id = 1");
                
           $obj_otros = $this->obj_otros->get_search_row($params_price_btc); 
           $price_btc = "$".number_format($obj_otros->precio_btc,2);
         
        //SEND DATA TO VIEW  
         $this->tmp_backoffice->set("obj_balance_disponible",$obj_balance_disponible);
         $this->tmp_backoffice->set("obj_franchise",$obj_franchise);
         $this->tmp_backoffice->set("price_btc",$price_btc);
         $this->tmp_backoffice->render("backoffice/b_upgrade");
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
