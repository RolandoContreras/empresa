<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends CI_Controller {

	
    function __construct() {
        parent::__construct();
        $this->load->model("categories_model","obj_category");
        $this->load->model("orders_model","obj_order");
        $this->load->model("order_details_model","obj_detail");
    }
    
    public function index()
    {
        //SELECT CATEGORIES
            $param_category = array(
                        "select" =>"",
                        "where" => "status_value = 1",
                           );
           
             $obj_products['category'] = $this->obj_category->search($param_category);
             $this->load->view('checkout',$obj_products);
    }
    public function pay(){
        if(isset($_SESSION['customer'])){
            $customer_id    =  $_SESSION['customer']['customer_id'];
            $total          =  $this->cart->total();
            $date_order     =  date("Y-m-d H:i:s");
            $dia_enviar     =  date("d")+2;
            $date_send      =  date("Y-m-$dia_enviar H:i:s");
            
            
            //UPDATE STOCK PRODUCTS
      //      foreach ($this->cart->contents() as $item){
                
//            $data_order_details = array( 
//                 'order_id   '      => $order_id,
//                 'product_id'       => $item['id'],
//                 'price'            => $item['price'],
//                 'quantity'         => $item['qty'],
//                 'subtotal'         => $item['subtotal'],
//                 'status_value'     => 1,
//                 'created_at'       => date("Y-m-d H:i:s"),
//                 'created_by'       => $_SESSION['customer']['customer_id'],
//                 'updated_at'       => date("Y-m-d H:i:s"),
//                 'updated_by'       => $_SESSION['customer']['customer_id'],         
//                 );
//            $this->obj_detail->insert($data_order_details);
//            }
            
            
            //INSERT ORDER
            $data_order = array( 
             'customer_id'      => $customer_id,
             'address'          => $_SESSION['customer']['address'],
             'city'             => $_SESSION['customer']['city'],
             'department'       => $_SESSION['customer']['department'],
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
            
            foreach ($this->cart->contents() as $item){
                //INSERT DETAIL_ORDER
            $data_order_details = array( 
                 'order_id   '      => $order_id,
                 'product_id'       => $item['id'],
                 'price'            => $item['price'],
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
            redirect('home');
         }else{
            redirect('micuenta');
        }
    }
}
