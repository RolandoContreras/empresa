<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_verify extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("orders_model","obj_orders");
        }   
                
    public function index(){       
            $this->get_session();
            $modulos ='verificaciones'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->render("dashboard/verify/verify_list");
    }
    
    public function verify_status_count(){
        if($this->input->is_ajax_request()){ 
            
            $date = date("Y-m-d");
            $year = date("Y");
            $month = date("m");
            $day = date("d");
            
            $param = array("select" =>"customer_id,
                                       created_at",
                            "where" =>"status_value = 1 && customer_id <> 1");
            $obj_customer = $this->obj_customer->search($param);
            
            //SELECCION - FECHA DE ULTIMO PEDIDO
            foreach ($obj_customer as $value) {
                    
                        $param = array("select" =>"order_id,
                                                   date_order",
                                        "where" => "customer_id = 11",
//                                        "where" => "customer_id = $value->customer_id",
                                        "order" => "order_id DESC LIMIT 1");
                        $obj_orders = $this->obj_orders->get_search_row($param);
                        
                        if($obj_orders->date_order > $value->created_at){
                            //GET DATE TO VALIDATE
                            $date = $obj_orders->date_order;
                            $date = formato_fecha_db_time($date);
                            $day = get_day_number($date);
                            
                            var_dump($day);
                            die();
                            
                            $date = $date + 30;
                            
                            
                        }
                        elseif($obj_orders->date_order < $value->created_at){
                            echo "hola";
                        }else{
                            echo "hola";
                        }
                       
            }
            
            echo json_encode($data);      
            exit();
        }
    }
    
    public function get_session(){          
        if (isset($_SESSION['usercms'])){
            if($_SESSION['usercms']['logged_usercms']=="TRUE" && $_SESSION['usercms']['status']==1){               
                return true;
            }else{
                redirect(site_url().'dashboard');
            }
        }else{
            redirect(site_url().'dashboard');
        }
    }
}
?>