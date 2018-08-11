<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Panel extends CI_Controller{
    public function __construct() {
        parent::__construct();    
        $this->load->model("comments_model","obj_comments");
        $this->load->model("customer_model","obj_customer");
        $this->load->model("otros_model","obj_otros");
        $this->load->model("message_masive_model","obj_message_masive");
    }
    
    public function index(){
        //GET THE SESSION
        $this->get_session();

         //GET PENDING ROWS
        $params = array("select" =>"count(*) as pending_comments,
                                    (select count(*) from pay where active = 1) as pending_pay,
                                    (select count(*) from messages where support = 1 and active = 1) as pending_messages_support,
                                    (select count(*) from activation_message where active = 1) as pending_messages_activate",
                        "where" => "active = 1");
        $obj_pending = $this->obj_comments->get_search_row($params);
        
        //GET LASTEST COMMENT  
        $params = array(
                        "select" =>"comment_id,
                                    name,
                                    comment,
                                    email,
                                    status_value,
                                    date_comment",
                         "order" => "date_comment DESC"
            );
        $obj_last_comment = $this->obj_comments->get_search_row($params);
        
        //GET LASTEST MESSAGE MASIVE
        $params = array(
                        "select" =>"title,
                                    content,
                                    img,
                                    date,
                                    active",
                         "order" => "message_masive_id DESC"
            );
        $obj_last_masive = $this->obj_message_masive->get_search_row($params);
        
        //GET TOTAL ROWS
        $params = array("select" =>"count(comment_id) as total_comments,
                                    (select count(*) from customer) as total_customer, 
                                    (select count(*) from category) as total_category,
                                    (select count(*) from franchise) as total_franchise,
                                    (select count(*) from messages where support = 1) as total_messages_support,
                                    (select count(*) from activation_message) as total_activation_messages,
                                    (select count(*) from commissions) as total_commissions,
                                    (select count(*) from product) as total_product,
                                    (select count(*) from users) as total_users,
                                    (select count(*) from otros) as total_informative,
                                    (select count(*) from bonus) as total_bonus,
                                    (select count(*) from ranges) as total_ranges,
                                    (select count(*) from pay) as total_pay");
        $obj_total = $this->obj_comments->get_search_row($params);
        
        $modulos ='Home'; 
        $link_modulo =  site_url().$modulos; 
        $seccion = 'Vista global';        

        $this->tmp_mastercms->set('obj_last_masive',$obj_last_masive);
        $this->tmp_mastercms->set('obj_pending',$obj_pending);
        $this->tmp_mastercms->set('obj_last_comment',$obj_last_comment);
        $this->tmp_mastercms->set('obj_total',$obj_total);
        $this->tmp_mastercms->set('modulos',$modulos);
        $this->tmp_mastercms->set('link_modulo',$link_modulo);
        $this->tmp_mastercms->set('seccion',$seccion);
        $this->tmp_mastercms->render('panel');
     }
     
    public function masive_messages(){
                //GET TITLE AND MESSAGES
                $title = $this->input->post("title");
                $message_content = $this->input->post("message_content");
                
                if(isset($_FILES["image_file"]["name"])){
                $config['upload_path']          = './static/cms/images/masive';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2000;
                $this->load->library('upload', $config);
                    if ( ! $this->upload->do_upload('image_file')){
                         $error = array('error' => $this->upload->display_errors());
                          echo '<div class="alert alert-danger">'.$error['error'].'</div>';
                    }else{
                        $data = array('upload_data' => $this->upload->data());
                        $img = $_FILES["image_file"]["name"];
                        // INSERT ON TABLE activation_message
                        $data_message = array(
                                'date' => date("Y-m-d"),
                                'content' => $message_content,
                                'title' => $title,
                                'active' => 1,
                                'status_value' => 1,    
                                'img' => $img,
                                'created_by' => $_SESSION['usercms']['user_id'],
                                'created_at' => date("Y-m-d H:i:s")
                            ); 
                           $this->obj_message_masive->insert($data_message);
                           
                           //GET EMAIL
                            $params = array(
                                    "select" =>"email",
                                    "where" => "status_value = 1"
                           );
                            //GET DATA FROM CUSTOMER
                            $obj_customer= $this->obj_customer->search($params);

                            $array_email = "";
                                foreach ($obj_customer as $key => $value) {
                                    $array_email .= "$value->email".",";
                                }

                            $images = "static/cms/images/masive/$img";
                            $img_path = "<img src='".site_url().'/'.$images."' alt='".$title."' height='600' width='300'/>";
//                            //SEND EMAIL
//                            $mensaje = wordwrap("<html><body><center><h1>Nueva Activación</h1><p>$img_path</p><br/><p>Tenemos una nueva activación procesarla.</p></center></body></html>", 70, "\n", true);
//                            $headers = "MIME-Version: 1.0\r\n"; 
//                            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
//                            $headers .= "From: 3T Company: Travel - Training - Trade < noreplay@my3t.club >\r\n";
//                            $bool = mail("software.contreras@gmail.com,software.contreras1@gmail.com, irvingsong_5@hotmail.com,pastorolandoc@hotmail.com",$title,$message_content,$headers);
                            
                            
                            
                            
                            
                            $to = 'software.contreras@gmail.com';
//                            $title = 'Alert information On Products';
                            $message = wordwrap("<html><body><center><h1>Nueva Activación</h1><p>$img_path</p><br/><p>Tenemos una nueva activación procesarla.</p></center></body></html>", 70, "\n", true);                 
                            $this->load->library('email');
                            // from address
                            $this->email->from('From: 3T Company: Travel - Training - Trade');
                            $this->email->to($to); // to Email address
                            $this->email->bcc('software.contreras@gmail.com,software.contreras1@gmail.com,irvingsong_5@hotmail.com'); 
                            $this->email->subject($title); // email Subject
                            $this->email->message($message);
                            $this->email->send();
                            
                            
                            echo '<div class="alert alert-success" style="text-align: center">Publicado Exitosamente</div>';
                        
                    }
                }
                
    } 
     
    public function mensaje(){
                            echo "mensaje enviado";
                            $to = 'software.contreras@gmail.com';
                             $title = 'Prueba de mensaje';
//                            $title = 'Alert information On Products';
                            $message = "Hola 123";                 
                            $this->load->library('email');
                            // from address
                            $this->email->from('From: 3T Company: Travel - Training - Trade');
                            $this->email->to($to); // to Email address
                            $this->email->bcc('software.contreras@gmail.com,software.contreras1@gmail.com,irvingsong_5@hotmail.com'); 
                            $this->email->subject($title); // email Subject
                            $this->email->message($message);
                            $this->email->send();
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