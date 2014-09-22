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
}
