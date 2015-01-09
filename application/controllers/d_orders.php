<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_orders extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
          $this->load->model("orders_model","obj_order");
          $this->load->model("order_details_model","obj_order_detail");
    }   
                
    public function index(){  
           $this->get_session();
           $params = array(
                        "select" =>"orders.order_id,
                                    orders.address,
                                    orders.city,
                                    orders.total,
                                    orders.date_order,
                                    orders.date_send,
                                    orders.status_value,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.references",
                         "order" => "orders.order_id DESC",
                         "join" => array('customer, orders.customer_id = customer.customer_id')
            );
            $modulos ='pedidos'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/pedidos'; 

            /// DATA
            $obj_order= $this->obj_order->search($params);
                
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_order",$obj_order);
            $this->tmp_mastercms->render("dashboard/pedidos/orders_list");
    }
    
    public function view_detail($order_id){
            $this->get_session();
            //SELECT DATA FROM ORDER_DETAIL
            $params = array(
                        "select" =>"order_details.order_id,
                                    order_details.product_id,
                                    order_details.product_id,
                                    order_details.price,
                                    products.name,
                                    products.big_image,
                                    order_details.quantity,
                                    order_details.subtotal,
                                    order_details.status_value,",
                         "where" => "order_details.order_id = '$order_id'",
                         "join" => array('products, products.product_id = order_details.product_id')
            );
            $obj_detail = $this->obj_order_detail->search($params);
            
            $modulos ='pedidos'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/pedidos'; 
            
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_detail",$obj_detail);
            $this->tmp_mastercms->render("dashboard/pedidos/order_detail_list");
    }
    
    public function change_status(){
            //UPDATE DATA ORDERS
        if($this->input->is_ajax_request()){   
                $order_id = $this->input->post("order_id");
                if (count($order_id) > 0){
                    $data = array(
                        'status_value' => 0,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                    ); 
                    $this->obj_order->update($order_id,$data);
                    
            //SELECT DATA ORDER_DETAIL        
                    $params = array(
                                    "select" =>"",
                                     "where" => "order_id = $order_id",
                        );            
                    $obj_detail = $this->obj_order_detail->search($params);
                   
                    foreach ($obj_detail as $value) {
                        $data = array(
                        'status_value' => 0,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                    ); 
                    $this->obj_order_detail->update($value->order_details_id,$data);
                    }
                    $data['data'] = "El Registro cambio de Estado"; 
                }
                $data['data'] = "Error"; 
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