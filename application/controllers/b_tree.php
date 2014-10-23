<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_tree extends CI_Controller {

	
    function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
    }
    
    public function index(){
        $this->get_session();
        
        $this->get_session();
        $customer_id = $_SESSION['customer']['customer_id'];
        /// VISTA
        $params = array(
                        "select" =>"",
                         "where" => "customer_id = $customer_id",
                        ); 
        $obj_profile = $this->obj_customer->get_search_row($params);
              
        
        $creacion = $obj_profile->created_at;
                
        //SELECT UPLINE CUSTOMER
        $param_uplinet = array(
                        "select" =>"customer_id,
                                    code,
                                    password,
                                    first_name,
                                    last_name",
                         "where" => "customer_id = $obj_profile->parents_id",
                        ); 
        $obj_upline = $this->obj_customer->get_search_row($param_uplinet);
        
        /// TREE
        $param_tree = array(
                        "select" =>"",
                         "where" => "created_at > '$creacion' and status_value = 1",
                        ); 
        $obj_tree = $this->obj_customer->search($param_tree);
        
//        var_dump($obj_tree);
//        die();
        
        $this->tmp_backoffice->set("obj_profile",$obj_profile);
        $this->tmp_backoffice->set("obj_tree",$obj_tree);
        $this->tmp_backoffice->set("obj_upline",$obj_upline);
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
