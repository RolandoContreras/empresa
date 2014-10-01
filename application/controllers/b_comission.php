<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_comission extends CI_Controller {

	
    function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->get_session();
        /// VISTA
        $this->tmp_backoffice->render("backoffice/comission");
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
