<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
    public function __construct() {
        parent::__construct();     
        $this->load->model('comments_model','obj_comments');
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
		$this->load->view('contact');
	}
        public function send_messages(){
            
            //GET DATA BY POST
            $data = $_POST['dataString']; 
            //EXPLODE BY DEMILITER
            $string =  explode('&', $data);
            //GET NAME
            $name = $string[0];
            //GET EMAIL
            $email = $string[1];
            //GET SUBJECT
            $subject = $string[2];
            //GET MESSAGE
            $message = $string[3];
            
                    //status_value 0 means (not read)
                    $data = array(
                        'name' => $name,
                        'email' => $email,
                        'subject' => $subject,
                        'comment' => $message,
                        'date_comment' => date("Y-m-d H:i:s"),
                        'active' => 0,
                        'status_value' => 1,
                    );
                    $this->obj_comments->insert($data);
                    echo '<div class="alert alert-success" style="text-align: center">Enviado Correctamente.</div>';
                }         
}
