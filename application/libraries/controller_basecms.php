<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class controller_basecms extends CI_Controller {    
    
    public function __construct() {
        parent::__construct();   
        //$this->load->model("shows_model","obj_shows");
    }    
    
    public function get_sesion(){          
        if (isset($_SESSION['usercms'])){
            if($_SESSION['usercms']['logged_usercms']=="TRUE" && $_SESSION['usercms']['status']==1){               
                return true;
            }else{
                redirect(site_url().'dashboard');
            }
        }else{
            redirect(site_url().'dashboard');
        }
         
    } 
    
//    public function get_shows(){
//        $where_show = "status_value = 1";
//        $params = array("select" => "show_id,tittle,slug,status_value", "where" => $where_show);
//        $obj_show = $this->obj_shows->search($params);
//        $this->tmp_mastercms->set("obj_show",$obj_show);
//    }
    
}


