<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_franchise extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("franchise_model","obj_franchise");
    }   
                
    public function index(){  
            //GER SESSION   
            $this->get_session();
            $params = array(
                            "select" =>"franchise_id,
                                        name,
                                        price,
                                        point,
                                        img,
                                        description,
                                        status_value",
                            );            
            //GET DATA COMMISSIONS
            $obj_franchise= $this->obj_franchise->search($params);
            
            /// PAGINADO
            $modulos ='membresias'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_franchise",$obj_franchise);
            $this->tmp_mastercms->render("dashboard/franchise/franchise_list");
    }
    
    public function load($franchise_id=NULL){
        //VERIFY IF ISSET CUSTOMER_ID
        
        if ($franchise_id != ""){
            /// PARAM FOR SELECT 
            $params = array(
                        "select" =>"franchise_id,
                                    name,
                                    price,
                                    point,
                                    img,
                                    description,
                                    status_value",
                         "where" => "franchise_id = $franchise_id",
            ); 
            $obj_franchise  = $this->obj_franchise->get_search_row($params);
            //RENDER
            $this->tmp_mastercms->set("obj_franchise",$obj_franchise);
          }
      
            $modulos ='membresias'; 
            $seccion = 'Formulario';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->render("dashboard/franchise/franchise_form");    
    }
    
    public function validate(){
        
        //GET CUSTOMER_ID
        $franchise_id = $this->input->post("franchise_id");
        $img2 = $this->input->post("img2");
        $name =     $this->input->post('name');
        $price =     $this->input->post('price');
        $point =  $this->input->post('point');
        $description =  $this->input->post('description');
        $status_value =  $this->input->post('status_value');
        
            if(isset($_FILES["image_file"]["name"])){
                $config['upload_path']          = './static/backoffice/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $this->load->library('upload', $config);
                    if ( ! $this->upload->do_upload('image_file')){
                         $error = array('error' => $this->upload->display_errors());
                          echo '<div class="alert alert-danger">'.$error['error'].'</div>';
                    }else{
                        $data = array('upload_data' => $this->upload->data());
                    }
            }
            
                $img = $_FILES["image_file"]["name"];
                //VERIFY IMG
                
            
                if($franchise_id != ""){
                    if($img == ""){
                        $img = $img2;
                    }
                    $data = array(
                            'name' => $name,
                            'price' => $price,
                            'point' => $point,
                            'img' => $img,
                            'description' => $description,
                            'status_value' => $status_value,
                            'created_by' => $_SESSION['usercms']['user_id'],
                            'created_at' => date("Y-m-d H:i:s")
                        );
                    $this->obj_franchise->update($franchise_id, $data);
                }else{
                // INSERT ON TABLE activation_message
                    $data = array(
                            'name' => $name,
                            'price' => $price,
                            'point' => $point,
                            'img' => $img,
                            'description' => $description,
                            'status_value' => $status_value,
                            'created_by' => $_SESSION['usercms']['user_id'],
                            'created_at' => date("Y-m-d H:i:s")
                        ); 
                       $this->obj_franchise->insert($data);
                    
                }
        
        redirect(site_url()."dashboard/membresias");
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