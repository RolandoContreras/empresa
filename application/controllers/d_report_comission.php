<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class D_report_comission extends CI_Controller {
    public function __construct () {
        parent::__construct();
        $this->load->library('Classes/PHPExcel.php');
        $this->load->model("commissions_model","obj_commissions");
        $this->load->model("customer_model","obj_customer");
    }

    public function index(){  
        
        $this->get_session();
        
        $date_ini = $this->input->post("date_ini");
        $date_end = $this->input->post("date_end");
            
        $modulos ='reportes_comision';
        $seccion = 'Lista';        
        $link_modulo =  site_url().'dashboard/'.$modulos;

        $date_ini = $this->input->post("date_ini");
        $date_end = $this->input->post("date_end");
            
            $params = array(
                        "select" =>"commissions.amount,
                                    commissions.name,
                                    commissions.date,
                                    customer.last_name,
                                    customer.first_name",
                         "where" => "commissions.date >= '$date_ini' and commissions.date <= '$date_end' and commissions.parent_id <> 1",
                          "join" => array('customer, commissions.parent_id = customer.customer_id'),
                          "order" => "commissions.date ASC"
                        );
            $obj_comission = $this->obj_commissions->search($params);
        
        /// VISTA
        $this->tmp_mastercms->set('link_modulo',$link_modulo);
        $this->tmp_mastercms->set('obj_comission',$obj_comission);
        $this->tmp_mastercms->set('date_ini',$date_ini);
        $this->tmp_mastercms->set('date_end',$date_end);
        $this->tmp_mastercms->set('modulos',$modulos);
        $this->tmp_mastercms->set('seccion',$seccion);
        $this->tmp_mastercms->render("dashboard/report/comission_report");
    }
    
    public function comission_excel(){
        
        
        $date_ini = $this->input->post("date_ini");
        $date_end = $this->input->post("date_end");
        
            $params = array(
                        "select" =>"commissions.amount,
                                    commissions.name,
                                    commissions.date,
                                    customer.last_name,
                                    customer.first_name",
                         "where" => "commissions.date >= '$date_ini' and commissions.date <= '$date_end' and commissions.parent_id <> 1",
                          "join" => array('customer, commissions.parent_id = customer.customer_id'),
                          "order" => "commissions.date ASC"
                        );
            $data['obj_comission'] = $this->obj_commissions->search($params);
            $data['date_ini'] = $date_ini;
            $data['date_end'] = $date_end;
        
        /// VISTA
        $this->load->view("dashboard/report/comission_excel",$data);
         
    }
    
    public function report_associated(){  
        
        $this->get_session();
        $params = array("select" =>"first_name,
                                    last_name,
                                    dni,
                                    code,
                                    password,
                                    phone,
                                    mobile",
                    "order" => "code DESC");
        
            $modulos ='reportes_asociados'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            /// DATA
            $obj_customer= $this->obj_customer->search($params);

            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('obj_customer',$obj_customer);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->render("dashboard/report/associated_comission");
    }
    
    public function report_comission_by_associated(){  
        
        $this->get_session();
        
        $params = array(
                        "select" =>"commissions.amount,
                                    commissions.name,
                                    commissions.date,
                                    commissions.status_value,
                                    customer.code,
                                    customer.last_name,
                                    customer.first_name,
                                    customer.dni,
                                    customer.country,",
                         "where" => "commissions.parent_id <> 1",
                          "join" => array('customer, commissions.parent_id = customer.customer_id'),
                          "order" => "commissions.date DESC"
                        );
            $obj_comission = $this->obj_commissions->search($params);
            
            //INFO
            $modulos ='reporte_comision_x_asociado'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('obj_comission',$obj_comission);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->render("dashboard/report/comission_x_associated");
    }
    
    public function associated_excel(){
            
            $params = array("select" =>"first_name,
                                    last_name,
                                    dni,
                                    code,
                                    password,
                                    phone,
                                    mobile",
                    "order" => "code DESC");
            
           $data['obj_customer'] = $this->obj_customer->search($params);
           $this->load->view("dashboard/report/associated_excel",$data);   
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