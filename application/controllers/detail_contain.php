<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detail_contain extends CI_Controller {
        
    function __construct() {
        parent::__construct();
        $this->load->model("product_model","obj_products");
        $this->load->model("comments_model","obj_comments");
        $this->load->model("categories_model","obj_category");
        $this->load->model("categories_kind_model","obj_category_kind");
        $this->load->model("brand_model","obj_brand");
        $this->load->model("brand_categories_model","obj_brand_categories");
    }
	
    public function index()
    {
        $obj_products = $this->get_menu();
        
        $ruta = explode("/",uri_string()); 
        $category = $ruta[0];
        $slug = convert_query($ruta[1]);//SELECT DETAIL PRODUCT
        
            $params = array(
                        "select" =>"products.product_id,
                                    products.name as name,
                                    categories.name as category,
                                    products.description,
                                    products.pay_sale,
                                    products.tags,
                                    products.custom_image,
                                    products.big_image,
                                    products.medium_image,
                                    products.small_image,
                                    products.price,
                                    brand.name as brand,
                                    products.stock,
                                    products.position,
                                    products.status_value ",
                         "where" => "products.name like '%$slug%'",
                         "order" => "products.product_id DESC LIMIT 1",
                         "join" => array('categories, products.id_category = categories.id_category',
                                         'categories_kind, categories_kind.product_id = products.product_id',
                                         'brand_categories, brand_categories.categories_kind_id = categories_kind.categories_kind_id',
                                         'brand, brand.brand_id = brand_categories.brand_id')
            );
                    
        

           
            $obj_products['obj_products'] = $this->obj_products->get_search_row($params);
            $product_id = $obj_products['obj_products']->product_id;
             
            //SELECT CATEGORIES
            $param_category = array(
                        "select" =>"",
                        "where" => "status_value = 1",
                           );
           
            $obj_products['category'] = $this->obj_category->search($param_category);
             
            //SELECT COMMENT BY PRODUCT_ID
            $param_comment = array(
                                    "select" =>"comments.comment,
                                                comments.name,
                                                comments.comment,
                                                comments.date_comment",
                                    "where" => "comments.product_id = '$product_id'  and comments.status_value = 1",
                                    "join" => array('products, comments.product_id = products.product_id')
                                       );
            $obj_products['comments'] = $this->obj_comments->search($param_comment);
             
             //SELECT PRODUCTS RELATED
            $params = array(
                        "select" =>"products.product_id,
                                    products.name as name,
                                    categories.name as category,
                                    products.description,
                                    products.custom_image,
                                    products.big_image,
                                    products.medium_image,
                                    products.small_image,
                                    products.price,
                                    products.pay_sale,
                                    brand.name as brand,
                                    products.stock,
                                    products.position,
                                    products.status_value ",
                         "where" => "categories.name like '%$category%'and products.product_id <> $product_id",
                         "order" => "rand() LIMIT 3",
                         "join" => array('categories, products.id_category = categories.id_category',
                                         'categories_kind, categories_kind.product_id = products.product_id',
                                         'brand_categories, brand_categories.categories_kind_id = categories_kind.categories_kind_id',
                                         'brand, brand.brand_id = brand_categories.brand_id')
            );
            
             $obj_products['related'] = $this->obj_products->search($params);
            
             //SEO
            $slug = ucwords(convert_query($slug));
            $obj_products['title'] = "$slug | Bienvenido a Nuestra Tienda Virtual";
            $obj_products['meta_keywords'] = "$slug,Marketing Multinivel, Zapatillas, Calzados, Moda, Ropa, Limpieza, Negocio, Oportunidad";
            $obj_products['meta_description'] = "$slug,Compra Online tu TV, laptops, muebles, zapatillas, colchones, regalos y más. Selecciona tus productos nuevos por Internet y solicita su despacho a todo Perú. Waveline, un líder global en la moda, la belleza y la oportunidad de negocio excepcional para los Empresarios Independientes. Más información sobre Waveline hoy.";
             
             $this->load->view('detail_contain',$obj_products);
	}
    
    public function comments(){
          
          $product_id = $this->input->post("product_id");
          $name = $this->input->post("name");
          $email = $this->input->post("email");
          $comment = $this->input->post("comment");
          
            if (count($product_id) > 0){
                $data = array(
                   'product_id' => $product_id,
                   'name' => $name,
                   'email' => $email,
                   'comment' => $comment,
                   'date_comment' => date("Y-m-d H:i:s"),
                   'status_value' => 0
               );
            }
            $this->obj_comments->insert($data);
            echo "<script type='text/javascript'>
                    alert('Gracias por Comentar');
                    window.history.back(-1);
                 </script>";
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