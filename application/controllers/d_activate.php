<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_activate extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("commissions_model","obj_commissions");
        $this->load->model("franchise_model","obj_franchise");
        $this->load->model("bonus_model","obj_bonus");
        $this->load->model("activation_message_model","obj_activation");
        $this->load->model("messages_model","obj_messages");
        $this->load->model("points_model","obj_points");
        $this->load->model("binarys_model","obj_binarys");
    }   
                
    public function index(){  
        
           $this->get_session();
           $params = array(
                        "select" =>"customer.customer_id,
                                    customer.username,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.position,
                                    customer.active,
                                    customer.identificador,
                                    customer.parents_id,
                                    customer.created_at,
                                    franchise.price as price,
                                    franchise.point as point,
                                    franchise.name as franchise,
                                    customer.status_value",
                        "join" => array('franchise, franchise.franchise_id = customer.franchise_id'),
                        "where" => "customer.status_value = 1"
               );
           //GET DATA FROM CUSTOMER
           $obj_customer= $this->obj_customer->search($params);
           
           /// PAGINADO
            $modulos ='activaciones'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/activaciones'; 
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_customer",$obj_customer);
            $this->tmp_mastercms->render("dashboard/activate/activate_list");
    }
    
    public function confirmation(){  
        
           $this->get_session();
           $params = array(
                        "select" =>"activation_message.activation_message_id,
                                    activation_message.img,
                                    customer.username,
                                    activation_message.message,
                                    activation_message.franchise,
                                    activation_message.date,
                                    activation_message.active,
                                    customer.status_value",
                        "join" => array('customer, activation_message.customer_id = customer.customer_id')
                        
               );
           //GET DATA FROM CUSTOMER
           $obj_active_message = $this->obj_activation->search($params);
           
           /// PAGINADO
            $modulos ='activaciones'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/activaciones'; 
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set('obj_active_message',$obj_active_message);
            $this->tmp_mastercms->render("dashboard/activate/activate_list_confirmation");
    }
    
    public function active_financy(){
        //ACTIVE CUSTOMER FINANCADO
        if($this->input->is_ajax_request()){ 
                date_default_timezone_set('America/Lima');
                //SELECT CUSTOMER_ID
                $customer_id = $this->input->post("customer_id");
                $today = date('Y-m-j');
                
                //UPDATE TABLE CUSTOMER ACTIVE = 1
                if(count($customer_id) > 0){
                    $data = array(
                        'active' => 1,
                        'date_start' => $today,
                        'financy' => 1,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_customer->update($customer_id,$data);
                }
                //SEND MESSAGE CONFIRMATION ACTIVE
                $this->message_active($customer_id);
                
                echo json_encode($data); 
                exit();
            }
    }
    
    public function active(){
        //ACTIVE CUSTOMER NORMALY
        if($this->input->is_ajax_request()){  
                date_default_timezone_set('America/Lima');
                //SELECT CUSTOMER_ID
                $customer_id = $this->input->post("customer_id");
                $point = $this->input->post("point");
                $parents_id = $this->input->post("parents_id");
                $side = $this->input->post("position");
                $identificador = $this->input->post("identificador");
                
                //GET SPONSOR ACTIVE
                    $params = array(
                        "select" =>"active,
                                    binary,
                                    point_calification_left,
                                    point_calification_rigth",
                        "where" => "customer_id = $parents_id and customer.status_value = 1"
                    );
                $obj_customer= $this->obj_customer->get_search_row($params);
                $active = $obj_customer->active;
                $binary = $obj_customer->binary;
                $point_calification_left = $obj_customer->point_calification_left;
                $point_calification_rigth = $obj_customer->point_calification_rigth;
                
                if($active > 0){
                    //GET BONUS SPONSOR
                    $amount = $this->pay_directo($customer_id,$point,$parents_id);
                    //SEND MESSAGE CONFIRMATION BONUS SPONSOR
                    $this->message_bonus_sponsor($amount,$parents_id,$customer_id);
                    //SET CALIFICATION
                    if($binary != 1){
                        $result = $this->calification($parents_id,$side,$point_calification_left,$point_calification_rigth,$point);
                        //PAY BINARY
                        $this->pay_binario($result,$identificador,$point);
                     }else{
                        //PAY BINARY
                        $result = 0;
                        $this->pay_binario($result,$identificador,$point);
                     }
                     
                }else{
                    
                    //GET AMOUNT BONUS SPONSOR
                    $amount = $this->lost_pay_directo($customer_id,$point,$parents_id);
                    //SEND MESSAGE CONFIRMATION BONUS SPONSOR
                    $this->message_bonus_sponsor_lost($amount,$parents_id,$customer_id);
                    $result = 0;
                    $this->pay_binario($result,$identificador,$point);
                }
                
                //SELECT TOY AND TODAY+76
                $today = date('Y-m-j');
                
                //UPDATE TABLE CUSTOMER ACTIVE = 1
//                if(count($customer_id) > 0){
                    $data = array(
                        'active' => 1,
                        'date_start' => $today,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_customer->update($customer_id,$data);
//                }
                //SEND MESSAGE CONFIRMATION ACTIVE
                $this->message_active($customer_id);
                
                echo json_encode($data); 
                exit();
            }
    }
 
    public function pay_directo($customer_id,$point,$parents_id){
        
                //GET PERCENT FROM BONUS
                $params = array(
                        "select" =>"percent",
                        "where" => "bonus_id = 1 and status_value = 1"
               );
                //GET DATA FROM BONUS
                $obj_bonus= $this->obj_bonus->get_search_row($params);
                $percet = $obj_bonus->percent;
                
                //CALCULE AMOUNT
                $amount = ($point  * $percet) / 100;
                
                //INSERT COMMISSION TABLE
                if(count($customer_id) > 0){
                    $data = array(
                        'customer_id' => $parents_id,
                        'bonus_id' => 1,
                        'name' => "Bono de Patrocinio",
                        'amount' => $amount,
                        'status_value' => 1,
                        'date' => date("Y-m-d H:i:s"),
                        'created_at' => date("Y-m-d H:i:s"),
                        'created_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_commissions->insert($data);
                    
                    //POINT ON POINT TABLE
                    $data = array(
                        'customer_id' => $parents_id,
                        'bonus_id' => 1,
                        'point' => $point,
                        'status_value' => 1,
                        'date' => date("Y-m-d H:i:s"),
                        'created_at' => date("Y-m-d H:i:s"),
                        'created_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_points->insert($data);
                    return $amount;
                }
        }
        
    public function lost_pay_directo($customer_id,$point,$parents_id){
                //GET PERCENT FROM BONUS
                $params = array(
                        "select" =>"percent",
                        "where" => "bonus_id = 1 and status_value = 1"
               );
                //GET DATA FROM BONUS
                $obj_bonus= $this->obj_bonus->get_search_row($params);
                $percet = $obj_bonus->percent;
                
                //CALCULE AMOUNT
                $amount = ($point  * $percet) / 100;
                return $amount;
    }    
    
    public function message_bonus_sponsor($amount,$parents_id,$customer_id){
            $message = "Acaba de ganar $$amount en bono de patrocinio";
            $data_messages = array(
                'customer_id' => $parents_id,
                'date' => date("Y-m-d H:i:s"),
                'label' => "Soporte",
                'subject' => "Bono Patrocinio",
                'messages' => $message,
                'type' => 1,
                'type_send' => 0,
                'active' => 1,
                'created_by' => $customer_id,
                'status_value' => 1,
                'created_at' => date("Y-m-d H:i:s"),
            );
            //INSERT MESSAGES    
            $this->obj_messages->insert($data_messages);
    }
    
    public function message_bonus_sponsor_lost($amount,$parents_id,$customer_id){
                //GET PERCENT FROM BONUS
               $message = "Acaba de perder $$amount en bono de patrocinio";
                    $data_messages = array(
                        'customer_id' => $parents_id,
                        'date' => date("Y-m-d H:i:s"),
                        'label' => "Soporte",
                        'subject' => "Bono Patrocinio",
                        'messages' => $message,
                        'type' => 1,
                        'type_send' => 0,
                        'active' => 1,
                        'created_by' => $customer_id,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                    );
                    //INSERT MESSAGES    
                    $this->obj_messages->insert($data_messages);
    }
    
    public function message_active($customer_id){
                //GET PERCENT FROM BONUS
               $message = "Su cuenta se encuentra activa";
                    $data_messages = array(
                        'customer_id' => $customer_id,
                        'date' => date("Y-m-d H:i:s"),
                        'label' => "Soporte",
                        'subject' => "Cuenta Activa",
                        'messages' => $message,
                        'type' => 2,
                        'type_send' => 0,
                        'active' => 1,
                        'created_by' => $customer_id,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                    );
                    //INSERT MESSAGES    
                    $this->obj_messages->insert($data_messages);
    }
    
    public function calification($parents_id,$side,$point_calification_left,$point_calification_rigth,$point){
                //SET SIDE CALIFICATION
                if($side == 1){
                    $result = $point_calification_left - $point;
                    $point_calification_left = $result;
                    //VERIFICATE BINARY
                    $this->verification_binary($point_calification_left, abs($point_calification_rigth), $parents_id);
                        if($result < 0){
                            //RESULT CONVERT INT
                            $result = abs($result);
                            $data = array(
                                'point_calification_left' => 0,
                                ); 
                            $this->obj_customer->update($parents_id,$data);
                            
                            //INSERT POINT ON BINERY TABLE
                             $data = array(
                                'customer_id' => $parents_id,
                                'point_left' => $result,
                                'created_by' => $parents_id,
                                'status_value' => 1,
                                'created_at' => date("Y-m-d H:i:s"),
                                ); 
                            $this->obj_binarys->insert($data);
                            
                            //RETURN PARED_ID
                            return $parents_id;
                        }else{
                             $data = array(
                                'point_calification_left' => $result,
                                ); 
                            $this->obj_customer->update($parents_id,$data);
                            return 0;
                        }
                }else{
                    $result = $point_calification_rigth - $point;
                    $point_calification_rigth = $result;
                    //VERIFICATE BINARY
                    $this->verification_binary($point_calification_left, $point_calification_rigth, $parents_id);
                    if($result < 0){
                            //RESULT CONVERT INT
                            $result = abs($result);
                            $data = array(
                                'point_calification_rigth' => 0,
                                ); 
                            $this->obj_customer->update($parents_id,$data);
                            
                            //INSERT POINT ON BINERY TABLE
                             $data = array(
                                'customer_id' => $parents_id,
                                'point_rigth' => $result,
                                 'created_by' => $parents_id,
                                'status_value' => 1,
                                'created_at' => date("Y-m-d H:i:s"),
                                ); 
                            $this->obj_binarys->insert($data);
                            
                            //RETURN PARED_ID
                            return $parents_id;
                    }else{
                         $data = array(
                            'point_calification_rigth' => $result,
                            ); 
                        $this->obj_customer->update($parents_id,$data);
                        return 0;
                    }
                }
                
                
    }
    
    public function verification_binary($point_calification_left,$point_calification_rigth,$parents_id){
        //VERIFICATE POINT CALIFICATION
        if($point_calification_left <= 0 && $point_calification_rigth <= 0){
                //RESULT CONVERT INT
                    $data = array(
                        'binary' => 1,
                        ); 
                    $this->obj_customer->update($parents_id,$data);
        }
    }
    
    public function pay_binario($result,$identificador,$point){
            
            //CONVERT ARRAY
            $array_identificador =  explode(',', $identificador);
//            $count_array = count($array_identificador);
//            $key = $count_array;
            
            foreach ($array_identificador as $key => $value) {
//                var_dump($key);
//                var_dump($value);
//                die();
                if($key <= 9){
                    $identificador = substr(str_replace($value, "", $identificador),1);
                        if($result == 0){
                            $where = "customer.identificador = '$identificador'";
                        }else{
                            $where = "customer.identificador = '$identificador' and customer_id <> $result";
                        }
                            //GET DATA CUSTOMER
                            $params = array(
                                "select" =>"customer_id,
                                            position",
                                "where" => $where
                            );
                            
                            $obj_customer = $this->obj_customer->get_search_row($params);
                            
                            if(count($obj_customer) > 0){
                                //INSERT POINT ON BINARYS TABLE
                               $rest = substr("$value", -1); 
                                if($rest == "z"){
                                    $leg = 'point_left';
                                }else{
                                    $leg = 'point_rigth';
                                }
                                  //INSERT POINT LEG ON BINARYS TABLE
                                    $data = array(
                                        'customer_id' => $obj_customer->customer_id,
                                        "$leg" => $point,
                                        'created_by' => $obj_customer->customer_id,
                                        'status_value' => 1,
                                        'created_at' => date("Y-m-d H:i:s"),
                                    ); 
                                    $this->obj_binarys->insert($data);
                                    
                                    //INSERT POINT LEG ON POINTS TABLE
                                    $data = array(
                                        'bonus_id' => 7,
                                        'customer_id' => $obj_customer->customer_id,
                                        'point' => $point,
                                        'date' => date("Y-m-d H:i:s"),
                                        'status_value' => 1,
                                        'created_at' => date("Y-m-d H:i:s"),
                                        'created_by' => $obj_customer->customer_id,
                                    ); 
                                    $this->obj_points->insert($data);
                            }
            }
        }
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