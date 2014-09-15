<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Panel extends CI_Controller{
    public function __construct() {
        parent::__construct();      
      //  $this->load->library('controller_basecms');
        //$this->controller_basecms->get_sesion();
    }
    
    public function index(){
       // $obj_show = $this->controller_basecms->get_shows();
        $modulos ='Home'; 
        $link_modulo =  site_url().$modulos; 
        $seccion = 'Vista global';        
        $this->tmp_mastercms->set('modulos',$modulos);
        $this->tmp_mastercms->set('link_modulo',$link_modulo);
        $this->tmp_mastercms->set('seccion',$seccion);
        $this->tmp_mastercms->render('panel');
      
        
     }
     
     public function demo(){
        $obj_show = $this->controller_basecms->get_shows();
        $modulos ='Home'; 
        $link_modulo =  site_url().$modulos; 
        $seccion = 'Vista global';        
        $this->tmp_mastercms->set('modulos',$modulos);
        $this->tmp_mastercms->set('link_modulo',$link_modulo);
        $this->tmp_mastercms->set('seccion',$seccion);
        $this->tmp_mastercms->render('demo/tags');
        
         //$this->load->view("demo/tags");
                 
     }
    
}