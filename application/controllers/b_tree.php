<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_tree extends CI_Controller {

	
    function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
    }
    
    public function index(){
        $this->get_session();
      
        $ruta = explode("/",uri_string()); 
        $id = $ruta[2];
        
        if($id == ""){
            $customer_id = $_SESSION['customer']['customer_id'];
        }else{
            $customer_id = $id;
        }
        
        // VISTA
        $params = array(
                        "select" =>"",
                         "where" => "customer_id = $customer_id",
                        ); 
        $obj_profile = $this->obj_customer->get_search_row($params);
        $creacion = $obj_profile->created_at;
        $side =  $obj_profile->position;
        
        //SELECT UPLINE CUSTOMER
        $param_uplinet = array(
                        "select" =>"customer_id,
                                    code,
                                    password,
                                    first_name,
                                    last_name",
                         "where" => "customer_id = $obj_profile->parents_id",
                        ); 
        $obj_upline = $this->obj_customer->get_search_row($param_uplinet);
        $parents_id_1 = $obj_upline->customer_id;
        
        $where_p_2 = "";
        $where_p_3 = "";
        $where_p_4 = "";
        $where_p_5 = "";
        
        /// TREE
        if($id == ""){
            $where = "created_at >= '$creacion' and status_value = 1";
        }else{
               if($parents_id_1!=""){
                    $parents = array(
                            "select" =>"parents_id",
                            "where" => "customer_id = $parents_id_1",
                            );
                    $obj_parent = $this->obj_customer->get_search_row($parents);
                    $parents_id_2 = $obj_parent->parents_id;
                    if($parents_id_2!=""){
                       $where_p_2 = ","." $parents_id_2";
                       $parents = array(
                            "select" =>"parents_id",
                            "where" => "customer_id = $parents_id_2",
                            );
                    $obj_parent = $this->obj_customer->get_search_row($parents);
                    $parents_id_3 = $obj_parent->parents_id;
                        if($parents_id_3!=""){
                           $where_p_3 = ","." $parents_id_3";
                           $parents = array(
                                "select" =>"parents_id",
                                "where" => "customer_id = $parents_id_3",
                                );
                        $obj_parent = $this->obj_customer->get_search_row($parents);
                        $parents_id_4 = $obj_parent->parents_id;
                                    if($parents_id_4!=""){
                                    $where_p_4 = ","." $parents_id_4";                                       
                                        $parents = array(
                                                "select" =>"parents_id",
                                                "where" => "customer_id = $parents_id_4",
                                                );
                                        $obj_parent = $this->obj_customer->get_search_row($parents);
                                        $parents_id_5 = $obj_parent->parents_id;
                                        if($parents_id_5!=""){
                                            $where_p_5 = ","." $parents_id_5";
                                        }else{
                                            $where_p_5 = "";
                                        }
                            }   
                        }
                    }
                }
                
        //$where = "created_at >= '$creacion' and status_value = 1 and customer_id <> $customer_id or parents_id IN ($parents_id_1$where_p_2$where_p_3$where_p_4$where_p_5) ";
        $where = "created_at >= '$creacion' and status_value = 1 or parents_id IN ($parents_id_1$where_p_2$where_p_3$where_p_4$where_p_5)";
        }
        
        $param_tree = array(
                        "select" =>"customer_id,
                                    first_name,
                                    last_name,
                                    created_at,
                                    parents_id,
                                    country,
                                    position,
                                    code",
                         "where" => $where,
                         "order" => "created_at ASC LIMIT 50", 
                        ); 
   
//        LIMIT 31
        $obj_tree = $this->obj_customer->search($param_tree);
        
        $n2_iz = "";
        $n2_de = "";
        $n3_iz = "";
        $n3_de = "";
        $n3_2_iz = "";
        $n3_2_de = "";
        $n4_iz = "";
        $n4_2_iz = "";
        $n4_3_iz = "";
        $n4_4_iz = "";
        $n4_de = "";
        $n4_2_de = "";
        $n4_3_de = "";
        $n4_4_de = "";
        
        $n1 = array($obj_profile->first_name,
                            $obj_profile->last_name,
                            $obj_profile->customer_id,
                            $obj_profile->parents_id,
                            $obj_profile->position,
                            $obj_profile->country,
                            $obj_profile->code);
        
        foreach ($obj_tree as $key => $value) {
            
//            if($key == 0){
                
//            }else{
                 if($value->parents_id == $n1[2]){
                        if($value->position ==1){
                            if($n2_iz == ""){
                                $n2_iz = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->parents_id,
                                               $value->position,
                                               $value->country,
                                               $value->code);
                            }elseif($n3_iz == ""){
                                $n3_iz = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->parents_id,
                                               $value->position,
                                               $value->country,
                                               $value->code);
                            }
                            elseif($n4_iz == ""){
                                $n4_iz = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->parents_id,
                                               $value->position,
                                               $value->country,
                                               $value->code);
                            }
                        }else{
                            if($n2_de == ""){
                                $n2_de = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->parents_id,
                                               $value->position,
                                               $value->country,
                                               $value->code);
                            }elseif($n3_de == ""){
                                $n3_de = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->parents_id,
                                               $value->position,
                                               $value->country,
                                               $value->code);
                            }elseif($n4_de == ""){
                                $n4_de = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->parents_id,
                                               $value->position,
                                               $value->country,
                                               $value->code);
                            }
                        }
                    }elseif($value->parents_id == $n2_iz[2]){
                        if($value->position ==1){
                            if($n3_iz == ""){
                                $n3_iz = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->parents_id,
                                               $value->position,
                                               $value->country,
                                               $value->code);
                            }else{
                                $n4_iz = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->parents_id,
                                               $value->position,
                                               $value->country,
                                               $value->code);
                            }
                        }else{
                            if($n3_2_iz == ""){
                                $n3_2_iz = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->parents_id,
                                               $value->position,
                                               $value->country,
                                               $value->code);
                            }else{
                                $n4_4_iz = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->parents_id,
                                               $value->position,
                                               $value->country,
                                               $value->code);
                            }
                        }
                }elseif($value->parents_id == $n2_de[2]){
                    if($value->position ==1){
                            if($n3_2_de == ""){
                                $n3_2_de = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->parents_id,
                                               $value->position,
                                               $value->country,
                                               $value->code);
                            }else{
                                $n4_4_de = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->parents_id,
                                               $value->position,
                                               $value->country,
                                               $value->code);
                            }
                        }else{
                            if($n3_de == ""){
                                $n3_de = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->parents_id,
                                               $value->position,
                                               $value->country,
                                               $value->code);
                            }else{
                                $n4_de = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->parents_id,
                                               $value->position,
                                               $value->country,
                                               $value->code);
                            }
                        }
                }elseif($value->parents_id == $n3_iz[2]){
                     if($value->position ==1){
                            if($n4_iz == ""){
                                $n4_iz = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->parents_id,
                                               $value->position,
                                               $value->country,
                                               $value->code);
                            }
                        }else{
                            if($n4_2_iz == ""){
                                $n4_2_iz = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->parents_id,
                                               $value->position,
                                               $value->country,
                                               $value->code);
                            }
                        }
                }elseif($value->parents_id == $n3_2_iz[2]){
                     if($value->position ==1){
                            if($n4_3_iz == ""){
                                $n4_3_iz = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->parents_id,
                                               $value->position,
                                               $value->country,
                                               $value->code);
                            }
                        }else{
                            if($n4_4_iz == ""){
                                $n4_4_iz = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->parents_id,
                                               $value->position,
                                               $value->country,
                                               $value->code);
                            }
                        }
                }elseif($value->parents_id == $n3_de[2]){
                     if($value->position ==1){
                            if($n4_2_de == ""){
                                $n4_2_de = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->parents_id,
                                               $value->position,
                                               $value->country,
                                               $value->code);
                            }
                        }else{
                            if($n4_de == ""){
                                $n4_de = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->parents_id,
                                               $value->position,
                                               $value->country,
                                               $value->code);
                            }
                        }
                }elseif($value->parents_id == $n3_2_de[2]){
                     if($value->position ==1){
                            if($n4_4_de == ""){
                                $n4_4_de = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->parents_id,
                                               $value->position,
                                               $value->country,
                                               $value->code);
                            }
                        }else{
                            if($n4_3_de == ""){
                                $n4_3_de = array($value->first_name,
                                               $value->last_name,
                                               $value->customer_id,
                                               $value->parents_id,
                                               $value->position,
                                               $value->country,
                                               $value->code);
                            }
                        }
                }else{
                     //falta vereficar el paretn y la position y terminas
                    
                     }
                    
//            }
        }
        
        $this->tmp_backoffice->set("n1",$n1);
        $this->tmp_backoffice->set("n2_iz",$n2_iz);
        $this->tmp_backoffice->set("n3_iz",$n3_iz);
        $this->tmp_backoffice->set("n3_2_iz",$n3_2_iz);
        $this->tmp_backoffice->set("n4_iz",$n4_iz);
        $this->tmp_backoffice->set("n4_2_iz",$n4_2_iz);
        $this->tmp_backoffice->set("n4_3_iz",$n4_3_iz);
        $this->tmp_backoffice->set("n4_4_iz",$n4_4_iz);
        $this->tmp_backoffice->set("n2_de",$n2_de);
        $this->tmp_backoffice->set("n3_de",$n3_de);
        $this->tmp_backoffice->set("n3_2_de",$n3_2_de);
        $this->tmp_backoffice->set("n4_de",$n4_de);
        $this->tmp_backoffice->set("n4_2_de",$n4_2_de);
        $this->tmp_backoffice->set("n4_3_de",$n4_3_de);
        $this->tmp_backoffice->set("n4_4_de",$n4_4_de);
        $this->tmp_backoffice->set("obj_profile",$obj_profile);
        $this->tmp_backoffice->set("obj_tree",$obj_tree);
        $this->tmp_backoffice->set("obj_upline",$obj_upline);
        $this->tmp_backoffice->render("backoffice/tree");
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
