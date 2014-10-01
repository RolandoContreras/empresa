<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_faq extends CI_Controller {

	
    function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        /// VISTA
            $this->tmp_backoffice->render("backoffice/faq");
    }
}
