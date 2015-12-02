<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_tree extends CI_Controller {

	
    function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
    }
    
    public function index(){
        $this->get_session();
       
        $ruta = explode("/",uri_string()); 
        $id = explode("-", $ruta[2]);
        
        $position_url = $id[1];
        $id = $id[0];
        
        if($id == ""){
            $customer_id = $_SESSION['customer']['customer_id'];
        }else{
            $customer_id = $id;
        }
        
        //SELECT CUSTOMER_ID
        $params = array(
                        "select" =>"*, (SELECT count(customer_id) FROM customer WHERE parents_id = $customer_id and position = 1)as izq,  (SELECT count(customer_id) FROM customer WHERE parents_id = $customer_id and position = 2 )as der",
                         "where" => "customer_id = $customer_id",
                        ); 
        $obj_profile = $this->obj_customer->get_search_row($params);
        $count_left =  $obj_profile->izq;
        $count_right =  $obj_profile->der;
        
        $creacion = $obj_profile->created_at;
        $side =  $obj_profile->position;

        //SELECT UPLINE CUSTOMER
        $param_uplinet = array(
                        "select" =>"customer_id,
                                    position,
                                    password,
                                    first_name,
                                    last_name",
                         "where" => "customer_id = $obj_profile->parents_id",
                        ); 
        $obj_upline = $this->obj_customer->get_search_row($param_uplinet);
        $obj_parent1 = $obj_upline;
        
        $parents_id_1 = $obj_upline->customer_id;
        
        $where_p_2 = "";
        $where_p_3 = "";
        $where_p_4 = "";
        $where_p_5 = "";
        
        /// TREE
               if($parents_id_1!=""){
                    $parents = array(
                            "select" =>"parents_id,position",
                            "where" => "customer_id = $parents_id_1",
                            );
                    $obj_parent2 = $this->obj_customer->get_search_row($parents);

                    
                    $parents_id_2 = $obj_parent2->parents_id;
                    if($parents_id_2!=""){
                       $where_p_2 = ","." $parents_id_2";
                       $parents = array(
                            "select" =>"parents_id",
                            "where" => "customer_id = $parents_id_2",
                            );
                    $obj_parent3 = $this->obj_customer->get_search_row($parents);
                    $parents_id_3 = $obj_parent3->parents_id;
                        if($parents_id_3!=""){
                           $where_p_3 = ","." $parents_id_3";
                           $parents = array(
                                "select" =>"parents_id",
                                "where" => "customer_id = $parents_id_3",
                                );
                        $obj_parent4 = $this->obj_customer->get_search_row($parents);
                        $parents_id_4 = $obj_parent4->parents_id;
                                    if($parents_id_4!=""){
                                    $where_p_4 = ","." $parents_id_4";                                       
                                        $parents = array(
                                                "select" =>"parents_id",
                                                "where" => "customer_id = $parents_id_4",
                                                );
                                        $obj_parent5 = $this->obj_customer->get_search_row($parents);
                                        $parents_id_5 = $obj_parent5->parents_id;
                                        if($parents_id_5!=""){
                                            $where_p_5 = ","." $parents_id_5";
                                        }else{
                                            $where_p_5 = "";
                                        }
                            }   
                        }
                    }
                }
                
        $param_tree = array(
                        "select" =>"customer_id,
                                    first_name,
                                    last_name,
                                    created_at,
                                    parents_id,
                                    pais_id,
                                    position",
                         "where" => "status_value = 1 and created_at > '$creacion' and customer_id <> $customer_id",
                         "order" => "created_at ASC LIMIT 50", 
                        ); 
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
                            }elseif($n4_4_iz == ""){
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
                            }elseif($n4_4_de == ""){
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
                   if($value->parents_id == $parents_id_1){
                         if($n1[4] == $value->position){
                             if($value->position == 1){
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
                                }elseif($n3_2_de == ""){
                                    $n3_2_de = array($value->first_name,
                                                   $value->last_name,
                                                   $value->customer_id,
                                                   $value->parents_id,
                                                   $value->position,
                                                   $value->country,
                                                   $value->code);
                                }elseif($n4_2_de == ""){
                                    $n4_2_de = array($value->first_name,
                                                   $value->last_name,
                                                   $value->customer_id,
                                                   $value->parents_id,
                                                   $value->position,
                                                   $value->country,
                                                   $value->code);
                                }elseif($n4_4_de == ""){
                                    
                                    $n4_2_de = array($value->first_name,
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
                        }
                }
            }
        }
  
        $this->tmp_backoffice->set("count_left",$count_left);
        $this->tmp_backoffice->set("count_right",$count_right);
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
    
    public function position(){
        $customer_id = $this->input->post("customer_id");
        $value = $this->input->post("left");
        $izq = $this->input->post("izq");
        $der = $this->input->post("der");
        
        if($value=="left"){
            $data = array(
               'position_temporal' => 1,
               );
            $this->obj_customer->update($customer_id, $data);
            $_SESSION['customer']['position_temporal'] = 1;
        }elseif($value=="right"){
            $data = array(
               'position_temporal' => 2,
               );
             $this->obj_customer->update($customer_id, $data);
             $_SESSION['customer']['position_temporal'] = 2;
        }else{
            if($izq > $der){
                $data = array(
               'position_temporal' => 2,
                );
            }else{
                $data = array(
               'position_temporal' => 1,
                );
            }
        $this->obj_customer->update($product_id, $data);
        $valor = $data['position_temporal'];
        $_SESSION['customer']['position_temporal'] = $valor;
        }
        redirect(site_url()."backoffice/arbol");
        
    }
    
    public function get_session(){          
        if (isset($_SESSION['customer'])){
            if($_SESSION['customer']['logged_customer']=="TRUE" && $_SESSION['customer']['status']<=2){               
                return true;
            }else{
                redirect(site_url().'backoffice');
            }
        }else{
            redirect(site_url().'backoffice');
        }
    }
}
