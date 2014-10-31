<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller {
    
     public function __construct() {
       parent::__construct();
       $this->load->model("product_model","obj_products");
       $this->load->model("categories_model","obj_category");
       $this->load->model("categories_kind_model","obj_category_kind");
       $this->load->model("brand_model","obj_brand");
       $this->load->model("brand_categories_model","obj_brand_categories");
    }
   
    public function index()
    {     
        $obj_products = $this->get_menu();
        /// DATA
        $params = array(
                        "select" =>"products.product_id,
                                    products.name as name,
                                    products.sumilla,
                                    categories.name as category,
                                    products.description,
                                    products.custom_image,
                                    products.big_image,
                                    products.pay_sale,
                                    products.medium_image,
                                    products.small_image,
                                    products.price,
                                    brand.name as brand,
                                    products.stock,
                                    products.position,
                                    products.status_value ",
                         "where" => "products.status_value = 1",
                         "order" => "products.product_id DESC",
                         "join" => array('categories, products.id_category = categories.id_category',
                                         'categories_kind, categories_kind.product_id = products.product_id',
                                         'brand_categories, brand_categories.categories_kind_id = categories_kind.categories_kind_id',
                                         'brand, brand.brand_id = brand_categories.brand_id')
            );
        
        
        
         /// PAGINADO
            $config=array();
            $config["base_url"] = site_url("compras"); 
            $config["total_rows"] = $this->obj_products->total_records($params) ;  
            $config["per_page"] = 9; 
            $config["num_links"] = 2;
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
            
            $obj_products['title'] = "Compras | Productos | Bienvenido a Nuestra Tienda Virtual";
            $obj_products['meta_keywords'] = "Productos,Marketing Multinivel, Zapatillas, Calzados, Moda, Ropa, Limpieza, Negocio, Oportunidad";
            $obj_products['meta_description'] = "Compra Online tu TV, laptops, muebles, zapatillas, colchones, regalos y más. Selecciona tus productos nuevos por Internet y solicita su despacho a todo Perú. Waveline, un líder global en la moda, la belleza y la oportunidad de negocio excepcional para los Empresarios Independientes. Más información sobre Waveline hoy.";
           
            //SELECT CATEGORIES
            $param_category = array(
                        "select" =>"",
                        "where" => "status_value = 1",
                           );
            $obj_products['category'] = $this->obj_category->search($param_category);
            
            $this->load->view('shop',$obj_products);
    }
    
    public function categories($slug){  
            $obj_products = $this->get_menu();
            //SELECT PRODUCT BY CATEGORY
            $params = array(
                        "select" =>"products.product_id,
                                    products.name as name,
                                    products.sumilla,
                                    categories.name as category,
                                    products.description,
                                    products.custom_image,
                                    products.big_image,
                                    products.medium_image,
                                    products.small_image,
                                    products.price,
                                    products.pay_sale,
                                    brand.name as brand,
                                    products.stock,
                                    products.position,
                                    products.status_value ",
                         "where" => "categories.name = '$slug' and products.status_value = 1",
                         "order" => "products.product_id DESC",
                         "join" => array('categories, products.id_category = categories.id_category',
                                         'categories_kind, categories_kind.product_id = products.product_id',
                                         'brand_categories, brand_categories.categories_kind_id = categories_kind.categories_kind_id',
                                         'brand, brand.brand_id = brand_categories.brand_id')
            );
            
            
            
             /// PAGINADO
            $config=array();
            $config["base_url"] = site_url("$slug"); 
            $config["total_rows"] = $this->obj_products->total_records($params) ;  
            $config["per_page"] = 9; 
            $config["num_links"] = 2;
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
            
            
            $slug = ucfirst($slug);
            $obj_products['title'] = "Compras | $slug | Bienvenido a Nuestra Tienda Virtual";
            $obj_products['meta_keywords'] = "$slug,Marketing Multinivel, Zapatillas, Calzados, Moda, Ropa, Limpieza, Negocio, Oportunidad";
            $obj_products['meta_description'] = "Compra Online tu TV, laptops, muebles, zapatillas, colchones, regalos y más. Selecciona tus productos nuevos por Internet y solicita su despacho a todo Perú. Waveline, un líder global en la moda, la belleza y la oportunidad de negocio excepcional para los Empresarios Independientes. Más información sobre Waveline hoy.";
            
            //SELECT CATEGORIES
            $param_category = array(
                        "select" =>"",
                        "where" => "status_value = 1",
                           );
           
             $obj_products['category'] = $this->obj_category->search($param_category);
             $this->load->view('shop',$obj_products);
    }
    
    public function by_price(){  
           $obj_products = $this->get_menu();
           
           $min_price = $this->input->post("min_price");
           $max_price = $this->input->post("max_price");
            
            //SELECT PRODUCT BY CATEGORY
            $params = array(
                        "select" =>"products.product_id,
                                    products.name as name,
                                    products.sumilla,
                                    categories.name as category,
                                    products.description,
                                    products.custom_image,
                                    products.big_image,
                                    products.medium_image,
                                    products.small_image,
                                    products.price,
                                    products.pay_sale,
                                    brand.name as brand,
                                    products.stock,
                                    products.position,
                                    products.status_value ",
                         "where" => "products.status_value = 1 and products.price between $min_price and $max_price ",
                         "order" => "products.product_id DESC",
                         "join" => array('categories, products.id_category = categories.id_category',
                                         'categories_kind, categories_kind.product_id = products.product_id',
                                         'brand_categories, brand_categories.categories_kind_id = categories_kind.categories_kind_id',
                                         'brand, brand.brand_id = brand_categories.brand_id')
            );
            
             /// PAGINADO
            $config=array();
            $config["base_url"] = site_url("compras/porprecio"); 
            $config["total_rows"] = $this->obj_products->total_records($params) ;  
            $config["per_page"] = 21; 
            $config["num_links"] = 2;
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
            
            
           // $slug = ucfirst($slug);
            $obj_products['title'] = "Compras | Por Precio | Bienvenido a Nuestra Tienda Virtual";
            $obj_products['meta_keywords'] = "Precio,Marketing Multinivel, Zapatillas, Calzados, Moda, Ropa, Limpieza, Negocio, Oportunidad";
            $obj_products['meta_description'] = "Compra Online tu TV, laptops, muebles, zapatillas, colchones, regalos y más. Selecciona tus productos nuevos por Internet y solicita su despacho a todo Perú. Waveline, un líder global en la moda, la belleza y la oportunidad de negocio excepcional para los Empresarios Independientes. Más información sobre Waveline hoy.";
            
            //SELECT CATEGORIES
            $param_category = array(
                        "select" =>"",
                        "where" => "status_value = 1",
                           );
           
             $obj_products['category'] = $this->obj_category->search($param_category);
             $this->load->view('shop',$obj_products);
    }
    
    public function by_gender($slug){
            $obj_products = $this->get_menu();
            $ruta = explode("/",uri_string()); 
            $gender = $ruta[0];
            
            //SELECT PRODUCT BY CATEGORY
            
            $params = array(
                        "select" =>"products.product_id,
                                    products.name as name,
                                    products.sumilla,
                                    categories.name as category,
                                    products.description,
                                    products.custom_image,
                                    products.big_image,
                                    products.medium_image,
                                    products.small_image,
                                    products.price,
                                    products.pay_sale,
                                    brand.name as brand,
                                    products.stock,
                                    products.position,
                                    products.status_value ",
                         "where" => "categories.name = '$slug' and products.status_value = 1 and categories_kind.category_name = '$gender'",
                         "order" => "products.product_id DESC",
                         "join" => array('categories, products.id_category = categories.id_category',
                                         'categories_kind, categories_kind.product_id = products.product_id',
                                         'brand_categories, brand_categories.categories_kind_id = categories_kind.categories_kind_id',
                                         'brand, brand.brand_id = brand_categories.brand_id')
            );
            
             /// PAGINADO
            $config=array();
            $config["base_url"] = site_url("$gender/$slug"); 
            $config["total_rows"] = $this->obj_products->total_records($params) ;  
            $config["per_page"] = 9; 
            $config["num_links"] = 2;
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
            $obj_products['obj_products'] = $this->obj_products->search_data($params, $config["per_page"],$this->uri->segment(3));
             
            //SELECT CATEGORIES
            $param_category = array(
                        "select" =>"",
                        "where" => "status_value = 1",
                           );
           
            $slug = ucfirst($slug);
            $gender = ucfirst($gender);
            $obj_products['title'] = "Compras | $gender | $slug | Bienvenido a Nuestra Tienda Virtual";
            $obj_products['meta_keywords'] = "$slug,Marketing Multinivel, Zapatillas, Calzados, Moda, Ropa, Limpieza, Negocio, Oportunidad";
            $obj_products['meta_description'] = "Compra Online tu TV, laptops, muebles, zapatillas, colchones, regalos y más. Selecciona tus productos nuevos por Internet y solicita su despacho a todo Perú. Waveline, un líder global en la moda, la belleza y la oportunidad de negocio excepcional para los Empresarios Independientes. Más información sobre Waveline hoy.";
            
            $obj_products['category'] = $this->obj_category->search($param_category);
            $this->load->view('shop',$obj_products);
    }
    
    public function by_brand($slug){
            $obj_products = $this->get_menu();
            $ruta = explode("/",uri_string()); 
            $gender = $ruta[0];
            $brand = $ruta[2];
            
            //SELECT PRODUCT BY CATEGORY
            
           $params = array(
                        "select" =>"products.product_id,
                                    products.name as name,
                                    products.sumilla,
                                    categories.name as category,
                                    products.description,
                                    products.custom_image,
                                    products.big_image,
                                    products.medium_image,
                                    products.small_image,
                                    products.price,
                                    brand.name as brand,
                                    products.stock,
                                    products.pay_sale,
                                    products.position,
                                    products.status_value ",
                         "where" => "categories.name = '$slug' and products.status_value = 1 and categories_kind.category_name = '$gender' and brand.name = '$brand'",
                         "order" => "products.product_id DESC",
                         "join" => array('categories, products.id_category = categories.id_category',
                                         'categories_kind, categories_kind.product_id = products.product_id',
                                         'brand_categories, brand_categories.categories_kind_id = categories_kind.categories_kind_id',
                                         'brand, brand.brand_id = brand_categories.brand_id')
            );
            
            
             /// PAGINADO
            $config=array();
            $config["base_url"] = site_url("$gender/$slug"); 
            $config["total_rows"] = $this->obj_products->total_records($params) ;  
            $config["per_page"] = 9; 
            $config["num_links"] = 2;
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
            $obj_products['obj_products'] = $this->obj_products->search_data($params, $config["per_page"],$this->uri->segment(3));
            
            //SELECT CATEGORIES
            $param_category = array(
                        "select" =>"",
                        "where" => "status_value = 1",
                           );
           
             $obj_products['category'] = $this->obj_category->search($param_category);
             $this->load->view('shop',$obj_products);
            
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
                            $submenutwo[] = $this->get_submenu_two($value->categories_kind_id);
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
            
        $where="brand_categories.categories_kind_id ='$id' and brand.status_value = 1";
        $params = array("select" =>"brand.name,
                                    brand_categories.categories_kind_id",
                        "where" =>$where,
                        "group" => "name",
                        "join" => array('brand, brand_categories.brand_id = brand.brand_id')
                        );
        $obj_submenutwo = $this->obj_brand_categories->search($params); 
        return $obj_submenutwo;
    }
}
