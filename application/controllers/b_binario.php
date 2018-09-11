<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_binario extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("otros_model","obj_otros");
        $this->load->model("messages_model","obj_messages");
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
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER_ID    
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET TOTAL MESSAGE
        $all_message = $this->get_total_messages($customer_id);
        //GET TOTAL MESSAGE
        $obj_message = $this->get_messages($customer_id);
        //GET MESSAGE INFORMATIVE
        $messages_informative = $this->get_messages_informative();
        //GET PRICE BTC
        $price_btc = $this->btc_price();    
            
        //SELECT URL    
        $url = explode("/",uri_string());
            
        if(isset($url[3])){
             $customer_id = decrypt($url[3]);
        }    
        
        //VERIFIRY GET SESSION    
         $this->get_session();
            $params = array(
                            "select" =>"customer.customer_id,
                                        customer.parents_id,
                                        customer.username,
                                        customer.email,
                                        customer.created_at,
                                        customer.position_temporal,
                                        customer.phone,
                                        customer.position,
                                        customer.binaries,
                                        customer.password,
                                        customer.first_name,
                                        customer.last_name,
                                        customer.identificador,
                                        (select sum(point_left) from binarys where customer_id = $customer_id and status_value = 1) as point_left,
                                        (select sum(point_rigth) from binarys where customer_id = $customer_id and status_value = 1) as point_rigth,
                                        customer.point_calification_left,
                                        customer.point_calification_rigth,
                                        customer.city,
                                        ranges.name as rango,
                                        ranges.img as img_rango,
                                        customer.active,
                                        customer.status_value,
                                        paises.nombre as pais,
                                        franchise.franchise_id,
                                        franchise.name as franchise,
                                        franchise.img",
                            "where" => "paises.id_idioma = 7 and customer.customer_id = $customer_id",
                            "join" => array('paises, customer.country = paises.id',
                                            'franchise, customer.franchise_id = franchise.franchise_id',
                                            'ranges, customer.range_id = ranges.range_id'));
             $obj_customer = $this->obj_customer->get_search_row($params);  
             
             $identificator = $obj_customer->identificador;
                
                if($customer_id == 1){
                    $str = "customer.identificador like '%1z' or customer.identificador like '%1d'";
                }else{
                    $str = "customer.identificador like '%$identificator' and identificador <> '$identificator'";
                }
                    //SELECT ALL CUSTOMER IN THE TREE  
                    $param_tree = array(
                                "select" =>"customer.customer_id,
                                            customer.first_name,
                                            customer.last_name,
                                            customer.parents_id,
                                            customer.binaries,
                                            paises.nombre as pais,
                                            ranges.name as rango,
                                            ranges.img as img_rango,
                                            customer.username,
                                            customer.created_at,
                                            paises.nombre as pais,
                                            customer.active,
                                            customer.identificador,
                                            franchise.name as franchise,
                                            customer.position,
                                            customer.status_value,
                                            franchise.img,
                                            franchise.franchise_id",
                                 "where" => "paises.id_idioma = 7 and $str",
                                 "join" => array('paises, customer.country = paises.id',
                                            'franchise, customer.franchise_id = franchise.franchise_id',
                                            'ranges, customer.range_id = ranges.range_id')
                                );
                                
                                
                    $obj_tree = $this->obj_customer->search($param_tree); 
            //GET POSITION PIERNA
            $pierna = $obj_customer->position;
            
            if($customer_id == 1){
                if($pierna == 1){
                    $position_id1 = '1z';
                }else{
                    $position_id1 = '1d';
                }
                 //SEND TO $N1   
                $n1 = array($obj_customer->first_name,
                        $obj_customer->last_name,
                        $obj_customer->customer_id,
                        $obj_customer->created_at,
                        $obj_customer->parents_id,          
                        $obj_customer->position,
                        $obj_customer->pais,
                        $obj_customer->username,
                        $position_id1, 
                        $obj_customer->franchise,
                        $obj_customer->active);
                }else{
                   $n1 = array($obj_customer->first_name,
                        $obj_customer->last_name,
                        $obj_customer->customer_id,
                        $obj_customer->created_at,
                        $obj_customer->parents_id,
                        $obj_customer->position,
                        $obj_customer->pais,
                        $obj_customer->username,
                        $obj_customer->identificador,
                        $obj_customer->franchise,
                        $obj_customer->active
                        );             

            }
                
            foreach ($obj_tree as $key => $value) {
                
                $explo_idente =  explode(",", $n1[8]);
                
                //SELECT LAST IDENTIFICATOR FOR N2_Z
                $ultimo = $explo_idente[0] + 1; 
                if($customer_id == 1){
                    $n2_z = '2z,1z';
                    $n2_d = '2d,1d';
                }else{
                    //SELECT LAST IDENTIFICATOR FOR N2_D
                    $n2_z = $ultimo."z,".$n1[8];
                    $n2_d = $ultimo."d,".$n1[8];
                }
                
                //SELECT LAST IDENTIFICATOR FOR N3_Z
                $ultimo = $n2_z + 1; 
                $n3_z = $ultimo."z,".$n2_z;
                
                //SELECT LAST IDENTIFICATOR FOR N3_2z
                $ultimo = $n2_z + 1; 
                $n3_2_z = $ultimo."d,".$n2_z;
                
                //SELECT LAST IDENTIFICATOR FOR N3_D
                $ultimo = $n2_d + 1; 
                $n3_d = $ultimo."d,".$n2_d;
                
                //SELECT LAST IDENTIFICATOR FOR N3_2z
                $ultimo = $n2_d + 1; 
                $n3_2_d = $ultimo."z,".$n2_d;
                
                
                //SELECT LAST IDENTIFICATOR FOR N4_Z
                $ultimo = $n3_z + 1; 
                $n4_z = $ultimo."z,".$n3_z;
                
                //SELECT LAST IDENTIFICATOR FOR N4_2_Z
                $ultimo = $n3_z + 1; 
                $n4_2_z = $ultimo."d,".$n3_z;
                
                
               //SELECT LAST IDENTIFICATOR FOR N4_3z
                $ultimo = $n3_2_z + 1; 
                $n4_3_z = $ultimo."z,".$n3_2_z;
                
                //SELECT LAST IDENTIFICATOR FOR N4_4z
                $ultimo = $n3_2_z + 1; 
                $n4_4_z = $ultimo."d,".$n3_2_z;
                
                //SELECT LAST IDENTIFICATOR FOR N4_D
                $ultimo = $n3_d + 1; 
                $n4_d = $ultimo."d,".$n3_d;
                
                //SELECT LAST IDENTIFICATOR FOR N4_2_D
                $ultimo = $n3_d + 1; 
                $n4_2_d = $ultimo."z,".$n3_d;
                
                //SELECT LAST IDENTIFICATOR FOR N4_3d
                $ultimo = $n3_2_d + 1; 
                $n4_3_d = $ultimo."d,".$n3_2_d;
                
                //SELECT LAST IDENTIFICATOR FOR N4_4d
                $ultimo = $n3_2_d + 1; 
                $n4_4_d = $ultimo."z,".$n3_2_d;
                
                //SELECT LAST IDENTIFICATOR FOR N5_Z
                $ultimo = $n4_z + 1; 
                $n5_z = $ultimo."z,".$n4_z;
                
                //SELECT LAST IDENTIFICATOR FOR N5_2_Z
                $ultimo = $n4_z + 1; 
                $n5_2_z = $ultimo."d,".$n4_z;
                
                //SELECT LAST IDENTIFICATOR FOR N5_3z
                $ultimo = $n4_2_z + 1; 
                $n5_3_z = $ultimo."z,".$n4_2_z;
                
                //SELECT LAST IDENTIFICATOR FOR N5_4z
                $ultimo = $n4_2_z + 1; 
                $n5_4_z = $ultimo."d,".$n4_2_z;
                
                //SELECT LAST IDENTIFICATOR FOR N5_5z
                $ultimo = $n4_3_z + 1; 
                $n5_5_z = $ultimo."z,".$n4_3_z;
                
                //SELECT LAST IDENTIFICATOR FOR N5_6z
                $ultimo = $n4_3_z + 1; 
                $n5_6_z = $ultimo."d,".$n4_3_z;
                
                //SELECT LAST IDENTIFICATOR FOR N5_7z
                $ultimo = $n4_4_z + 1; 
                $n5_7_z = $ultimo."z,".$n4_4_z;
                
                //SELECT LAST IDENTIFICATOR FOR N5_8z
                $ultimo = $n4_4_z + 1; 
                $n5_8_z = $ultimo."d,".$n4_4_z;
                
                //SELECT LAST IDENTIFICATOR FOR N5_Z
                $ultimo = $n4_d + 1; 
                $n5_d = $ultimo."d,".$n4_d;
                
                //SELECT LAST IDENTIFICATOR FOR N5_2_Z
                $ultimo = $n4_d + 1; 
                $n5_2_d = $ultimo."z,".$n4_d;
                
                //SELECT LAST IDENTIFICATOR FOR N5_3z
                $ultimo = $n4_2_d + 1; 
                $n5_3_d = $ultimo."d,".$n4_2_d;
                
                //SELECT LAST IDENTIFICATOR FOR N5_4z
                $ultimo = $n4_2_d + 1; 
                $n5_4_d = $ultimo."z,".$n4_2_d;
                
                //SELECT LAST IDENTIFICATOR FOR N5_5z
                $ultimo = $n4_3_d + 1; 
                $n5_5_d = $ultimo."d,".$n4_3_d;
                
                //SELECT LAST IDENTIFICATOR FOR N5_6z
                $ultimo = $n4_3_d + 1; 
                $n5_6_d = $ultimo."z,".$n4_3_d;
                
                //SELECT LAST IDENTIFICATOR FOR N5_7z
                $ultimo = $n4_4_d + 1; 
                $n5_7_d = $ultimo."d,".$n4_4_d;
                
                //SELECT LAST IDENTIFICATOR FOR N5_8z
                $ultimo = $n4_4_d + 1; 
                $n5_8_d = $ultimo."z,".$n4_4_d;
                
                if($value->identificador == $n2_z){
                    $n2_iz = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n2_iz",$n2_iz);
                }
                elseif($value->identificador == $n2_d){
                    $n2_de = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n2_de",$n2_de);
                }
                elseif($value->identificador == $n3_2_z){
                    $n3_2_iz = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n3_2_iz",$n3_2_iz);
                }
                elseif($value->identificador == $n3_z){
                    $n3_iz = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n3_iz",$n3_iz);
                }
                elseif($value->identificador == $n3_d){
                    $n3_de = array($value->first_name,
                                              $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n3_de",$n3_de);
                }
                elseif($value->identificador == $n3_2_d){
                    $n3_2_de = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n3_2_de",$n3_2_de);
                }
                elseif($value->identificador == $n4_z){
                    $n4_iz = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n4_iz",$n4_iz);
                }
                elseif($value->identificador == $n4_2_z){
                    $n4_2_iz = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n4_2_iz",$n4_2_iz);
                }
                elseif($value->identificador == $n4_3_z){
                    $n4_3_iz = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n4_3_iz",$n4_3_iz);
                }
                elseif($value->identificador == $n4_4_z){
                    $n4_4_iz = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n4_4_iz",$n4_4_iz);
                }
                elseif($value->identificador == $n4_d){
                    $n4_de = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n4_de",$n4_de);
                }
                elseif($value->identificador == $n4_2_d){
                    $n4_2_de = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n4_2_de",$n4_2_de);
                }
                elseif($value->identificador == $n4_3_d){
                    $n4_3_de = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n4_3_de",$n4_3_de);
                }
                elseif($value->identificador == $n4_4_d){
                    $n4_4_de = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n4_4_de",$n4_4_de);
                }
                elseif($value->identificador == $n5_z){
                    $n5_iz = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n5_iz",$n5_iz);
                }
                elseif($value->identificador == $n5_2_z){
                    $n5_2_iz = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n5_2_iz",$n5_2_iz);
                }
                elseif($value->identificador == $n5_3_z){
                    $n5_3_iz = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n5_3_iz",$n5_3_iz);
                }
                elseif($value->identificador == $n5_4_z){
                    $n5_4_iz = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n5_4_iz",$n5_4_iz);
                }
                elseif($value->identificador == $n5_5_z){
                    $n5_5_iz = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n5_5_iz",$n5_5_iz);
                }
                elseif($value->identificador == $n5_6_z){
                    $n5_6_iz = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n5_6_iz",$n5_6_iz);
                }
                elseif($value->identificador == $n5_7_z){
                    $n5_7_iz = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n5_7_iz",$n5_7_iz);
                }
                elseif($value->identificador == $n5_8_z){
                    $n5_8_iz = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n5_8_iz",$n5_8_iz);
                }
                elseif($value->identificador == $n5_d){
                    $n5_de = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n5_de",$n5_de);
                }
                elseif($value->identificador == $n5_2_d){
                    $n5_2_de = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n5_2_de",$n5_2_de);
                }
                elseif($value->identificador == $n5_3_d){
                    $n5_3_de = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n5_3_de",$n5_3_de);
                }
                elseif($value->identificador == $n5_4_d){
                    $n5_4_de = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n5_4_de",$n5_4_de);
                }
                elseif($value->identificador == $n5_5_d){
                    $n5_5_de = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n5_5_de",$n5_5_de);
                }
                elseif($value->identificador == $n5_6_d){
                    $n5_6_de = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n5_6_de",$n5_6_de);
                }
                elseif($value->identificador == $n5_7_d){
                    $n5_7_de = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n5_7_de",$n5_7_de);
                }
                elseif($value->identificador == $n5_8_d){
                    $n5_8_de = array($value->first_name,
                                               $value->last_name,
                                               encrypt($value->customer_id),
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->pais,
                                               $value->franchise_id,
                                               $value->img,
                                               $value->rango,
                                               $value->img_rango);
                    $this->tmp_backoffice->set("n5_8_de",$n5_8_de);
                }
            }
        $this->tmp_backoffice->set("price_btc",$price_btc);  
        $this->tmp_backoffice->set("messages_informative",$messages_informative);   
        $this->tmp_backoffice->set("obj_message",$obj_message);
        $this->tmp_backoffice->set("all_message",$all_message);
        $this->tmp_backoffice->set("obj_customer",$obj_customer);
        $this->tmp_backoffice->render("backoffice/b_binario");
	}
        
        public function btc_price(){
             $url = "https://www.bitstamp.net/api/ticker";
             $fgc = file_get_contents($url);
             $json = json_decode($fgc, true);
             $price_btc = $json['last'];
             $open = $json['open'];
             
             if($open > $price_btc){
                 //PRICE WENT UP
                 $color = "red";
                 $changes = $price_btc - $open;
                 $percent = $changes / $open;
                 $percent = $percent * 100;
                 $percent_change = number_format($percent, 2); 
             }else{
                 //PRICE WENT DOWN
                 $color = "green";
                 $changes = $open - $price_btc;
                 $percent = $changes / $open;
                 $percent = $percent * 100;
                 $percent_change = number_format($percent, 2);   
             }
             return "<span style='color:#D4AF37'>"."$".$price_btc."</span>&nbsp;&nbsp;<span style='color:".$color.";font-size: 14px;font-weight: bold;'>$percent_change</span>";
        }
        
        public function get_messages_informative(){
            $params = array(
                            "select" =>"",
                             "where" => "status_value = 1 and page = 5 and active = 1",
                            "order" => "position ASC");
                
           $messages_informative = $this->obj_otros->search($params); 
            return $messages_informative;
        }
    
        public function get_total_messages($customer_id){
        $params = array(
                        "select" =>"count(messages_id) as total",
                        "where" => "customer_id = $customer_id and active = 1 and status_value = 1 and support <> 1",
                        
                                        );
            $obj_message = $this->obj_messages->get_search_row($params);
            //GET TOTAL MESSAGE ACTIVE   
            $all_message = $obj_message->total;
            return $all_message;
        }
    
        public function get_messages($customer_id){
            $params = array(
                        "select" =>"messages_id,
                                    date,
                                    subject,
                                    label,
                                    type,
                                    messages",
                        "where" => "customer_id = $customer_id and status_value = 1 and support <> 1",
                        "order" => "messages_id DESC",
                        "limit" => "3",
                                        );
            $obj_message = $this->obj_messages->search($params); 
            //GET ALL MESSAGE   
            return $obj_message;
        }
        
        public function get_session(){          
        if (isset($_SESSION['customer'])){
            if($_SESSION['customer']['logged_customer']=="TRUE" && $_SESSION['customer']['status']=='1'){               
                return true;
            }else{
                redirect(site_url().'home');
            }
        }else{
            redirect(site_url().'home');
        }
    }
}
