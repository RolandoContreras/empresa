<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myaccount extends CI_Controller {
        
    function __construct() {
        parent::__construct();
        $this->load->model("categories_model","obj_category");
        $this->load->model("categories_kind_model","obj_category_kind");
        $this->load->model("customer_model","obj_customer");
        $this->load->model("brand_categories_model","obj_brand_categories");
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
            
            $obj_products['title'] = "Mi Cuenta | Bienvenido a Nuestra Tienda Virtual";
            $obj_products['meta_keywords'] = "Cuenta,Marketing Multinivel, Zapatillas, Calzados, Moda, Ropa, Limpieza, Negocio, Oportunidad";
            $obj_products['meta_description'] = "Mi Cuenta, Compra Online tu TV, laptops, muebles, zapatillas, colchones, regalos y más. Selecciona tus productos nuevos por Internet y solicita su despacho a todo Perú. Waveline, un líder global en la moda, la belleza y la oportunidad de negocio excepcional para los Empresarios Independientes. Más información sobre Waveline hoy.";
            $this->load->view('myaccount',$obj_products);
	}
        
        public function backoffice()
	{
            $obj_products = $this->get_menu();
            //SELECT CATEGORIES
            $param_category = array(
                        "select" =>"",
                        "where" => "status_value = 1",
                           );
           
            $obj_products['category'] = $this->obj_category->search($param_category);
            
            $obj_products['title'] = "Mi Cuenta | Bienvenido a Nuestra Tienda Virtual";
            $obj_products['meta_keywords'] = "Cuenta,Marketing Multinivel, Zapatillas, Calzados, Moda, Ropa, Limpieza, Negocio, Oportunidad";
            $obj_products['meta_description'] = "Mi Cuenta, Compra Online tu TV, laptops, muebles, zapatillas, colchones, regalos y más. Selecciona tus productos nuevos por Internet y solicita su despacho a todo Perú. Waveline, un líder global en la moda, la belleza y la oportunidad de negocio excepcional para los Empresarios Independientes. Más información sobre Waveline hoy.";
            $this->load->view('myaccountb',$obj_products);
	}
        
        public function validar_user(){        
        $username = $this->input->post('username');  
        $password = $this->input->post('password');  
        
        $obj_user = $this->verificar_user($username, $password);
        if (count($obj_user)>0){            
            if ($obj_user->status_value == 1){                            
                $data_customer_session['customer_id'] = $obj_user->customer_id;
                $data_customer_session['parents_id'] = $obj_user->parents_id;
                $data_customer_session['name'] = $obj_user->first_name;
                $data_customer_session['last_name'] = $obj_user->last_name;
                $data_customer_session['dni'] = $obj_user->dni;
                $data_customer_session['references'] = $obj_user->references;
                $data_customer_session['address'] = $obj_user->address;
                $data_customer_session['kit'] = $obj_user->kit;
                $data_customer_session['email'] = $obj_user->email;
                $data_customer_session['position_temporal'] = $obj_user->position_temporal;
                $data_customer_session['city'] = $obj_user->city;
                $data_customer_session['department'] = $obj_user->department;
                $data_customer_session['code'] = $obj_user->code;
                $data_customer_session['logged_customer'] = "TRUE";
                $data_customer_session['status'] = $obj_user->status_value;
                $_SESSION['customer'] = $data_customer_session;    
               redirect("home");    
            }
        }else{
            redirect("micuenta");
        }
    }
    
        public function validar_user_backoffice(){  
            
        $username = $this->input->post('username');  
        $password = $this->input->post('password');  
        $obj_user = $this->verificar_user($username, $password);
            
        if (count($obj_user)>0){            
            if ($obj_user->status_value == 1){                            
                $data_customer_session['customer_id'] = $obj_user->customer_id;
                $data_customer_session['parents_id'] = $obj_user->parents_id;
                $data_customer_session['name'] = $obj_user->first_name;
                $data_customer_session['last_name'] = $obj_user->last_name;
                $data_customer_session['franchise_id'] = $obj_user->franchise_id;
                $data_customer_session['franchise_name'] = $obj_user->franchise_name;
                $data_customer_session['dni'] = $obj_user->dni;
                $data_customer_session['references'] = $obj_user->references;
                $data_customer_session['address'] = $obj_user->address;
                $data_customer_session['email'] = $obj_user->email;
                $data_customer_session['position_temporal'] = $obj_user->position_temporal;
                $data_customer_session['city'] = $obj_user->city;
                $data_customer_session['department'] = $obj_user->department;
                $data_customer_session['code'] = $obj_user->code;
                $data_customer_session['logged_customer'] = "TRUE";
                $data_customer_session['status'] = $obj_user->status_value;
                $_SESSION['customer'] = $data_customer_session;      
               redirect("backoffice");    
            }
        }else{
            redirect("backoffice");
        }
    }
    
        public function verificar_user($username,$password){
             $param = array(
                        "select" =>"customer.customer_id,customer.parents_id,customer.first_name,customer.last_name,customer.franchise_id,"
                                    ."customer.dni,customer.references,customer.address,customer.email,customer.position_temporal,customer.localidad_id,"
                                    ."customer.region_id,customer.pais_id,customer.status_value,franchise.name as franchise_name",
                        "where" => "customer.username ='$username' and customer.password='$password' and customer.status_value BETWEEN 1 AND 2",             
                        "join" => array('franchise, customer.franchise_id = franchise.franchise_id'));
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
