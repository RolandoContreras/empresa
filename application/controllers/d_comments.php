<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_comments extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("comments_model","obj_comments");
    }   
                
    public function index(){  
        
            $this->get_session();
        
            $search_text     =  $this->input->post("search_text") != "" ? $this->input->post("search_text") : "";
            $params = array(
                        "select" =>"comments.comment_id,
                                    products.name as tittle,
                                    comments.name,
                                    products.product_id,
                                    comments.comment,
                                    comments.status_value,
                                    comments.date_comment",
                         "where" => "comments.name like '%$search_text%'",
                         "order" => "products.product_id DESC",
                         "join" => array('products, comments.product_id = products.product_id')
            );
            
            /// PAGINADO
            $config=array();
            $config["base_url"] = site_url("dashboard/comentarios/index"); 
            $config["total_rows"] = $this->obj_comments->total_records($params) ;  
            $config["per_page"] = 20; 
            $config["num_links"] = 2;
            $config["uri_segment"] = 4;   
            
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';            
            $config['num_tag_open']='<li>';
            $config['num_tag_close'] = '</li>';            
            $config['cur_tag_open']= '<li class="active"><a>';
            $config['cur_tag_close']= '</li></a>';            
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';            
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            
            $this->pagination->initialize($config);        
            $obj_pagination = $this->pagination->create_links();
            $modulos ='comentarios'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            /// DATA
            $obj_comments= $this->obj_comments->search_data($params, $config["per_page"],$this->uri->segment(4));
                
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_comments",$obj_comments);
            $this->tmp_mastercms->set("pagination",$obj_pagination);
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