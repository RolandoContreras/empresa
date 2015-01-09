<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_customer extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("orders_model","obj_order");
    }   
                
    public function index(){  
        
           $this->get_session();
           $params = array(
                        "select" =>"orders.order_id,
                                    customer.customer_id,
                                    customer.code,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.status_value",
                        "join" => array('customer, orders.customer_id = customer.customer_id'),
                        "group" => "customer.customer_id DESC",
                        "order" => "orders.order_id DESC");
      
            /// PAGINADO
            $modulos ='clientes'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/clientes'; 

            /// DATA
            $obj_customer= $this->obj_order->search($params);
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_customer",$obj_customer);
            $this->tmp_mastercms->render("dashboard/customer/customer_list");
    }
    
    public function active_customer(){
        //ACTIVE CUSTOMER
        if($this->input->is_ajax_request()){   
                $customer_id = $this->input->post("customer_id");
                if(count($customer_id) > 0){
                    $data = array(
                        'status_value' => 1,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_customer->update($customer_id,$data);
                }
                echo json_encode($data);            
        exit();
            }
    }
    
    public function no_active_customer(){
            //NO ACTIVE CUSTOMER
        if($this->input->is_ajax_request()){   
            $customer_id = $this->input->post("customer_id");
                if(count($customer_id) > 0){
                    $data = array(
                        'status_value' => 0,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_customer->update($customer_id,$data);
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