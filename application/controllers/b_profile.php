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
                        "select" =>"customer_id,
                                    email,
                                    password,
                                    first_name,
                                    last_name,
                                    address,
                                    references,
                                    country,
                                    department,
                                    city,
                                    phone,
                                    mobile,
                                    status_value",
                         "where" => "customer_id = $customer_id",
            ); 
        
        /// VISTA
        
        $obj_profile = $this->obj_customer->get_search_row($params);
        $this->tmp_backoffice->set("obj_profile",$obj_profile);
        $this->tmp_backoffice->render("backoffice/profile");;
    }
    
    public function validate(){
        
            $date = $this->input->post('date');
            $month = $this->input->post('month');
            $year = $this->input->post('year');
            
            $date_birth = "$year-$month-$date";
          
        $data = array(
               'first_name' => $this->input->post('first_name'),
               'last_name' => $this->input->post('last_name'),
               'email' => $this->input->post('email'),
               'dni' => $this->input->post('dni'),
               'birth date' => $date_birth,  
               'phone' => $this->input->post('phone'),  
               'mobile' => $this->input->post('mobile'),
               'address' => $this->input->post('address'),
               'city' => $this->input->post('city'),
               'country' => $this->input->post('country'),
           
               'status_value' => $this->input->post('status_value'),
               'created_at' => date("Y-m-d H:i:s"),
               'created_by' => $_SESSION['usercms']['user_id'],
               'updated_at' => date("Y-m-d H:i:s"),
               'updated_by' => $_SESSION['usercms']['user_id']
                );
        
       
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
