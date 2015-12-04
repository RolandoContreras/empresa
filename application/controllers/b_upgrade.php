<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_upgrade extends CI_Controller {

	
    function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("franchise_model","obj_franchise");
    }
    
    public function index(){
        $this->get_session();
                
        $customer_id = $_SESSION['customer']['customer_id'];
        $franchise_id = $_SESSION['customer']['franchise_id'];
        //SELECT CUSTOMER_ID
        $params = array(
                        "select" =>"franchise_id,name",
                        "where" => "franchise.franchise_id > '$franchise_id'" ,
                         ); 
        $obj_upgrade = $this->obj_franchise->search($params);
        
        var_dump($obj_upgrade);
        die();
        
        $this->tmp_backoffice->set("obj_upgrade",$obj_upgrade);
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