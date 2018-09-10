<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
     parent::__construct();
        $this->load->model("franchise_model","obj_franchise");
    } 

    public function index()
	{
        //GET DATA FRANCHISE
        $param = array( "select" =>"franchise_id,name,price,img",
                        "where" => "franchise_id <> 6 and status_value = 1",
                        "order" => "price ASC",
                        );
         $data['obj_franchise'] = $this->obj_franchise->search($param);  

            
        //GET DATA COMMENTS
        $this->load->view('home',$data);
	}
}
