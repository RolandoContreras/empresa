<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_products extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("product_model","obj_products");
        $this->load->model("categories_model","obj_categories");
//        $this->load->library('controller_basecms');
//        $this->controller_basecms->get_sesion();        
    }   
                
    public function index(){  
           $search_text     =  $this->input->post("search_text") != "" ? $this->input->post("search_text") : "";
           $params = array(
                        "select" =>"products.product_id,
                                    products.name as tittle,
                                    categories.name,
                                    products.description,
                                    products.custom_image,
                                    products.big_image,
                                    products.medium_image,
                                    products.small_image,
                                    products.price,
                                    products.stock,
                                    products.position,
                                    products.status_value ",
                         "where" => "products.name like '%$search_text%'",
                         "order" => "position DESC",
                         "join" => array('categories, products.id_category = categories.id_category')
            ); 
            /// PAGINADO
            $config=array();
            $config["base_url"] = site_url("dashboard/productos"); 
            $config["total_rows"] = $this->obj_products->total_records($params) ;  
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
            $modulos ='productos'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            /// DATA
            $obj_products= $this->obj_products->search_data($params, $config["per_page"],$this->uri->segment(3));
        
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_products",$obj_products);
            $this->tmp_mastercms->set("pagination",$obj_pagination);
            $this->tmp_mastercms->render("dashboard/product/product_list");

    }
    
    public function load($product_id=NULL){
        
        $obj_product = $this->obj_products->fields;         
        
        if ($product_id != ""){
            
            /// PARAMETROS PARA EL SELECT 
            $where = "product_id = $product_id";
            $params = array(
                           "select" => "", 
                           "where" => $where);
            $obj_product  = $this->obj_products->get_search_row($params);  
            $this->tmp_mastercms->set("obj_product",$obj_product);
          }
            //Select ccateory name
            $params = array("select" => "");
            $obj_category  = $this->obj_categories->search($params);   
            $this->tmp_mastercms->set("obj_category",$obj_category);
            
            $modulos ='productos'; 
            $seccion = 'Formulario';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->render("dashboard/product/product_form");    
    }
	
    public function validate(){
        
        $custom    = $this->upload_img("custom_image","1500","1500");
        $big    = $this->upload_img("big_image","1500","1500");
        $medium = $this->upload_img("medium_image","1500","1500"); 
        $small  = $this->upload_img("small_image","1500","1500");
        
        if($custom=="false"){
             $custom = $this->input->post('custom_image');
        }
        if($big=="false"){
             $big = $this->input->post('big_image');
        }
        if($medium=="false"){
             $medium = $this->input->post('medium_image');
        }
        if($small=="false"){
             $small = $this->input->post('small_image');
        }
        
        $product_id = $this->input->post("product_id");
        $data = array(
               'name' => $this->input->post('tittle'),
               'description' => $this->input->post('description'),
               'id_category' => $this->input->post('id_category'),
               'price' => $this->input->post('price'),
               'stock' => $this->input->post('stock'),
               'custom_image' => $custom,
               'big_image' => $big,
               'medium_image' => $medium,
               'small_image' => $small,
               'position' => $this->input->post('position'),
               'status_value' => $this->input->post('status_value'),
               'created_at' => date("Y-m-d H:i:s"),
//             'created_by' => $_SESSION['usercms']['user_id'],
               'updated_at' => date("Y-m-d H:i:s"),
//             'updated_by' => $_SESSION['usercms']['user_id']
        );          
        
            if ($product_id != ""){
                $this->obj_products->update($product_id, $data);
            }else{
                $this->obj_products->insert($data);                
            }
            redirect(site_url()."dashboard/productos");
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