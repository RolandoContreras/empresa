<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_comission extends CI_Controller {

	
    function __construct() {
        parent::__construct();
//        $this->load->model("product_model","obj_product");
    }
    
    public function index()
    {
        
        /// VISTA
            $this->tmp_backoffice->render("backoffice/comission");
    }
}
