<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_points extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("messages_model","obj_messages");
        $this->load->model("otros_model","obj_otros");
        $this->load->model("commissions_model","obj_commissions");
        $this->load->model("points_model","obj_points");
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
        //SET TIMEZONE AMERICA/LIMA
        date_default_timezone_set('America/Lima');
        //GET CUSTOMER_ID $_SESSION   
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET TOTAL MESSAGE
        $all_message = $this->get_total_messages($customer_id);
        //GET TOTAL MESSAGE
        $obj_message = $this->get_messages($customer_id);
        //GET MESSAGE INFORMATIVE
        $messages_informative = $this->get_messages_informative();
        //GET PRICE BTC
        $price_btc = $this->btc_price();
        //GET MONTH AND YEAR
        $month = date("m");
        $year = date("Y");
        //GET LAST DAY ON MONTH
        $last_day = last_month_day($month,$year);
        //GET FIRST DAY ON MONTH
        $first_day = first_month_day($month,$year); 
        
        $where = "points.date between '$first_day' and '$last_day' and points.customer_id = $customer_id";
        $params = array(
                        "select" =>"points.point,
                                    points.date,
                                    bonus.name,
                                    points.status_value",
               "join" => array('bonus, points.bonus_id = bonus.bonus_id'),
                "where" => $where,
                "order" => "points.point_id DESC");
        //GET DATA FROM POINTS
        $obj_points= $this->obj_points->search($params);
        
        //GET BALANCE DISPONIBLE
        $obj_balance_disponible = $this->balance($customer_id);
           
        //SEND DATA OF BITCOIN PRICE
        $this->tmp_backoffice->set("messages_informative",$messages_informative);
        $this->tmp_backoffice->set("obj_message",$obj_message);
        $this->tmp_backoffice->set("all_message",$all_message); 
        $this->tmp_backoffice->set("price_btc",$price_btc);  
        $this->tmp_backoffice->set("obj_balance_disponible",$obj_balance_disponible);   
        $this->tmp_backoffice->set("obj_points",$obj_points);
        $this->tmp_backoffice->render("backoffice/b_points");
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
        
        public function balance($customer_id){
             //GET TOTAL AMOUNT
                $params_total = array(
                        "select" =>"sum(amount) as balance",
                    "where" => "status_value <= 2 and customer_id = $customer_id"
                    );
           $obj_data = $this->obj_commissions->get_search_row($params_total); 
           return $obj_data->balance;
           
        }
        
        public function get_messages_informative(){
            $params = array(
                            "select" =>"",
                             "where" => "status_value = 1 and page = 9 and active = 1",
                            "order" => "position ASC");
                
           $messages_informative = $this->obj_otros->search($params); 
            return $messages_informative;
        }
        
        public function validate(){
        
        if($this->input->is_ajax_request()){   
            //GET MONTO
            date_default_timezone_set('America/Lima');
            $monto = trim($this->input->post('monto'));
            //GET CUSTOMER_ID FROM $_SESSION
            $customer_id = $_SESSION['customer']['customer_id'];
            
            if ($monto == 3) {
                $params_total = array(
                        "select" =>"sum(amount) as total",
                         "where" => "commissions.customer_id = $customer_id and status_value <= 2",
                    );
                $obj_commission_total = $this->obj_commissions->get_search_row($params_total);
                
                //SELECT AMOUNT 
                $obj_total = $obj_commission_total->total;
            }
            
           //GET TODAY DATE
           $today = date("Y-m-j"); 
           $s_and_s = date('w',strtotime($today));

           
        //VERIFY IT´S NOT SATURDAY OR DUNDAY   
        if($s_and_s == 6 || $s_and_s == 0){
            exit(); 
        }else{
             if($obj_total >= 10){
                    //GET TOTAL AMOUNT AND TO BE PAGOS DIARIOS "3"
                    $params = array(
                            "select" =>"commissions_id,
                                        bonus_id,
                                        date,
                                        status_value,",
                             "where" => "commissions.customer_id = $customer_id and status_value <= 2",
                        );

               $obj_commission = $this->obj_commissions->search($params); 

               //FEE OR COMISION BY DO PAYOUT
               $fee = $obj_total * 0.05;
               //AMOUNT TOTAL TO PAY
               $amount_total  = $obj_total - $fee;

               //CREATE DATA IN PAY
                    $data = array(
                        'status_value' => 3,
                        'amount' => $obj_total,
                        'descount' => $fee,
                        'amount_total' => $amount_total,
                        'customer_id' => $_SESSION['customer']['customer_id'],
                        'date' => date("Y-m-d H:i:s"),
                        'created_at' => date("Y-m-d H:i:s"),
                        'created_by' => $_SESSION['customer']['customer_id'],
                    ); 
                    $pay_id = $this->obj_pay->insert($data);


               foreach ($obj_commission as $value) {
                        //UPDATE TABLE COMMISSIONS
                        $data = array(
                            'status_value' => 3,
                            'updated_at' => date("Y-m-d H:i:s"),
                            'updated_by' => $_SESSION['customer']['customer_id'],
                        ); 
                        $this->obj_commissions->update($value->commissions_id,$data);

                        //CREATE DATA IN PAY_COMMISSION
                        $data_pay_commission = array(
                            'pay_id' => $pay_id,
                            'commissions_id' => $value->commissions_id,
                            'status_value' => 3,
                            'created_at' => date("Y-m-d H:i:s"),
                            'created_by' => $_SESSION['customer']['customer_id'],
                        ); 
                        $this->obj_pay_commission->insert($data_pay_commission);
               }
                        echo json_encode($data);   
                        exit();   
               
           }
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
