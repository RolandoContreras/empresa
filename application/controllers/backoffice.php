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
            if($_SESSION['customer']['status_value']==2){
                $customer_id = $_SESSION['customer']['customer_id'];
                $params = array(
                                "select" =>"SUM(amount) as total",
                                 "where" => "parent_id = $customer_id and status_value = 0",
                                );
                //VIEW
                $total = $this->obj_commissions->get_search_row($params);
                $this->tmp_backoffice->set("total",$total);

                $this->tmp_backoffice->render("backoffice/backoffice");
            }else{
                $this->tmp_backoffice->render("backoffice/contract");
            }
            
                
        } else{
            redirect('micuenta_backoffice');
        }  
            
   }
   public function logout(){        
        $this->session->unset_userdata('customer');
	$this->session->destroy();
        redirect('backoffice');
    }
}
