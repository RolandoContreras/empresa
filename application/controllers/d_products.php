<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_products extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("product_model","obj_products");
        $this->load->model("brand_categories_model","obj_brand_category");
        $this->load->model("categories_kind_model","obj_categories_kind");
        $this->load->model("tags_model","obj_tags");
        $this->load->model("brand_model","obj_brand");
        $this->load->model("categories_model","obj_categories");
    }   
                
    public function index(){
        
           $this->get_session();
           $params = array(
                        "select" =>"products.product_id,
                                    products.name as tittle,
                                    products.code,
                                    categories.name,
                                    products.description,
                                    products.custom_image,
                                    products.big_image,
                                    products.medium_image,
                                    products.small_image,
                                    products.price,
                                    brand.name as brand,
                                    products.stock,
                                    products.position,
                                    products.status_value ",
                         "order" => "product_id DESC",
                         "join" => array('categories, products.id_category = categories.id_category',
                                         'categories_kind, categories_kind.product_id = products.product_id',
                                         'brand_categories, brand_categories.categories_kind_id = categories_kind.categories_kind_id',
                                         'brand, brand.brand_id = brand_categories.brand_id')
            ); 
            
            $modulos ='productos'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 
            /// DATA
            $obj_products= $this->obj_products->search($params);
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_products",$obj_products);
            $this->tmp_mastercms->render("dashboard/product/product_list");

    }
    
    public function load($product_id=NULL){
        
        $obj_product = $this->obj_products->fields;         
        
        if ($product_id != ""){
            
            /// PARAMETROS PARA EL SELECT 
            $where = "products.product_id = $product_id";
            $params = array(
                        "select" =>"products.product_id,
                                    products.name,
                                    products.id_category,
                                    products.code,
                                    products.sumilla,
                                    products.description,
                                    products.custom_image, 
                                    categories_kind.categories_kind_id,  
                                    brand_categories.brand_categories_id,
                                    categories_kind.category_name,
                                    products.tags,
                                    products.big_image,
                                    products.pay_sale,
                                    products.medium_image,
                                    products.small_image,
                                    products.price,
                                    brand.brand_id,
                                    products.stock,
                                    products.position,
                                    products.status_value ",
                         "where" => $where,
                         "order" => "position DESC",
                         "join" => array('categories, products.id_category = categories.id_category',
                                         'categories_kind, categories_kind.product_id = products.product_id',
                                         'brand_categories, brand_categories.categories_kind_id = categories_kind.categories_kind_id',
                                         'brand, brand.brand_id = brand_categories.brand_id')
            ); 
            $obj_product  = $this->obj_products->get_search_row($params); 
            $this->tmp_mastercms->set("obj_product",$obj_product);
          }
            //Select ccateory name
            $params = array("select" => "");
            $obj_category  = $this->obj_categories->search($params);   
            $this->tmp_mastercms->set("obj_category",$obj_category);
            
            //Select brand
            $params = array("select" => "");
            $obj_brand  = $this->obj_brand->search($params);   
            $this->tmp_mastercms->set("obj_brand",$obj_brand);
            
            //Select tag
            $params = array("select" => "");
            $obj_tags  = $this->obj_tags->search($params);   
            $this->tmp_mastercms->set("obj_tags",$obj_tags);  
            
            $modulos ='productos'; 
            $seccion = 'Formulario';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->render("dashboard/product/product_form");    
    }
	
    public function validate(){
        
        $custom = $this->upload_img("custom_image","1500","1500");
        $big    = $this->upload_img("big_image","1500","1500");
        $medium = $this->upload_img("medium_image","1500","1500"); 
        $small  = $this->upload_img("small_image","1500","1500");
        
        if ($custom != "false") {
                if ($this->input->post('custom_image') != "") {
                    $this->delete_img($this->input->post('custom_image'));
                }
            } else {
                $custom = $this->input->post('custom_image');
            }
        
        
        if ($big != "false") {
                if ($this->input->post('big_image') != "") {
                    $this->delete_img($this->input->post('big_image'));
                }
            } else {
                $big = $this->input->post('big_img');
            }
        
        if ($medium != "false") {
                if ($this->input->post('medium_image') != "") {
                    $this->delete_img($this->input->post('medium_image'));
                }
            } else {
                $medium = $this->input->post('medium_image');
            }
        
        if ($small != "false") {
                if ($this->input->post('small_image') != "") {
                    $this->delete_img($this->input->post('small_image'));
                }
            } else {
                $small = $this->input->post('small_image');
            }
        
        $product_id = $this->input->post("product_id");
        $category_kind_id = $this->input->post("categories_kind_id");
        $brand_categories_id = $this->input->post("brand_categories_id");
        
        $data = array(
               'name' => $this->input->post('tittle'),
               'code' => $this->input->post('code'),
               'description' => $this->input->post('description'),
               'sumilla' => $this->input->post('sumilla'),
               'id_category' => $this->input->post('id_category'),
               'price' => $this->input->post('price'),  
               'pay_sale' => $this->input->post('pay_sale'),  
               'stock' => $this->input->post('stock'),
               'tags' => $this->input->post('tag'),
               'custom_image' => $custom,
               'big_image' => $big,
               'medium_image' => $medium,
               'small_image' => $small,
               'position' => $this->input->post('position'),
               'status_value' => $this->input->post('status_value'),
               'created_at' => date("Y-m-d H:i:s"),
               'created_by' => $_SESSION['usercms']['user_id'],
               'updated_at' => date("Y-m-d H:i:s"),
               'updated_by' => $_SESSION['usercms']['user_id']
                );          
        
            if ($product_id != ""){
               $this->obj_products->update($product_id, $data);
            }else{
               $product_id = $this->obj_products->insert($data);                
            }
            
            $data = array(
               'id_category' => $this->input->post('id_category'),
               'product_id'  => $product_id,
               'category_name'  => $this->input->post('gender'),
               'status_value' => $this->input->post('status_value'),
               'created_at' => date("Y-m-d H:i:s"),
               'created_by' => $_SESSION['usercms']['user_id'],
               'updated_at' => date("Y-m-d H:i:s"),
               'updated_by' => $_SESSION['usercms']['user_id']
            );  
            if ($category_kind_id != ""){
               $this->obj_categories_kind->update($category_kind_id, $data);
            }else{
               $category_kind_id = $this->obj_categories_kind->insert($data);                
            }
            
            
            $data = array(
               'categories_kind_id' => $category_kind_id,
               'brand_id'    => $this->input->post('brand'),
               'id_category'    => $this->input->post('id_category'),
               'status_value' => $this->input->post('status_value'),
               'created_at' => date("Y-m-d H:i:s"),
               'created_by' => $_SESSION['usercms']['user_id'],
               'updated_at' => date("Y-m-d H:i:s"),
               'updated_by' => $_SESSION['usercms']['user_id']
            );  
            if ($brand_categories_id != ""){
               $this->obj_brand_category->update($brand_categories_id, $data);
            }else{
               $brand_categories_id = $this->obj_brand_category->insert($data);      
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
        $config['max_size']         = '3000';
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
        $config['hostname'] = 'wavelinetwork.com';
        $config['username'] = 'ftp.waveline';
        $config['password'] = 'Erb1u?14';
        $config['debug'] = false;
        $this->ftp->connect($config);
        $this->ftp->delete_file($imagen);
    }
    
    public function ftp($imagen) {
        $this->load->library('ftp');
        $config['hostname'] = 'wavelinetwork.com';
        $config['username'] = 'ftp.waveline';
        $config['password'] = 'Erb1u?14';
        $config['debug'] = TRUE;
        $destino = $imagen;

        $this->ftp->upload(SERVER2 . $imagen, $destino, 'auto', '0777');
        $this->ftp->close();
        //unlink(SERVER2 . $imagen);
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