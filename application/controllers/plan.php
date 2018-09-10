<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan extends CI_Controller {
     public function __construct(){
     parent::__construct();
        $this->load->model("franchise_model","obj_franchise");
    } 

	public function index()
	{
            //GET DATA FRANCHISE
            $param = array( "select" =>"franchise_id,name,price,img",
                            "where" => "franchise_id <> 6 and status_value = 1",
                            "order" => "price ASC");
            $data['obj_franchise'] = $this->obj_franchise->search($param);  
            
            $this->load->view('plan',$data);
	}
        public function packages(){
            $url = explode("/", uri_string());
            if (isset($url[1])) {
                $plan = convert_query($url[1]);
                
                //GET DATA FRANCHISE
                $param = array( "select" =>"franchise_id,name,price,img,description",
                                "where" => "name like '%$plan%' and status_value = 1");
                $data['obj_franchise'] = $this->obj_franchise->get_search_row($param); 
                
                $this->load->view('detail_plan',$data);
            }
        }
}
