<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_points extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("points_model","obj_points");
        $this->load->model("customer_model","obj_customer");
    }   
                
    public function index(){  
            //GER SESSION
            $this->get_session();
            $params = array(
                        "select" =>"points.point_id,
                                    bonus.name,
                                    customer.username,
                                    points.point,
                                    points.date,
                                    points.status_value",
                         "join" => array('bonus, bonus.bonus_id = points.bonus_id',
                                        'customer, customer.customer_id = points.customer_id'),
                "where" => "points.status_value = 1",
                "order" => "points.point_id DESC",
                "limit" => "500");
            //GET DATA COMMENTS
            $obj_points= $this->obj_points->search($params);
            
            /// PAGINADO
            $modulos ='puntos'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 
            /// DATA
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_points",$obj_points);
            $this->tmp_mastercms->render("dashboard/puntos/points_list");
    }
    
    public function load($point_id=NULL){
            /// PARAMETROS PARA EL SELECT
        
            $params = array(
                        "select" =>"points.point_id,
                                    bonus.bonus_id,
                                    customer.customer_id,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.username,
                                    points.point,
                                    points.date,
                                    points.status_value",
                         "where" => "points.point_id = $point_id",
                         "join" => array('customer, points.customer_id = customer.customer_id',
                                         'bonus, points.bonus_id = bonus.bonus_id'),
            ); 
            $obj_points  = $this->obj_points->get_search_row($params); 
            
            $modulos ='puntos'; 
            $seccion = 'Formulario';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_points",$obj_points);
            $this->tmp_mastercms->render("dashboard/puntos/points_form");    
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
        
        $point_id =  $this->input->post('point_id');
        $customer_id =  $this->input->post('customer_id');
        $point =  $this->input->post('point');
        $date = formato_fecha_db_mes_dia_ano($this->input->post('date'));
        $bonus_id =  $this->input->post('bonus_id');
        
        //UPDATE DATA
        $data = array(
                'customer_id' => $customer_id,
                'point' => $point,
                'date' => $date,
                'bonus_id' => $bonus_id,  
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
                );          
            //SAVE DATA IN TABLE    
        
            $this->obj_points->update($point_id, $data);
        redirect(site_url()."dashboard/puntos");
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