<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
        
    function __construct() {
        parent::__construct();
        $this->load->model("product_model","obj_products");
        $this->load->model("categories_model","obj_category");
    }
	
	public function index()
	{
            //SELECT PRODUCT COMMUN
            $params = array(
                        "select" =>"",
                        "where" => "position = 2 and status_value = 1",
                        "order" => "status_value DESC LIMIT 3"
                        );
           
             $obj_products['product_custom'] = $this->obj_products->search($params);
             
             //SELECT PRODUCT COMMUN
            $params_product = array(
                        "select" =>"",
                        "where" => "status_value = 1 and position = 1",
                        "order" => "status_value DESC LIMIT 6"
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
