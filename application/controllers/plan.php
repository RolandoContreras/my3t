<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan extends CI_Controller {

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
        //  GET LINK URL
            $this->load->view('plan');
//		$this->load->view('plan');
	}
        public function packages(){
            $url = explode("/", uri_string());
            if (isset($url[1])) {
                $plan = $url[1];
                switch ($plan) {
                    case "basic":
                        $this->load->view('basic');
                        break;
                    case "executive":
                        $this->load->view('executive');
                        break;
                    case "investor":
                        $this->load->view('investor');
                        break;
                    case "business":
                        $this->load->view('business');
                        break;
                    case "master":
                        $this->load->view('master');
                        break;
                }

                //Select params
            }
            
        }
}
