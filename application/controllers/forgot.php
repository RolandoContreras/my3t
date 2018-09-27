<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot extends CI_Controller {
    public function __construct() {
        parent::__construct();    
        $this->load->model("customer_model", "obj_customer");
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
		$this->load->view('forgot');
	}
        public function send_messages(){
            if($this->input->is_ajax_request()){ 
                $username = $this->input->post('username');  
                //GER DATA USERNAME
                 $params = array("select" => "first_name,email,password",
                                "where" => "username = '$username'");
                 $obj_data = $this->obj_customer->get_search_row($params);
                 if (count($obj_data) > 0){ 
                        $name = ucfirst($obj_data->first_name);
                        $email = $obj_data->email;
                        $password = $obj_data->password;
                    //SEND MESSAGES
                    // Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
                                            
                    $this->message($name,$email,$username,$password);  
                    $data['message'] = "true";  
                }else{
                    $data['message'] = "false";
                }         
                echo json_encode($data);  
                exit();      
            }
        }
        public function message($name,$email,$username,$password){          
                $mensaje = wordwrap("<html>
                        <div style='margin-top:25px'>
                        <table width='100%' cellspacing='0' cellpadding='0' border='0'>
                        <tbody>
                        <tr>
                        <td style='padding:15px 0;border-top:1px dotted #c5c5c5' width='100%'>
                            <table style='table-layout:fixed' width='100%' cellspacing='0' cellpadding='0' border='0'>
                                <tbody>
                                <tr>
                                    <td style='padding:0;margin:0' width='100%' valign='top'>
                                        <p style='font-family:Lucida Grande','Lucida Sans Unicode','Lucida Sans',Verdana,Tahoma,sans-serif;font-size:15px;line-height:18px;margin-bottom:0;margin-top:0;padding:0;color:#1b1d1e'>
                                        <p dir='auto' style='color:#2b2e2f;font-family:Verdana,sans-serif;font-size:14px;line-height:22px;margin:15px 0'><b>Querido Asociado</strong></b></p>
                                        <div class='m_-8753525431338155893zd-comment' style='color:#2b2e2f;font-family:Verdana,sans-serif;font-size:14px;line-height:22px;margin:15px 0'>
                                          <p dir='auto' style='color:#2b2e2f;font-family:Verdana,sans-serif;font-size:14px;line-height:22px;margin:15px 0'>Estimado $name,</p>
                                          <p dir='auto' style='color:#2b2e2f;font-family:Verdana,sans-serif;font-size:14px;line-height:22px;margin:15px 0'>
                                          En relación a su solicitud de recuperación de contraseña nos estamos comunicando con ud. para darle la información correspondiente.</p>
                                          <ul dir='auto' style='list-style-type:disc;margin:10px 0 15px 30px;padding-left:15px' type='disc'>
                                            <li style='Verdana,sans-serif;font-size:14px;line-height:22px;margin:10px 0' type='disc'>Usuario: <em>$username</em></li>
                                            <li style='Verdana,sans-serif;font-size:14px;line-height:22px;margin:10px 0' type='disc'>Contraseña: <em>$password</em></li>
                                          </ul>
                                          <p dir='auto' style='color:#2b2e2f;font-family:Verdana,sans-serif;font-size:14px;line-height:22px;margin:15px 0'>
                                          <em><a href='http://www.my3t.club' rel='noreferrer' target='_blank' data-saferedirecturl='https://www.google.com/url?hl=es&amp;q=http://www.my3t.club&amp;source=gmail&amp;ust=1533191115659000&amp;usg=AFQjCNH81sc5NC2jENYoO2QtgKdakGyHbA'>www.my3t.club</a></em></p>
                                          <p></p>
                                        </div>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                        <div style='padding:10px;line-height:18px;font-family:Verdana,Arial,sans-serif;font-size:12px;color:#aaaaaa;margin:10px 0 14px 0;padding-top:10px;border-top:1px solid #eeeeee'></div>
                        Este correo electrónico es un servicio de 3T Club. 
                        <div style='clear:left;float:left;margin-top:10px;width:100%;font-family:Arial,Helvetica,sans-serif;font-size:12px!important'>
                        <span style='font-size:10px;display:block;margin-top:8px!important'>
                        La información contenida en este mensaje y/o archivo(s) adjunto(s), enviada desde 3T Club S.A.C, es confidencial/privilegiada y está destinada a ser leída sólo por la(s) persona(s) a la(s) que va dirigida. Le recordamos que sus datos han sido incorporados en el sistema de tratamiento de 3T Club S.A.C y que siempre y cuando se cumplan los requisitos exigidos por la normativa, usted podrá ejercer sus derechos de acceso, rectificación, limitación de tratamiento, supresión, portabilidad y oposición/revocación, en los términos que establece la normativa vigente en materia de protección de datos, dirigiendo su petición a la dirección de correo electrónico: <a href='mailto:support@my3.club' target='_blank'>support@my3.club</a>. 
                        Si usted lee este mensaje y no es el destinatario señalado, el empleado o el agente responsable de entregar el mensaje al destinatario, o ha recibido esta comunicación por error, le informamos que está totalmente prohibida, y puede ser ilegal, cualquier divulgación, distribución o reproducción de esta comunicación, y le rogamos que nos lo notifique inmediatamente y nos devuelva el mensaje original a la dirección arriba mencionada. Gracias 
                        </span>
                    </div>'
                            .</html>", 70, "\n", true);
                    $titulo = "Recuperar Contraseña - [3T Club]";
                    $headers = "MIME-Version: 1.0\r\n"; 
                    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
                    $headers .= "From: 3T Company: Travel - Training - Trade < noreplay@my3t.club >\r\n";
                    $bool = mail("$email",$titulo,$mensaje,$headers);
                    
    }
        
}
