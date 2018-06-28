<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_points extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("points_model","obj_points");
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
    
    public function change_status(){
            //UPDATE DATA ORDERS
        if($this->input->is_ajax_request()){   
              $comment_id = $this->input->post("comment_id");
              
                if(count($comment_id) > 0){
                    $data = array(
                        'active' => 0,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_comments->update($comment_id,$data);
                }
                echo json_encode($data);            
        exit();
            }
    }
    
    public function change_status_no(){
            //UPDATE DATA ORDERS
        if($this->input->is_ajax_request()){   
                $comment_id = $this->input->post("comment_id");
                if(count($comment_id) > 0){
                    $data = array(
                        'active' => 1,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_comments->update($comment_id,$data);
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