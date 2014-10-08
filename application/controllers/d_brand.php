<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_brand extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("brand_model","obj_brand");
    }   
                
    public function index(){       
            $this->get_session();
            $txt_search = $this->input->post("txt_search");
            $where = $txt_search != ""?"name like '%$txt_search'":"";
						
            /// PARAMETROS PARA EL SELECT 
            $params = array(
                        "select" =>"brand_id,name,status_value,created_at,created_by,updated_at,updated_by",
                        "where" => $where,
                        "order" => "name DESC"
                        ) ;
	
            /// PAGINADO
            $config=array();
            $config["base_url"] = site_url("dashboard/marcas"); 
            $config["total_rows"] = $this->obj_brand->total_records($params) ;  
            $config["per_page"] = 10; 
            $config["num_links"] = 3;
            $config["uri_segment"] = 3;   
            
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';            
            $config['num_tag_open']='<li>';
            $config['num_tag_close'] = '</li>';            
            $config['cur_tag_open']= '<li class="active"><a>';
            $config['cur_tag_close']= '</li></a>';            
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';            
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            
            $this->pagination->initialize($config);        
            $obj_pagination = $this->pagination->create_links();
            $modulos ='marcas'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 
            
            /// DATA
            $obj_brand= $this->obj_brand->search_data($params, $config["per_page"],$this->uri->segment(3));
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_brand",$obj_brand);
            $this->tmp_mastercms->set("obj_pagination",$obj_pagination);
            $this->tmp_mastercms->render("dashboard/brands/brands_list");

    }
    
    public function add_brand(){

        if($this->input->is_ajax_request()){ 
                        $tag_id = $this->input->post('tag_id');
			$name = $this->input->post('name');
			$status=$this->input->post('status');
                        
                        if ($tag_id == "") {
                            
                                	$this->form_validation->set_rules('name','Nombre','required|trim|min_length[2]|callback_validate_name');
					$this->form_validation->set_rules('status','estado','required');
		
					$this->form_validation->set_message('required','El %s es requerido');
					$this->form_validation->set_message('min_length','La %s debe tener minimo de  %s caracteres');
						  
					if ($this->form_validation->run($this)== false){                
					   $cadena  = explode("</p>", validation_errors());                
						$cadena2 = implode("<p>", $cadena);
						$cadena3 = explode("<p>", $cadena2);
						array_pop($cadena3);
						array_shift($cadena3);                       
						$data['print'] = $cadena3[0];           
						$data['message'] = "false"; 
					}else{
                                            
						 $data_tag = array(
							'name' => $name,
							'status_value'  => $status,
							'created_at' => date("Y-m-d H:i:s"),
							'created_by' => '1'
							);
								 
					   $obj_tags= $this->obj_brand->insert($data_tag);
					   $data['message'] = "true";             
						
					}		 
						 
		 }else{
			  $data_tag = array(
							'name' => $name,
							'status_value'  => $status,
							'created_at' => date("Y-m-d H:i:s"),
							'created_by' => '1'
							);
								 
			   $obj_tags= $this->obj_brand->update($tag_id,$data_tag);
			   $data['message'] = "true";         
		 }              
           
            echo json_encode($data);      
            exit();
        }
    }
    
    public function validate_name($name){        
        
        $obj_tags = $this->obj_brand->valid_name($name);
                
        if (count($obj_tags)>0){            
            $this->form_validation->set_message('validate_name', "El Tag ya existe");
            return false;
        }else{            
            return true;
        }
    }
	
    public function getAllTags(){
        if($this->input->is_ajax_request()){  
            
            $alalal=$this->input->post('valname');
            $params = array(
                            "select" =>"",
                            "where" => "",
                            "order" => "tag_id DESC"
                            );
            $obj_tags= $this->obj_tags->search($params);
            
            $data['message']="true";
            $cadena="";
            
            $table='<table class="table" id="alltags">
                    <thead>
                        <tr>
                            <td><input type="checkbox" id="chkbck" /></td>
                            <td>Nombre</td>
                            <td>Estatus</td>
                        </tr>
                    </thead>
                    <tbody>';
            
            foreach ($obj_tags as $value) {
                if($value->status_value==1){$state='Activo';}else{$state='Inactivo';}
                $cadena=$cadena.'
                <tr>
                    <td><input type="checkbox" class="chkbck" /></td>
                    <td>'.$value->name.'</td>
                    <td>
                        <div class="operation">
                            <div class="btn-group" style="display:none;">
                                  <button class="btn btn-small" onclick="edit_tag();"><i class="icon-eye-2"></i> Editar</button>
                                  <button class="btn btn-small"><i class="icon-trash-empty"></i>Eliminar</button>
                            </div>
                        </div>
                     </td>
                     <td>'.$state.'</td>
                </tr>';              
            }
            $finalfront=$table.$cadena.'</tbody></table>';
            $data['print']=$finalfront;
               
            echo json_encode($data);      
            exit();
        }
    }
    
    public function load(){        
        if($this->input->is_ajax_request()){ 
        
        $t_id=$this->input->post('tag_id');
            
        if ($t_id != ""){
            $where = "brand_id = $t_id";
            $params = array("where" => $where);
            $obj_tag  = $this->obj_brand->get_search_row($params);            
        }
        
        if($obj_tag!=null){
            $data['message']="true"; 
            $data['print']=$obj_tag->name;
            $data['print2']=$obj_tag->status_value;
            $data['print3']=$obj_tag->brand_id;
        }else{
            $data['message']="false"; 
        }
        
        echo json_encode($data);      
        exit();
        }    
    }
    
    public function delete(){      
	if($this->input->is_ajax_request()){   
		$brand_id = $this->input->post("brand_id");
		if ($brand_id > 0){
		$this->obj_brand->delete($brand_id);
		$dato['print'] = "El Tag ha sido eliminado"; 
		}
		$dato['print'] = "Error"; 
		echo json_encode($dato);            
            exit();
		}
    }

    public function delete_seleccionado(){
        if($this->input->is_ajax_request()){
             $data=array("result"=>"0");
             $s= unserialize(stripslashes($this->input->get("s")));
                 
             if(!empty($s)){
                foreach ($s as $s) {
                    if(!empty($s)){
                        $pk_s = decrypt_help($s);
                        if(is_numeric($pk_s)){
                            $this->obj_s->delete($pk_s);
                            $data=array("result"=>"1");    
                        }
                    } 
                }
            }
            echo json_encode($data);
            exit();
        }else{
            redirect();
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