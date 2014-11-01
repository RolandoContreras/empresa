<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
        
    function __construct() {
        parent::__construct();
        $this->load->model("product_model","obj_products");
        $this->load->model("categories_model","obj_category");
        $this->load->model("categories_kind_model","obj_category_kind");
        $this->load->model("brand_categories_model","obj_brand_categories");
    }
	
	public function index()
	{
            $obj_products = $this->get_menu();
            //SELECT PRODUCT CUSTOM
            
            $category_param = $this->category_param();
            $obj_category = $this->obj_category->search($category_param);  
            $obj_products['obj_category'] = $obj_category;
            $params = array(
                        "select" =>"products.product_id,
                                    products.name as name,
                                    categories.name as category,
                                    products.description,
                                    products.sumilla,
                                    products.custom_image,
                                    products.big_image,
                                    products.medium_image,
                                    products.small_image,
                                    products.price,
                                    brand.name as brand,
                                    products.stock,
                                    products.position,
                                    products.status_value ",
                         "where" => "products.position = 2 and products.status_value = 1",
                         "order" => "products.product_id DESC LIMIT 4",
                         "join" => array('categories, products.id_category = categories.id_category',
                                         'categories_kind, categories_kind.product_id = products.product_id',
                                         'brand_categories, brand_categories.categories_kind_id = categories_kind.categories_kind_id',
                                         'brand, brand.brand_id = brand_categories.brand_id')
            ); 
            
            $obj_products['product_custom'] = $this->obj_products->search($params);
            
            //SELECT PRODUCT COMMUN
            
            foreach ($obj_category as $key => $value) {
                if($key==0){
                    $product_param = $this->product_param($value->name);
                    $obj_products['zapatillas'] = $this->obj_products->search($product_param);
                }elseif($key==1){
                    $product_param = $this->product_param($value->name);
                    $obj_products['ropa'] = $this->obj_products->search($product_param);
                }elseif($key==2){
                    $product_param = $this->product_param($value->name);
                    $obj_products['limpieza'] = $this->obj_products->search($product_param);
                   }
               elseif($key==3){
                $product_param = $this->product_param($value->name);
                $obj_products['belleza'] = $this->obj_products->search($product_param);
               }
            }
             
            //SELECT CATEGORIES MEN
//            $param_category = array(
//                        "select" =>"",
//                        "where" => "categories_kind.category_name like '%hombre%' and categories.status_value = 1",
//                        "join" => array('categories_kind, categories_kind.id_category = categories.id_category')
//                           );
//           
//             $obj_products['men'] = $this->obj_category->search($param_category);
             
             //SELECT CATEGORIES MEN
//            $param_category = array(
//                        "select" =>"",
//                        "where" => "categories_kind.category_name like '%mujer%' and categories.status_value = 1",
//                        "join" => array('categories_kind, categories_kind.id_category = categories.id_category')
//                           );
//           
//             $obj_products['women'] = $this->obj_category->search($param_category);
             
             //SELECT CATEGORIES KINDS
//            $param_category = array(
//                        "select" =>"",
//                        "where" => "categories_kind.category_name like '%kids%' and categories.status_value = 1",
//                        "join" => array('categories_kind, categories_kind.id_category = categories.id_category')
//                           );
//           
//             $obj_products['kids'] = $this->obj_category->search($param_category);
             
             //SELECT CATEGORIES
            $param_category = array(
                        "select" =>"",
                        "where" => "status_value = 1",
                           );
           
            $obj_products['category'] = $this->obj_category->search($param_category);
            
            //SEO
            $obj_products['title'] = "Home | Bienvenido a Nuestra Tienda Virtual";
            $obj_products['meta_keywords'] = "Marketing Multinivel, Zapatillas, Calzados, Moda, Ropa, Limpieza, Negocio, Oportunidad";
            $obj_products['meta_description'] = "Compra Online tu TV, laptops, muebles, zapatillas, colchones, regalos y más. Selecciona tus productos nuevos por Internet y solicita su despacho a todo Perú. Waveline, un líder global en la moda, la belleza y la oportunidad de negocio excepcional para los Empresarios Independientes. Más información sobre Waveline hoy.";
             
            /// VISTA
            $this->load->view('home',$obj_products);
	}
        public function category_param(){
            //SELECT CATEGORY
            $params_product = array(
                        "select" =>"",
                         "where" => "status_value = 1",
                         "order" => "categories.id_category ASC ",
                        );
        return $params_product;
        }
        
        public function product_param($name){
            //SELECT CATEGORY
            $params_product = array(
                        "select" =>"products.product_id,
                                    products.name as name,
                                    categories.name as category,
                                    products.sumilla,
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
                         "where" => "products.status_value = 1 and categories.name = '$name'",
                         "order" => "rand() LIMIT 4",
                         "join" => array('categories, products.id_category = categories.id_category',
                                         'categories_kind, categories_kind.product_id = products.product_id',
                                         'brand_categories, brand_categories.categories_kind_id = categories_kind.categories_kind_id',
                                         'brand, brand.brand_id = brand_categories.brand_id')
            );
        return $params_product;
        }
        
        public function add_car(){
            if($this->input->is_ajax_request()){   
                $product_id = $this->input->post("product_id");
                    
                    if (count($product_id) > 0){
                        //SELECT PRODUCT TO ADD CAR
                        $params = array(
                                    "select" =>"products.id_category,
                                                products.name,
                                                products.description,
                                                products.custom_image,
                                                products.big_image,
                                                products.price,
                                                categories.name as category,
                                                products.status_value,
                                                products.position",
                                    "where" => "products.product_id = $product_id and products.status_value = 1",
                                    "join" => array('categories, products.id_category = categories.id_category')
                                    );

                        $obj_products = $this->obj_products->get_search_row($params);
                        $data = array(
                                    'id'        => $product_id,
                                    'qty'       => 1,
                                    'price'     => $obj_products->price,
                                    'name'      => $obj_products->name,
                                    'big_image' => $obj_products->big_image,
//                                    'options' => array('Size' => 'L', 'Color' => 'Red')
                                 );
                        $this->cart->insert($data);
                        $dato['print'] = "Producto Agregado"; 
                    }else{
                        $dato['print'] = "Fuera de Stock"; 
                    }
                echo json_encode($dato);            
        exit();
            }else{
                $product_id = $this->input->post('product_id');
                $qty        = $this->input->post('quantity');
                $size        = $this->input->post('size');
                
                $params = array(
                                    "select" =>"products.product_id,
                                                products.id_category,
                                                products.name,
                                                products.description,
                                                products.custom_image,
                                                products.big_image,
                                                products.price,
                                                categories.name as category,
                                                products.status_value,
                                                products.position",
                                    "where" => "products.product_id = $product_id",
                                    "join" => array('categories, products.id_category = categories.id_category')
                                    );

                        $obj_products = $this->obj_products->get_search_row($params);
                        
                        $data = array(
                                    'id'         =>     $obj_products->product_id,
                                    'qty'        =>     $qty,
                                    'price'      =>     $obj_products->price,
                                    'name'       =>     $obj_products->name,
                                    'big_image'  =>     $obj_products->big_image,
                                    'options'    => array('Size' => "$size")
//                                   'options' => array('Size' => '$size', 'Color' => 'Red')
                                 );
                        $this->cart->insert($data);
                        redirect('checkout');
            }
        }
        
        public function empty_car(){
        if($this->input->is_ajax_request()){ 
                $this->cart->destroy();
                $data['print'] = "Success"; 
                echo json_encode($data); 
             }
        }
        
        
        public function delete_car(){
            if($this->input->is_ajax_request()){ 
                    $row_id = $this->input->post('row_id');
                    $data = array(
                         'rowid' => $row_id,
                         'qty' => 0
                     );
                    $this->cart->update($data);
                    $data['print'] = "Error"; 
                    echo json_encode($data); 
             }
          exit();
        }
        
        public function update_car(){
            if($this->input->is_ajax_request()){ 
                $row_id = $this->input->post('row_id');
                $qty = $this->input->post('qty');
                $data = array(
                     'rowid' => $row_id,
                     'qty' => $qty
                 );
                $this->cart->update($data);
                }
          exit();
        }
        
        public function get_menu(){    
        
        //SELECT CATEGORIES
        $param_category = array(
                    "select" =>"",
                    "where" => "status_value = 1");
        $menu = $this->obj_category->search($param_category);
        
        foreach ($menu as $key =>$value){               
                 $submenu[] = $this->get_submenu($value->id_category);
                        
                        foreach ($submenu[$key] as $value_submenu) {
                            $submenutwo[] = $this->get_submenu_two($value_submenu->id_category,$value_submenu->category_name);
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
    
        public function get_submenu_two($id,$category_name){
        
        $where="brand_categories.id_category ='$id' and brand.status_value = 1 and categories_kind.category_name = '$category_name'";
        $params = array("select" =>"brand.name,
                                    categories_kind.category_name,
                                    brand_categories.categories_kind_id",
                        "where" =>$where,
                        "group" => "brand.name",
                        "join" => array('brand, brand_categories.brand_id = brand.brand_id',
                                        'categories_kind, brand_categories.categories_kind_id = categories_kind.categories_kind_id')
                        );
        $obj_submenutwo = $this->obj_brand_categories->search($params); 
        return $obj_submenutwo;
    }
}
