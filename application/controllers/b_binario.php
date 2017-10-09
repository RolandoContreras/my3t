<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_binario extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("otros_model","obj_otros");
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
        
        //SELECT URL    
        $url = explode("/",uri_string());
            
        if(isset($url[2])){
             $customer_id = $url[2];
        }else{
            //GET CUSTOMER_ID  FROM $_SESSION
            $customer_id = $_SESSION['customer']['customer_id'];
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
                                        customer.password,
                                        customer.first_name,
                                        customer.last_name,
                                        customer.dni,
                                        customer.birth_date,
                                        customer.address,
                                        customer.identificador,
                                        customer.point_left,
                                        customer.point_rigth,
                                        customer.point_calification_left,
                                        customer.point_calification_rigth,
                                        customer.city,
                                        customer.active,
                                        customer.status_value,
                                        paises.nombre as pais,
                                        franchise.franchise_id,
                                        franchise.name as franchise
                                        ",
                            "where" => "customer.customer_id = $customer_id and paises.id_idioma = 7",
                            "join" => array('paises, customer.country = paises.id',
                                            'franchise, customer.franchise_id = franchise.franchise_id')
                                            );
             $obj_customer = $this->obj_customer->get_search_row($params);  
         
             $identificator = $obj_customer->identificador;
             $explode_identificator = explode(",", $identificator);
             $count_explode = count($explode_identificator);
             
           //GET DATE CREATED
                $creacion = $obj_customer->created_at;
                $identificator = $obj_customer->identificador;
                
                if($customer_id == 1){
                    $str = "customer.identificador like '%1z' or customer.identificador like '%1d' and ";
                }else{
                    $creacion = $obj_customer->created_at;
                    $explo_identificator =  explode(",", $identificator);

                    $str = "";
                    //for para separar el identificador
                    foreach ($explo_identificator as $key => $value) {

                    $encontrar_post = strpos($identificator, $value);
                    $texto =  substr($identificator, $encontrar_post);
                    $str .= "customer.identificador like '%$texto' or ";
                    }
                }
                    
                if($customer_id != 1){
                    //ELIMINAR OR DEL FINAL
                    $str = substr($str, 0, -3); 
                    $str = $str.'and';
                }
                
                    //SELECT ALL CUSTOMER IN THE TREE  
                    $param_tree = array(
                                "select" =>"customer.customer_id,
                                            customer.first_name,
                                            customer.last_name,
                                            customer.parents_id,
                                            customer.calification,
                                            customer.username,
                                            customer.created_at,
                                            customer.country,
                                            customer.active,
                                            customer.identificador,
                                            franchise.name as franchise,
                                            customer.position,
                                            customer.status_value,
                                            franchise.franchise_id",
                                 "where" => "$str customer.created_at > '$creacion' and customer.status_value = 1",
                                 "join" => array('franchise, customer.franchise_id = franchise.franchise_id')
                        ); 
                    $obj_tree = $this->obj_customer->search($param_tree); 
                    
                    
            //GET POSITION PIERNA
            $pierna = $obj_customer->position;
            
            if($customer_id == 1){
                if($pierna = 1){
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

                if($value->identificador == $n2_z){
                    $n2_iz = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->country,
                                               $value->franchise_id);
                    $this->tmp_backoffice->set("n2_iz",$n2_iz);
                }elseif($value->identificador == $n2_d){
                    $n2_de = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->country,
                                               $value->franchise_id);
                    $this->tmp_backoffice->set("n2_de",$n2_de);
                }elseif($value->identificador == $n3_2_z){
                    $n3_2_iz = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->country,
                                               $value->franchise_id);
                    $this->tmp_backoffice->set("n3_2_iz",$n3_2_iz);
                }elseif($value->identificador == $n3_z){
                    $n3_iz = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->country,
                                               $value->franchise_id);
                    $this->tmp_backoffice->set("n3_iz",$n3_iz);
                }elseif($value->identificador == $n3_d){
                    $n3_de = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->country,
                                               $value->franchise_id);
                    $this->tmp_backoffice->set("n3_de",$n3_de);
                }elseif($value->identificador == $n3_2_d){
                    $n3_2_de = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->country,
                                               $value->franchise_id);
                    $this->tmp_backoffice->set("n3_2_de",$n3_2_de);
                }elseif($value->identificador == $n4_z){
                    $n4_iz = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->country,
                                               $value->franchise_id);
                    $this->tmp_backoffice->set("n4_iz",$n4_iz);
                }elseif($value->identificador == $n4_2_z){
                    $n4_2_iz = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->country,
                                               $value->franchise_id);
                    $this->tmp_backoffice->set("n4_2_iz",$n4_2_iz);
                }elseif($value->identificador == $n4_3_z){
                    $n4_3_iz = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->country,
                                               $value->franchise_id);
                    $this->tmp_backoffice->set("n4_3_iz",$n4_3_iz);
                }elseif($value->identificador == $n4_4_z){
                    $n4_4_iz = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->country,
                                               $value->franchise_id);
                    $this->tmp_backoffice->set("n4_4_iz",$n4_4_iz);
                }elseif($value->identificador == $n4_d){
                    $n4_de = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->country,
                                               $value->franchise_id);
                    $this->tmp_backoffice->set("n4_de",$n4_de);
                }elseif($value->identificador == $n4_2_d){
                    $n4_2_de = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->country,
                                               $value->franchise_id);
                    $this->tmp_backoffice->set("n4_2_de",$n4_2_de);
                }elseif($value->identificador == $n4_3_d){
                    $n4_3_de = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->country,
                                               $value->franchise_id);
                    $this->tmp_backoffice->set("n4_3_de",$n4_3_de);
                }
                elseif($value->identificador == $n4_4_d){
                    $n4_4_de = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->created_at,
                                               $value->parents_id,
                                               $value->position,
                                               $value->username,
                                               $value->active,
                                               $value->franchise,
                                               $value->country,
                                               $value->franchise_id);
                    $this->tmp_backoffice->set("n4_4_de",$n4_4_de);
                }
            }
  
          //GET PRICE BTC
            $params_price_btc = array(
                                    "select" =>"",
                                     "where" => "otros_id = 1");
                
           $obj_otros = $this->obj_otros->get_search_row($params_price_btc); 
           $price_btc = "$".number_format($obj_otros->precio_btc,2);   
            
        $this->tmp_backoffice->set("price_btc",$price_btc);    
        $this->tmp_backoffice->set("obj_customer",$obj_customer);
        $this->tmp_backoffice->render("backoffice/b_binario");
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
