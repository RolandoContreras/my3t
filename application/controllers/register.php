<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    function __construct() { 
        parent::__construct();
        $this->load->model("customer_model", "obj_customer");
        $this->load->model("paises_model", "obj_paises");
        $this->load->model("regiones_model", "obj_regiones");
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
		//SELECT URL IF ISSET USERNAME
            $url = explode("/", uri_string());
            if (isset($url[2])) {
                $username = $url[2];
                //Select params
                $params = array(
                    "select" => "customer_id,first_name, position_temporal,username,point_left,point_rigth,identificador",
                    "where" => "username = '$username'");
                $obj_paises['obj_customer'] = $this->obj_customer->get_search_row($params);
            }
            //Select params
            $params = array(
                "select" => "id, nombre",
                "where" => "id_idioma = 7");
            $obj_paises['obj_paises'] = $this->obj_paises->search($params);
            /// VIEW
            $this->load->view("register", $obj_paises);
	}
        public function validate_region() {
        if ($this->input->is_ajax_request()) {
        $id_pais = trim($this->input->post('id'));
        //SELECT ID FROM CUSTOMER
        $param_regiones = array(
            "select" => "id,nombre",
            "where" => "id_pais = $id_pais and id_idioma = 7");
        $region['region'] = $this->obj_regiones->search($param_regiones);

        if (count($region) > 0) {
            $data['message'] = "true";
            $data['print'] = $region['region'];
        } else {
            $data['message'] = "false";
            $data['print'] = "Seleccionar un país";
        }
        echo json_encode($data);
        }
    }

        public function validate_username() {
            if ($this->input->is_ajax_request()) {
                //SELECT ID FROM CUSTOMER
            $username = str_to_minuscula(trim($this->input->post('username')));
            $param_customer = array(
                "select" => "customer_id",
                "where" => "username = '$username'");
            $customer = count($this->obj_customer->get_search_row($param_customer));
            if ($customer > 0) {
                $data['message'] = "true";
                $data['print'] = "No esta disponible! <i class='fa fa-times-circle-o' aria-hidden='true'></i>";
            } else {
                $data['message'] = "false";
                $data['print'] = "Usuario Disponible! <i class='fa fa-check-square-o' aria-hidden='true'></i>";
            }
            echo json_encode($data);
            }
        }
        
        public function email() {
              //SEND MESSAGES
                    $images = site_url()."static/page_front/images/bienvenido2.jpg";
                    $img_path = "<img src='$images' alt='Bienvenido' height='800' width='800'/>";
                    $mensaje = wordwrap("<html><body><h1>Bienvenido a 3T Club</h1><p>Bienvenido ahora eres parte de la revolución 3T Club estamos muy contentos de que hayas tomado la mejor decisión en este tiempo.</p><p>Estamos para apoyarte en todo lo que necesites. Te dejamos tus datos de ingreso.</p><h3>Usuario: lidermillon</h3><h3>Contraseña: 123456789</h3><p>$img_path</p></body></html>", 70, "\n", true);
                    $titulo = "Bienvenido a 3T Company";
                    $headers = "MIME-Version: 1.0\r\n"; 
                    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
                    $headers .= "From: 3T Club: Travel - Training - Trade < noreplay@my3t.club >\r\n";
                    $bool = mail("software.contreras@gmail.com",$titulo,$mensaje,$headers);
                    echo $bool;
        }
        
        public function validate_username_register($username) {
                //SELECT ID FROM CUSTOMER
            $param_customer = array(
                "select" => "customer_id",
                "where" => "username = '$username'");
            $customer = count($this->obj_customer->get_search_row($param_customer));
            if ($customer > 0) {
                return 1;
            } else {
                return 0;
            }
            
        }

        public function crear_registro() {
            
                //SET TIMEZONE AMERICA
                date_default_timezone_set('America/Lima');
                //GET DATA STRING
                $data = $_POST['dataString']; 
                //EXPLODE BY DEMILITER
                $string =  explode('&', $data);
                
                //SET $VARIBLE
                $username = strtolower($string[0]);
                $customer_id = $string[14];
                $pierna_customer = $string[15];
                $point_left = $string[16];
                $point_rigth = $string[17];
                $identificator_param = $string[18];
                
                //validate username
                $val = $this->validate_username_register($username);
                if($val == 1){
                    echo '<div class="alert alert-danger" style="text-align: center">Usuario no disponible.</div>';
                }else{
                    //SET $VARIBLE
                    $name = $string[1];
                    $password = $string[2];
                    $last_name = $string[3];
                    $address = $string[4];
                    $phone = $string[5];
                    $dni = $string[6];
                    $email = $string[7];
                    $dia = $string[8];
                    $mes = $string[9];
                    $ano = $string[10];
                    $pais = $string[11];
                    $region = $string[12];
                    $city = $string[13];
                    
                    //PUT CUSTOMER_ID LIKE PAREND
                    $parent_id = $customer_id;
                    //SELECT PIERNA
                    if($pierna_customer == 3){
                        switch($point_left){
                            case $point_left < $point_rigth:
                                $last_id = 'z';
                                //GET TO VERIFY UN ATUTHENTICATOR STRING
                                $verify = 'd';
                                $pierna_customer = 1;
                                break;
                            case $point_left > $point_rigth:
                                $last_id = 'd';
                                //GET TO VERIFY UN ATUTHENTICATOR STRING
                                $verify = 'z';
                                $pierna_customer = 2;
                                break;
                            case $point_left == $point_rigth:
                                $last_id = 'z';
                                //GET TO VERIFY UN ATUTHENTICATOR STRING
                                $verify = 'd';
                                $pierna_customer = 1;
                                break;
                        }
                    }elseif ($pierna_customer == 1) {
                            $last_id = 'z';
                            //GET TO VERIFY UN ATUTHENTICATOR STRING
                            $verify = 'd';
                    }elseif ($pierna_customer == 2){
                            $last_id = 'd';
                            //GET TO VERIFY UN ATUTHENTICATOR STRING
                            $verify = 'z';
                    }
                    
                    //SELECT LAST REGISTER
                    $params = array("select" => "identificador,customer_id,first_name",
                        "where" => "identificador like '%$identificator_param' and position = $pierna_customer",
                        "order" => "customer.identificador DESC");
                    $obj_identificator = $this->obj_customer->search($params);
                    //COUNT $identificator_param y quitar ,
                    $count_identificator = strlen($identificator_param) + 1;

                    //Get identificator last register
                    if (count($obj_identificator) > 0) {

                        $key = 1;
                        $str = "";
                        $str_number = "";
                        foreach ($obj_identificator as $key => $value) {
                            //GET IDENTIFICATOR TREE 
                            $identificador = $value->identificador;
                            //QUITAR IDENTIFICADOR DEL PADRE
                            $identificador_2 = substr($identificador, 0, -$count_identificator);

                            //CONSULT IF CONTAINT Z O D
                            $find = strpos($identificador_2, "$verify");

                            if ($find == false) {
                                $str .= "$identificador|";
                            }
                        }

                        $array_identificator = explode("|", $str);
                        $count = 0;
                        foreach ($array_identificator as $value) {
                            $count_str = strlen($value);
                            if($count_str > $count){
                                $idetificator = $value;
                                $count = $count_str;
                            }
                        }
                        $idetificator =  $idetificator;             
                    } else {
                        $idetificator = $identificator_param;
                    }
                    
                    $explo_identificator = explode(",", $idetificator);
                    $ultimo = $explo_identificator[0] + 1;
                    $identificator = $ultimo . $last_id . ',' . $idetificator;
                    
                    //create date to DB
                    $birth_date = "$ano-$mes-$dia";
                    $data = array(
                        'parents_id' => $customer_id,
                        'franchise_id' => 6,
                        'username' => $username,
                        'email' => $email,
                        'password' => $password,
                        'position' => $pierna_customer,
                        'position_temporal' => 1,
                        'first_name' => $name,
                        'last_name' => $last_name,
                        'address' => $address,
                        'phone' => $phone,
                        'identificador' => $identificator,
                        'city' => $city,
                        'dni' => $dni,
                        'birth_date' => $birth_date,
                        'country' => $pais,
                        'region' => $region,
                        'active' => 0,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                    );
                    $customer_id = $this->obj_customer->insert($data);
                    //INSERT MESSAGE WELCOME
                    $this->messages_welcome($name,$last_name,$customer_id,$username,$password);
                    echo '<div class="alert alert-success" style="text-align: center">Registro creado correctamente.</div>';
                    
                    //SEND MESSAGES
                    $images = site_url()."static/page_front/images/bienvenido2.jpg";
                    $img_path = "<img src='$images' alt='Bienvenido' height='1000' width='646'/>";
                    $mensaje = wordwrap("<html><body><h1>Bienvenido a 3T Club</h1><p>Bienvenido ahora eres parte de la revolución 3T Club estamos muy contentos de que hayas tomado la mejor decisión en este tiempo.</p><p>Estamos para apoyarte en todo lo que necesites. Te dejamos tus datos de ingreso.</p><h4>-----> Usuario: $username</h4><h4>-----> Contraseña: $password</h4><p>$img_path</p></body></html>", 70, "\n", true);
                    $titulo = "Bienvenido a 3T Club";
                    $headers = "MIME-Version: 1.0\r\n"; 
                    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
                    $headers .= "From: 3T Company: Travel - Training - Trade < noreplay@my3t.club >\r\n";
                    $bool = mail("$email",$titulo,$mensaje,$headers);
        }
      }
      
        public function messages_welcome($name,$last_name,$customer_id,$username,$password){
           //CREATE MESSAGE WELCOME
                    $name = ucwords("$name $last_name");
                    $message = "Bienvenido $name es un gusto que haya tomado la mejor decisión de pertenecer al equipo de 3T. <br>Estamos para apoyarlo en lo que necesite. Si tienen alguna consulta escribamos a soporte que lo ayudaremos de inmediato.";
                    
                    $data_messages = array(
                        'customer_id' => $customer_id,
                        'date' => date("Y-m-d H:i:s"),
                        'label' => "Soporte",
                        'subject' => "Bienvenido a 3T",
                        'messages' => $message,
                        'type' => 2,
                        'type_send' => 0,
                        'active' => 1,
                        'created_by' => $customer_id,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                    );
                    //INSERT MESSAGES    
                    $this->obj_messages->insert($data_messages);
                    
                    //CREATE MESSAGE DATA ACCESS
                    $message = "Ususario: $username <br> Contraseña: $password";
                    $data_messages = array(
                        'customer_id' => $customer_id,
                        'date' => date("Y-m-d H:i:s"),
                        'label' => "Soporte",
                        'subject' => "Sus datos de acceso",
                        'messages' => $message,
                        'type' => 2,
                        'type_send' => 0,
                        'active' => 1,
                        'created_by' => $customer_id,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                    );
                    //INSERT MESSAGES    
                    $this->obj_messages->insert($data_messages);
                    
       }
       
        public function identificador(){
            $pierna_customer = trim($this->input->post('pierna_customer'));

                //PUT CUSTOMER_ID LIKE PAREND
                $parent_id = $customer_id;

                $position = $pierna_customer;
                if ($position == 1) {
                    $pos = 'z';
                } else {
                    $pos = 'd';
                }

                $params = array("select" => "identificador",
                    "where" => "customer_id = $customer_id");
                $obj_customer_principal = $this->obj_customer->get_search_row($params);
                $identificator_param = $obj_customer_principal->identificador;

                if ($position == 1) {
                    //SELECT IDENTIFICATOR BY DEFOULT IF IT CUSTOMER_ID =1 
                    if ($customer_id == 1) {
                        $identificator_param = '1z';
                    }
                    $last_id = 'z';
                    //GET TO VERIFY UN ATUTHENTICATOR STRING
                    $verify = 'd';
                    $not_like = "d,$identificator_param";
                } else {
                    //SELECT IDENTIFICATOR BY DEFOULT IF IT CUSTOMER_ID =1 
                    if ($customer_id == 1) {
                        $identificator_param = '1d';
                    }
                    $last_id = 'd';
                    //GET TO VERIFY UN ATUTHENTICATOR STRING
                    $verify = 'z';
                    $not_like = "z,$identificator_param";
                }

                $params = array("select" => "identificador,customer_id,first_name",
                    "where" => "identificador like '%$identificator_param'  and position = $position",
                    "order" => "customer.identificador DESC");
                $obj_identificator = $this->obj_customer->search($params);

                //COUNT $identificator_param y quitar ,
                $count_identificator = strlen($identificator_param) + 1;

                //Get identificator last register
                if (count($obj_identificator) > 0) {

                    $key = 1;
                    $str = "";
                    $str_number = "";
                    foreach ($obj_identificator as $key => $value) {
                        //GET IDENTIFICATOR TREE 
                        $identificador = $value->identificador;
                        //QUITAR IDENTIFICADOR DEL PADRE
                        $identificador_2 = substr($identificador, 0, -$count_identificator);

                        //CONSULT IF CONTAINT Z O D
                        $find = strpos($identificador_2, "$verify");

                        if ($find == false) {
                            $str .= "$identificador|";
                        }
                    }

                    $array_identificator = explode("|", $str);

                    $count = 0;
                    foreach ($array_identificator as $value) {

                        $count_str = strlen($value);

                        if($count_str > $count){
                            $idetificator = $value;
                            $count = $count_str;
                        }
                    }

                    $idetificator =  $idetificator;             
                } else {
                    $idetificator = $identificator_param;
                }

                if($idetificator == ""){
                     $idetificator = $obj_customer_principal->identificador;
                }

                $explo_identificator = explode(",", $idetificator);
                $ultimo = $explo_identificator[0] + 1;
                $identificator = $ultimo . $last_id . ',' . $idetificator;
       }

        public function mensaje(){
        //ACTIVE CUSTOMER
        
                $images = "static/page_front/images/bienvenido.jpg";
                $img_path = "<img src='".site_url().'/'.$images."' alt='Bievenido' height='800' width='800'/>";
                
                // Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
                $mensaje = wordwrap("<html><body><h1>Bienvenido a CRIPTOWIN</h1><h3>Usuario: lidermillon</h3><h3>Usuario: lidermillon</h3><p>$img_path</p></body></html>", 70, "\n", true);
                //Titulo
                $titulo = "Bienvenido a 3T Club";
                //cabecera
                $headers = "MIME-Version: 1.0\r\n"; 
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
                $headers .= "From: CRIPTOWIN - The best Investment < noreplay@criptowin.com >\r\n";
                //Enviamos el mensaje a tu_dirección_email 
                $bool = mail("software.contreras@gmail.com",$titulo,$mensaje,$headers);
                
                if($bool){
                    echo "Mensaje Eviado";
                }else{
                    echo "Mensaje no enviado";
                }
                echo json_encode($data); 
        exit();
            
    }

}
