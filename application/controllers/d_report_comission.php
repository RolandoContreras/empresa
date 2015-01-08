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
        $modulos ='reportes_asociados'; 
        $seccion = 'Lista';        
        $link_modulo =  site_url().'dashboard/'.$modulos;

        /// VISTA
        $this->tmp_mastercms->set('link_modulo',$link_modulo);
        $this->tmp_mastercms->set('modulos',$modulos);
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
            
            $params = array(
                        "select" =>"first_name,
                                    last_name,
                                    dni,
                                    code,
                                    password,
                                    phone,
                                    mobile");
            
            $obj_customer = $this->obj_customer->search($params);
            
           // configuramos las propiedades del documento
          $this->phpexcel->getProperties()->setCreator("Waveline S.A.C")
                                     ->setTitle("Reporte de Asociados")
                                     ->setKeywords("office 2007 openxml php")
                                     ->setCategory("Test result file");
         
        
        // agregamos información a las celdas
        $this->phpexcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', "REPORTE DE ASOCIADOS");
        
        // La librería puede manejar la codificación de caracteres UTF-8
        $this->phpexcel->setActiveSheetIndex(0)
                    ->setCellValue('A3', 'CODIGO')
                    ->setCellValue('B3', 'CONTRASEÑA')
                    ->setCellValue('C3', 'APELLIDOS')
                    ->setCellValue('D3', 'NOMBRES')
                    ->setCellValue('E3', 'DNI')
                    ->setCellValue('F3', 'TELEFONO')
                    ->setCellValue('G3', 'CELULAR');
        
        
        
        // La librería puede manejar la codificación de caracteres UTF-8
        
        foreach ($obj_customer as $key => $value) {
                $i = 4;
                    $this->phpexcel->setActiveSheetIndex(0)
                    ->setCellValue("A$i", "$value->code")
                    ->setCellValue("B$i", "$value->password")
                    ->setCellValue("C$i", "$value->last_name")
                    ->setCellValue("D$i", "$value->first_name")
                    ->setCellValue("E$i", "$value->dni")
                    ->setCellValue("F$i", "$value->phone")
                    ->setCellValue("G$i", "$value->mobile");
                $i = $i + 1;
        }
        
         
        // Renombramos la hoja de trabajo
        $this->phpexcel->getActiveSheet()->setTitle("Reporte de Asociados");
         
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