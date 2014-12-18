<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_verify extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("tags_model","obj_tags");
        $this->load->model("customer_model","obj_customer");
        }   
                
    public function index(){       
            $this->get_session();
            $modulos ='verificaciones'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->render("dashboard/verify/verify_list");
    }
    
    public function verify_status_count(){
        if($this->input->is_ajax_request()){ 
            
            echo "hola";
            die();
            
            
            $tag_id = $this->input->post('tag_id');
            $name = $this->input->post('name');
            $status=$this->input->post('status');
			             
           
            echo json_encode($data);      
            exit();
        }
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