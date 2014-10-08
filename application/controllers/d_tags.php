<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_tags extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("tags_model","obj_tags");
    }   
                
    public function index(){       
        
            $txt_search = $this->input->post("txt_search");
            $where = $txt_search != ""?"name like '%$txt_search'":"";
						
            /// PARAMETROS PARA EL SELECT 
            $params = array(
                        "select" =>"tag_id, name, status_value,created_at,created_by,updated_at,updated_by",
                        "where" => $where,
                        "order" => "name DESC"
                        ) ;
	
            /// PAGINADO
            $config=array();
            $config["base_url"] = site_url("dashboard/tags"); 
            $config["total_rows"] = $this->obj_tags->total_records($params) ;  
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
            $modulos ='tags'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 
            
            /// DATA
            $obj_tags= $this->obj_tags->search_data($params, $config["per_page"],$this->uri->segment(3));
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_tags",$obj_tags);
            $this->tmp_mastercms->set("obj_pagination",$obj_pagination);
            $this->tmp_mastercms->render("dashboard/tags/tags_list");

    }
    
    public function add_tag(){

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
								 
					   $obj_tags= $this->obj_tags->insert($data_tag);
					   $data['message'] = "true";             
						
					}		 
						 
		 }else{
			  $data_tag = array(
							'name' => $name,
							'status_value'  => $status,
							'created_at' => date("Y-m-d H:i:s"),
							'created_by' => '1'
							);
								 
			   $obj_tags= $this->obj_tags->update($tag_id,$data_tag);
			   $data['message'] = "true";         
		 }              
           
            echo json_encode($data);      
            exit();
        }
    }
    
    public function validate_name($name){        
        
        $obj_tags = $this->obj_tags->valid_name($name);
                
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
            $where = "tag_id = $t_id";
            $params = array("where" => $where);
            $obj_tag  = $this->obj_tags->get_search_row($params);            
        }
        
        if($obj_tag!=null){
            $data['message']="true"; 
            $data['print']=$obj_tag->name;
            $data['print2']=$obj_tag->status_value;
			 $data['print3']=$obj_tag->tag_id;
        }else{
            $data['message']="false"; 
        }
        
        echo json_encode($data);      
        exit();
        }    
    }
    
    public function upload_image(){
        $config                     =   array();
        $config['upload_path']      = './upload/programa/'.name_shows($this->input->post('tittle'));
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']         = '100';
        $config['max_width']        = '705';
        $config['max_height']       = '252';
        $config['encrypt_name']     =   TRUE; 
        
        $exist=FALSE;
        if(!is_dir($config['upload_path'])){
            $exist=@mkdir($config['upload_path'], 0777);
        }else{
            $exist=TRUE;
        }        
        $nom_img ="";
        if($exist===TRUE){                                               
            $this->load->library('upload', $config);            
          if ($this->upload->do_upload('file_banner')){            
                $foto = array('upload_data' => $this->upload->data());
                $nom_img =  $foto['upload_data']['file_name'];                       
            }      
        }       
        return $nom_img;
    }
    
    public function validate(){
        $show_id = $this->input->post("show_id");        
        
        if ($_FILES["file_banner"]["name"]!= ""){
            $banner =  'upload/programa/'.name_shows($this->input->post('tittle'))."/".$this->upload_image();
        }else{
            $banner =  $this->input->post('txt_banner');            
        }
        
        if ($banner != ""){
            $data = array(
                'slug' => slug($this->input->post('tittle')),
                'meta_tittle' => $this->input->post('tittle'),
                'meta_description' => $this->input->post('meta_description'),
                'meta_keywords' => $this->input->post('meta_keywords'),
                'tittle' => $this->input->post('tittle'),
                'categories' => implode_categories($this->input->post('categories')),
                'banner_img_url' => $banner,
                'status_value' => $this->input->post('status_value'),
                'created_at' => date("Y-m-d H:i:s"),
                'created_by' => $_SESSION['usercms']['user_id'],
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
            );            
            if ($show_id != ""){
                $this->obj_shows->update($show_id, $data);
            }else{
                $this->obj_shows->insert($data);                
            }
            redirect(site_url()."dashboard/shows");
        }else{
              echo '<div class="ym-fbox-text ym-error"><p class="ym-message">La imagen es muy grande</p></div>';
            $this->load();
        }
    }

    public function delete(){      
	if($this->input->is_ajax_request()){   
		$tag_id = $this->input->post("tag_id");
		if ($tag_id > 0){
		$this->obj_tags->delete($tag_id);
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
}
?>