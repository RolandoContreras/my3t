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
        $url = explode("/", uri_string());
            if (isset($url[0])) {
                $plan = $url[0];

                switch ($plan) {
                    case "plan":
                        $this->load->view('plan');
                        break;
                    case "binary":
                        $this->load->view('binary');
                        break;
                    case "referred":
                        $this->load->view('referred');
                        break;
                    case "bets":
                        $this->load->view('bets');
                        break;
                }

                //Select params
            }
//		$this->load->view('plan');
	}
}
