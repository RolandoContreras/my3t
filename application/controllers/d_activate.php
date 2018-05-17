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
    }   
                
    public function index(){  
        
           $this->get_session();
           $params = array(
                        "select" =>"customer.customer_id,
                                    customer.username,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.active,
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
                //SELECT CUSTOMER_ID
                $customer_id = $this->input->post("customer_id");
                $point = $this->input->post("point");
                $parents_id = $this->input->post("parents_id");
                
                //GET SPONSOR ACTIVE
                    $params = array(
                        "select" =>"customer.active",
                        "where" => "customer_id = $parents_id and customer.status_value = 1"
                    );
                $obj_customer= $this->obj_customer->get_search_row($params);
                $active = $obj_customer->active;
                
                if($active > 0){
                    //GET BONUS SPONSOR
                    $amount = $this->pay_directo($customer_id,$point,$parents_id);
                    //SEND MESSAGE CONFIRMATION BONUS SPONSOR
                    $this->message_bonus_sponsor($amount,$parents_id,$customer_id);
                    
                    //GET BONUS UNILEVEL
//                    $this->pay_binario($customer_id);
                }else{
                    //GET AMOUNT BONUS SPONSOR
                    $amount = $this->lost_pay_directo($customer_id,$point,$parents_id);
                    //SEND MESSAGE CONFIRMATION BONUS SPONSOR
                    $this->message_bonus_sponsor_lost($amount,$parents_id,$customer_id);
                }
                
                //SELECT TOY AND TODAY+76
                $today = date('Y-m-j');
                
                //UPDATE TABLE CUSTOMER ACTIVE = 1
                if(count($customer_id) > 0){
                    $data = array(
                        'active' => 1,
                        'date_start' => $today,
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
        
        
    public function pay_binario($customer_id){
            //GET PARAM TO CUSTOMER
            $params = array(
                        "select" =>"customer.customer_id,
                                    customer.username,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.active,
                                    customer.parents_id,
                                    customer.identificador,
                                    customer.created_at,
                                    (select percent from bonus where bonus_id = 3 and status_value = 1) as percet_binario,
                                    franchise.price as price,
                                    franchise.name as franchise,
                                    customer.status_value",
                        "join" => array('franchise, franchise.franchise_id = customer.franchise_id'),
                        "where" => "customer_id = $customer_id and customer.status_value = 1"
               );
        
            $obj_customer = $this->obj_customer->get_search_row($params); 
            //GET PERCENT BINARY FROM TABLE BONUS
            $percet_binario = $obj_customer->percet_binario;
            
            //GET CALIFICATION PARENT_ID
            $parent_id = $obj_customer->parents_id;
            //SELECT PRICE TO PAQUETE
            $price_tree = $obj_customer->price;
            //SELECT IDENTIFICATOR
            $identificator = $obj_customer->identificador;
            $creacion = $obj_customer->created_at;
            //SEPARAR EL IDENTIFICADOR
            $explo_identificator =  explode(",", $identificator);
            
            $str = "";
            foreach ($explo_identificator as $key => $value) {

                    $encontrar_post = strpos($identificator, $value);
                    $texto =  substr($identificator, $encontrar_post);
                    $str .= "or customer.identificador like '$texto%' ";
                }
                //ELIMINAR OR DE INICIO
                $str = substr($str, 3);  
                
            if(count($customer_id) > 0){
                //SELECT TREE TO INSERT % BINARY
                $param_tree = array(
                                    "select" =>"customer.customer_id,
                                                customer.username,
                                                customer.created_at,
                                                customer.point_left,
                                                customer.point_rigth,
                                                customer.identificador,
                                                customer.calification,
                                                customer.point_calification_left,
                                                customer.point_calification_rigth,
                                                customer.position",
                                     "where" => "customer.created_at < '$creacion' and customer.status_value = 1 and ($str)",
                                     "join" => array('franchise, customer.franchise_id = franchise.franchise_id'),
                                     "order" => "customer.created_at DESC"); 
                 $obj_tree = $this->obj_customer->search($param_tree); 
                 
                //SELECT Z O D FROM CUSTOMER_ID
                $position_principal = substr($explo_identificator[0], -1);
                //ORDER POINT LEFT OR RIGTH
                $position_tree = "";
                                
                foreach ($obj_tree as $value) {
                    $identificator_tree  = $value->identificador;
                    //SELECT Z O D FROM CUSTOMER_ID
                    $explo_identificator_2 =  explode(",", $identificator_tree);
                    $position_tree = substr($explo_identificator_2[0], -1);
                    
                    //CONDITION IS EQUAL
                    if($position_tree == $position_principal){
                        if($position_principal == 'z'){
                            $point_left = ($price_tree  * $percet_binario) / 100;
                            $point_left = $value->point_left + $point_left;
                            //UPDATE POINT LEFT TABLE CUSTOMER
                            
                            if($value->customer_id == $parent_id && $value->calification == 0){
                                                                
                                $calification_left = $value->point_calification_left - $price_tree;
                                $calification_rigth = $value->point_calification_rigth;
                                
                                    if($calification_rigth <= 0 && $calification_left <= 0){
                                        $data = array(
                                        'point_calification_left' => $calification_left,
                                        'calification' => 1,
                                        'updated_at' => date("Y-m-d H:i:s"),
                                        'updated_by' => $_SESSION['usercms']['user_id'],
                                        ); 
                                        $this->obj_customer->update($value->customer_id,$data);
                                    }else{
                                        $data = array(
                                        'point_calification_left' => $calification_left,
                                        'updated_at' => date("Y-m-d H:i:s"),
                                        'updated_by' => $_SESSION['usercms']['user_id'],
                                        ); 
                                        $this->obj_customer->update($value->customer_id,$data);
                                    }
                            }else{
                                
                                $data = array(
                                'point_left' => $point_left,
                                'updated_at' => date("Y-m-d H:i:s"),
                                'updated_by' => $_SESSION['usercms']['user_id'],
                                ); 
                                $this->obj_customer->update($value->customer_id,$data);
                            }
                            //SAVE LAST POSITION
                            $position_principal = $position_tree;
                                                        
                        }else{
                            $point_rigth = ($price_tree  * $percet_binario) / 100;
                            $point_rigth = $value->point_rigth + $point_rigth;
                            //UPDATE POINT RIGTH TABLE CUSTOMER
                            
                            if($value->customer_id == $parent_id && $value->calification == 0){
                                $calification_left = $value->point_calification_left;
                                $calification_rigth = $value->point_calification_rigth - $price_tree;
                                
                                    if($calification_left <= 0 && $calification_rigth  <= 0){
                                        $data = array(
                                        'point_calification_rigth' => $calification_rigth,
                                        'calification' => 1,
                                        'updated_at' => date("Y-m-d H:i:s"),
                                        'updated_by' => $_SESSION['usercms']['user_id'],
                                        ); 
                                        $this->obj_customer->update($value->customer_id,$data);
                                    }else{
                                         $data = array(
                                        'point_calification_rigth' => $calification_rigth,
                                        'updated_at' => date("Y-m-d H:i:s"),
                                        'updated_by' => $_SESSION['usercms']['user_id'],
                                        ); 
                                        $this->obj_customer->update($value->customer_id,$data);
                                    }
                                   
                                    //SAVE LAST POSITION
                                    $position_principal = $position_tree;
                            }else{
                                    $data = array(
                                        'point_rigth' => $point_rigth,
                                        'updated_at' => date("Y-m-d H:i:s"),
                                        'updated_by' => $_SESSION['usercms']['user_id'],
                                    ); 
                                    $this->obj_customer->update($value->customer_id,$data);
                                    //SAVE LAST POSITION
                                    $position_principal = $position_tree;
                            }
                            
                        }
                    }else{
                            if($position_principal == 'z'){
                                $point_left = ($price_tree  * $percet_binario) / 100;
                                $point_left = $value->point_left + $point_left;

                                //UPDATE POINT LEFT TABLE CUSTOMER
                                
                              if($value->customer_id == $parent_id && $value->calification == 0){
                                  $calification_left = $value->point_calification_left - $price_tree;
                                  $calification_rigth = $value->point_calification_rigth;
                                
                                    if($calification_rigth <= 0 && $calification_left  <= 0){
                                        $data = array(
                                        'point_calification_left' => $calification_left,
                                        'calification' => 1,
                                        'updated_at' => date("Y-m-d H:i:s"),
                                        'updated_by' => $_SESSION['usercms']['user_id'],
                                        ); 
                                        $this->obj_customer->update($value->customer_id,$data);
                                    }else{
                                         $data = array(
                                        'point_calification_left' => $calification_rigth,
                                        'updated_at' => date("Y-m-d H:i:s"),
                                        'updated_by' => $_SESSION['usercms']['user_id'],
                                        ); 
                                        $this->obj_customer->update($value->customer_id,$data);
                                    }
                                    $position_principal = $position_tree;
                              }else{
                                  $data = array(
                                    'point_left' => $point_left,
                                    'updated_at' => date("Y-m-d H:i:s"),
                                    'updated_by' => $_SESSION['usercms']['user_id'],
                                ); 
                                $this->obj_customer->update($value->customer_id,$data);
                                $position_principal = $position_tree;
                              }
                                

                            }else{
                                $point_rigth = ($price_tree  * $percet_binario) / 100;
                                $point_rigth = $value->point_rigth + $point_rigth;
                                //UPDATE POINT RIGTH TABLE CUSTOMER
                                
                                if($value->customer_id == $parent_id && $value->calification == 0){
                                    $calification_left = $value->point_calification_left;
                                    $calification_rigth = $value->point_calification_rigth - $price_tree;
                                
                                    if($calification_left <= 0 && $calification_rigth  <= 0){
                                        $data = array(
                                        'point_calification_rigth' => $calification_rigth,
                                        'calification' => 1,
                                        'updated_at' => date("Y-m-d H:i:s"),
                                        'updated_by' => $_SESSION['usercms']['user_id'],
                                        ); 
                                        $this->obj_customer->update($value->customer_id,$data);
                                    }else{
                                         $data = array(
                                        'point_calification_rigth' => $calification_rigth,
                                        'updated_at' => date("Y-m-d H:i:s"),
                                        'updated_by' => $_SESSION['usercms']['user_id'],
                                        ); 
                                        $this->obj_customer->update($value->customer_id,$data);
                                    }
                                   
                                    //SAVE LAST POSITION
                                    $position_principal = $position_tree;
                                }else{
                                     $data = array(
                                    'point_rigth' => $point_rigth,
                                    'updated_at' => date("Y-m-d H:i:s"),
                                    'updated_by' => $_SESSION['usercms']['user_id'],
                                    ); 
                                    $this->obj_customer->update($value->customer_id,$data);
                                    $position_principal = $position_tree;
                                }
                                
                            }
                    }
                }
            }    
    }
    
       
//    public function modify_day(){
//        
//          $params = array(
//                        "select" =>"customer.customer_id,
//                                    customer.username,
//                                    customer.first_name,
//                                    customer.last_name,
//                                    customer.date_start,
//                                    customer.date_end,
//                                    customer.active,
//                                    customer.parents_id,
//                                    customer.status_value",
//                        "where" => "customer.date_start >= '2017-01-10' and <= '2017-04-30'",
//                        "order" => "date_start ASC"
//               );
//           //GET DATA FROM CUSTOMER
//           $obj_customer= $this->obj_customer->search($params);
//           
//           foreach ($obj_customer as $value) {
//               
//                $date_start = $value->date_start;
//                
//                $date_end = strtotime ( '+120 day' , strtotime ( $date_start ) ) ;
//                $date_end = date ( 'Y-m-j' , $date_end );
//                
//                $data = array(
//                        'date_end' => $date_end,
//                    ); 
//                $this->obj_customer->update($value->customer_id,$data);
//           }   
//            
//    }
    
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