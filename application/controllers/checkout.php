<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends CI_Controller {

	
    function __construct() {
        parent::__construct();
        $this->load->model("product_model","obj_product");
        $this->load->model("customer_model","obj_customer");
        $this->load->model("orders_model","obj_order");
        $this->load->model("order_details_model","obj_detail");
        $this->load->model("commissions_model","obj_commissions");
        $this->load->model("order_commissions_model","obj_order_commissions");
        $this->load->model("categories_model","obj_category");
        $this->load->model("categories_kind_model","obj_category_kind");
        $this->load->model("brand_categories_model","obj_brand_categories");
        
    }
    
    public function index()
    {
            $obj_products = $this->get_menu();
            //SELECT CATEGORIES
            $param_category = array(
                        "select" =>"",
                        "where" => "status_value = 1");
           
            $obj_products['category'] = $this->obj_category->search($param_category);
             
            $obj_products['title'] = "Checkout | Bienvenido a Nuestra Tienda Virtual";
            $obj_products['meta_keywords'] = "Checkout,Marketing Multinivel, Zapatillas, Calzados, Moda, Ropa, Limpieza, Negocio, Oportunidad";
            $obj_products['meta_description'] = "Checkout,Compra Online tu TV, laptops, muebles, zapatillas, colchones, regalos y más. Selecciona tus productos nuevos por Internet y solicita su despacho a todo Perú. Waveline, un líder global en la moda, la belleza y la oportunidad de negocio excepcional para los Empresarios Independientes. Más información sobre Waveline hoy.";
             
             $this->load->view('checkout',$obj_products);
    }
    public function make_order(){
      if($this->input->is_ajax_request()){ 
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
                
                $real_price  = $obj_products->pay_sale * $qty;
                $quantity     = $obj_products->stock;   
            
                //UPDATE STOCK
                $update_stock = array( 
                 'stock'     => $quantity - $qty,
                 );
                $this->obj_product->update($obj_products->product_id,$update_stock);
                $amount =  $amount + $real_price;
            }
          
            $total          =  $this->cart->total()+10;
            $date_order     =  date("Y-m-d H:i:s");
            $dia_enviar     =  date("d")+2;
            $date_send      =  date("Y-m-$dia_enviar H:i:s"); 
            $customer_id    =  $_SESSION['customer']['customer_id'];
            $parents_id     =  $_SESSION['customer']['parents_id'];

            //INSERT ORDER
            $data_order = array( 
             'customer_id'      => $customer_id,
             'address'          => $_SESSION['customer']['address'],
             'references'       => $_SESSION['customer']['references'],
             'city'             => $_SESSION['customer']['city'],
             'department'       => $_SESSION['customer']['department'],
             'total'            => $total,  
             'date_order'       => $date_order,
             'date_send'        => $date_send, 
             'status_value'     => 1,
             'created_at'       => date("Y-m-d H:i:s"),
             'created_by'       => $customer_id,
             );
            $order_id = $this->obj_order->insert($data_order);
            
            if($parents_id != 1){
                //INSERT COMMISSIONS
                $data_commissions = array( 
                 'parent_id'        => $parents_id,
                 'name'             => "Comisión por Compra",
                 'amount'           => $amount,
                 'date'             => date("Y-m-d H:i:s"),
                 'status_value'     => 0,
                 'created_at'       => date("Y-m-d H:i:s"),
                 'created_by'       => $customer_id,
                 );
                $commissions_id = $this->obj_commissions->insert($data_commissions);

                //INSERT ORDER_COMMISSIONS
                $data_order_commissions = array( 
                 'order_id'         => $order_id,
                 'commissions_id'   => $commissions_id,
                 'status_value'     => 1,
                 'created_at'       => date("Y-m-d H:i:s"),
                 'created_by'       => $customer_id
                 );
                $this->obj_order_commissions->insert($data_order_commissions);
            }
            
            //BEGIN COMISSION BY RESIDUAL
            $name = "Comisión por Residuales";
            $amount = $amount * 0.015;
            
            //SELECT FIRST RESIDUAL
            $parents = array(
                            "select" =>"parents_id",
                            "where" => "customer_id = $parents_id",
                            );
                    $parents_1 = $this->obj_customer->get_search_row($parents);
                    $parents_1 = $parents_1->parents_id;
            
                //SELECT FIRST PARENT TO PAY
                if($parents_1!=""){
                    if($parents_1!=1 && $parents_1!=0){
                    //INSERT COMMISSIONS
                    $this->residual_commision($parents_1, $name, $amount, $customer_id, $order_id);
                    
                    $parents = array(
                            "select" =>"parents_id",
                            "where" => "customer_id = $parents_1",
                            );
                    //SELECT SECOND PARENT TO PAY
                    $parents_2 = $this->obj_customer->get_search_row($parents);
                    $parents_2 = $parents_2->parents_id;
                    
                    if($parents_2!=""){
                        if($parents_2!=1 && $parents_2!=0){
                        
                            //INSERT COMMISSIONS
                            $this->residual_commision($parents_2, $name, $amount, $customer_id, $order_id);
                            
                            $parents = array(
                                "select" =>"parents_id",
                                "where" => "customer_id = $parents_2",
                            );
                            //SELECT THIRD PARENT TO PAY
                            $parents_3 = $this->obj_customer->get_search_row($parents);
                            $parents_3 = $parents_3->parents_id;
                            
                            //INSERT COMMISSIONS
                            if($parents_3!=""){
                                if($parents_3!=1 && $parents_3!=0){
                                        $this->residual_commision($parents_3, $name, $amount, $customer_id, $order_id);

                                           $parents = array(
                                                "select" =>"parents_id",
                                                "where" => "customer_id = $parents_3",
                                                );
                                        //SELECT FOURTH PARENT TO PAY
                                        $parents_4 = $this->obj_customer->get_search_row($parents);
                                        $parents_4 = $parents_4->parents_id;
                                        
                                        if($parents_4!=""){
                                            if($parents_4!=1 && $parents_4!=0){
                                                //INSERT COMMISSIONS
                                                $this->residual_commision($parents_4, $name, $amount, $customer_id, $order_id);
                                            }
                                        }
                                }
                            }
                        }  
                                
                    }
                  }    
                            
                }
             
           foreach ($this->cart->contents() as $item){
            if ($this->cart->has_options($item['rowid']) == TRUE){
                foreach ($this->cart->product_options($item['rowid']) as $option_name => $option_value){
                        $size = $option_value;
                        
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
                         'created_by'       => $customer_id,
                         );
                    $this->obj_detail->insert($data_order_details);
                    }
                }else{
                    //INSERT DETAIL_ORDER
                    $data_order_details = array( 
                         'order_id   '      => $order_id,
                         'product_id'       => $item['id'],
                         'price'            => $item['price'],
                         'quantity'         => $item['qty'],
                         'subtotal'         => $item['subtotal'],
                         'status_value'     => 1,
                         'created_at'       => date("Y-m-d H:i:s"),
                         'created_by'       => $customer_id,
                         );
                    $this->obj_detail->insert($data_order_details);
                } 
            }
            
            $img = site_url().'static/images/logobcp.gif';
            $data['message'] = "success";
            $data['print'] = "El pedido se registró con éxito<br/><br/>
                              <b>Número de Pedido</b>: $order_id<br/><br/>
                              El pedido será entragado en 2 días hábiles a la dirección registrada.<br/>   
                              Enviar el voucher de pago al correo: ventas@wavelinetwork.com<br/>
                              Realizar el pago en :<br/>
                              Banco de Credito del Perú - BCP<br/><br/>
                              194-2204558-0-61 Cuenta Corriente Soles<br/>
                              194-2162460-1-39 Cuenta Corriente Dolares<br/><br/>
                              <img width='106' src='$img'>";
            echo json_encode($data);  
            exit();
         }else{
             $data['message'] = "no_customer";
             $data['print'] = "Debe loguearse";
             echo json_encode($data);  
             exit(); 
            
        }
      }
    }
    
    public function residual_commision($parents,$name,$amount,$customer_id, $order_id){    
        //INSERT COMMISSIONS
        $data_commissions = array( 
         'parent_id'        => $parents,
         'name'             => $name,
         'amount'           => $amount,
         'date'             => date("Y-m-d H:i:s"),
         'status_value'     => 0,
         'created_at'       => date("Y-m-d H:i:s"),
         'created_by'       => $customer_id                                    
         );
        $commissions_id = $this->obj_commissions->insert($data_commissions);
        
        //INSERT ORDER_COMMISSIONS
        $data_order_commissions = array( 
         'order_id'         => $order_id,
         'commissions_id'   => $commissions_id,
         'status_value'     => 1,
         'created_at'       => date("Y-m-d H:i:s"),
         'created_by'       => $customer_id,
         );
        $this->obj_order_commissions->insert($data_order_commissions);
        
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
