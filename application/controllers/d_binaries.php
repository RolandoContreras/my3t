<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_binaries extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("binarys_model","obj_binarys");
        $this->load->model("customer_model", "obj_customer");
    }   
                
    public function index(){  
            //GER SESSION
            $this->get_session();
            $params = array(
                        "select" =>"binarys.binary_id,
                                    customer.username,
                                    binarys.point_left,
                                    binarys.point_rigth,
                                    binarys.created_at,
                                    binarys.status_value",
                        "join" => array('customer, customer.customer_id = binarys.customer_id'),
                        "order" => "binarys.binary_id DESC",
                        "limit" => "500");
            
            //GET DATA COMMENTS
            $obj_binarys= $this->obj_binarys->search($params);
            
            /// PAGINADO
            $modulos ='puntos_binario'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 
            /// DATA
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_binarys",$obj_binarys);
            $this->tmp_mastercms->render("dashboard/puntos_binario/points_binary_list");
    }
    
    public function load($obj_binaries=NULL){
            /// PARAMETROS PARA EL SELECT 
            $params = array(
                        "select" =>"binarys.binary_id,
                                    binarys.customer_id,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.username,
                                    binarys.point_rigth,
                                    binarys.point_left,
                                    binarys.created_at,
                                    binarys.status_value",
                         "where" => "binary_id = $obj_binaries",
                         "join" => array('customer, binarys.customer_id = customer.customer_id'),
            ); 
            $obj_binaries  = $this->obj_binarys->get_search_row($params); 
            
            $modulos ='puntos_binario'; 
            $seccion = 'Formulario';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_binaries",$obj_binaries);
            $this->tmp_mastercms->render("dashboard/puntos_binario/points_binary_form");    
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
        
        $binary_id =  $this->input->post('binary_id');
        $customer_id =  $this->input->post('customer_id');
        $point_left =  $this->input->post('point_left');
        $point_rigth =  $this->input->post('point_rigth');
        $created_at = formato_fecha_db($this->input->post('created_at'));
        $status_value =  $this->input->post('status_value');
        
        //UPDATE DATA
        $data = array(
                'binary_id' => $binary_id,
                'customer_id' => $customer_id,
                'point_left' => $point_left,
                'point_rigth' => $point_rigth,
                'created_at' => $created_at,
                'status_value' => $status_value,  
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
                );          
            //SAVE DATA IN TABLE    
        
            $this->obj_binarys->update($binary_id, $data);
        redirect(site_url()."dashboard/puntos_binario");
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