<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sitemap extends CI_Controller{    
    public function __construct(){
        parent::__construct();        
        $this->load->model("product_model","obj_products");
        $this->load->model("brand_categories_model","obj_brand_category");
        $this->load->model("categories_kind_model","obj_categories_kind");
        $this->load->model("tags_model","obj_tags");
        $this->load->model("brand_model","obj_brand");
        $this->load->model("categories_model","obj_categories");     
    }	
		
    public function index(){                          
        
        $product_where = "products.status_value = 1";    
        $order="position DESC, product_id DESC";
        $params = $this->parms($product_where, $order);
        $obj_posts = $this->obj_products->search_data($params, 500, 0);
        
        $parms_tag = $this->parms_tag();
        $obj_tags = $this->obj_tags->search_data($parms_tag, 500, 0);  
        
        $parms_category = $this->parms_category();
        $obj_category = $this->obj_categories->search_data($parms_category, 500, 0);
        
        $string = "";
        $string .='<?xml version="1.0" encoding="UTF-8"?>';
        $string .="<urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>";
        
        $string .= "<url>";
        $string .= "<loc>".  site_url()."</loc>";
        $string .= "<lastmod>"."2014-10-01"."</lastmod>";
        $string .= "<priority>1</priority>";
        $string .= "</url>";
            
        $string .= "<url>";
        $string .= "<loc>".  site_url().'home'."</loc>";
        $string .= "<lastmod>"."2014-10-01"."</lastmod>";
        $string .= "<priority>1</priority>";
        $string .= "</url>";
        
        $string .= "<url>";
        $string .= "<loc>".  site_url().'checkout'."</loc>";
        $string .= "<lastmod>"."2014-10-01"."</lastmod>";
        $string .= "<priority>1</priority>";
        $string .= "</url>";
        
        $string .= "<url>";
        $string .= "<loc>".  site_url().'micuenta'."</loc>";
        $string .= "<lastmod>"."2014-10-01"."</lastmod>";
        $string .= "<priority>1</priority>";
        $string .= "</url>";
        
        $string .= "<url>";
        $string .= "<loc>".  site_url().'registro'."</loc>";
        $string .= "<lastmod>"."2014-10-01"."</lastmod>";
        $string .= "<priority>1</priority>";
        $string .= "</url>";
        
        $string .= "<url>";
        $string .= "<loc>".  site_url().'micuenta_backoffice'."</loc>";
        $string .= "<lastmod>"."2014-10-01"."</lastmod>";
        $string .= "<priority>1</priority>";
        $string .= "</url>";
        
        $string .= "<url>";
        $string .= "<loc>".  site_url().'acerca'."</loc>";
        $string .= "<lastmod>"."2014-10-01"."</lastmod>";
        $string .= "<priority>1</priority>";
        $string .= "</url>";
        
        $string .= "<url>";
        $string .= "<loc>".  site_url().'compras'."</loc>";
        $string .= "<lastmod>"."2014-10-01"."</lastmod>";
        $string .= "<priority>1</priority>";
        $string .= "</url>";
        
        foreach ($obj_category as $value):
             $string .= "<url>";
             $string .= "<loc>".site_url().convert_slug($value->name)."</loc>";
             $string .= "<lastmod>".$value->created_at."</lastmod>";
             $string .= "<priority>1</priority>";
             $string .= "</url>";
        endforeach;
        
        foreach ($obj_tags as $value):
             $string .= "<url>";
             $string .= "<loc>".site_url().'tags/'.convert_slug($value->name)."</loc>";
             $string .= "<lastmod>".$value->created_at."</lastmod>";
             $string .= "<priority>1</priority>";
             $string .= "</url>";
        endforeach;
        
        foreach ($obj_posts as $value):
             $string .= "<url>";
             $string .= "<loc>".site_url().convert_slug($value->category."/".$value->name)."</loc>";
             $string .= "<lastmod>".$value->created_at."</lastmod>";
             $string .= "<priority>1</priority>";
             $string .= "</url>";
        endforeach;
             $string .= "</urlset>";

       $fp=fopen("sitemap.xml","w"); 
       fwrite($fp,$string); 
       fclose($fp);
       
       die();
       exit();
    }
   
    public function parms($product_where, $order){
        //SELECT PRODUCT COMMUN
            $params_product = array(
                        "select" =>"products.product_id,
                                    products.name as name,
                                    categories.name as category,
                                    products.description,
                                    products.big_image,
                                    products.created_at,
                                    products.pay_sale,
                                    brand.name as brand,
                                    products.status_value ",
                         "where" => $product_where,
                         "order" => $order,
                         "join" => array('categories, products.id_category = categories.id_category',
                                         'categories_kind, categories_kind.product_id = products.product_id',
                                         'brand_categories, brand_categories.categories_kind_id = categories_kind.categories_kind_id',
                                         'brand, brand.brand_id = brand_categories.brand_id')
            );
        return $params_product;
    }
    public function parms_tag(){
        //SELECT PRODUCT COMMUN
            $params_tags = array(
                        "select" =>"name,
                                    created_at",
                         "where" => "status_value = 1",
                         "order" => "created_at DESC",
            );
        return $params_tags;
    }   
    public function parms_category(){
        //SELECT PRODUCT COMMUN
            $params_tags = array(
                        "select" =>"name,
                                    created_at",
                         "where" => "status_value = 1",
                         "order" => "created_at DESC",
            );
        return $params_tags;
    } 
    
}
