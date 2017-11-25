<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_message_confirmation extends CI_Controller {
     function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("activation_message_model","obj_activation_message");
        $this->load->model("otros_model","obj_otros");
        $this->load->model("commissions_model","obj_commissions");
        $this->load->model("messages_model","obj_messages");
        
    }

    public function index()
    {
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER_ID 
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET TOTAL MESSAGE
         $all_message = $this->get_total_messages($customer_id);
         //GET TOTAL MESSAGE
         $obj_message = $this->get_messages($customer_id);
        
        //GET MESSAGE SEND FROM USER
        $param = array(
                        "select" =>"activation_message_id,
                                    name,
                                    status_value",
                         "where" => "customer_id = $customer_id"
                         );
         $obj_message_activate = $this->obj_activation_message->get_search_row($param);
         $messaje_active_count = count($obj_message_activate);
         
         //GET TOTAL AMOUNT
                $params_total = array(
                        "select" =>"sum(amount) as total,
                                    (select sum(amount) FROM commissions WHERE status_value <= 2 and customer_id = $customer_id) as balance",
                         "where" => "commissions.customer_id = $customer_id",
                    );
             $obj_commissions = $this->obj_commissions->get_search_row($params_total); 
             $obj_total = $obj_commissions->total;
             $obj_balance = $obj_commissions->balance;
         
         //VERIFY IF ISSET MESSAGE
         if($messaje_active_count == 0){
                //GET DATA FROM CUTOMER
             $params = array(
                        "select" =>"customer.customer_id,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.status_value,
                                    customer.franchise_id,
                                    franchise.price,
                                    franchise.name as franchise,
                                    ",
                         "where" => "customer.customer_id = $customer_id",
                         "join" => array('franchise, customer.franchise_id = franchise.franchise_id',)
                                        );
                $obj_customer = $this->obj_customer->get_search_row($params);
                $this->tmp_backoffice->set("obj_customer",$obj_customer);
         }
         
            //GET PRICE BTC
            $params_price_btc = array(
                                    "select" =>"",
                                     "where" => "otros_id = 1");
                
           $obj_otros = $this->obj_otros->get_search_row($params_price_btc); 
           $price_btc = "$".number_format($obj_otros->precio_btc,2);
            
            $this->tmp_backoffice->set("obj_message",$obj_message);
            $this->tmp_backoffice->set("all_message",$all_message); 
            $this->tmp_backoffice->set("obj_total",$obj_total);
            $this->tmp_backoffice->set("obj_balance",$obj_balance);
            $this->tmp_backoffice->set("messaje_active_count",$messaje_active_count);
            $this->tmp_backoffice->set("price_btc",$price_btc);
            $this->tmp_backoffice->render("backoffice/b_message_confirmation");
    }
    
    public function upload()
    {
        //GET SESION ACTUALY
        $this->get_session();
        $customer_id = $_POST['customer_id'];
        $param = array(
                        "select" =>"activation_message_id,
                                    name,
                                    status_value",
                         "where" => "customer_id = $customer_id"
                         );
         $obj_message_activate = $this->obj_activation_message->get_search_row($param);
         $messaje_active_count = count($obj_message_activate);
         
        //VERIFI ONLY 1 ROW 
        if($messaje_active_count == 0){
            if(isset($_FILES["image_file"]["name"]))
            {
            $config['upload_path']          = './static/backoffice/uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
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

                    /// GET DATA METHOD POST
                        $name = $_POST['name'];
                        $franchise = $_POST['franchise'];
                        $message = $_POST['message'];
                        $img = $_FILES["image_file"]["name"];
                    // INSERT ON TABLE activation_message
                        $data = array(
                                'customer_id' => $customer_id,
                                'date' => date("Y-m-d H:i:s"),
                                'message' => $message,
                                'name' => $name,
                                'status_value' => 1,    
                                'img' => $img,
                                'subject' => "Correo de Activacion",
                                'franchise' => $franchise,
                                'created_by' => $customer_id,
                                'created_at' => date("Y-m-d H:i:s")
                            ); 
                           $this->obj_activation_message->insert($data);
                        echo '<div class="alert alert-success" style="text-align: center">Enviado Exitosamente</div>';
                }
            }
        }else{
            echo '<div class="alert alert-success" style="text-align: center">Usted ya envio el mensaje anteriormente</div>';
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


    
