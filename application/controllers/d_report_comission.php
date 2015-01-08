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
        $modulos ='reportes_comision'; 
        $seccion = 'Lista';        
        $link_modulo =  site_url().'dashboard/'.$modulos;

        /// VISTA
        $this->tmp_mastercms->set('link_modulo',$link_modulo);
        $this->tmp_mastercms->set('modulos',$modulos);
        $this->tmp_mastercms->set('seccion',$seccion);
        $this->tmp_mastercms->render("dashboard/report/comission_report");
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
        
        /// PAGINADO
            $config=array();
            $config["base_url"] = site_url("dashboard/reportes_asociados"); 
            $config["total_rows"] = $this->obj_customer->total_records($params) ;  
            $config["per_page"] = 20; 
            $config["num_links"] = 3;
            $config["uri_segment"] = 3;   
            
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';            
            $config['num_tag_open']='<li>';
            $config['num_tag_close'] = '</li>';            
            $config['cur_tag_open']= '<li class="active"><a>';
            $config['cur_tag_close']= '</li></a>';            
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';            
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            
            $this->pagination->initialize($config);        
            $obj_pagination = $this->pagination->create_links();
            $modulos ='productos'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            /// DATA
            $obj_customer= $this->obj_customer->search_data($params, $config["per_page"],$this->uri->segment(3));

            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('pagination',$obj_pagination);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('obj_customer',$obj_customer);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->render("dashboard/report/associated_comission");
    }
    
    public function comission_excel(){
        
            $date_ini = $this->input->post("date_ini");
            $date_end = $this->input->post("date_end");
            
            $params = array(
                        "select" =>"SUM(amount) as total",
                         "where" => "date >= '$date_ini' and date <= '$date_end' and parent_id <> 1",
                        );
            
            $obj_comission = $this->obj_commissions->get_search_row($params);
            $total = $obj_comission->total;
            
            $date_ini = formato_fecha($date_ini);
            $date_end = formato_fecha($date_end);
            
           // configuramos las propiedades del documento
          $this->phpexcel->getProperties()->setCreator("Waveline S.A.C")
                                     ->setTitle("Reporte de Comisiones")
                                     ->setSubject("Office 2007 XLSX Test Document")
                                     ->setKeywords("office 2007 openxml php")
                                     ->setCategory("Test result file");
         
        
        // agregamos información a las celdas
        $this->phpexcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', "REPORTE DE COMISION DEL $date_ini HASTA $date_end");
        
        // La librería puede manejar la codificación de caracteres UTF-8
        $this->phpexcel->setActiveSheetIndex(0)
                    ->setCellValue('A3', 'N°')
                    ->setCellValue('B3', 'Monto');
        
        // La librería puede manejar la codificación de caracteres UTF-8
        $this->phpexcel->setActiveSheetIndex(0)
                    ->setCellValue('A4', 'TOTAL')
                    ->setCellValue('B4', "$total");
         
        // Renombramos la hoja de trabajo
        $this->phpexcel->getActiveSheet()->setTitle("Reporte de Comisiones");
         
        // configuramos el documento para que la hoja
        // de trabajo número 0 sera la primera en mostrarse
        // al abrir el documento
        $this->phpexcel->setActiveSheetIndex(0);
         
        // redireccionamos la salida al navegador del cliente (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="reporte_comission.xlsx"');
        header('Cache-Control: max-age=0');
         
        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
        $objWriter->save('php://output');
        
        echo "<script type='text/javascript'>";
        echo "window.history.back(-1)";
        echo "</script>";
         
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