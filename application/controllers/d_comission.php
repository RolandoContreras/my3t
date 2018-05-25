<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_comission extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("commissions_model","obj_comission");
    }   
                
    public function index(){  
            //GER SESSION   
            $this->get_session();
            $params = array(
                        "select" =>"commissions.commissions_id,
                                    customer.username,
                                    customer.first_name,
                                    customer.last_name,
                                    bonus.name as bonus,
                                    commissions.name,
                                    commissions.amount,
                                    commissions.status_value,
                                    commissions.date",
                        "join" => array('customer, customer.customer_id = commissions.customer_id',
                                        'bonus, bonus.bonus_id = commissions.bonus_id'),
                         "order" => "commissions.commissions_id DESc"              
                                        );            
            
            //GET DATA COMMISSIONS
            $obj_comission= $this->obj_comission->search($params);
            
            /// PAGINADO
            $modulos ='comisiones'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 
            /// DATA
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_comission",$obj_comission);
            $this->tmp_mastercms->render("dashboard/comisiones/comission_list");
    }
    
    public function load($category_id=NULL){
        //VERIFY IF ISSET CUSTOMER_ID
        
        if ($category_id != ""){
            /// PARAM FOR SELECT 
            $where = "category_id = $category_id";
            $params = array(
                        "select" =>"*",
                         "where" => $where,
            ); 
            $obj_category  = $this->obj_category->get_search_row($params); 
            //RENDER
            $this->tmp_mastercms->set("obj_category",$obj_category);
          }
      
            $modulos ='categorias'; 
            $seccion = 'Formulario';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->render("dashboard/categorias/category_form");    
    }
    
    public function validate(){
        
        //GET CUSTOMER_ID
        $category_id = $this->input->post("category_id");
        
        if($category_id != ""){
            //PARAM DATA
            $data = array(
               'name' => $this->input->post('name'),
               'description' => $this->input->post('description'),
               'active' => $this->input->post('active'),
               'updated_at' => date("Y-m-d H:i:s"),
               'updated_by' => $_SESSION['usercms']['user_id']
                );          
            //SAVE DATA IN TABLE    
            $this->obj_category->update($category_id, $data);
        }else{
            //PARAM DATA SAVE
            $data = array(
               'name' => $this->input->post('name'),
               'description' => $this->input->post('description'),
               'active' => $this->input->post('active'),
               'status_value' => 1,
               'created_at' => date("Y-m-d H:i:s"),
               'created_by' => $_SESSION['usercms']['user_id'],
                );          
            //SAVE DATA IN TABLE    
            $this->obj_category->insert($data);
        }
        redirect(site_url()."dashboard/categorias");
    }
    
    public function get_session(){          
        if (isset($_SESSION['usercms'])){
            if($_SESSION['usercms']['logged_usercms']=="TRUE" && $_SESSION['usercms']['status']==1){               
                return true;
            }else{
                redirect(site_url().'dashboard');
            }
        }else{
            redirect(site_url().'dashboard');
        }
    }
}
?>