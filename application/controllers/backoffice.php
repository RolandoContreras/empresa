<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backoffice extends CI_Controller {

	
    function __construct() {
        parent::__construct();
//        $this->load->model("product_model","obj_product");
    }
    
    public function index()
    {
             $this->load->view('backoffice/backoffice');
    }
}
