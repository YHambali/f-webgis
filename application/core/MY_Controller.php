<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller 
{
	public function __construct()
	{
	    parent::__construct();
	    if ($this->session->userdata('loged') <> 1) 
	    {
	        redirect(base_url(''));
	    }
	}
}