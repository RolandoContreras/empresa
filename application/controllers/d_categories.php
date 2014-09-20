<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_categories extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
          $this->load->model("categories_model","obj_categories");
//        $this->load->library('controller_basecms');
//        $this->controller_basecms->get_sesion();        
    }   
                
    public function index(){  
           $search_text     =  $this->input->post("search_text") != "" ? $this->input->post("search_text") : "";
           
           $params = array(
                        "select" =>"id_category,
                                    name,
                                    observation,
                                    status_value",
                         "where" => "name like '%$search_text%'",
                         "order" => "id_category DESC",
            );
      
            /// PAGINADO
            $config=array();
            $config["base_url"] = site_url("dashboard/categories/index"); 
            $config["total_rows"] = $this->obj_categories->total_records($params) ;  
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
            $obj_categories= $this->obj_categories->search_data($params, $config["per_page"],$this->uri->segment(4));
                
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_categories",$obj_categories);
            $this->tmp_mastercms->set("pagination",$obj_pagination);
            $this->tmp_mastercms->render("dashboard/categories/categories_list");

    }
    
    public function load($id_category=NULL){
        
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
        $id_category = $this->input->post("id_category");
        $data = array(
               'name' => $this->input->post('name'),
               'observation' => $this->input->post('observation'),
               'status_value' => $this->input->post('status_value'),
               'created_at' => date("Y-m-d H:i:s"),
//             'created_by' => $_SESSION['usercms']['user_id'],
               'updated_at' => date("Y-m-d H:i:s"),
//             'updated_by' => $_SESSION['usercms']['user_id']
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
            $product_id = $this->input->post("product_id");
            if (count($product_id) > 0){
                $this->obj_products->delete($product_id);
                $dato['print'] = "El producto ha sido eliminado"; 
            }
            $dato['print'] = "Error"; 
            echo json_encode($dato);            
        exit();
            }
    }
    
    public function upload_img($img,$width,$height ){
        $config                     =   array();
        $config['upload_path']      = './upload/temporal/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']         = '2000';
        $config['max_width']        = $width;
        $config['max_height']       = $height;        
        $config['file_name'] = substr(md5(time()), 0, 16);
        $this->load->library('upload', $config);          
        $nom_img ="";
        if ($this->upload->do_upload($img)){            
            $product = array('upload_data' => $this->upload->data());
            $nom_img = $product['upload_data']['file_name'];            
        }else{
            $nom_img = "false";
        }          
        return $nom_img ;
    }  
    
//    public function ftp_movie($anio,$mes,$dia,$imagen){
//        $this->load->library('ftp');
//        $config['hostname'] = 'server1.flatina.com';
//        $config['username'] = 'flvideos';
//        $config['password'] = 'FlbQ81Gd99';
//        $config['debug'] = false;
//        $this->ftp->connect($config);
//        $this->ftp->mkdir('/videos/peliculas/', 0777);
//        $this->ftp->mkdir('/videos/peliculas/'.$anio.'/', 0777);
//        $this->ftp->mkdir('/videos/peliculas/'.$anio.'/'.$mes.'/', 0777);
//        $this->ftp->mkdir('/videos/peliculas/'.$anio.'/'.$mes.'/'.$dia.'/', 0777);
//        $destino = '/videos/peliculas/'.$anio.'/'.$mes.'/'.$dia.'/'.$imagen;        
//        $this->ftp->upload(SERVER2.$imagen, $destino,'auto');
//        $this->ftp->close();
//        unlink(SERVER2.$imagen);
//    }
    
     public function delete_img($imagen) {
        $this->load->library('ftp');
        $config['hostname'] = 'localhost';
        $config['username'] = '';
        $config['password'] = '';
        $config['debug'] = false;
        $this->ftp->connect($config);
        $this->ftp->delete_file($imagen);
    }
}
?>