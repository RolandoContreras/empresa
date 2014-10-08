<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myaccount extends CI_Controller {
        
    function __construct() {
        parent::__construct();
        $this->load->model("categories_model","obj_category");
        $this->load->model("categories_kind_model","obj_category_kind");
        $this->load->model("brand_model","obj_brand");
        $this->load->model("customer_model","obj_customer");
    }
	
	public function index()
	{
            $obj_products = $this->get_menu();
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
                $data_customer_session['address'] = $obj_user->address;
                $data_customer_session['email'] = $obj_user->email;
                $data_customer_session['city'] = $obj_user->city;
                $data_customer_session['department'] = $obj_user->department;
                $data_customer_session['logged_customer'] = "TRUE";
                $data_customer_session['status'] = $obj_user->status_value;
                $_SESSION['customer'] = $data_customer_session;                  
               redirect("micuenta");    
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
    
        public function destroy_user(){
            $this->session->destroy();
            redirect("home");
            
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
                            $submenutwo[] = $this->get_submenu_two($value->id_category);
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

    $where="categories_kind.id_category ='$id' and brand.status_value = 1";
    $params = array("select" =>"brand.name,
                                categories_kind.categories_kind_id",
                    "where" =>$where,
                    "group" => "name",
                    "join" => array('categories_kind, brand.categories_kind_id = categories_kind.categories_kind_id')
                        );
    $obj_submenutwo = $this->obj_brand->search($params); 
    return $obj_submenutwo;
    }
}
