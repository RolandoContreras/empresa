<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backoffice extends CI_Controller {

	
    function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        if(isset($_SESSION['customer'])){
             /// VISTA
            $this->tmp_backoffice->render("backoffice/backoffice");
        } else{
            redirect('micuenta');
        }  
            
   }
}
