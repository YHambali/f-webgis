<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Back_login extends CI_Controller 
{
	function __construct() {
        parent::__construct();
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        
        if ($this->session->userdata('loged') == 1) 
        {
            redirect(base_url('dashboard'));
            // echo $this->session->userdata('loged');
        }
    }	

	public function index()
	{
		$data = array(
			'title_bar' => 'Login Form',
			'auth_link' => 'auth-faylogic/proses',			
		);
		$this->load->view('back/form_login',$data);
	}

	function proses() 
	{
        $this->load->helper('security');
		$user 	= $this->security->xss_clean($this->input->post('username',TRUE));
		$psw 	= $this->security->xss_clean($this->input->post('password',TRUE));
		$u 		= $user;
		$p 		= md5($psw);


		$cek 	= $this->M_crud->tampil_data_where('tb_user',array('usr' => $u,'pswd' => $p, 'status_aktif' => 1))->result_array();
		
		if (count($cek) > 0)
		{
		  	 //login berhasil, buat session
		   	foreach ($cek as $qad) 
		   	{
			   	$sess_data = array(
			   	    'loged' 		=> 1,
			   	    'id_user'		=> $qad['id_user'],
			   	    'username' 		=> $qad['nm_user'],
			   	    'status_aktif' 		=> $qad['status_aktif'],
			   	);

		       $this->session->set_userdata($sess_data);
		   	}
		  
		    redirect(base_url('dashboard'));
		}
		else
		{
			$this->session->set_flashdata('result', '<div class="alert alert-danger alert-dismissable">
			                                <i class="fa fa-info"></i>
			                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                                <b>Gagal ! </b> Anda Tidak Memiliki Akses
			                            </div>');
			redirect(base_url('auth-faylogic'));
		}		
    }

}
