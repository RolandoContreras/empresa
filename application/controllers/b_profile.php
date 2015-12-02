<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_profile extends CI_Controller {

	
    function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
    }
    
    public function index(){
        $this->get_session();
        $customer_id = $_SESSION['customer']['customer_id'];
        /// VISTA
        $params = array(
                        "select" =>"customer.customer_id,
                                    customer.email,
                                    customer.password,
                                    customer.razon_social,
                                    customer.ruc,
                                    customer.address2,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.dni,
                                    customer.birth_date,
                                    customer.address,
                                    customer.references,
                                    customer.pais_id,
                                    customer.region_id,
                                    customer.localidad_id,
                                    customer.phone,
                                    customer.mobile,
                                    customer.status_value,
                                    paises.nombre as paises,
                                    regiones.nombre as regiones,
                                    localidades.nombre as localidades",
                         "where" => "customer_id = $customer_id and paises.id_idioma = 7 and regiones.id_idioma = 7 and localidades.id_idioma = 7",
                         "join" => array('paises, customer.pais_id = paises.id',
                                         'regiones, customer.region_id = regiones.id',
                                         'localidades, customer.localidad_id = localidades.id')
                                        );
        // VISTA
        $obj_profile = $this->obj_customer->get_search_row($params);
        $this->tmp_backoffice->set("obj_profile",$obj_profile);
        $this->tmp_backoffice->render("backoffice/profile");
    }
    
    public function validate(){
        
        $first_name     = $this->input->post('first_name');
        $last_name      = $this->input->post('last_name');
        $email          = $this->input->post('email');
        $phone          = $this->input->post('phone');
        $mobile         = $this->input->post('mobile');
        $address        = $this->input->post('address');
        $references     = $this->input->post('references');
        $razon_social   = $this->input->post('razon_social');
        $ruc            = $this->input->post('ruc');
        $address2       = $this->input->post('address2');
        $password       = $this->input->post('password');
        
            $data = array(
               'first_name' => $first_name,
               'last_name' => $last_name,
               'email' => $email,
               'phone' => $phone,  
               'mobile' => $mobile,
               'address' => $address,
               'references' => $references,
               'razon_social' => $razon_social,
               'ruc' => $ruc,
               'address2' => $address2,
               'password' => $password,
               'created_by' => $_SESSION['customer']['customer_id'],
               'updated_at' => date("Y-m-d H:i:s"),
               'updated_by' => $_SESSION['customer']['customer_id']
                );
            $customer_id = $_SESSION['customer']['customer_id'];
            
            if ($customer_id != ""){
               $this->obj_customer->update($customer_id, $data);
            }
            
            redirect(site_url()."backoffice/micuenta");
    }
    
    public function get_session(){          
        if (isset($_SESSION['customer'])){
            if($_SESSION['customer']['logged_customer']=="TRUE" && $_SESSION['customer']['status']==1){               
                return true;
            }else{
                redirect(site_url().'backoffice');
            }
        }else{
            redirect(site_url().'backoffice');
        }
    }
}
