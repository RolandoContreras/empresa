<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detail_contain extends CI_Controller {
        
    function __construct() {
        parent::__construct();
        $this->load->model("product_model","obj_products");
        $this->load->model("categories_model","obj_category");
    }
	
	public function index()
	{
            $ruta = explode("/",uri_string()); 
            $category = $ruta[0];
            $ruta = convert_query($ruta[1]);
                    
            //SELECT DETAIL PRODUCT
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
                                    products.price,
                                    categories.name as category,
                                    products.position",
                        "where" => "products.name like '%$ruta%'",
                        "order" => "products.product_id DESC LIMIT 1",
                        "join" => array('categories, products.id_category = categories.id_category')
                        );
           
            $obj_products['obj_products'] = $this->obj_products->get_search_row($params);
            $product_id = $obj_products['obj_products']->product_id;
             
            //SELECT CATEGORIES
            $param_category = array(
                        "select" =>"",
                        "where" => "status_value = 1",
                           );
           
             $obj_products['category'] = $this->obj_category->search($param_category);
             
             //SELECT CATEGORIES
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
                        "where" => "categories.name like '%$category%'and products.product_id <> $product_id",
                        "order" => "rand() LIMIT 3",
                        "join" => array('categories, products.id_category = categories.id_category')
                        );
           
             $obj_products['related'] = $this->obj_products->search($params);
             $this->load->view('detail_contain',$obj_products);
	}
}