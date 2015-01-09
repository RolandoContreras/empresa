<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_categories extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
          $this->load->model("categories_model","obj_categories");
    }   
                
    public function index(){  
        
           $this->get_session();
        
           $params = array(
                        "select" =>"id_category,
                                    name,
                                    observation,
                                    status_value",
                         "order" => "id_category DESC",
            );
      
            /// PAGINADO
           
            $modulos ='categorias'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            /// DATA
            $obj_categories= $this->obj_categories->search($params);
                
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_categories",$obj_categories);
            $this->tmp_mastercms->render("dashboard/categories/categories_list");

    }
    
    public function load($id_category=NULL){
        $this->get_session();
        if ($id_category != ""){
            /// PARAMETROS PARA EL SELECT 
            $where = "id_category = $id_category";
            $params = array(
                           "select" => "", 
                           "where" => $where);
            $obj_categories  = $this->obj_categories->get_search_row($params);  
            $this->tmp_mastercms->set("obj_categories",$obj_categories);
          }
            $modulos ='categorias'; 
            $seccion = 'Formulario';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->render("dashboard/categories/categories_form");    
    }
	
    public function validate(){
        $this->get_session();
        $id_category = $this->input->post("id_category");
        $data = array(
               'name' => $this->input->post('name'),
               'observation' => $this->input->post('observation'),
               'status_value' => $this->input->post('status_value'),
               'created_at' => date("Y-m-d H:i:s"),
               'created_by' => $_SESSION['usercms']['user_id'],
               'updated_at' => date("Y-m-d H:i:s"),
               'updated_by' => $_SESSION['usercms']['user_id']
        );          
        
            if ($id_category != ""){
                $this->obj_categories->update($id_category, $data);
            }else{
                $this->obj_categories->insert($data);                
            }
            redirect(site_url()."dashboard/categorias");
    }
    
    public function delete(){      
	if($this->input->is_ajax_request()){   
            $id_category = $this->input->post("id_category");
            if (count($id_category) > 0){
                $this->obj_categories->delete($id_category);
                $dato['print'] = "La Categoria ha sido eliminado"; 
            }
            $dato['print'] = "Error"; 
            echo json_encode($dato);            
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