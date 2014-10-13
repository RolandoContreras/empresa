<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends CI_Controller {

	
    function __construct() {
        parent::__construct();
        $this->load->model("categories_model","obj_category");
        $this->load->model("categories_kind_model","obj_category_kind");
        $this->load->model("brand_categories_model","obj_brand_categories");
        $this->load->model("orders_model","obj_order");
        $this->load->model("order_details_model","obj_detail");
        $this->load->model("product_model","obj_product");
        
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
    public function pay(){
        if(isset($_SESSION['customer'])){
            $customer_id    =  $_SESSION['customer']['customer_id'];
            $total          =  $this->cart->total();
            $date_order     =  date("Y-m-d H:i:s");
            $dia_enviar     =  date("d")+2;
            $date_send      =  date("Y-m-$dia_enviar H:i:s");
            
            
            //UPDATE STOCK PRODUCTS
            foreach ($this->cart->contents() as $item){
            $product_id = $item['id']; 
            $qty = $item['qty']; 
            
            //SELECT CATEGORIES
            $param_product = array(
                        "select" =>"product_id,
                                    stock",
                        "where" => "product_id = '$product_id'");
            
            $obj_products = $this->obj_product->get_search_row($param_product);
            $quantity     = $obj_products->stock;   
            
            //INSERT ORDER
            $update_stock = array( 
             'stock'     => $quantity - $qty,
             );
                $this->obj_product->update($obj_products->product_id,$update_stock);
            }
            
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
