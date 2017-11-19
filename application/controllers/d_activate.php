<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_activate extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("commissions_model","obj_commissions");
        $this->load->model("paises_model","obj_paises");
        $this->load->model("regiones_model","obj_regiones");
        $this->load->model("franchise_model","obj_franchise");
        $this->load->model("bonus_model","obj_bonus");
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
    
    public function validate(){
        
        //GET CUSTOMER_ID
        $customer_id = $this->input->post("customer_id");
        $data = array(
               'first_name' => $this->input->post('first_name'),
               'last_name   ' => $this->input->post('last_name'),
               'username' => $this->input->post('username'),
               'password' => $this->input->post('password'),
               'email' => $this->input->post('email'),
               'dni' => $this->input->post('dni'),  
               'birth_date' => $this->input->post('fecha_de_nacimiento'),  
               'phone' => $this->input->post('phone'),
               'country' => $this->input->post('pais'),
               'region' => $this->input->post('region'),
               'franchise_id' => $this->input->post('franchise'),
               'position' => $this->input->post('position'),
               'address' => $this->input->post('address'),
               'btc_address' => $this->input->post('btc_address'),
               'city' => $this->input->post('city'),
               'calification' => $this->input->post('calification'),
               'status_value' => $this->input->post('status_value'),
               'updated_at' => date("Y-m-d H:i:s"),
               'updated_by' => $_SESSION['usercms']['user_id']
                );          
            //SAVE DATA IN TABLE    
            $this->obj_customer->update($customer_id, $data);
            
        redirect(site_url()."dashboard/clientes");
    }
    
    public function active_financy(){
        //ACTIVE CUSTOMER FINANCADO
        if($this->input->is_ajax_request()){  
                //SELECT CUSTOMER_ID
                $customer_id = $this->input->post("customer_id");
                
                //SELECT TOY AND TODAY+76
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
                    //GET BONUS DIRECT
                    $this->pay_directo($customer_id,$point,$parents_id);

                    //GET BONUS BINARY
                    $this->pay_binario($customer_id);
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
                echo json_encode($data); 
                exit();
            }
    }
    
    public function modify_day(){
        
          $params = array(
                        "select" =>"customer.customer_id,
                                    customer.username,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.date_start,
                                    customer.date_end,
                                    customer.active,
                                    customer.parents_id,
                                    customer.status_value",
                        "where" => "customer.date_start >= '2017-01-10' and <= '2017-04-30'",
                        "order" => "date_start ASC"
               );
           //GET DATA FROM CUSTOMER
           $obj_customer= $this->obj_customer->search($params);
           
           foreach ($obj_customer as $value) {
               
                $date_start = $value->date_start;
                
                $date_end = strtotime ( '+120 day' , strtotime ( $date_start ) ) ;
                $date_end = date ( 'Y-m-j' , $date_end );
                
                $data = array(
                        'date_end' => $date_end,
                    ); 
                $this->obj_customer->update($value->customer_id,$data);
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
                        'name' => "Pago por referido Directo",
                        'amount' => $amount,
                        'status_value' => 1,
                        'date' => date("Y-m-d H:i:s"),
                        'created_at' => date("Y-m-d H:i:s"),
                        'created_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_commissions->insert($data);
                }
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