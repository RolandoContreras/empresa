<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
        
    function __construct() {
        parent::__construct();
        $this->load->model("product_model","obj_products");
    }
	
	public function index()
	{
            $this->load->model("product_model","obj_products");
            $params = array(
                        "select" =>"",
                        "where" => "status_value = 1",
                        "order" => "product_id DESC"
                        );
           
             $obj_products['data'] = $this->obj_products->search($params);
             
            /// VISTA
            $this->load->view('home',$obj_products);
	}
}
