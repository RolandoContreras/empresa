<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_products extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        //$this->load->model("menu_model","obj_menu");
        $this->load->model("product_model","obj_products");
//        $this->load->library('controller_basecms');
//        $this->controller_basecms->get_sesion();        
    }   
                
    public function index(){  
     
           $search_text     =  $this->input->post("search_text") != "" ? $this->input->post("search_text") : "";
           $params = array(
                        "select" =>"product_id,
                                    id_category,
                                    name,
                                    description,
                                    big_image,
                                    medium_image,
                                    small_image,
                                    price,
                                    stock,
                                    status_value ",
                         "where" => "name like '%$search_text%'",
                         "order" => "product_id DESC",
            ); 
            /// PAGINADO
            $config=array();
            $config["base_url"] = site_url("dashboard/productos/index"); 
            $config["total_rows"] = $this->obj_products->total_records($params) ;  
            $config["per_page"] = 20; 
            $config["num_links"] = 2;
            $config["uri_segment"] = 4;   
            
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
            $modulos ='productos'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            /// DATA
            $obj_products= $this->obj_products->search_data($params, $config["per_page"],$this->uri->segment(4));
      
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_products",$obj_products);
            $this->tmp_mastercms->set("pagination",$obj_pagination);
            $this->tmp_mastercms->render("dashboard/product/product_list");

    }
    
    public function load($menu_id=NULL){
        
        $obj_products = $this->obj_products->fields;         
        
        if ($menu_id != ""){
            /// PARAMETROS PARA EL SELECT 
            $where = "menu_id = $menu_id";
            $params = array(
                           "select" => "", 
                           "where" => $where);
            $obj_menu  = $this->obj_products->get_search_row($params);   
          }
            //$where_parent = "menus.menu_id in (1,2,34)";
            $params_parent = array(
                           "select" => "menu_id,parent_menu_id,tittle",
                           "where" => "");
            $obj_menu  = $this->obj_products->search($params_parent); 
        
        $modulos ='Menu'; 
        $seccion = 'Formulario';        
        $link_modulo =  site_url().'dashboard/'.$modulos; 
        
        $this->tmp_mastercms->set('link_modulo',$link_modulo);
        $this->tmp_mastercms->set('modulos',$modulos);
        $this->tmp_mastercms->set('seccion',$seccion);
        $this->tmp_mastercms->set("obj_menu",$obj_menu);
        $this->tmp_mastercms->set('obj_menu_parent',$obj_menu_parent);
        $this->tmp_mastercms->render("dashboard/product/product_form");    
    }
	
/*    public function upload_menu(){
		$month_banner = date("m");   
		$year_banner = date("Y");           

		
        $config                     =   array();
        $config['upload_path']      = './upload/banner/'.$year_banner.'/'.$month_banner;
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']         = '100';
        $config['max_width']        = '705';
        $config['max_height']       = '252';
        $config['encrypt_name']     =   TRUE; 
        
        $exist=FALSE;
        if(!is_dir($config['upload_path'])){
			if(!is_dir('./upload/banner/'.$year_banner)){							
				@mkdir('./upload/banner/'.$year_banner, 0777);
			}
            $exist=@mkdir($config['upload_path'], 0777);
        }else{
            $exist=TRUE;
        }    
				
        $nom_img ="";
		
        if($exist===TRUE){                                               
            $this->load->library('upload', $config);            
          if ($this->upload->do_upload('file_banner')){            
                $foto = $this->upload->data();
				
                $nom_img = 'upload/banner/'.$year_banner."/".$month_banner."/".$foto["file_name"];                       
            }      
        }       
        return $nom_img;
    }
	
*/	
    public function validate(){
        $menu_id = $this->input->post("menu_id");
		
		 $data = array(
                'parent_menu_id' => $this->input->post('parent_menu_id'),
                'tittle' => $this->input->post('tittle'),
                'url' => $this->input->post('url'),
                'position' => $this->input->post('position'),
                'status_value' => $this->input->post('status_value'),
                'created_at' => date("Y-m-d H:i:s"),
                'created_by' => $_SESSION['usercms']['user_id'],
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
            );          
		                         
            if ($menu_id != ""){
                $this->obj_menu->update($menu_id, $data);
            }else{
                $this->obj_menu->insert($data);                
            }
            redirect(site_url()."dashboard/menu");
    }


    public function addMenu(){
         if($this->input->is_ajax_request()){                      
                    
            $tittle = $this->input->post('tittle');
			$position = $this->input->post('position');
            $status=$this->input->post('status');
            
            if (isset($tittle) && strlen($tittle)>0){   
                 $data_tittle = array(
                    'tittle' => $tittle,
                    'status_value'  => $status,
					'position' => $position,
                    );
                         
                $obj_menu= $this->obj_menu->insert($data_menu);
               $data['message'] = "true";
                
            }else{
                $data['print'] = "Ingrese un valor correcto";
                $data['message'] = "false";
            }          
            
            echo json_encode($data);      
                 exit();
        }
    }
    
    public function getAllMenu(){
        if($this->input->is_ajax_request()){  
            
            $showmenu=$this->input->post('valmenu');
            $params = array(
                            "select" =>"",
                            "where" => "",
                            "order" => "url ASC"
                            );
            $obj_menu= $this->obj_menu->search($params);
            
            $data['message']="true";
            $cadena="";
            foreach ($obj_menu as $value) {
                if($value->status_value==1){$state='Activo';}else{$state='Inactivo';}
              $cadena=$cadena.'<tr><td><input type="checkbox" class="chkbck" /></td>
                  <td>'.$value->tittle.'</td>
                  <td>'.$state.'</td></tr>';
            }
            $data['print']=$cadena;
               
            echo json_encode($data);      
            exit();
        }
    }
    
        

    public function delete(){        
        $arr_url = $this->uri->uri_to_assoc(2);
        $pk_s = count($arr_url)==2?$arr_url["id"]:"";

        if ($pk_s != ""){
            $this->obj_s->delete($pk_s);
        }
        /*LLAMANDO A LA VISTA*/
       redirect(redirect_site("dashboard/e-marketing/s"));
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