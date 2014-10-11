<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacs extends CI_Controller {

	
    function __construct() {
        parent::__construct();
        $this->load->model("categories_model","obj_category");
        $this->load->model("categories_kind_model","obj_category_kind");
        $this->load->model("brand_categories_model","obj_brand_categories");
        $this->load->library('email');
    }
    
    public function index()
    {               $obj_products = $this->get_menu();
                    $this->load->view('contacs',$obj_products);
    }
    
    public function send_email(){
        //send email
        if($this->input->is_ajax_request()){   
            $name = $this->input->post("name");
            $email = $this->input->post("email");
            $asunto = $this->input->post("asunto");
            $message = $this->input->post("message");
            
            
            
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'smtp.secureserver.net';
            //$config['smtp_port'] = '2525';
            $config['smtp_user'] = 'servicioalcliente@wavelinetwork.com';
            $config['smtp_pass'] = 'servicioalclientewl1';
            $config['charset'] = 'utf-8';
            $config['mailtype'] = 'html';
            $config['wordwrap'] = TRUE;
            $this->email->initialize($config);

            $this->email->from("$email", "$name");
            $this->email->to('servicioalcleinte@wavelinetwork.com');
           
            $this->email->subject("$asunto");
            $this->email->message("$message");

            $this->email->send();
           // echo $this->email->print_debugger();
            
//            $config['protocol'] = 'sendmail';
//            $config['mailpath'] = '/usr/sbin/sendmail';
//            $config['charset'] = 'iso-8859-1';
//            $config['wordwrap'] = TRUE;
//            $config['mailtype'] = 'html';

//            $this->email->initialize($config);
//
//            $this->email->from("$email", "$name");
//            $this->email->to('servivioalcliente@wavelinetwork.com');
//
//            $this->email->subject("$asunto");
//            $html = "$message";
//            $this->email->message($html);
//            $this->email->send();
//            echo $this->email->print_debugger();
 
        }
    }
    
    public function get_menu(){    
        
        //SELECT CATEGORIES
        $param_category = array(
                    "select" =>"",
                    "where" => "status_value = 1");
        $menu = $this->obj_category->search($param_category);
        
        foreach ($menu as $key =>$value){               
                 $submenu[] = $this->get_submenu($value->id_category);
                        
                        foreach ($submenu[$key] as $key => $value) {
                            $submenutwo[] = $this->get_submenu_two($value->categories_kind_id);
                        }
        }
        
        $data['menu'] = $menu;
        $data['submenu'] = $submenu;
        $data['submenutwo'] = $submenutwo;
        return $data;
    }
    
    public function get_submenu($id_category){
        
        $where="id_category ='$id_category' and status_value = 1";
        $params = array("select" =>"",
                              "where" =>$where,
                              "group" => "category_name" 
                            );
        $obj_submenu = $this->obj_category_kind->search($params); 
        return $obj_submenu;
    }
    
    public function get_submenu_two($id){
            
        $where="brand_categories.categories_kind_id ='$id' and brand.status_value = 1";
        $params = array("select" =>"brand.name,
                                    brand_categories.categories_kind_id",
                        "where" =>$where,
                        "group" => "name",
                        "join" => array('brand, brand_categories.brand_id = brand.brand_id')
                        );
        $obj_submenutwo = $this->obj_brand_categories->search($params); 
        return $obj_submenutwo;
    }
    
}
