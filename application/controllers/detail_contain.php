<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detail_contain extends CI_Controller {
        
    function __construct() {
        parent::__construct();
        $this->load->model("product_model","obj_products");
        $this->load->model("comments_model","obj_comments");
        $this->load->model("categories_model","obj_category");
        $this->load->model("categories_kind_model","obj_category_kind");
        $this->load->model("brand_model","obj_brand");
    }
	
    public function index()
    {
        $obj_products = $this->get_menu();
        
        $ruta = explode("/",uri_string()); 
        $category = $ruta[0];
        $ruta = convert_query($ruta[1]);
            
            //SELECT DETAIL PRODUCT
            $params = array(
                        "select" =>"products.product_id,
                                    products.id_category,
                                    products.name,
                                    products.description,
                                    products.custom_image,
                                    products.big_image,
                                    products.medium_image,
                                    products.small_image,
                                    products.stock,
                                    products.tags,
                                    products.price,
                                    categories.name as category,
                                    products.position",
                        "where" => "products.name like '%$ruta%'",
                        "order" => "products.product_id DESC LIMIT 1",
                        "join" => array('categories, products.id_category = categories.id_category')
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
             
             //SELECT CATEGORIES
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
                        "where" => "categories.name like '%$category%'and products.product_id <> $product_id",
                        "order" => "rand() LIMIT 3",
                        "join" => array('categories, products.id_category = categories.id_category')
                        );
           
             $obj_products['related'] = $this->obj_products->search($params);
             $this->load->view('detail_contain',$obj_products);
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
                            $submenutwo[] = $this->get_submenu_two($value->id_category);
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
        
        $where="categories_kind.id_category ='$id' and brand.status_value = 1";
        $params = array("select" =>"brand.name,
                                    categories_kind.categories_king_id",
                        "where" =>$where,
                        "join" => array('categories_kind, brand.categories_kind_id = categories_kind.categories_king_id')
                            );
        $obj_submenutwo = $this->obj_brand->search($params); 
        return $obj_submenutwo;
    }    
}