<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_new_member extends CI_Controller {
	
    function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        /// VISTA
            $this->tmp_backoffice->render("backoffice/new_member");
    }
}
