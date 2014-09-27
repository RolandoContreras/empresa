<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myaccount extends CI_Controller {
        
    function __construct() {
        parent::__construct();
        $this->load->model("categories_model","obj_category");
        $this->load->model("customer_model","obj_customer");
    }
	
	public function index()
	{
            //SELECT CATEGORIES
            $param_category = array(
                        "select" =>"",
                        "where" => "status_value = 1",
                           );
           
            $obj_products['category'] = $this->obj_category->search($param_category);
            $this->load->view('myaccount',$obj_products);
	}
        
        public function validar_user(){        
        $username = $this->input->post('username');  
        $password = $this->input->post('password');  
        
        $obj_user = $this->verificar_user($username, $password);
        if (count($obj_user)>0){            
            if ($obj_user->status_value == 1){                            
                $data_customer_session['customer_id'] = $obj_user->customer_id;
                $data_customer_session['name'] = $obj_user->first_name;
                $data_customer_session['email'] = $obj_user->email;
                $data_customer_session['logged_customer'] = "TRUE";
                $_SESSION['customer'] = $data_customer_session;                  
                redirect("home");    
            }
        }else{
            redirect("micuenta");
        }
    }
    
    public function verificar_user($username,$password){
        //SELECT CATEGORIES
            $param = array(
                        "select" =>"",
                        "where" => "email = '$username' and  password='$password'",
                           );
             $obj_user = $this->obj_customer->get_search_row($param);
             return $obj_user;
             
        
    }
}
