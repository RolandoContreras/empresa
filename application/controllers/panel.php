<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Panel extends CI_Controller{
    public function __construct() {
        parent::__construct();    
        $this->load->model("tags_model","obj_tags");
        $this->load->model("product_model","obj_products");
        $this->load->model("comments_model","obj_comments");
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
        
        //GET ALL COMMENTS
        $params = array("select" =>"count(comment_id) as comment_id, (select count(comment_id) from comments where status_value = 1) as active, (select count(comment_id) from comments where status_value = 0) as inactive");
        $obj_comments = $this->obj_comments->get_search_row($params);
        
        $active = $obj_comments->active;
        $inactive = $obj_comments->inactive;
        $obj_comments = $obj_comments->comment_id;
        
        //GET LASTEST COMMENT  
        $params = array(
                        "select" =>"comments.comment_id,
                                    products.name as tittle,
                                    products.big_image,
                                    comments.name,
                                    products.product_id,
                                    comments.comment,
                                    comments.status_value,
                                    comments.date_comment",
                         "order" => "comments.created_at DESC",
                         "join" => array('products, comments.product_id = products.product_id')
            );
        $obj_last_comment = $this->obj_comments->get_search_row($params);
        
        $modulos ='Home'; 
        $link_modulo =  site_url().$modulos; 
        $seccion = 'Vista global';        
        $this->tmp_mastercms->set('obj_last_comment',$obj_last_comment);
        $this->tmp_mastercms->set('obj_comments',$obj_comments);
        $this->tmp_mastercms->set('active',$active);
        $this->tmp_mastercms->set('inactive',$inactive);
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