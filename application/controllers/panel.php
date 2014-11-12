<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Panel extends CI_Controller{
    public function __construct() {
        parent::__construct();    
        $this->load->model("tags_model","obj_tags");
        $this->load->model("product_model","obj_products");
    }
    
    public function index(){
        $this->get_session();
        
        //GET ALL TAGS    
        $params = array("select" =>"count(tag_id) as tag_id");
        $obj_tags = $this->obj_tags->get_search_row($params);
        $obj_tags = $obj_tags->tag_id;
        
        //GET ALL PRODUCTS   
        $params = array("select" =>"count(product_id) as product_id");
        $obj_products = $this->obj_products->get_search_row($params);
        $obj_products = $obj_products->product_id;
        
        $modulos ='Home'; 
        $link_modulo =  site_url().$modulos; 
        $seccion = 'Vista global';        
        $this->tmp_mastercms->set('obj_tags',$obj_tags);
        $this->tmp_mastercms->set('obj_products',$obj_products);
        
        $this->tmp_mastercms->set('modulos',$modulos);
        $this->tmp_mastercms->set('link_modulo',$link_modulo);
        $this->tmp_mastercms->set('seccion',$seccion);
        $this->tmp_mastercms->render('panel');
     }
     
    public function get_session(){          
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
}