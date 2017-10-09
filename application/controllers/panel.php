<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Panel extends CI_Controller{
    public function __construct() {
        parent::__construct();    
        $this->load->model("comments_model","obj_comments");
        $this->load->model("customer_model","obj_customer");
        $this->load->model("otros_model","obj_otros");
    }
    
    public function index(){
        //GET THE SESSION
        $this->get_session();

        //GET ALL COMMENTS
        $params = array("select" =>"count(comment_id) as comment_id, (select count(comment_id) from comments where status_value = 1) as active, (select count(comment_id) from comments where status_value = 0) as inactive");
        $obj_comments = $this->obj_comments->get_search_row($params);

        $active = $obj_comments->active;
        $inactive = $obj_comments->inactive;
        $obj_comments = $obj_comments->comment_id;
        
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
        
        //GET AND COUNT ALL THE CUSTOMER
        $params = array("select" =>"count(customer_id) as customer_id,
                                    (select count(customer_id) from customer where financy = 1) as financiado");
        $obj_customer = $this->obj_customer->get_search_row($params);
        //TOTAL FINANCIADOS
        $obj_financiado = $obj_customer->financiado;
        //TOTAL CUSTOMER
        $obj_customer = $obj_customer->customer_id;
        
        $modulos ='Home'; 
        $link_modulo =  site_url().$modulos; 
        $seccion = 'Vista global';        

        $this->tmp_mastercms->set('obj_financiado',$obj_financiado);
        $this->tmp_mastercms->set('obj_customer',$obj_customer);
        $this->tmp_mastercms->set('obj_last_comment',$obj_last_comment);
        $this->tmp_mastercms->set('obj_comments',$obj_comments);
        $this->tmp_mastercms->set('active',$active);
        $this->tmp_mastercms->set('inactive',$inactive);
        $this->tmp_mastercms->set('modulos',$modulos);
        $this->tmp_mastercms->set('link_modulo',$link_modulo);
        $this->tmp_mastercms->set('seccion',$seccion);
        $this->tmp_mastercms->render('panel');
     }
     
    public function guardar_btc(){
        //ACTIVE CUSTOMER
        if($this->input->is_ajax_request()){  
            
                //SELECT PRICE BTC
                $btc_price = $this->input->post("btc_price");
               
                if($btc_price != 0){
                    $data = array(
                        'precio_btc' => $btc_price,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_otros->update(1,$data);
                }
                    echo json_encode($data);            
        exit();
            }
    }
    
    public function masive_messages(){
        //ACTIVE CUSTOMER
        if($this->input->is_ajax_request()){  
                //GET TITLE AND MESSAGES
                $title = $this->input->post("title");
                $message_content = $this->input->post("message_content");
                
                $params = array(
                        "select" =>"customer.email",
                        "where" => "customer.active = 1"
               
               );
                //GET DATA FROM CUSTOMER
                $obj_customer= $this->obj_customer->search($params);
                
                $array_email = "";
                    foreach ($obj_customer as $key => $value) {
                        $array_email .= "$value->email".",";
                    }
                
                $images = "static/cms/messages/images/flyer-webinar.jpg";
                $img_path = "<img src='".site_url().'/'.$images."' alt='".$title."' height='800' width='800'/>";
                
                // Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
                $mensaje = wordwrap("<html><body>$message_content<p>$img_path</p></body></html>", 70, "\n", true);
                //Titulo
                $titulo = "$title";
                //cabecera
                $headers = "MIME-Version: 1.0\r\n"; 
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
                $headers .= "From: BITSHARE - Una solución para las personas < noreplay@yourbitshares.com >\r\n";
                $headers .= "Cco: software.contreras@gmail.com,jupomlm@gmail.com,skcc1991@gmail.com" . "\r\n"; 
                
                //dirección del remitente 
                
//                $headers .= "From: BITSHARE - Una solución para las personas < noreplay@yourbitshares.com >\r\n";
                
                //Enviamos el mensaje a tu_dirección_email 
//                $bool = mail("$array_email",$titulo,$mensaje,$headers);
                $bool = mail("marketing@yourbitshares.com",$titulo,$mensaje,$headers);
//                $bool = mail("$array_email",$titulo,$mensaje,$headers);
                
                if($bool){
                    $data['message'] = "El mensaje se envio correctamente";
                }else{
                    $data['message'] = "El mensaje no se envio";
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