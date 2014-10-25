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
        
        /// TREE
        if($id == ""){
            $where = "created_at >= '$creacion' and status_value = 1";
        }else{
            
            do {
                $parents = array(
                        "select" =>"parents_id",
                        "where" => "customer_id = $customer_id",
                        );
                $obj_parent = $this->obj_customer->get_search_row($parents);
                $customer_id = $obj_parent->parents_id;
                $arr = array();
                $arr =  $customer_id;   
//                echo $customer_id;
//                die();
                
                   $x++;
            } while ($x<=50);
            
            var_dump($arr);
            die();
            
            
//             $i = 1;
//             while($i <= 50){
//                $arr = array();
//                $parents = array(
//                        "select" =>"parents_id",
//                        "where" => "customer_id = $customer_id",
//                        );
//                $obj_parent = $this->obj_customer->get_search_row($parents);
//                $customer_id = $obj_parent->parents_id;
//                
//                if($customer_id == ""){
//                    $i = 0;
//                }else{
//                    $arr =  $customer_id;
//                    $i++;
//                }
//             }
//             var_dump($arr);
//             die();
            
//            for($i = 2; $i <= 10; $i += 2)
//                {
//                  echo "......................\n";
//                  //contando números pares
//                  echo "i vale: " . $i . "\n";
//                  //sus cuadrados
//                  echo "i^2: " . $i*$i . "\n";
//                  //y sus inversos
//                  echo "1/i: " . 1/$i . "\n";
//                  }
            
//            foreach ($obj_parent as $key => $value) {
//                $parents = array(
//                        "select" =>"parents_id",
//                         "where" => "customer_id = $customer_id",
//                        );
//                $obj_parent = $this->obj_customer->get_search_row($parents);
//            }
            
            var_dump($obj_parent);
            die();
            
            $where = "created_at >= '$creacion' and status_value = 1  and customer_id = $customer_id or parents_id = $customer_id ";
//            IN ( 250, 220, 170 )
            
//             $where = "created_at >= '$creacion' and status_value = 1  and parents_id = $customer_id && ";
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
        
//        var_dump($obj_tree);
//        die();
        
        
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
        
        foreach ($obj_tree as $key => $value) {
            
            if($key == 0){
                $n1 = array($value->first_name,
                            $value->last_name,
                            $value->customer_id,
                            $value->parents_id,
                            $value->position,
                            $value->country,
                            $value->code);
            }else{
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
                }
            }
        }
        
//        var_dump($n4_3_de);
//        die();
        
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
