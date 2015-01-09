<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_comments extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("comments_model","obj_comments");
    }   
                
    public function index(){  
        
            $this->get_session();
            $params = array(
                        "select" =>"comments.comment_id,
                                    products.name as tittle,
                                    comments.name,
                                    products.product_id,
                                    comments.comment,
                                    comments.status_value,
                                    comments.date_comment",
                         "order" => "products.product_id DESC",
                         "join" => array('products, comments.product_id = products.product_id')
            );
            
            /// PAGINADO
            $modulos ='comentarios'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 
            /// DATA
            $obj_comments= $this->obj_comments->search($params);
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_comments",$obj_comments);
            $this->tmp_mastercms->render("dashboard/comentarios/comments_list");
    }
    
    public function change_status(){
            //UPDATE DATA ORDERS
        if($this->input->is_ajax_request()){   
                $comment_id = $this->input->post("comment_id");
                if(count($comment_id) > 0){
                    $data = array(
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                    ); 
                    $this->obj_comments->update($comment_id,$data);
                }
                echo json_encode($data);            
        exit();
            }
    }
    
    public function change_status_no(){
            //UPDATE DATA ORDERS
        if($this->input->is_ajax_request()){   
                $comment_id = $this->input->post("comment_id");
                if(count($comment_id) > 0){
                    $data = array(
                        'status_value' => 0,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                    ); 
                    $this->obj_comments->update($comment_id,$data);
                }
                echo json_encode($data);            
        exit();
            }
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
?>