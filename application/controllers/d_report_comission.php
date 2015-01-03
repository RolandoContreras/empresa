<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class D_report_comission extends CI_Controller {
    public function __construct () {
        parent::__construct();
        $this->load->library('Classes/PHPExcel.php');
        $this->load->model("commissions_model","obj_commissions");
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
    
    
    
    public function comission_excel(){
        
            $date_ini = $this->input->post("date_ini");
            $date_end = $this->input->post("date_end");
          
      
            $params = array(
                        "select" =>"SUM(amount) as total",
                         "where" => "date >= '$date_ini' and date <= '$date_end'",
                        );
            
            $obj_comission = $this->obj_commissions->get_search_row($params);
            $total = $obj_comission->total;
            
           // configuramos las propiedades del documento
          $this->phpexcel->getProperties()->setCreator("Waveline S.A.C")
                                     ->setTitle("Reporte de Comisiones")
                                     ->setSubject("Office 2007 XLSX Test Document")
                                     ->setDescription("Reporte de las comisiones de $date_ini hasta el $date_end")
                                     ->setKeywords("office 2007 openxml php")
                                     ->setCategory("Test result file");
         
         
        // agregamos información a las celdas
        $this->phpexcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'N°')
                    ->setCellValue('B1', 'Monto!');
        
         
        // La librería puede manejar la codificación de caracteres UTF-8
        $this->phpexcel->setActiveSheetIndex(0)
                    ->setCellValue('A2', 'TOTAL')
                    ->setCellValue('B2', "$total");
         
        // Renombramos la hoja de trabajo
        $this->phpexcel->getActiveSheet()->setTitle('Simple');
         
         
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