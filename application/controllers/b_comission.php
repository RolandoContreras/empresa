<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_comission extends CI_Controller {

	
    function __construct() {
        parent::__construct();
        $this->load->model("commissions_model","obj_commissions");
    }
    
    public function index(){
        $this->get_session();
        /// VISTA
        $customer_id = $_SESSION['customer']['customer_id'];
        $params = array(
                        "select" =>"parent_id,
                                    name,
                                    amount,
                                    date,
                                    status_value",
                         "where" => "parent_id = $customer_id",
                        );
        
                       
        
        $obj_commissions = $this->obj_commissions->search($params);
        
        $total = 0;
        foreach ($obj_commissions as $value){
                 $total = $total + $value->amount;      
        }
        
        $balance = 0;
        foreach ($obj_commissions as $value){
            if($value->status_value == 0){
                $balance = $balance + $value->amount;      
            }
        }
        
        $this->tmp_backoffice->set("total",$total);
        $this->tmp_backoffice->set("balance",$balance);
        $this->tmp_backoffice->set("obj_commissions",$obj_commissions);
        $this->tmp_backoffice->render("backoffice/comission");
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
