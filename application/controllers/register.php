<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	
    function __construct() {
        parent::__construct();
        $this->load->model("categories_model","obj_category");
        $this->load->model("categories_kind_model","obj_category_kind");
        $this->load->model("brand_categories_model","obj_brand_categories");
        $this->load->library('email');
    }
    
    public function index()
    {       $obj_products = $this->get_menu();
    
            //SELECT CATEGORIES
            $param_category = array(
                        "select" =>"",
                        "where" => "status_value = 1");
           
            $obj_products['category'] = $this->obj_category->search($param_category);
                    
                    //SEO
                    $obj_products['title'] = "Contacto | Bienvenido a Nuestra Tienda Virtual";
                    $obj_products['meta_keywords'] = "Contacto, Marketing Multinivel, Zapatillas, Calzados, Moda, Ropa, Limpieza, Negocio, Oportunidad";
                    $obj_products['meta_description'] = "Compra Online tu TV, laptops, muebles, zapatillas, colchones, regalos y más. WaveLine S.A.C. Urb. Los Nogales 230 Urb. Santa Rosa de Quives - Santa Anita, Lima- Peru. Horario de Atención: Lunes a Viernes: 9:00 am a 6:00pm. Escríbenos: servicioalcliente@wavelinetwork.com";
                    $this->load->view('registration',$obj_products);
    }
    
    public function create_customer()
    {
        echo "HOla";
        die();
    
    
            //SELECT CATEGORIES
            $param_category = array(
                        "select" =>"",
                        "where" => "status_value = 1");
           
            $obj_products['category'] = $this->obj_category->search($param_category);
                    
                    //SEO
                    $obj_products['title'] = "Contacto | Bienvenido a Nuestra Tienda Virtual";
                    $obj_products['meta_keywords'] = "Contacto, Marketing Multinivel, Zapatillas, Calzados, Moda, Ropa, Limpieza, Negocio, Oportunidad";
                    $obj_products['meta_description'] = "Compra Online tu TV, laptops, muebles, zapatillas, colchones, regalos y más. WaveLine S.A.C. Urb. Los Nogales 230 Urb. Santa Rosa de Quives - Santa Anita, Lima- Peru. Horario de Atención: Lunes a Viernes: 9:00 am a 6:00pm. Escríbenos: servicioalcliente@wavelinetwork.com";
                    $this->load->view('registration',$obj_products);
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
