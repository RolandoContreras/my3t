<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_informative extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("otros_model","obj_otros");
    }   
                
    public function index(){  
            //GER SESSION
            $this->get_session();
            $params = array(
                        "select" =>"otros_id,
                                    title,
                                    position,
                                    page,
                                    text,
                                    active,
                                    status_value",
                        "where" => "page <> 0 and status_value = 1"
                        
            );
            //GET DATA COMMENTS
            $obj_messages_informative= $this->obj_otros->search($params);
            
            /// PAGINADO
            $modulos ='informativos'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 
            /// DATA
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_messages_informative",$obj_messages_informative);
            $this->tmp_mastercms->render("dashboard/informative/informative_list");
    }
    
    public function load($obj_otros=NULL){
        //VERIFY IF ISSET CUSTOMER_ID
        if ($obj_otros != ""){
            /// PARAMETROS PARA EL SELECT 
            $where = "otros_id = $obj_otros";
            $params = array(
                        "select" =>"*",
                         "where" => $where,
            ); 
            $obj_informative  = $this->obj_otros->get_search_row($params); 
            
            //RENDER
            $this->tmp_mastercms->set("obj_informative",$obj_informative);
          }
      
            $modulos ='informativos'; 
            $seccion = 'Formulario';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->render("dashboard/informative/informative_form");    
    }
    
    public function validate(){
        //GET CUSTOMER_ID
        $informative_id = $this->input->post("otros_id");
        
        if($informative_id != ""){
            //PARAM DATA
            $data = array(
               'title' => $this->input->post('title'),
               'page' => $this->input->post('page'),
               'text' => $this->input->post('text'),
               'position' => $this->input->post('position'),
               'active' => $this->input->post('active'),
               'updated_at' => date("Y-m-d H:i:s"),
               'updated_by' => $_SESSION['usercms']['user_id']
                );          
            //SAVE DATA IN TABLE    
            $this->obj_otros->update($informative_id, $data);
        }else{
            //PARAM DATA SAVE
            $data = array(
               'title' => $this->input->post('title'),
               'page' => $this->input->post('page'),
               'text' => $this->input->post('text'),
               'position' => $this->input->post('position'),
               'active' => $this->input->post('active'),
               'status_value' => 1,
               'created_at' => date("Y-m-d H:i:s"),
               'created_by' => $_SESSION['usercms']['user_id'],
                );          
            //SAVE DATA IN TABLE    
            $this->obj_otros->insert($data);
        }
        redirect(site_url()."dashboard/informativos");
    }
    
    public function delete_informative(){
            //UPDATE DATA OTROS
        if($this->input->is_ajax_request()){  
            
            echo "hola";
            die();
            
              $otros_id = $this->input->post("otros_id");
              
              var_dump($otros_id);
              die();
              
                if(count($otros_id) > 0){
                    $data = array(
                        'status_value' => 0,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_comments->update($otros_id,$data);
                }
                echo json_encode($data);            
        exit();
            }
    }
    
    public function edit_informative(){
            //UPDATE DATA ORDERS
        if($this->input->is_ajax_request()){   
                $comment_id = $this->input->post("comment_id");
                if(count($comment_id) > 0){
                    $data = array(
                        'status_value' => 0,
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