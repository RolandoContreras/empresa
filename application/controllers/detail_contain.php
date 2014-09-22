<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detail_contain extends CI_Controller {
        
    function __construct() {
        parent::__construct();
    }
	
	public function index($slug)
	{
           
            $ruta = explode("/",uri_string()); 
            
            var_dump($ruta);
            die();
            
            echo $slug;

            die();
            
            		$this->load->view('detail_contain');
	}
}