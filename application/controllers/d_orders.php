<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_orders extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
          $this->load->model("orders_model","obj_order");
          $this->load->model("order_details_model","obj_order_detail");
    }   
                
    public function index(){  
           $search_text     =  $this->input->post("search_text") != "" ? $this->input->post("search_text") : "";
           
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
                         "where" => "customer.first_name like '%$search_text%'",
                         "order" => "orders.order_id DESC",
                         "join" => array('customer, orders.customer_id = customer.customer_id')
            );
      
            /// PAGINADO
            $config=array();
            $config["base_url"] = site_url("dashboard/d_orders/index"); 
            $config["total_rows"] = $this->obj_order->total_records($params) ;  
            $config["per_page"] = 15; 
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
            $modulos ='pedidos'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/pedidos'; 

            /// DATA
            $obj_order= $this->obj_order->search_data($params, $config["per_page"],$this->uri->segment(4));
                
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_order",$obj_order);
            $this->tmp_mastercms->set("pagination",$obj_pagination);
            $this->tmp_mastercms->render("dashboard/pedidos/orders_list");
    }
    
    public function view_detail($order_id){
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
        
 }

?>