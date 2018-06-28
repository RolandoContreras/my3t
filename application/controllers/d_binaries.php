<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_binaries extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("binarys_model","obj_binarys");
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