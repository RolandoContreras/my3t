<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_news extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("news_model","obj_news");
    }   
                
    public function index(){  
            //GER SESSION   
            $this->get_session();
            $params = array(
                            "select" =>"news_id,
                                        date,
                                        title,
                                        img,
                                        status_value",
                            );            
            //GET DATA COMMISSIONS
            $obj_news = $this->obj_news->search($params);
            
            /// PAGINADO
            $modulos ='noticias'; 
            $seccion = 'Lista';
            $link_modulo =  site_url().'dashboard/'.$modulos; 
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_news",$obj_news);
            $this->tmp_mastercms->render("dashboard/noticias/news_list");
    }
    
    public function load($news_id=NULL){
        //VERIFY IF ISSET CUSTOMER_ID
        if ($news_id != ""){
            /// PARAM FOR SELECT 
            $params = array(
                        "select" =>"*",
                         "where" => "news_id = $news_id",
            ); 
            $obj_news  = $this->obj_news->get_search_row($params); 
            //RENDER
            $this->tmp_mastercms->set("obj_news",$obj_news);
          }
      
            $modulos ='noticias'; 
            $seccion = 'Formulario';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->render("dashboard/noticias/news_form");    
    }
    
    public function validate(){
          //GET CUSTOMER_ID
        $news_id = $this->input->post("news_id");
        $img2 = $this->input->post("img2");
        $title = $this->input->post('title');
        $date = formato_fecha_db_mes_dia_ano($this->input->post('date'));
        $status_value =  $this->input->post('status_value');
        
            if(isset($_FILES["image_file"]["name"])){
                $config['upload_path']          = './static/backoffice/images/new';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2000;
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
                if($news_id != ""){
                    if($img == ""){
                        $img = $img2;
                    }
                    //UPDATE NEW NY ID
                    $data = array(
                            'title' => $title,
                            'img' => $img,
                            'date' => $date,
                            'status_value' => $status_value,
                            'created_by' => $_SESSION['usercms']['user_id'],
                            'created_at' => date("Y-m-d H:i:s")
                        );
                    $this->obj_news->update($news_id, $data);
                }else{
                    //INSERT REGISTER ON NEW TABLE
                    $data = array(
                            'title' => $title,
                            'img' => $img,
                            'date' => $date,
                            'status_value' => $status_value,
                            'created_by' => $_SESSION['usercms']['user_id'],
                            'created_at' => date("Y-m-d H:i:s")
                        ); 
                       $this->obj_news->insert($data);
                    
                }
        
        redirect(site_url()."dashboard/noticias");
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