
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Front_home extends CI_Controller 
{	
	function __construct()
	{
		parent::__construct();		
	}
	

	public function index()
	{
		$data = array(
			'title_bar' => 'Home',
			'br_title'  => 's',
			'br_title_active' => '',
			'menu' 		=> '',			
			'deskripsi' => '',			

			// META
			'deskripsi' => '',
			'title'		=> 'Dashboard',
			'keywords'  => '',

			// OPEN GRAPH
			'gambar' 	=> base_url()."file/logo/og-image.jpg",
			

		);
		$this->load->view('front/home',$data);
	}
}
