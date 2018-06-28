<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("binarys_model","obj_binarys");
        $this->load->model("bonus_model","obj_bonus");
        $this->load->model("commissions_model","obj_commissions");
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
	public function pago_binario(){
	if($this->input->is_ajax_request()){   
            //GET CUSTOMER CALIFY ON BINARY
            $params = array(
                        "select" =>"customer_id,binaries",
                         "where" => "active = 1 and binaries = 1 and status_value = 1"
            );
            $obj_customer= $this->obj_customer->search($params);
            
                if(count($obj_customer) > 0){
                    //GET PERCENT FROM BONUS
                        $params = array(
                                "select" =>"percent",
                                "where" => "bonus_id = 7 and status_value = 1"
                        );
                        //GET DATA FROM BONUS
                        $obj_bonus= $this->obj_bonus->get_search_row($params);
                        $percet = $obj_bonus->percent / 100;
                    
                    foreach ($obj_customer as $value) {
                        $customer_id = $value->customer_id;
                            //GET DATA POINTS
                            $params = array(
                                        "select" =>"sum(point_left) as point_left,
                                                    sum(point_rigth) as point_rigth",
                                         "where" => "customer_id = $customer_id and status_value = 1"
                            );
                            $obj_points= $this->obj_binarys->get_search_row($params);
                            $point_left = $obj_points->point_left;
                            $point_rigth = $obj_points->point_rigth;
                            //VERIFY MENOR
                            if (($point_left == 0) || ($point_rigth == 0)) {
                            }else{
                                switch ($point_left) {
                                    case $point_left < $point_rigth:
                                          $data = $point_left * $percet;
                                          $row = "point_rigth";
                                          //OPERATION
                                          $result = $point_rigth - $point_left;
                                        break;
                                    case $point_left > $point_rigth:
                                         $data = $point_rigth * $percet;
                                         $row = "point_rigth";
                                          //OPERATION
                                          $result = $point_left - $point_rigth;      
                                        break;
                                    default:
                                         $data = $point_left * $percet;
                                         $result = 0;      
                                }
                                
                                //INSERT COMMISSION TABLE PAY BINARY
                                $data_table = array(
                                    'customer_id' => $customer_id,
                                    'bonus_id' => 7,
                                    'name' => "Bono Binario",
                                    'amount' => $data,
                                    'status_value' => 1,
                                    'date' => date("Y-m-d H:i:s"),
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'created_by' => $customer_id,
                                ); 
                                $this->obj_commissions->insert($data_table);
                                
                                //UPDATE NUMERB 2 POINTS PAY    
                                $data = array(
                                    'status_value' => 2,
                                    'updated_at' => date("Y-m-d H:i:s"),
                                    'updated_by' => $customer_id,
                                ); 
                                $this->obj_binarys->update_rows_customer($customer_id,$data);
                                
                                if($result != 0){
                                    //INSERT POINT LEG ON BINARYS TABLE
                                    $data_result = array(
                                        'customer_id' => $customer_id,
                                        "$row" => $result,
                                        'status_value' => 1,
                                        'created_at' => date("Y-m-d H:i:s"),
                                        'created_by' => $customer_id,
                                    ); 
                                    $this->obj_binarys->insert($data_result);
                                }
                            }
                    }
                }
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
}
