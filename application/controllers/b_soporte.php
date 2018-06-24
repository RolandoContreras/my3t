<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_soporte extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("commissions_model","obj_commissions");
        $this->load->model("pay_commission_model","obj_pay_commission");
        $this->load->model("pay_model","obj_pay");
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
        //GET CUSTOMER_ID $_SESSION   
        $customer_id = $_SESSION['customer']['customer_id'];
        date_default_timezone_set('America/Lima');
        //GET TOTAL MESSAGE
        $all_message = $this->get_total_messages($customer_id);
        //GET TOTAL MESSAGE
        $obj_message = $this->get_messages($customer_id);
        //GET MESSAGE INFORMATIVE
        $messages_informative = $this->get_messages_informative();
        //GET PRICE BTC
        $price_btc = $this->btc_price();
        
        //GET MESSAGES SUPPORT
        $params = array(
                        "select" =>"messages_id,
                                    date,
                                    subject,
                                    answer,
                                    active",
                        "where" => "customer_id = $customer_id and support = 1 and status_value = 1",
                        "order" => "messages_id DESC"
                                        );
        //GET DATA FROM CUSTOMER
        $obj_message_support= $this->obj_messages->search($params);
        
        
        //SEND DATA OF BITCOIN PRICE
        $this->tmp_backoffice->set("messages_informative",$messages_informative);
        $this->tmp_backoffice->set("obj_message",$obj_message);
        $this->tmp_backoffice->set("all_message",$all_message); 
        $this->tmp_backoffice->set("price_btc",$price_btc);  
        $this->tmp_backoffice->set("obj_message_support",$obj_message_support);
        $this->tmp_backoffice->render("backoffice/b_soporte");
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
                             "where" => "status_value = 1 and page = 9 and active = 1",
                            "order" => "position ASC");
                
           $messages_informative = $this->obj_otros->search($params); 
            return $messages_informative;
        }
        
        public function validate(){
        
        //GET SESION ACTUALY
        $this->get_session();
        $customer_id = $_SESSION['customer']['customer_id'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $img = $_FILES["image_file"]["name"];
        
        $param = array("select" =>"messages_id",
                         "where" => "customer_id = $customer_id and active = 1 and status_value = 1 and support = 1");
         $obj_message = $this->obj_messages->get_search_row($param);
         $messaje_support_count = count($obj_message);
         
         //VERIFI ONLY 1 ROW 
        if($messaje_support_count == 0){
            if(isset($_FILES["image_file"]["name"]))
            {
            $config['upload_path']          = './static/backoffice/images/soporte/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 1000;
            $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('image_file'))
                {
                     $error = array('error' => $this->upload->display_errors());
                      echo '<div class="alert alert-danger">'.$error['error'].'</div>';
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());
                    // INSERT ON TABLE activation_message
                        $data_insert = array(
                                'customer_id' => $customer_id,
                                'date' => date("Y-m-d H:i:s"),
                                'messages' => $message,
                                'subject' => $subject,
                                'support' => 1,
                                'active' => 1,
                                'status_value' => 1,    
                                'img' => $img,
                                'created_by' => $customer_id,
                                'created_at' => date("Y-m-d H:i:s")
                            ); 
                           $this->obj_messages->insert($data_insert);
                        echo '<div class="alert alert-success" style="text-align: center">Creado Exitosamente</div>';
                }
            }
        }else{
            echo '<div class="alert alert-danger" style="text-align: center">Ya tiene un ticket abierto.</div>';
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
}
