<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {
    
    public function __construct() {
       parent::__construct();
        $this->load->model("product_model","obj_products");
        $this->load->model("categories_model","obj_category");
        $this->load->model("categories_kind_model","obj_category_kind");
        $this->load->model("brand_model","obj_brand");
   }
   
    public function index()
	{
            $obj_products = $this->get_menu();
            $search = convert_slug($this->input->post("name"));
            
            if($search == ""){
                $ruta = explode("/",uri_string()); 
                $search = $ruta[1];
            }
            
            //SELECT PRODUCT BY SEARCH
            $params = array(
                        "select" =>"products.product_id,
                                    products.id_category,
                                    products.name,
                                    products.description,
                                    products.custom_image,
                                    products.big_image,
                                    products.medium_image,
                                    products.small_image,
                                    products.stock,
                                    products.tags,
                                    products.price,
                                    categories.name as category,
                                    products.position",
                        "where" => "MATCH(products.name) AGAINST ('$search') > 0",
                        "order" => "products.product_id DESC",
                        "join" => array('categories, products.id_category = categories.id_category')
                        );
            
            /// PAGINADO
            $config=array();
            $config["base_url"] = site_url("buscar/$search"); 
            $config["total_rows"] = $this->obj_products->total_records($params) ;  
            $config["per_page"] = 1; 
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
            $obj_products['obj_pagination'] = $this->pagination->create_links();
            $obj_products['obj_products']= $this->obj_products->search_data($params, $config["per_page"],$this->uri->segment(3));
            
            //SELECT CATEGORIES
            $param_category = array(
                        "select" =>"",
                        "where" => "status_value = 1",
                           );
           
            $obj_products['category'] = $this->obj_category->search($param_category);
            
            $this->load->view('search',$obj_products);
            
	}
    public function tags($tags=NULL){
        
        $obj_products = $this->get_menu();
        
        //SELECT PRODUCT BY TAGS
            $params = array(
                        "select" =>"products.product_id,
                                    products.id_category,
                                    products.name,
                                    products.description,
                                    products.custom_image,
                                    products.big_image,
                                    products.medium_image,
                                    products.small_image,
                                    products.stock,
                                    products.tags,
                                    products.price,
                                    categories.name as category,
                                    products.position",
                        "where" => "MATCH(products.tags) AGAINST ('$tags') > 0",
                        "order" => "products.product_id DESC",
                        "join" => array('categories, products.id_category = categories.id_category')
                        );
            
            /// PAGINADO
            $config=array();
            $config["base_url"] = site_url("tags/$tags"); 
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
            
            
            $obj_products['obj_pagination'] = $this->pagination->create_links();
            $obj_products['obj_products']= $this->obj_products->search_data($params, $config["per_page"],$this->uri->segment(3));
                       
            //SELECT CATEGORIES
            $param_category = array(
                        "select" =>"",
                        "where" => "status_value = 1",
                           );
           
            $obj_products['category'] = $this->obj_category->search($param_category);
            //VIEW
            $this->load->view('search',$obj_products);
        
        
        
    }    
        
    public function get_menu(){    
        
        //SELECT CATEGORIES
        $param_category = array(
                    "select" =>"",
                    "where" => "status_value = 1");
        $menu = $this->obj_category->search($param_category);
        
        foreach ($menu as $key =>$value){               
                 $submenu[] = $this->get_submenu($value->id_category);
                 
                        foreach ($submenu[$key] as $key => $value) {
                            $submenutwo[] = $this->get_submenu_two($value->id_category);
                        }
        }
        
        $data['menu'] = $menu;
        $data['submenu'] = $submenu;
        $data['submenutwo'] = $submenutwo;
        return $data;
    }
    
    public function get_submenu($id_category){
        
        $where="id_category ='$id_category' and status_value = 1";
        $params = array("select" =>"",
                              "where" =>$where,
                              "group" => "category_name" 
                            );
        $obj_submenu = $this->obj_category_kind->search($params); 
        return $obj_submenu;
    }
    
        public function get_submenu_two($id){
        
        $where="categories_kind.id_category ='$id' and brand.status_value = 1";
        $params = array("select" =>"brand.name,
                                    categories_kind.categories_kind_id",
                        "where" =>$where,
                        "group" => "name",
                        "join" => array('categories_kind, brand.categories_kind_id = categories_kind.categories_kind_id')
                            );
        $obj_submenutwo = $this->obj_brand->search($params); 
        return $obj_submenutwo;
    }
}
