<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Register extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("product_model","obj_product");
        $this->load->model("franchise_model","obj_franchise");
        $this->load->model("paises_model","obj_paises");
        $this->load->model("regiones_model","obj_regiones");
        $this->load->model("localidades_model","obj_localidades");
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
    {       $obj_products = $this->get_menu();
    
            //SELECT CATEGORIES
            $param_category = array(
                        "select" =>"",
                        "where" => "status_value = 1");
           
            $obj_products['category'] = $this->obj_category->search($param_category);
            
            //SELECT COUNTRY
            $param = array("select" =>"id,nombre,id_idioma",
                            "where" => "id_idioma = 7");
            $obj_products['country'] = $this->obj_paises->search($param);
                      
            //SEO
            $obj_products['title'] = "Registro | Bienvenido a Nuestra Tienda Virtual";
            $obj_products['meta_keywords'] = "Contacto, Marketing Multinivel, Zapatillas, Calzados, Moda, Ropa, Limpieza, Negocio, Oportunidad";
            $obj_products['meta_description'] = "Compra Online tu TV, laptops, muebles, zapatillas, colchones, regalos y más. Escríbenos a: servicioalcliente@wavelinetwork.com";
            $this->load->view('registration',$obj_products);
    }
    
     public function create_customer_two()
    {
            //GET DATA AND SAVE IN TABLE CUSTMER
            $upline_id = $this->input->post('upline');
            //SELECT POSITION ALTERNATIVE FROM UPLINE
            $position = $this->position_upline($upline_id);
            
            $dni = $this->input->post('dni');
            $username = $this->input->post('username');
            $first_name = $this->input->post('first_name');
            $franchise = $this->input->post('kit');
            $last_name = $this->input->post('last_name');
            $date_birth = convert_formato_fecha_db($this->input->post('date'), $this->input->post('month'), $this->input->post('year'));
            $phone = $this->input->post('phone');
            $mobile = $this->input->post('mobile');
            $address = $this->input->post('address');
            $references = $this->input->post('references');
            $localidad_id = $this->input->post('localidad');
            $region_id = $this->input->post('region');
            $pais_id = $this->input->post('country');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $ruc = $this->input->post('ruc');
            $razon_social = $this->input->post('razon_social');
            $address2 = $this->input->post('address2');

            //INSERT CUSTOMER
                $data_customer = array( 
                                    'parents_id'      => $upline_id,
                                    'email'           => $email,
                                    'username'        => $username,
                                    'password'        => $password,
                                    'razon_social'    => $razon_social,
                                    'position'        => $position,
                                    'position_temporal'=> 1,
                                    'ruc'             => $ruc,  
                                    'address2'        => $address2,
                                    'first_name'      => $first_name, 
                                    'dni'             => $dni,
                                    'birth_date'      => $date_birth,
                                    'last_name'       => $last_name,
                                    'address'         => $address,
                                    'references'      => $references,
                                    'localidad_id'    => $localidad_id,  
                                    'region_id'       => $region_id,
                                    'pais_id'         => $pais_id, 
                                    'phone'           => $phone,
                                    'mobile'          => $mobile,
                                    'active'          => 1,  
                                    'franchise_id'    => $franchise,
                                    'partnet'         => 1, 
                                    'updated_at' => date("Y-m-d H:i:s"),
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'status_value'    => 1,
                                    );
           $obj_products = $this->obj_customer->insert($data_customer);
           //SEO
           $obj_products['title'] = "Contacto | Bienvenido a Nuestra Tienda Virtual";
           $obj_products['meta_keywords'] = "Contacto, Marketing Multinivel, Zapatillas, Calzados, Moda, Ropa, Limpieza, Negocio, Oportunidad";
           $obj_products['meta_description'] = "Compra Online tu TV, laptops, muebles, zapatillas, colchones, regalos y más. WaveLine S.A.C. Urb. Los Nogales 230 Urb. Santa Rosa de Quives - Santa Anita, Lima- Peru.";
           $this->load->view('registration_two',$obj_products);
    }
    
    public function create_customer()
    {
    
    //DATA TO VALIDATE
    $kit = $this->input->post('kit');    
    $sub_total = $this->input->post('sub_total');
    //DATA TO PASS
    
    $user_name = $this->input->post('username');
    $first_name = $this->input->post('first_name');
    $last_name = $this->input->post('last_name');
    $dni = $this->input->post('dni');
    $date_birth = $this->input->post('birth_date');
    $phone = $this->input->post('phone');
    $mobile = $this->input->post('mobile');
    $address = $this->input->post('address');
    $references = $this->input->post('references');
    $city = $this->input->post('city');
    $department = $this->input->post('department');
    $country = $this->input->post('country');
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $ruc = $this->input->post('ruc');
    $razon_social = $this->input->post('razon_social');
    $address2 = $this->input->post('address2');
    
    if($kit == 1 && $sub_total >= 300){
        //CALL TO THE PAY
        $this->make_pay($kit,$first_name,$last_name,$dni,$date_birth,$phone,$mobile,$address,$references,$city,$department,$country,$email,$password,$ruc,$razon_social,$address2,$sub_total);
    }elseif($kit == 2 && $sub_total >= 600){
        //CALL TO THE PAY
        $this->make_pay($kit,$first_name,$last_name,$dni,$date_birth,$phone,$mobile,$address,$references,$city,$department,$country,$email,$password,$ruc,$razon_social,$address2,$sub_total);
    }elseif($kit == 3 && $sub_total >= 950){
        //CALL TO THE PAY
        $this->make_pay($kit,$first_name,$last_name,$dni,$date_birth,$phone,$mobile,$address,$references,$city,$department,$country,$email,$password,$ruc,$razon_social,$address2,$sub_total);
    }else{
        $data['message'] = "enoge_money";
        $data['print'] = "El precio del producto no es suficiente";
        echo json_encode($data);  
        exit(); 
    }
    
    $this->load->view('home',$obj_products);
    }
    
    public function make_pay($kit,$first_name,$last_name,$dni,$date_birth,$phone,$mobile,$address,$references,$city,$department,$country,$email,$password,$ruc,$razon_social,$address2,$sub_total){
        
        $amount = 0;
        //DATE TO CREATED
        $created_at = date("Y-m-d H:i:s");
        //SELECT UPLINE
        if(isset($_SESSION['customer'])){
            $parent_id = $_SESSION['customer']['customer_id'];
            $position =  $_SESSION['customer']['position_temporal'];

        }else{
            $parent_id = 1;
            $position = 1;
        } 
        
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
            //UPDATE STOCK PRODUCT
            $quantity     = $obj_products->stock; 
            $update_stock = array( 
             'stock'     => $quantity - $qty,
             );
            $this->obj_product->update($obj_products->product_id,$update_stock);
            }

            //INSERT CUSTOMER    
            $data = array(
                       'first_name' => $first_name,
                       'last_name' => $last_name,
                       'dni' => $dni,
                       'birth_date' => $date_birth,  
                       'phone' => $phone,  
                       'mobile' => $mobile,
                       'address' => $address,
                       'references' => $references,
                       'city' => $city,
                       'department' => $department,
                       'country' => $country,
                       'email' => $email,
                       'password' => $password,
                       'ruc' => $ruc,
                       'razon_social' => $razon_social,
                       'address2' => $address2,
                       'parents_id' => $parent_id,
                       'position' => $position,
                       'position_temporal' => 1,
                       'status_value' => 0,
                       'created_at' => $created_at,
                        );
                $customer_id = $this->obj_customer->insert($data);
                //UPDATE CUSTOMER CODE
                $update_code_customer = array( 
                 'code'     => $customer_id,
                );
                $this->obj_customer->update($customer_id,$update_code_customer);
                
                //DATO TO ORDER
                $total          =  $this->cart->total()+10;
                $date_order     =  date("Y-m-d H:i:s");
                $dia_enviar     =  date("d")+2;
                $date_send      =  date("Y-m-$dia_enviar H:i:s");  

                //INSERT ORDER
                $data_order = array( 
                                    'customer_id'      => $customer_id,
                                    'address'          => $address,
                                    'references'       => $references,
                                    'city'             => $city,
                                    'department'       => $department,
                                    'total'            => $total,  
                                    'date_order'       => $date_order,
                                    'date_send'        => $date_send, 
                                    'status_value'     => 1,
                                    'created_at'       => $created_at,
                                    'created_by'       => $customer_id
                 );
                $order_id = $this->obj_order->insert($data_order);
                
                //INSERT ORDER_DETAIL
                foreach ($this->cart->contents() as $item){
                    if ($this->cart->has_options($item['rowid']) == TRUE){
                        foreach ($this->cart->product_options($item['rowid']) as $option_name => $option_value){
                                $size = $option_value;
                            //INSERT DETAIL_ORDER WITH OPTION
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
                        }else{
                            //INSERT DETAIL_ORDER NORMAL
                            $data_order_details = array( 
                                 'order_id   '      => $order_id,
                                 'product_id'       => $item['id'],
                                 'price'            => $item['price'],
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
                    }
                    
                    
                    //SELECT DATA FROM KIT
                    $param = array("select" =>"pay_direct,pay_binary,pay_created_binary,pay_residul_uni,pay_residul_com,pay_goals",
                                    "where" => "kit_id = '$kit'");
                    $obj_kit = $this->obj_kit->get_search_row($param);
                    
                    //PAY BONO REFERED DIRECT
                    if($parent_id != 1){
                        $data_commissions = array( 
                         'parent_id'        => $parent_id,
                         'name'             => "Bono Referido Directo",
                         'amount'           => $sub_total * $obj_kit->pay_direct,
                         'date'             => date("Y-m-d H:i:s"),
                         'status_value'     => 0,
                         'created_at'       => $created_at = date("Y-m-d H:i:s"),
                         'created_by'       => $customer_id
                         );
                        $commissions_id = $this->obj_commissions->insert($data_commissions);

                        //INSERT ORDER_COMMISSIONS
                        $data_order_commissions = array( 
                         'order_id'         => $order_id,
                         'commissions_id'   => $commissions_id,
                         'status_value'     => 1,
                         'created_at'       => $created_at = date("Y-m-d H:i:s"),
                         'created_by'       => $customer_id
                         );
                        $this->obj_order_commissions->insert($data_order_commissions);
                    }
                    
                    //PAY BONO RESIDUAL UNILEVEL
//                    if(isset($_SESSION['customer'])){
//                    $name = "Comisión por Residuales";
//                    $parents_1 = $_SESSION['customer']['parents_id'];
//                    $amount = $amount * 0.015;
//
//                    //SELECT FIRST PARENT TO PAY
//                        if($parents_1!=""){
//                            if($parents_1!=1 && $parents_1!=0){
//                            //INSERT COMMISSIONS
//                            $this->residual_commision($parents_1, $name, $amount, $customer_id, $order_id);
//
//                            $parents = array(
//                                    "select" =>"parents_id",
//                                    "where" => "customer_id = $parents_1",
//                                    );
//                            //SELECT SECOND PARENT TO PAY
//                            $parents_2 = $this->obj_customer->get_search_row($parents);
//                            $parents_2 = $parents_2->parents_id;
//
//                            if($parents_2!=""){
//                                if($parents_2!=1 && $parents_2!=0){
//
//                                    //INSERT COMMISSIONS
//                                    $this->residual_commision($parents_2, $name, $amount, $customer_id, $order_id);
//
//
//                                    $parents = array(
//                                        "select" =>"parents_id",
//                                        "where" => "customer_id = $parents_2",
//                                    );
//                                    //SELECT THIRD PARENT TO PAY
//                                    $parents_3 = $this->obj_customer->get_search_row($parents);
//                                    $parents_3 = $parents_3->parents_id;
//
//                                    //INSERT COMMISSIONS
//                                    if($parents_3!=""){
//                                        if($parents_3!=1 && $parents_3!=0){
//                                                $this->residual_commision($parents_3, $name, $amount, $customer_id, $order_id);
//
//
//                                                   $parents = array(
//                                                        "select" =>"parents_id",
//                                                        "where" => "customer_id = $parents_3",
//                                                        );
//                                                //SELECT FOURTH PARENT TO PAY
//                                                $parents_4 = $this->obj_customer->get_search_row($parents);
//                                                $parents_4 = $parents_4->parents_id;
//
//                                                if($parents_4!=""){
//                                                    if($parents_4!=1 && $parents_4!=0){
//                                                        //INSERT COMMISSIONS
//                                                        $this->residual_commision($parents_4, $name, $amount, $customer_id, $order_id);
//                                                    }
//                                                }
//                                        }
//                                    }
//                                }  
//
//                            }
//                          }    
//
//                        }
//                    }

                    $param_customer = array(
                                    "select" =>"customer_id,
                                                code,
                                                password",
                                    "where" => "customer_id = '$customer_id'");
                    $obj_customer = $this->obj_customer->get_search_row($param_customer);

                    $img = site_url().'static/images/logobcp.gif';

                    $data['message'] = "success";
                    $data['print'] = "El Cliente se registró con éxito, Le damos la más cordial bienvenida al equipo Waveline Network<br/><br/>
                                      <b>Login</b>: $obj_customer->code<br/>
                                      <b>Número de Pedido</b>: $order_id<br/><br/>
                                      El pedido será entragado en 2 días hábiles a la dirección registrada.<br/>    
                                      Actualmente su cuenta esta inactiva hasta realizar el pago:<br/>
                                      Enviar el voucher de pago al correo: ventas@wavelinetwork.com<br/>
                                      Banco de Credito del Perú - BCP<br/><br/>
                                      194-2204558-0-61 Cuenta Corriente Soles<br/><br/>
                                      <img width='106' src='$img'>";
                    echo json_encode($data);  
                    exit();
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
         'updated_at'       => date("Y-m-d H:i:s"),
         'updated_by'       => $customer_id,         
         );
        $this->obj_order_commissions->insert($data_order_commissions);
        
    }
    
    public function position_upline($upline_id){
        //SELECT POSITION2 FROM UPLINE
        $param_customer = array(
                    "select" =>"position_temporal",
                    "where" => "customer_id = '$upline_id'");
        $position_upline = $this->obj_customer->get_search_row($param_customer);
        return $position_upline->position_temporal;
        
    }
    
    public function validate_dni(){
        //SELECT DNI
        $dni = trim($this->input->post('dni'));
        $param_customer = array(
                    "select" =>"customer_id",
                    "where" => "dni = '$dni'");
        $customer = count($this->obj_customer->get_search_row($param_customer));
        if($customer > 0){
            $data['message'] = "true";
            $data['print'] = "En uso";
        }else{
            $data['message'] = "false";
            $data['print'] = "✔";
        }
        echo json_encode($data); 
    }
    
    public function consulta_upline(){ 
        //SELECT NAME
        $username = trim($this->input->post('username'));
        $param_customer = array("select" =>"customer_id,first_name,position_temporal",
                                "where" => "username = '$username'");
        $obj_customer = $this->obj_customer->get_search_row($param_customer);
        $customer = count($obj_customer);
        if($customer > 0){
            $data['message'] = "true";
            $data['print'] = $obj_customer->first_name;
            $data['print2'] = $obj_customer->customer_id;
            $data['print3'] = $obj_customer->position_temporal;
        }else{
            $data['message'] = "false";
            $data['print'] = "No verificado";
        }
        echo json_encode($data);  
    }
    
    public function validate_new(){     
        //VALIDATE USERNAME
        $username_new = trim($this->input->post('username_new'));
        $param_customer = array("select" =>"first_name",
                                "where" => "username = '$username_new'");
        $customer = count($this->obj_customer->get_search_row($param_customer));
        if($customer > 0){
            $data['message'] = "false";
            $data['print'] = "No disponible";
        }else{
            $data['message'] = "true";
            $data['print'] = "Disponible";
        }
        echo json_encode($data);  
    }
    
    public function validate_region(){     
        //VALIDATE REGION
        $id_pais = trim($this->input->post('id_pais'));
        $param = array("select" =>"id,id_pais,id_idioma,nombre",
                                "where" => "id_pais = '$id_pais' and id_idioma = 7");
        $obj_region = $this->obj_regiones->search($param);
        $obj_region_count = count($obj_region);
                
        if($obj_region_count > 0){
            $data['message'] = "true";
            $data['obj_region'] = $obj_region;
        }else{
            $data['message'] = "false";
            $data['print'] = "";
        }
        echo json_encode($data);  
    }
    
    public function validate_localidad(){     
        //VALIDATE LOCALIDAD
        $id_pais = trim($this->input->post('id_pais'));
        $id_region = trim($this->input->post('id_region'));
        
        $param = array("select" =>"id,nombre,id_pais",
                                "where" => "id_pais = '$id_pais' and id_region = '$id_region' and id_idioma = 7");
        $obj_localidad = $this->obj_localidades->search($param);
                
        if(count($obj_localidad) > 0){
            $data['message'] = "true";
            $data['obj_localidad'] = $obj_localidad;
        }else{
            $data['message'] = "false";
            $data['print'] = "";
        }
        echo json_encode($data);  
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
