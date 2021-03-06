<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_data extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
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
        /// VISTA
        $customer_id = $_SESSION['customer']['customer_id'];
        
        //GET TOTAL MESSAGE
        $all_message = $this->get_total_messages($customer_id);
        //GET TOTAL MESSAGE
        $obj_message = $this->get_messages($customer_id);
        //GET MESSAGE INFORMATIVE
        $messages_informative = $this->get_messages_informative();
        $params = array(
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
                                    customer.birth_date,
                                    customer.address,
                                    customer.date_start,
                                    customer.date_end,
                                    customer.btc_address,
                                    customer.city,
                                    customer.status_value,
                                    paises.nombre as pais,
                                    regiones.nombre as region
                                    ",
                        "where" => "customer.customer_id = $customer_id and paises.id_idioma = 7 and regiones.id_idioma = 7",
                        "join" => array('paises, customer.country = paises.id',
                                        'regiones, customer.region = regiones.id')
                                        );

         $obj_customer = $this->obj_customer->get_search_row($params);  
         
         //GET SPONSOR
         $parent = $obj_customer->parents_id;
         $params = array(
                        "select" =>"customer.username,customer.first_name,customer.last_name",
                        "where" => "customer.customer_id = $parent");

         $obj_sponsor = $this->obj_customer->get_search_row($params);
         
         //GET PRICE BTC
         $price_btc = $this->btc_price();
         
         //SEND DATA TO VIEW  
         $this->tmp_backoffice->set("obj_message",$obj_message);
         $this->tmp_backoffice->set("messages_informative",$messages_informative);
         
         
         $this->tmp_backoffice->set("all_message",$all_message);
         $this->tmp_backoffice->set("price_btc",$price_btc);
         $this->tmp_backoffice->set("obj_customer",$obj_customer);
         $this->tmp_backoffice->set("obj_sponsor",$obj_sponsor);
         $this->tmp_backoffice->render("backoffice/b_data");
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
                             "where" => "status_value = 1 and page = 2 and active = 1",
                            "order" => "position ASC");
                
           $messages_informative = $this->obj_otros->search($params); 
            return $messages_informative;
        }
        
        public function udpate_address(){
            
         if($this->input->is_ajax_request()){  
           //SELECT ID FROM CUSTOMER
           $address = $this->input->post('address');
           $customer_id = $this->input->post('customer_id');

           //UPDATE DATA EN CUSTOMER TABLE
           $data = array(
                           'address' => $address,
                           'updated_by' => $customer_id,
                           'updated_at' => date("Y-m-d H:i:s")
                       ); 
                       $this->obj_customer->update($customer_id,$data);

                $data['message'] = "true";
            echo json_encode($data); 
            }
        }
    
        public function update_position(){
         if($this->input->is_ajax_request()){   
            //SELECT ID FROM CUSTOMER
           $pierna = $this->input->post('pierna');
           $customer_id = $this->input->post('customer_id');
           //UPDATE DATA EN CUSTOMER TABLE
           $data = array(
                           'position_temporal' => $pierna,
                           'updated_by' => $customer_id,
                           'updated_at' => date("Y-m-d H:i:s")
                       ); 
                       $this->obj_customer->update($customer_id,$data);

                $data['message'] = "true";
            echo json_encode($data); 
            }
        }
        
        public function update_password(){

             if($this->input->is_ajax_request()){   
                //SELECT ID FROM CUSTOMER
               $password_one = $this->input->post('password_one');
               $customer_id = $this->input->post('customer_id');
               
               if($password_one != ""){
                            //UPDATE DATA EN CUSTOMER TABLE
                            $data = array(
                                            'password' => $password_one,
                                            'updated_by' => $customer_id,
                                            'updated_at' => date("Y-m-d H:i:s")
                                        ); 
                                        $this->obj_customer->update($customer_id,$data);

                                 $data['message'] = "true";
                                 $data['print'] = "La contraseña de cambio con exito";
                                 $data['url'] = "misdatos";
                             echo json_encode($data); 
                    
               }else{
                     $data['message'] = "false";
                     $data['print'] = "Las contraseñas no deben estan en blanco";
                     $data['url'] = "misdatos";
                     echo json_encode($data); 
               }
            }
        }
    
        public function update_btc_address(){
            
         if($this->input->is_ajax_request()){   
            //SELECT ID FROM CUSTOMER
           $btc_address = $this->input->post('btc');
           $customer_id = $this->input->post('customer_id');

           $param = array(
                        "select" =>"customer.customer_id,
                                    customer.username,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.email,
                                    customer.btc_address,
                                    customer.status_value",
                        "where" => "customer.customer_id = $customer_id");
           $obj_customer = $this->obj_customer->get_search_row($param);
           //GET EMAIL
           $email = $obj_customer->email;
           
           //UPDATE DATA EN CUSTOMER TABLE
           $data = array(
                           'btc_address' => $btc_address,
                           'updated_by' => $customer_id,
                           'updated_at' => date("Y-m-d H:i:s")
                       ); 
                       $this->obj_customer->update($customer_id,$data);
            
                       
                 // El mensaje
                $mail = "Querido(a), $obj_customer->first_name $obj_customer->last_name la dirección de bitcoin de su cuenta se cambio por: $btc_address";
                // Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
                $mensaje = wordwrap($mail, 70, "\r\n");         
                       
                //insert on messages
                $data_messages = array(
                        'customer_id' => $customer_id,
                        'date' => date("Y-m-d H:i:s"),
                        'label' => "Soporte",
                        'subject' => "Cambio de dirección BTC",
                        'messages' => $mensaje,
                        'type' => 2,
                        'type_send' => 0,
                        'active' => 1,
                        'created_by' => $customer_id,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                    );
                    //INSERT MESSAGES    
                    $this->obj_messages->insert($data_messages);           
                       
                       
               
                //Titulo
                $titulo = "3T Club - Cambio de dirección BTC";
                //cabecera
                $headers = "MIME-Version: 1.0\r\n"; 
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
                //dirección del remitente 
                $headers .= "3T Club: Travel - Training - Trade < noreplay@3t.club >\r\n";
                //Enviamos el mensaje a tu_dirección_email 
                $bool = mail("$email",$titulo,$mensaje,$headers);
//                       
                $data['message'] = "true";
            echo json_encode($data); 
            }
    }
    
        public function update_bank(){
            
         if($this->input->is_ajax_request()){ 
             
            //SELECT ID FROM CUSTOMER
           $customer_id = $this->input->post('customer_id');
           $bank_name = $this->input->post('bank_name');
           $titular_name = $this->input->post('titular_name');
           $bank_account = $this->input->post('bank_account');
           
           //UPDATE DATA EN CUSTOMER TABLE
           if($customer_id != ""){
                     $data = array(
                           'bank_name' => $bank_name,
                           'titular_name' => $titular_name,
                           'bank_account' => $bank_account,
                           'updated_by' => $customer_id,
                           'updated_at' => date("Y-m-d H:i:s")
                       ); 
                       $this->obj_customer->update($customer_id,$data);
           }
                       
            $data['message'] = "true";
            echo json_encode($data); 
            }
    }
    
        public function validate_password() {
        //SELECT ID FROM CUSTOMER
        $password = str_to_minuscula(trim($this->input->post('password')));
        $customer_id = trim($this->input->post('customer_id'));
        
        $param_customer = array(
            "select" => "password",
            "where" => "customer_id = '$customer_id' and password = '$password'");
        $customer = count($this->obj_customer->get_search_row($param_customer));
        
        if ($customer > 0) {
            $data['message'] = "true";
            $data['print'] = "✔ Verificado";
        } else {
            $data['message'] = "false";
            $data['print'] = "Contraseña Incorrecta";
        }
        echo json_encode($data);
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
