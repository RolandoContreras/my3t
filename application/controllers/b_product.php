<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_product extends CI_Controller {
     function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("commissions_model","obj_commissions");
        $this->load->model("otros_model","obj_otros");
        $this->load->model("messages_model","obj_messages");
        $this->load->model("franchise_model","obj_franchise");
    }

    public function index()
    {
        //GET SESION ACTUALY
        $this->get_session();
        /// VISTA
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET TOTAL MESSAGE
        $all_message = $this->get_total_messages($customer_id);
        //GET TOTAL MESSAGE
        $obj_message = $this->get_messages($customer_id);
        
        $params = array(
                        "select" =>"customer.customer_id,
                                    customer.username,
                                    customer.first_name,
                                    customer.franchise_magic,
                                    customer.last_name,
                                    customer.active,
                                    customer.created_at,
                                    customer.status_value,
                                    customer.franchise_id,
                                    franchise.price,
                                    franchise.name as franchise,
                                    ",
                         "where" => "customer.customer_id = $customer_id",
                         "join" => array('franchise, customer.franchise_id = franchise.franchise_id',)
                                        );
            $obj_customer = $this->obj_customer->get_search_row($params);

//            GET FRANCHISE OF MAGIC
            $magic_franchise = $obj_customer->franchise_magic;
//            GET FRANCHISE OF CUSTOMER
            $franchise = $obj_customer->franchise_id;
//            GET TEXTO OF TRAVEL AND FOREX
            
            switch ($magic_franchise) {
                case '1':
                    $magic_franchise_text = "Felicitaciones usted tiene la franquicia de MAGIC VACATION MEMBERS y 3T";
                    break;
                case '0':
                    $magic_franchise_text = "Usted no cuenta con la franquicia de MAGIC VACATION MEMBERS y 3T";
                    break;
                default:
                    $magic_franchise_text = "Usted no cuenta con la franquicia de MAGIC VACATION MEMBERS y 3T";
                    break;
                
            }
            
            switch ($franchise) {
                case 1:
                    $travel = "Su paquete actual BASIC no le permite el viaje integrado";
                    $forex = "Su paquete actual BASIC no le permite el ingreso a 3T Academy";
                    $education = "Tienes el paso 1 que contiene temas como: De balsero a millonario, Historia de la Vaca.<br/> Recibe el paso 2 que contiene tema como:¿Por qué la gente fracasa?, De oruga a mariposa, Creencias.";
                    break;
                case 2:
                    $travel = "Tienes un ECO –CRUCERO y ten una gran experticia.    ";
                    $forex = "Tienes los cursos de FOREX nivel básico en nuestra academia 3T Academy.";
                    $education = "Tienes el paso 3 que contiene temas como: Mi primer mes en redes de mercadeo,  Deseo ardiente. <br/> Tienes el paso 2 que contiene tema como: la importancia del sistema educativo, diamante en 90 días.";
                    break;
                case 4:
                    $travel = "Tienes un viaje al interior de tu país todo pagado.";
                    $forex = "Tienes los cursos de FOREX nivel intermedio en nuestra academia 3T Academy.";
                    $education = "Tienes el paso 7 que contiene temas como: Tu negocio al desnudo, vida de vacas. <br/>Tienes el paso 8 que contiene tema como: 1000 personas en 90 días, ¿Cómo hacer tus sueños realidad?";
                    break;
                case 5:
                    $travel = "Tienes un viaje internacional todo pagado.";
                    $forex = "Tienes los cursos de forex nivel avanzado.";
                    $education = "Tienes el paso 9 que contiene temas como: Vídeos exclusivos de negociación y cierre en vivo.";
                    break;
                case 6:
                    $travel = "Su paquete actual MEMBERSHIP no le permite el viaje integrado";
                    $forex = "Su paquete actual MEMBERSHIP no le permite el ingreso a 3T Academy";
                    $education = "Su paquete actual MEMBERSHIP no le permite el ingreso al sistema de 9 pasos";
                    break;
            }
        
            
            //GET PRICE BTC
            $params_price_btc = array(
                                    "select" =>"",
                                     "where" => "otros_id = 1");
                
           $obj_otros = $this->obj_otros->get_search_row($params_price_btc); 
           $price_btc = "$".number_format($obj_otros->precio_btc,2);
            
        $this->tmp_backoffice->set("obj_message",$obj_message);
        $this->tmp_backoffice->set("all_message",$all_message);  
        $this->tmp_backoffice->set("price_btc",$price_btc);
        $this->tmp_backoffice->set("magic_franchise",$magic_franchise);
        $this->tmp_backoffice->set("magic_franchise_text",$magic_franchise_text);
        $this->tmp_backoffice->set("travel",$travel);
        $this->tmp_backoffice->set("forex",$forex);
        $this->tmp_backoffice->set("education",$education);
        $this->tmp_backoffice->set("obj_customer",$obj_customer);
        $this->tmp_backoffice->render("backoffice/b_product");
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
    
    public function get_total_messages($customer_id){
        $params = array(
                        "select" =>"count(messages_id) as total",
                        "where" => "customer_id = $customer_id and status_value = 1",
                        
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
                        "where" => "customer_id = $customer_id and status_value = 1",
                        "order" => "messages_id DESC",
                        "limit" => "3",
                                        );
            $obj_message = $this->obj_messages->search($params); 
            //GET ALL MESSAGE   
            return $obj_message;
    }
}


    
