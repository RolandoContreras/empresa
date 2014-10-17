<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_new_member extends CI_Controller {
	
    function __construct() {
        parent::__construct();
        $this->load->model("product_model","obj_product");
        $this->load->model("customer_model","obj_customer");
        $this->load->model("orders_model","obj_order");
        $this->load->model("order_details_model","obj_detail");
        $this->load->model("commissions_model","obj_commissions");
        $this->load->model("order_commissions_model","obj_order_commissions");
        
    }
    
    public function index(){
        $this->get_session();
        /// VISTA
        $this->tmp_backoffice->render("backoffice/new_member");
    }
    
    public function validate(){
        
        $date_birth = convert_formato_fecha_db($this->input->post('date'), $this->input->post('month'), $this->input->post('year'));
        
        if(count($this->cart->contents())> 0){
            if(isset($_SESSION['customer'])){
         
            //UPDATE STOCK PRODUCTS
                
            $amount = 0;
            foreach ($this->cart->contents() as $item){
                $product_id = $item['id']; 
                $qty = $item['qty']; 
                
                //SELECT PRODUCT
                $param_product = array(
                            "select" =>"product_id,
                                        pay_sale,
                                        stock",
                            "where" => "product_id = '$product_id'");

                $obj_products = $this->obj_product->get_search_row($param_product);
                $quantity     = $obj_products->stock;   

                //INSERT ORDER
                $update_stock = array( 
                 'stock'     => $quantity - $qty,
                 );
                
                $this->obj_product->update($obj_products->product_id,$update_stock);
                $amount =  $amount + $obj_products->pay_sale;
            }
            
            $data = array(
               'first_name' => $this->input->post('first_name'),
               'parents_id' => $_SESSION['customer']['customer_id'],
               'last_name' => $this->input->post('last_name'),
               'email' => $this->input->post('email'),
               'dni' => $this->input->post('dni'),
               'birth_date' => $date_birth,  
               'phone' => $this->input->post('phone'),  
               'mobile' => $this->input->post('mobile'),
               'address' => $this->input->post('address'),
               'references' => $this->input->post('references'),
               'city' => $this->input->post('city'),
               'department' => $this->input->post('department'),
               'country' => $this->input->post('country'),
               'password' => $this->input->post('password'),
               'status_value' => 0,
               'created_at' => date("Y-m-d H:i:s"),
               'created_by' => $_SESSION['customer']['customer_id'],
               'updated_at' => date("Y-m-d H:i:s"),
               'updated_by' => $_SESSION['customer']['customer_id']
                );
            
            $customer_id = $this->obj_customer->insert($data);
            $total          =  $this->cart->total()+10;
            $date_order     =  date("Y-m-d H:i:s");
            $dia_enviar     =  date("d")+2;
            $date_send      =  date("Y-m-$dia_enviar H:i:s");  
               
            //INSERT ORDER
            $data_order = array( 
             'customer_id'      => $customer_id,
             'address'          => $this->input->post('address'),
             'references'          => $this->input->post('references'),
             'city'             => $this->input->post('city'),
             'department'       => $this->input->post('department'),
             'total'            => $total,  
             'date_order'       => $date_order,
             'date_send'        => $date_send, 
             'status_value'     => 1,
             'created_at'       => date("Y-m-d H:i:s"),
             'created_by'       => $_SESSION['customer']['customer_id'],
             'updated_at'       => date("Y-m-d H:i:s"),
             'updated_by'       => $_SESSION['customer']['customer_id'],         
             );
            $order_id = $this->obj_order->insert($data_order);
            
            //INSERT COMMISSIONS
            $data_commissions = array( 
             'parent_id'        => $_SESSION['customer']['customer_id'],
             'name'             => "Comisión por Referido",
             'amount'           => $amount,
             'date'             => date("Y-m-d H:i:s"),
             'status_value'     => 0,
             'created_at'       => date("Y-m-d H:i:s"),
             'created_by'       => $_SESSION['customer']['customer_id'],
             'updated_at'       => date("Y-m-d H:i:s"),
             'updated_by'       => $_SESSION['customer']['customer_id'],         
             );
            $commissions_id = $this->obj_commissions->insert($data_commissions);
            
            //INSERT ORDER_COMMISSIONS
            $data_order_commissions = array( 
             'order_id'         => $order_id,
             'commissions_id'   => $commissions_id,
             'status_value'     => 1,
             'created_at'       => date("Y-m-d H:i:s"),
             'created_by'       => $_SESSION['customer']['customer_id'],
             'updated_at'       => date("Y-m-d H:i:s"),
             'updated_by'       => $_SESSION['customer']['customer_id'],         
             );
            $this->obj_order_commissions->insert($data_order_commissions);
            
            foreach ($this->cart->contents() as $item){
                
            if ($this->cart->has_options($item['rowid']) == TRUE){
                 foreach ($this->cart->product_options($item['rowid']) as $option_name => $option_value){
                        $size = $option_value;
                 } 
            }

            //INSERT DETAIL_ORDER
            $data_order_details = array( 
                 'order_id   '      => $order_id,
                 'product_id'       => $item['id'],
                 'price'            => $item['price'],
                 'size'            =>  $size,
                 'quantity'         => $item['qty'],
                 'subtotal'         => $item['subtotal'],
                 'status_value'     => 1,
                 'created_at'       => date("Y-m-d H:i:s"),
                 'created_by'       => $_SESSION['customer']['customer_id'],
                 'updated_at'       => date("Y-m-d H:i:s"),
                 'updated_by'       => $_SESSION['customer']['customer_id'],         
                 );
            $this->obj_detail->insert($data_order_details);
            }
          }
        }
            
        $param = array(
                            "select" =>"first_name,
                                        last_name,
                                        address,
                                        email,
                                        password",
                            "where" => "customer_id = '$customer_id'");
        
        $obj_customer = $this->obj_customer->get_search_row($param);
        $this->tmp_backoffice->set("obj_customer",$obj_customer);
        $this->tmp_backoffice->render("backoffice/success");
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
