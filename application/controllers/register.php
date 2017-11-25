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
                    "select" => "customer_id,first_name, position_temporal,username",
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

        public function crear_registro() {
            if ($this->input->is_ajax_request()) {

                //SET TIMEZONE AMERICA
                date_default_timezone_set('America/Lima');

                $customer_id = trim($this->input->post('customer_id'));

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

                $this->form_validation->set_rules('usuario', 'usuario', "required|trim");
                $this->form_validation->set_rules('name', 'name', 'required|trim');
                $this->form_validation->set_rules('last_name', 'last_name', "required|trim");
                $this->form_validation->set_rules('address', 'address', 'required|trim');
                $this->form_validation->set_rules('telefono', 'telefono', "required|trim");
                $this->form_validation->set_rules('dni', 'dni', 'required|trim');
                $this->form_validation->set_rules('email', 'email', "required|trim");
                $this->form_validation->set_rules('city', 'city', 'required|trim');
                $this->form_validation->set_rules('dia', 'dia', 'required|trim');
                $this->form_validation->set_rules('mes', 'mes', "required|trim");
                $this->form_validation->set_rules('ano', 'ano', 'required|trim');
                $this->form_validation->set_message('required', 'Campo requerido %s');

                if ($this->form_validation->run($this) == false) {
                    $data['print'] = "Debe llenar todos los campos";
                    $data['message'] = "false";
                } else {
                    $usuario = trim($this->input->post('usuario'));
                    $clave = trim($this->input->post('clave'));
                    $name = trim($this->input->post('name'));
                    $last_name = trim($this->input->post('last_name'));
                    $address = trim($this->input->post('address'));
                    $telefono = trim($this->input->post('telefono'));
                    $dni = trim($this->input->post('dni'));
                    $email = trim($this->input->post('email'));
                    $dia = trim($this->input->post('dia'));
                    $mes = trim($this->input->post('mes'));
                    $ano = trim($this->input->post('ano'));
                    $pais = trim($this->input->post('pais'));
                    $region = trim($this->input->post('region'));
                    $city = trim($this->input->post('city'));
                    //create date to DB
                    $birth_date = "$ano-$mes-$dia";

                    $data = array(
                        'parents_id' => $parent_id,
                        'franchise_id' => 6,
                        'username' => $usuario,
                        'email' => $email,
                        'position' => $position,
                        'point_left' => 0,
                        'point_rigth' => 0,
                        'calification' => 0,
                        'date_start' => "0000/00/00",
                        'identificador' => $identificator,
                        'position_temporal' => 1,
                        'password' => $clave,
                        'first_name' => $name,
                        'last_name' => $last_name,
                        'address' => $address,
                        'phone' => $telefono,
                        'city' => $city,
                        'dni' => $dni,
                        'birth_date' => $birth_date,
                        'country' => $pais,
                        'region' => $region,
                        'active' => 0,
                        'calification' => 0,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                    );

                    $customer_id = $this->obj_customer->insert($data);
                    
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
                        'created_by' => $customer_id,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                    );
                    //INSERT MESSAGES    
                    $this->obj_messages->insert($data_messages);
                    
                    //CREATE MESSAGE DATA ACCESS
                    $message = "Ususario: $usuario <br> Contraseña: $clave";
                    $data_messages = array(
                        'customer_id' => $customer_id,
                        'date' => date("Y-m-d H:i:s"),
                        'label' => "Soporte",
                        'subject' => "Sus datos de acceso",
                        'messages' => $message,
                        'type' => 2,
                        'type_send' => 0,
                        'created_by' => $customer_id,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                    );
                    //INSERT MESSAGES    
                    $this->obj_messages->insert($data_messages);

                    //ACTIVE SESSION
                    $data_customer_session['customer_id'] = $customer_id;
                    $data_customer_session['name'] = $name;
                    $data_customer_session['franchise_id'] = 6;
                    $data_customer_session['username'] = $usuario;
                    $data_customer_session['email'] = $email;
                    $data_customer_session['active'] = 0;
                    $data_customer_session['logged_customer'] = "TRUE";
                    $data_customer_session['status'] = 1;
                    $_SESSION['customer'] = $data_customer_session;

    //                SEND MESSAGES
                    $images = "static/page_front/images/bienvenido.jpg";
                    $img_path = "<img src='".site_url().$images."' alt='Bienvenido' height='800' width='800'/>";

                    // Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
                    $mensaje = wordwrap("<html><body><h1>Bienvenido a 3T Company</h1><p>Bienvenido ahora eres parte de la revolución 3T estamos muy contentos de que hayas tomado la mejor decisión en este tiempo.</p><p>Estamos para apoyarte en todo lo que necesites. Te dejamos tus datos de ingreso.</p><h3>Usuario: $usuario</h3><h3>Contraseña: $clave</h3><p>$img_path</p></body></html>", 70, "\n", true);
                    //Titulo
                    $titulo = "Bienvenido a 3T Company";
                    //cabecera
                    $headers = "MIME-Version: 1.0\r\n"; 
                    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
                    $headers .= "From: 3T Company: Travel - Training - Trade < noreplay@my3t.club >\r\n";
                    //Enviamos el mensaje a tu_dirección_email 
                    $bool = mail("$email",$titulo,$mensaje,$headers);

                    $data['message'] = "true";
                    $data['print'] = "Registrado con éxito";
                    $data['url'] = site_url() . "backoffice";
                }
                echo json_encode($data);
                exit();
        }
       }

        public function mensaje(){
        //ACTIVE CUSTOMER
        
                $images = "static/page_front/images/bienvenido.jpg";
                $img_path = "<img src='".site_url().'/'.$images."' alt='Bievenido' height='800' width='800'/>";
                
                // Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
                $mensaje = wordwrap("<html><body><h1>Bienvenido a CRIPTOWIN</h1><h3>Usuario: lidermillon</h3><h3>Usuario: lidermillon</h3><p>$img_path</p></body></html>", 70, "\n", true);
                //Titulo
                $titulo = "Bienvenido a Criptowin";
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
