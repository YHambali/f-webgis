<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Back_dashboard extends MY_Controller 
{
	function __construct() 
    {
        parent::__construct();        
    }

	public function index()
	{        
		$data = array(
			'title_bar' 	  => 'Dashboard',
			'title' 		  => 'Dashboard', //H4
			'br_title' 		  => $this->uri->segment('1'),//Breadcumb
			'br_title_active' => $this->uri->segment('2'),//Breadcumb
            
		);
		$this->load->view('back/dashboard',$data);
	}
}
