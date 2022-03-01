<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Errors extends MY_Controller 
{
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model(array('M_blog'));
	}

	public function page_not_found()
	{				
		$this->load->view('errors/html/error_404');
	}
}