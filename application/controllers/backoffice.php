<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backoffice extends CI_Controller {

	
    function __construct() {
        parent::__construct();
        $this->load->model("commissions_model","obj_commissions");
        $this->load->model("customer_model","obj_customer");
    }
    
    public function index()
    {
        if(isset($_SESSION['customer'])){
             /// VISTA
            
        $customer_id = $_SESSION['customer']['customer_id'];
        $params = array(
                        "select" =>"SUM(amount) as total",
                         "where" => "parent_id = $customer_id and status_value = 0",
                        );
        
        $total = $this->obj_commissions->get_search_row($params);
        $this->tmp_backoffice->set("total",$total);

        //SELECT CHILD CUSTOMER
        $customer_id = $_SESSION['customer']['customer_id'];
        $params = array(
                        "select" =>"customer_id,
                                    email,
                                    password,
                                    first_name,
                                    status_value",
                         "where" => "parents_id = $customer_id",
                        ); 
        
                      
        // VISTA
        $obj_profile = $this->obj_customer->search($params);
        
        $this->tmp_backoffice->set("obj_profile",$obj_profile);
        $this->tmp_backoffice->render("backoffice/backoffice");
        } else{
            redirect('micuenta');
        }  
            
   }
   public function logout(){        
        $this->session->unset_userdata('customer');
	$this->session->destroy();
        redirect('backoffice');
    }
}
