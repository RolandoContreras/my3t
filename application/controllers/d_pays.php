<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_pays extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("commissions_model","obj_commission");
        $this->load->model("pay_commission_model","obj_pay_commission");
        $this->load->model("pay_model","obj_pay");
    }   
                
    public function index(){  
        
           $this->get_session();
           $params = array(
                        "select" =>"pay.pay_id,
                                    pay.date,
                                    pay.amount,
                                    pay.obs,
                                    pay.status_value,
                                    customer.customer_id,
                                    customer.first_name,
                                    customer.username,
                                    customer.btc_address,
                                    customer.last_name,
                                    customer.email,
                                    customer.dni",
                        "join" => array('customer, pay.customer_id = customer.customer_id'),
                        "order" => "pay.pay_id DESC"
               );
           //GET DATA FROM CUSTOMER
           $obj_pay= $this->obj_pay->search($params);
           
           /// PAGINADO
            $modulos ='pagos'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/pagos'; 
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_pay",$obj_pay);
            $this->tmp_mastercms->render("dashboard/pagos/pagos_list");
    }
    
    public function details($pay_id){  
        
           $this->get_session();
           $params = array(
                        "select" =>"commissions.commissions_id,
                                    commissions.name, 
                                    commissions.amount,
                                    commissions.date,
                                    commissions.status_value",
                        "where" => "pay_commission.pay_id = $pay_id",
                        "join" => array('commissions, pay_commission.commissions_id = commissions.commissions_id'),
                        "order" => "commissions.date ASC"
                        );
           //GET DATA FROM CUSTOMER
           $obj_pay_commission= $this->obj_pay_commission->search($params);
           
           /// PAGINADO
            $modulos ='cobros'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/pagos'; 
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_pay_commission",$obj_pay_commission);
            $this->tmp_mastercms->render("dashboard/pagos/pagos_details");
    }
    
    public function pagado(){
        
        if($this->input->is_ajax_request()){  
            ///GET PAY_ID
            $pay_id = $this->input->post("pay_id");
            //GET DATA FROM EMAIL
            $first_name = $this->input->post("first_name");
            $username = $this->input->post("username");
            $amount = $this->input->post("amount");
            $email = $this->input->post("email");
            
            //UPDATE FILES PAY
            $data_pay = array(
                        'status_value' => 4,
                        'updated_by' =>  $_SESSION['usercms']['user_id'],
                        'updated_at' => date("Y-m-d H:i:s")
                    ); 
            $this->obj_pay->update($pay_id,$data_pay);
                    
            //SELECT ALL FILE WHERE PAY_ID = $pay_id
            $params = array(
                        "select" =>"pay_commission_id,commissions_id",
                        "where" => "pay_id = $pay_id"
               );
           //GET DATA FROM CUSTOMER
           $obj_pay_commission= $this->obj_pay_commission->search($params);
            
           foreach ($obj_pay_commission as $value) {
               $data_pay_comission = array(
                        'status_value' => 4,
                        'updated_by' =>  $_SESSION['usercms']['user_id'],
                        'updated_at' => date("Y-m-d H:i:s")
                    ); 
                    $this->obj_pay_commission->update($value->pay_commission_id,$data_pay_comission);
                    
                $data_comission = array(
                        'status_value' => 4,
                        'updated_by' =>  $_SESSION['usercms']['user_id'],
                        'updated_at' => date("Y-m-d H:i:s")
                    ); 
                    $this->obj_commission->update($value->commissions_id,$data_comission);    
           }  
           
         // Envio de Correo de confirmacion de pago
               $mail = '<html> 
                            <head> 
                               <title>Cobro Procesado</title> 
                            </head> 
                            <body> 
                            <h2>Pedido de cobro procesado</h2> 
                            <p>     
                            Saludos '.$first_name.' la petición de cobro del usuario: '.$username.' por la cantidad: '.$amount.', fue procesada exitósamente. <br>Gracias por su confianza. 
                            </p> 
                            <br>
                            <br>
                            <br>
                            3T Club: Travel - Training - Trade <br>
                            <i>https://my3t.club</i></p> 
                            </body> 
                            </html> 
                            '; 

                // Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
                $mensaje = wordwrap($mail, 70, "\r\n");
                //Titulo
                $titulo = "PEDIDO DE COBRO PROCESADO";
                //cabecera
                $headers = "MIME-Version: 1.0\r\n"; 
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
                //dirección del remitente 
                $headers .= "From: 3T Club: Travel - Training - Trade < noreplay@my3t.club >\r\n";
                //Enviamos el mensaje a tu_dirección_email 
                
                $bool = mail("$email",$titulo,$mensaje,$headers);

                $data['message'] = "true";
                echo json_encode($data); 
            exit();
        }
    }
    
    public function devolver(){
        if($this->input->is_ajax_request()){  
            ///GET PAY_ID
            $pay_id = $this->input->post("pay_id");
            //GET DATA FROM EMAIL
            $first_name = $this->input->post("first_name");
            $username = $this->input->post("username");
            $amount = $this->input->post("amount");
            $email = $this->input->post("email");
            
            //UPDATE FILES PAY
            $data_pay = array(
                        'status_value' => 2,
                        'updated_by' =>  $_SESSION['usercms']['user_id'],
                        'updated_at' => date("Y-m-d H:i:s")
                    ); 
            $this->obj_pay->update($pay_id,$data_pay);
                    
            //SELECT ALL FILE WHERE PAY_ID = $pay_id
            $params = array(
                        "select" =>"pay_commission_id,commissions_id",
                        "where" => "pay_id = $pay_id"
               );
           //GET DATA FROM CUSTOMER
           $obj_pay_commission= $this->obj_pay_commission->search($params);
            
           foreach ($obj_pay_commission as $value) {
               $data_pay_comission = array(
                        'status_value' => 2,
                        'updated_by' =>  $_SESSION['usercms']['user_id'],
                        'updated_at' => date("Y-m-d H:i:s")
                    ); 
                    $this->obj_pay_commission->update($value->pay_commission_id,$data_pay_comission);
                    
                $data_comission = array(
                        'status_value' => 2,
                        'updated_by' =>  $_SESSION['usercms']['user_id'],
                        'updated_at' => date("Y-m-d H:i:s")
                    ); 
                    $this->obj_commission->update($value->commissions_id,$data_comission);    
           }
           // Envio de Correo de confirmacion de pago
                $mail = '<html> 
                            <head> 
                               <title>Pedido de cobro cancelado</title> 
                            </head> 
                            <body> 
                            <h2>Pedido de Cobro Cancelado</h2> 
                            <p>     
                            Saludos '.$first_name.' la petición de cobro del usuario: <b>'.$username.'</b> por la cantidad: $'.$amount.', fue  cancelada. 
                            <br>Comunicarse con soporte. Gracias por su confianza. 
                            </p> 
                            <br>
                            <br>
                            <br>
                            3T Club: Travel - Training - Trade<br>
                            <i>https://my3t.club</i></p> 
                            </body> 
                            </html> 
                            '; 

                // Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
                $mensaje = wordwrap($mail, 70, "\r\n");
                //Titulo
                $titulo = "Pedido de cobro cancelado";
                //cabecera
                $headers = "MIME-Version: 1.0\r\n"; 
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
                //dirección del remitente 
                $headers .= "From: 3T Club: Travel - Training - Trade < noreplay@my3t.club >\r\n";
                //Enviamos el mensaje a tu_dirección_email 
                $bool = mail("$email",$titulo,$mensaje,$headers);
           
                    $data['message'] = "true";
                    echo json_encode($data); 
            exit();
        }
    }
    
    public function load($pay_id=NULL){
            /// PARAMETROS PARA EL SELECT 
            $params = array(
                        "select" =>"pay.pay_id,
                                    pay.amount,
                                    pay.date,
                                    pay.obs,
                                    pay.customer_id,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.username,
                                    pay.status_value",
                         "where" => "pay_id = $pay_id",
                         "join" => array('customer, pay.customer_id = customer.customer_id'),
            ); 
            $obj_pays  = $this->obj_pay->get_search_row($params); 
            
            $modulos ='pagos'; 
            $seccion = 'Formulario';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_pays",$obj_pays);
            $this->tmp_mastercms->render("dashboard/pagos/pagos_form");    
    }
    
    public function validate_customer() {
            if ($this->input->is_ajax_request()) {
                //SELECT ID FROM CUSTOMER
            $customer_id = $this->input->post('customer_id');
            $param = array(
                "select" => "customer_id,
                             username,
                             first_name,
                             last_name",
                "where" => "customer_id = $customer_id");
            $obj_customer = $this->obj_customer->get_search_row($param);
            
            if (count($obj_customer) > 0) {
                $data['message'] = "true";
                $data['username'] = $obj_customer->username;
                $data['name'] = $obj_customer->first_name." ".$obj_customer->last_name;
                $data['print'] = '<div class="alert alert-success" style="text-align: center">Usuario Encontrado.</div>';
            } else {
                $data['message'] = "false";
                $data['print'] = '<div class="alert alert-danger" style="text-align: center">Usuario no Existe.</div>';
            }
            echo json_encode($data);
            }
        }
        
    public function validate(){
        
        $pay_id =  $this->input->post('pay_id');
        $customer_id =  $this->input->post('customer_id');
        $amount =  $this->input->post('amount');
        $obs =  $this->input->post('obs');
        $date = formato_fecha_db_mes_dia_ano($this->input->post('date'));
        $status_value =  $this->input->post('status_value');
        
        //UPDATE DATA
        $data = array(
                'customer_id' => $customer_id,
                'amount' => $amount,
                'obs' => $obs,
                'date' => $date,
                'status_value' => $status_value,  
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
                );          
            //SAVE DATA IN TABLE    
        
            $this->obj_pay->update($pay_id, $data);
        redirect(site_url()."dashboard/pagos");
    }

    public function get_session(){          
        if (isset($_SESSION['usercms'])){
            if($_SESSION['usercms']['logged_usercms']=="TRUE" && $_SESSION['usercms']['status']==1){               
                return true;
            }else{
                redirect(site_url().'dashboard');
            }
        }else{
            redirect(site_url().'dashboard');
        }
    }
}
?>