<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();     
        $this->load->model('customer_model','obj_customer');
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
		$this->load->view('login');
	}
        public function validate(){
        if($this->input->is_ajax_request()){
            
            $this->form_validation->set_rules('username','username',"required|trim|callback_validar_customer");
            $this->form_validation->set_rules('password','password','required|trim');              
    	    $this->form_validation->set_message('required','Campo requerido %s');    	    
            
            if ($this->form_validation->run($this)== false){                
    	        $cadena  = explode("</p>", validation_errors());                
    	        $cadena2 = implode("<p>", $cadena);
    	        $cadena3 = explode("<p>", $cadena2);
    	        array_pop($cadena3);
    	        array_shift($cadena3);                
    	        $data['print'] = "Datos invalidos";
                $data['message'] = "false";       
                
    	    }else{
                $data['message'] = "true";
    	        $data['print'] = "Bienvenido al sistema";
                $data['url'] = site_url()."backoffice";               
            }         
            echo json_encode($data);  
            exit();      
        }
    }
    
    public function validar_customer(){
        $username = $this->input->post('username');  
        $password = $this->input->post('password');  
        $params = array("select" =>"customer.customer_id,customer.first_name,customer.last_name,customer.username,customer.email,customer.country,customer.active,franchise.franchise_id,customer.status_value",
                         "where" => "username = '$username' and password = '$password'",
                         "join" => array('franchise, customer.franchise_id = franchise.franchise_id'));
                        
        $obj_customer = $this->obj_customer->get_search_row($params);
        
        if (count($obj_customer)>0){
            if ($obj_customer->status_value == 1){                
                $data_customer_session['customer_id'] = $obj_customer->customer_id;
                $data_customer_session['name'] = $obj_customer->first_name.' '.$obj_customer->last_name;
                $data_customer_session['username'] = $obj_customer->username;
                $data_customer_session['franchise_id'] = $obj_customer->franchise_id;
                $data_customer_session['email'] = $obj_customer->email;
                $data_customer_session['country'] = $obj_customer->country;
                $data_customer_session['active'] = $obj_customer->active;
                $data_customer_session['logged_customer'] = "TRUE";
                $data_customer_session['status'] = $obj_customer->status_value;
                $_SESSION['customer'] = $data_customer_session;                
                return true;    
            }else{
                $this->form_validation->set_message('validar_user', "Usuario Inactivo");
                return false;
            }
        }else{
            $this->form_validation->set_message('validar_user', "El usuario y/o la contraseña no son correctas");
            return false;
        }
    }
    
    public function logout(){        
        $this->session->unset_userdata('customer');
	$this->session->destroy();
        redirect('home'); 
    }
}
