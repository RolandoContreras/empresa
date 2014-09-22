  <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller {
    
     public function __construct() {
       parent::__construct();
       $this->load->model("product_model","obj_products");
       $this->load->model("categories_model","obj_category");
    }
   
    public function index()
    {
                    $this->load->view('shop');
    }
    
    public function categories($slug)
    {
         //SELECT PRODUCT BY CATEGORY
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
                        "where" => "categories.name = '$slug' and products.status_value = 1",
                        "order" => "products.product_id DESC LIMIT 1",
                        "join" => array('categories, products.id_category = categories.id_category')
                        );
             $obj_products['obj_products'] = $this->obj_products->search($params);  
             $obj_products['total_products'] = $this->obj_products->total_records($params);
             
            //SELECT CATEGORIES
            $param_category = array(
                        "select" =>"",
                        "where" => "status_value = 1",
                           );
           
             $obj_products['category'] = $this->obj_category->search($param_category);
             $this->load->view('shop',$obj_products);
    }
}
