<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
        
    function __construct() {
        parent::__construct();
        $this->load->model("product_model","obj_products");
        $this->load->model("categories_model","obj_category");
        $this->load->model("categories_kind_model","obj_category_kind");
        $this->load->model("brand_model","obj_brand");
    }
	
	public function index()
	{
            $obj_products = $this->get_menu();
            //SELECT PRODUCT CUSTOM
            $params = array(
                        "select" =>"products.product_id,
                                    products.id_category,
                                    products.name,
                                    products.description,
                                    products.custom_image,
                                    products.big_image,
                                    products.price,
                                    categories.name as category,
                                    products.position",
                        "where" => "products.position = 2 and products.status_value = 1",
                        "order" => "products.product_id DESC LIMIT 3",
                        "join" => array('categories, products.id_category = categories.id_category')
                        );
           
            $obj_products['product_custom'] = $this->obj_products->search($params);
             
             //SELECT PRODUCT COMMUN
            $params_product = array(
                        "select" =>"products.product_id,
                                    products.id_category,
                                    products.name,
                                    products.description,
                                    products.custom_image,
                                    products.big_image,
                                    products.price,
                                    categories.name as category,
                                    products.position",
                        "where" => "products.status_value = 1 and position = 1",
                        "order" => "products.product_id DESC LIMIT 6",
                        "join" => array('categories, products.id_category = categories.id_category')
                        );
           
             $obj_products['data'] = $this->obj_products->search($params_product);
             
            //SELECT CATEGORIES
            $param_category = array(
                        "select" =>"",
                        "where" => "status_value = 1",
                           );
           
             $obj_products['category'] = $this->obj_category->search($param_category);
             
            /// VISTA
            $this->load->view('home',$obj_products);
	}
        
        public function add_car(){
            if($this->input->is_ajax_request()){   
                $product_id = $this->input->post("product_id");
                    
                    if (count($product_id) > 0){
                        //SELECT PRODUCT TO ADD CAR
                        $params = array(
                                    "select" =>"products.id_category,
                                                products.name,
                                                products.description,
                                                products.custom_image,
                                                products.big_image,
                                                products.price,
                                                categories.name as category,
                                                products.status_value,
                                                products.position",
                                    "where" => "products.product_id = $product_id and products.status_value = 1",
                                    "join" => array('categories, products.id_category = categories.id_category')
                                    );

                        $obj_products = $this->obj_products->get_search_row($params);
                        $data = array(
                                    'id'        => $product_id,
                                    'qty'       => 1,
                                    'price'     => $obj_products->price,
                                    'name'      => $obj_products->name,
                                    'big_image' => $obj_products->big_image,
//                                    'options' => array('Size' => 'L', 'Color' => 'Red')
                                 );
                        $this->cart->insert($data);
                        $dato['print'] = "Producto Agregado"; 
                    }else{
                        $dato['print'] = "Fuera de Stock"; 
                    }
                echo json_encode($dato);            
        exit();
            }else{
                $product_id = $this->input->post('product_id');
                $qty        = $this->input->post('quantity');
                $params = array(
                                    "select" =>"products.product_id,
                                                products.id_category,
                                                products.name,
                                                products.description,
                                                products.custom_image,
                                                products.big_image,
                                                products.price,
                                                categories.name as category,
                                                products.status_value,
                                                products.position",
                                    "where" => "products.product_id = $product_id",
                                    "join" => array('categories, products.id_category = categories.id_category')
                                    );

                        $obj_products = $this->obj_products->get_search_row($params);
                        
                        $data = array(
                                    'id'         =>     $obj_products->product_id,
                                    'qty'        =>     $qty,
                                    'price'      =>     $obj_products->price,
                                    'name'       =>     $obj_products->name,
                                    'big_image'  =>     $obj_products->big_image,
//                                    'options' => array('Size' => 'L', 'Color' => 'Red')
                                 );
                        $this->cart->insert($data);
                        redirect('checkout');
            }
        }
        
        public function empty_car(){
           $this->cart->destroy();
        }
        
        public function delete_car(){
            if($this->input->is_ajax_request()){ 
                    $row_id = $this->input->post('row_id');
                    $data = array(
                         'rowid' => $row_id,
                         'qty' => 0
                     );
                    $this->cart->update($data);
             }
            exit();
        }
        
        public function update_car(){
            if($this->input->is_ajax_request()){ 
                $row_id = $this->input->post('row_id');
                $qty = $this->input->post('qty');
                $data = array(
                     'rowid' => $row_id,
                     'qty' => $qty
                 );
                $this->cart->update($data);
                }
          exit();
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
                            $submenutwo[] = $this->get_submenu_two($value->categories_king_id);
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
                            );
        $obj_submenu = $this->obj_category_kind->search($params); 
        return $obj_submenu;
    }
    
    public function get_submenu_two($id){
        
        $where="categories_kind_id ='$id' and status_value = 1";
        $params = array("select" =>"",
                              "where" =>$where,
                            );
        $obj_submenutwo = $this->obj_brand->search($params); 
        return $obj_submenutwo;
    }
}
