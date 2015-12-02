<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_upgrade extends CI_Controller {

	
    function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
    }
    
    public function index(){
        $this->get_session();
                
        $customer_id = $_SESSION['customer']['customer_id'];
        //SELECT CUSTOMER_ID
        $params = array(
                        "select" =>"franchise_id",
                        "where" => "customer_id = $customer_id"
                        ); 
        $obj_profile = $this->obj_customer->get_search_row($params);
        $this->tmp_backoffice->set("obj_profile",$obj_profile);
        $this->tmp_backoffice->render("backoffice/upgrade");
    }
    
    public function get_session(){          
        if (isset($_SESSION['customer'])){
            if($_SESSION['customer']['logged_customer']=="TRUE" && $_SESSION['customer']['status']<=2){               
                return true;
            }else{
                redirect(site_url().'backoffice');
            }
        }else{
            redirect(site_url().'backoffice');
        }
    }
}