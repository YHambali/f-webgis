
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
			'title_bar' => 'Dashboard',
			'br_title'  => 'Dashboard',
			'br_title_active' => '',
			'menu' 		=> '',			
			'deskripsi' => '',			

			// META
			'deskripsi' => '',
			'title'		=> 'Dashboard',
			'keywords'  => '',

			'jml_desa' 	=> count($this->M_crud->tampil_data('tb_desa')->result_array()),
			'jml_kecamatan' => count($this->M_crud->tampil_data('tb_desa')->result_array()),
			'jml_rawan' => count($this->M_crud->tampil_data_where('v_daerah_rawan_bencana',array('status_rawan_bencana' => 'Rawan'))->result_array()),
			'jml_tidak_rawan' => count($this->M_crud->tampil_data_where('v_daerah_rawan_bencana',array('status_rawan_bencana' => 'Tidak Rawan'))->result_array()),
			'jml_bencana_terjadi' => count($this->M_crud->tampil_data('v_rekam_bencana')->result_array()),

		);
		$this->load->view('front/home',$data);
	}
}
