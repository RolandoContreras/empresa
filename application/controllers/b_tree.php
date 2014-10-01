<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_tree extends CI_Controller {

	
    function __construct() {
        parent::__construct();
//        $this->load->model("product_model","obj_product");
    }
    
    public function index(){
        $this->get_session();
        /// VISTA
        $this->tmp_backoffice->render("backoffice/tree");
    }
    
    public function get_session(){          
        if (isset($_SESSION['customer'])){
            if($_SESSION['customer']['logged_customer']=="TRUE" && $_SESSION['customer']['status']==1){               
                return true;
            }else{
                redirect(site_url().'backoffice');
            }
        }else{
            redirect(site_url().'backoffice');
        }
    }
}
