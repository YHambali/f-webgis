<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Back_logout extends CI_Controller {
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model(array('M_crud'));
	}
	// Logout
	function logout() {
        $this->session->sess_destroy();
        redirect(base_url(''));
    }
}
