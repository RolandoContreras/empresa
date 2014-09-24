<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
        
    function __construct() {
        parent::__construct();
        $this->load->model("product_model","obj_products");
        $this->load->model("categories_model","obj_category");
    }
	
	public function index()
	{
            //SELECT PRODUCT CUSTOM
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
                        "where" => "products.position = 2 and products.status_value = 1",
                        "order" => "products.product_id DESC LIMIT 3",
                        "join" => array('categories, products.id_category = categories.id_category')
                        );
           
             $obj_products['product_custom'] = $this->obj_products->search($params);
             
             //SELECT PRODUCT COMMUN
            $params_product = array(
                        "select" =>"products.product_id,
                                    products.id_category,
                                    products.name,
                                    products.description,
                                    products.custom_image,
                                    products.big_image,
                                    products.price,
                                    categories.name as category,
                                    products.position",
                        "where" => "products.status_value = 1 and position = 1",
                        "order" => "products.product_id DESC LIMIT 6",
                        "join" => array('categories, products.id_category = categories.id_category')
                        );
           
             $obj_products['data'] = $this->obj_products->search($params_product);
             
            //SELECT CATEGORIES
            $param_category = array(
                        "select" =>"",
                        "where" => "status_value = 1",
                           );
           
             $obj_products['category'] = $this->obj_category->search($param_category);
       
            /// VISTA
            $this->load->view('home',$obj_products);
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
                                    'product_id'      => $product_id,
                                    'name'    => $obj_products->name,
                                    'amount'     => 1,
                                    'price'   => 39.95,
//                                    'options' => array('Size' => 'L', 'Color' => 'Red')
                                 );
                        $this->cart->insert($data);
                        
                        
                        //SELECT PRODUCT TO ADD CAR
//                        $params = array(
//                                    "select" =>"products.id_category,
//                                                products.name,
//                                                products.description,
//                                                products.custom_image,
//                                                products.big_image,
//                                                products.price,
//                                                categories.name as category,
//                                                products.status_value,
//                                                products.position",
//                                    "where" => "products.product_id = $product_id and products.status_value = 1",
//                                    "join" => array('categories, products.id_category = categories.id_category')
//                                    );
//
//                        $obj_products = $this->obj_products->get_search_row($params);
//                        
//                        $data_product_session['product_id'] = $product_id;
//                        $data_product_session['name'] = $obj_products->name;
//                        $data_product_session['image'] = $obj_products->big_image;
//                        $data_product_session['price'] = $obj_products->price;
//                        $data_product_session['description'] = $obj_products->description;
//                        $data_product_session['logged_usercms'] = "TRUE";
//                        $data_product_session['status_value'] = $obj_products->status_value;
//                        $_SESSION['product_car'] = $data_product_session;                  
                        $dato['print'] = "Producto Agregado"; 
                    }else{
                        $dato['print'] = "Fuera de Stock"; 
                    }
                echo json_encode($dato);            
        exit();
            }
        }
}
