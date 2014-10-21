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
        $date_birth = convert_formato_fecha_db($this->input->post('date'), $this->input->post('month'), $this->input->post('year'));
        
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
               'parents_id' => 1,
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
             'references'       => $this->input->post('references'),
             'city'             => $this->input->post('city'),
             'department'       => $this->input->post('department'),
             'total'            => $total,  
             'date_order'       => $date_order,
             'date_send'        => $date_send, 
             'status_value'     => 1,
             'created_at'       => date("Y-m-d H:i:s"),
             'created_by'       => $customer_id,
             'updated_at'       => date("Y-m-d H:i:s"),
             'updated_by'       => $customer_id,         
             );
            $order_id = $this->obj_order->insert($data_order);
           
            //INSERT COMMISSIONS
            $data_commissions = array( 
             'parent_id'        => 1,
             'name'             => "Comisión por Referido",
             'amount'           => $amount,
             'date'             => date("Y-m-d H:i:s"),
             'status_value'     => 0,
             'created_at'       => date("Y-m-d H:i:s"),
             'created_by'       => $customer_id,
             'updated_at'       => date("Y-m-d H:i:s"),
             'updated_by'       => $customer_id,         
             );
            $commissions_id = $this->obj_commissions->insert($data_commissions);
            
            //INSERT ORDER_COMMISSIONS
            $data_order_commissions = array( 
             'order_id'         => $order_id,
             'commissions_id'   => $commissions_id,
             'status_value'     => 1,
             'created_at'       => date("Y-m-d H:i:s"),
             'created_by'       => $customer_id,
             'updated_at'       => date("Y-m-d H:i:s"),
             'updated_by'       => $customer_id,         
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
                 'created_by'       => $customer_id,
                 'updated_at'       => date("Y-m-d H:i:s"),
                 'updated_by'       => $customer_id,         
                 );
            $this->obj_detail->insert($data_order_details);
            }
        
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
