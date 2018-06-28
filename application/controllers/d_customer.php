<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_customer extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("paises_model","obj_paises");
        $this->load->model("regiones_model","obj_regiones");
        $this->load->model("franchise_model","obj_franchise");
        $this->load->model("ranges_model","obj_ranges");
    }   
                
    public function index(){  
           $this->get_session();
           $params = array(
                        "select" =>"customer.customer_id,
                                    customer.username,
                                    customer.first_name,
                                    customer.email,
                                    customer.last_name,
                                    customer.created_at,
                                    customer.active,
                                    franchise.name as franchise,
                                    customer.range_id,
                                    customer.status_value",
                        "join" => array('franchise, franchise.franchise_id = customer.franchise_id'),
                        "group" => "customer.customer_id"
               );
           //GET DATA FROM CUSTOMER
           $obj_customer= $this->obj_customer->search($params);
           /// PAGINADO
            $modulos ='clientes'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/clientes'; 
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_customer",$obj_customer);
            $this->tmp_mastercms->render("dashboard/customer/customer_list");
    }
    
    public function financiados(){  
        
           $this->get_session();
           $params = array(
                        "select" =>"customer.customer_id,
                                    customer.username,
                                    customer.first_name,
                                    customer.email,
                                    customer.last_name,
                                    customer.calification,
                                    customer.created_at,
                                    customer.active,
                                    franchise.name as franchise,
                                    customer.status_value",
                        "where" => "customer.financy = 1",
                        "join" => array('franchise, franchise.franchise_id = customer.franchise_id'),
                        "group" => "customer.customer_id"
               
               );
           //GET DATA FROM CUSTOMER
           $obj_customer= $this->obj_customer->search($params);
  
           /// PAGINADO
            $modulos ='financiados'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/financiados'; 
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_customer",$obj_customer);
            $this->tmp_mastercms->render("dashboard/customer/customer_list");
    }
    
    public function validate(){
        
        $parents_id =  $this->input->post('parents_id');
        $date_start = formato_fecha_db_mes_dia_ano($this->input->post('date_start'));
        $date_stand_by = formato_fecha_db_mes_dia_ano($this->input->post('date_stand_by'));
        $birth_date = formato_fecha_db_mes_dia_ano($this->input->post('fecha_de_nacimiento'));
        $financy =  $this->input->post('financy');
        $position_temporal =  $this->input->post('position_temporal');
        $point_calification_left =  $this->input->post('point_calification_left');
        $point_calification_rigth =  $this->input->post('point_calification_rigth');
        $identificador =  $this->input->post('identificador');
        $franchise=  $this->input->post('franchise');
        $rango=  $this->input->post('rango');
        //VERIFICAR SI ESTA CALIFICADO
        $point_calification_left = ($point_calification_left == "Calificado") ? 0 : $point_calification_left;
        $point_calification_rigth = ($point_calification_rigth == "Calificado") ? 0 : $point_calification_rigth;
        
        //GET CUSTOMER_ID
        $customer_id = $this->input->post("customer_id");
        $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name   ' => $this->input->post('last_name'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'email' => $this->input->post('email'),
                'dni' => $this->input->post('dni'),  
                'parents_id' => $parents_id,  
                'date_start' => $date_start,  
                'date_stand_by' => $date_stand_by,  
                'financy' => $financy,  
                'position_temporal' => $position_temporal,  
                'point_calification_left' => $point_calification_left,  
                'point_calification_rigth' => $point_calification_rigth,  
                'identificador' => $identificador,  
                'birth_date' => $birth_date,  
                'phone' => $this->input->post('phone'),
                'country' => $this->input->post('pais'),
                'region' => $this->input->post('region'),
                'active' => $this->input->post('active'),
                'range_id' => $rango,
                'franchise_id' => $franchise,
                'position' => $this->input->post('position'),
                'address' => $this->input->post('address'),
                'btc_address' => $this->input->post('btc_address'),
                'city' => $this->input->post('city'),
                'status_value' => $this->input->post('status_value'),
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
                );          
            //SAVE DATA IN TABLE    
            $this->obj_customer->update($customer_id, $data);
        redirect(site_url()."dashboard/clientes");
    }
    
    public function active_customer(){
        //ACTIVE CUSTOMER
        if($this->input->is_ajax_request()){  
            
                $customer_id = $this->input->post("customer_id");
                if(count($customer_id) > 0){
                    $data = array(
                        'calification' => 1,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_customer->update($customer_id,$data);
                }
                echo json_encode($data);            
        exit();
            }
    }
    
    public function load($obj_customer=NULL){
        //VERIFY IF ISSET CUSTOMER_ID
        if ($obj_customer != ""){
            /// PARAMETROS PARA EL SELECT 
            $where = "customer.customer_id = $obj_customer";
            $params = array(
                        "select" =>"*",
                         "where" => $where,
            ); 
            $obj_customer  = $this->obj_customer->get_search_row($params); 
            
            //RENDER
            $this->tmp_mastercms->set("obj_customer",$obj_customer);
          }
          
            //SELECT PAISES
            $params = array("select" => "id,nombre",
                            "where" => "id_idioma = 7");
            $obj_paises  = $this->obj_paises->search($params);   
            //RENDER TO VIEW
            $this->tmp_mastercms->set("obj_paises",$obj_paises);
            
            //SELECT REGIONES
            $params = array("select" => "id,id_pais,nombre",
                            "where" => "id_idioma = 7");
            $obj_regiones  = $this->obj_regiones->search($params);   
            //RENDER TO VIEW
            $this->tmp_mastercms->set("obj_regiones",$obj_regiones); 
            
            //SELECT PAQUETES
            $params = array("select" => "franchise_id,name");
            $obj_franchise  = $this->obj_franchise->search($params);   
            //RENDER TO VIEW
            $this->tmp_mastercms->set("obj_franchise",$obj_franchise); 
            
            //SELECT RANGOS
            $params = array("select" => "range_id,name");
            $obj_ranges  = $this->obj_ranges->search($params);
            
            //RENDER TO VIEW
            $this->tmp_mastercms->set("obj_ranges",$obj_ranges); 
            
            $modulos ='clientes'; 
            $seccion = 'Formulario';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->render("dashboard/customer/customer_form");    
    }
    
    public function no_active_customer(){
            //NO ACTIVE CUSTOMER
        if($this->input->is_ajax_request()){   
            $customer_id = $this->input->post("customer_id");
                if(count($customer_id) > 0){
                    $data = array(
                        'calification' => 0,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_customer->update($customer_id,$data);
                }
                echo json_encode($data);            
        exit();
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