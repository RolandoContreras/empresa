<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller {
    
     public function __construct() {
       parent::__construct();
       $this->load->model("product_model","obj_products");
       $this->load->model("categories_model","obj_category");
    }
   
    public function index()
    {               
        $params = array(
                        "select" =>"products.product_id,
                                    products.id_category,
                                    products.name,
                                    products.description,
                                    products.custom_image,
                                    products.big_image,
                                    products.price,
                                    categories.name as category,
                                    products.position",
                        "where" => "products.status_value = 1",
                        "order" => "products.product_id DESC",
                        "join" => array('categories, products.id_category = categories.id_category')
                        );
       
            /// DATA
        
         /// PAGINADO
            $config=array();
            $config["base_url"] = site_url("compras"); 
            $config["total_rows"] = $this->obj_products->total_records($params) ;  
            $config["per_page"] = 1; 
            $config["num_links"] = 3;
            $config["uri_segment"] = 2;   
            
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
            $obj_products['obj_products']= $this->obj_products->search_data($params, $config["per_page"],$this->uri->segment(2));
            
            //SELECT CATEGORIES
            $param_category = array(
                        "select" =>"",
                        "where" => "status_value = 1",
                           );
            $obj_products['category'] = $this->obj_category->search($param_category);
            
            $this->load->view('shop',$obj_products);
    }
    
    public function categories($slug)
    {   
        
         //SELECT PRODUCT BY CATEGORY
            $params = array(
                        "select" =>"products.product_id,
                                    products.id_category,
                                    products.name,
                                    products.description,
                                    products.custom_image,
                                    products.big_image,
                                    products.price,
                                    categories.name as category,
                                    products.position",
                        "where" => "categories.name = '$slug' and products.status_value = 1",
                        "order" => "products.product_id DESC",
                        "join" => array('categories, products.id_category = categories.id_category')
                        );
            
             /// PAGINADO
            $config=array();
            $config["base_url"] = site_url("$slug"); 
            $config["total_rows"] = $this->obj_products->total_records($params) ;  
            $config["per_page"] = 9; 
            $config["num_links"] = 3;
            $config["uri_segment"] = 2;   
            
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
            $obj_products['obj_products']= $this->obj_products->search_data($params, $config["per_page"],$this->uri->segment(2));
             
            //SELECT CATEGORIES
            $param_category = array(
                        "select" =>"",
                        "where" => "status_value = 1",
                           );
           
             $obj_products['category'] = $this->obj_category->search($param_category);
             $this->load->view('shop',$obj_products);
    }
}
