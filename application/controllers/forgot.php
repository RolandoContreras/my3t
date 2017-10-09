<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot extends CI_Controller {
    public function __construct() {
        parent::__construct();    
        $this->load->model("customer_model", "obj_customer");
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('forgot');
	}
        public function send_messages(){
            if($this->input->is_ajax_request()){ 
                $username = $this->input->post('username');  
                
                //GER DATA USERNAME
                 $params = array("select" => "first_name,email,password",
                                "where" => "username = '$username'");
                 $obj_data = $this->obj_customer->get_search_row($params);
                
                 $name = ucfirst($obj_data->first_name);
                 $email = $obj_data->email;
                 $password = $obj_data->password;
                 
                 if (count($obj_data) > 0){ 
                    //SEND MESSAGES
                    // Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
                    $mensaje = wordwrap("<html><body><h1>Contraseña</h1><p>Hola $name.</p><p>Te dejamos tu contraseña de ingreso.</p><h3>Contraseña: $password</h3></body></html>", 70, "\n", true);
                    //Titulo
                    $titulo = "Recuperar Contraseña";
                    //cabecera
                    $headers = "MIME-Version: 1.0\r\n"; 
                    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
                    $headers .= "From: CRIPTOWIN - The best Investment < noreplay@criptowin.com >\r\n";
                    //Enviamos el mensaje a tu_dirección_email 
                    $bool = mail("$email",$titulo,$mensaje,$headers);
                    $data['print'] = "Mensaje enviado correctamente";
                    $data['message'] = "true";  
                }else{
                    $data['message'] = "false";
                    $data['print'] = "No existe el usuario ingresado";
                }         
                echo json_encode($data);  
                exit();      
            }
        }
        
}
