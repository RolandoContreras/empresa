<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_profile extends CI_Controller {

	
    function __construct() {
        parent::__construct();

    }
    
    public function index(){
        $this->get_session();
        /// VISTA
        $params = array(
                        "select" =>"customer.customer_id,
                                    products.name as tittle,
                                    categories.name,
                                    products.description,
                                    products.custom_image,
                                    products.big_image,
                                    products.medium_image,
                                    products.small_image,
                                    products.price,
                                    brand.name as brand,
                                    products.stock,
                                    products.position,
                                    products.status_value ",
                         "where" => "products.name like '%$search_text%'",
                         "order" => "position DESC, product_id DESC",
                         "join" => array('categories, products.id_category = categories.id_category',
                                         'categories_kind, categories_kind.product_id = products.product_id',
                                         'brand_categories, brand_categories.categories_kind_id = categories_kind.categories_kind_id',
                                         'brand, brand.brand_id = brand_categories.brand_id')
            ); 
        
        $this->tmp_backoffice->render("backoffice/profile");
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
