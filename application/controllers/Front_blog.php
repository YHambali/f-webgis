<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Front_blog extends CI_Controller 
{	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
	    $config  = array(
	        'first_link' 		=> '&laquo',
	        'first_tag_open' 	=> '<li>',
	        'first_tag_close' 	=> '</li>',
	        'last_link'     	=> '&raquo',
	        'last_tag_open' 	=> '<li>',
	        'last_tag_close' 	=> '</li>',
	        'next_link'     	=> '<span aria-hidden="true">&rsaquo;</span>',
	        'prev_link'     	=> '<span aria-hidden="true">&lsaquo;</span>',
	        'full_tag_open' 	=> '<ul class="pager gradient">', #TAG PEMBUKA HASIL PAGINASI'
	        'full_tag_close'	=> '</ul>',
	        'num_tag_open' 		=> '<li>',
	        'num_tag_close' 	=> '</li>',
	        'cur_tag_open'  	=> '<li class="active"><a href="#">', #TAG PEMBUKA TAUTAN YANG SEDANG DIAKSES
	        'cur_tag_close' 	=> '</a></li>',
	        'next_tag_open' 	=> '<li>',
	        'next_tag_close' 	=> '</li>',
	        'prev_tag_open' 	=> '<li>',
	        'prev_tag_close' 	=> '</li>',
	        'base_url'       	=> base_url().'blog/',
	        'total_rows'     	=> count($this->M_crud->tampil_data('v_blog')->result_array()),
	        'per_page'       	=> 16,
	        'num_links'      	=> 16,
	        'use_page_numbers' 	=> TRUE,		                 
	    );

	    $segment            	= $this->uri->segment('2');
	    $from               	= $segment > 0 ? (($segment - 1) * $config['per_page']) : $segment; 
	    $this->pagination->initialize($config);
		$this->db->order_by('tgl_blog','desc');
		$blog 		 			= $this->M_crud->tampil_data_page('v_blog',$config['per_page'],$from)->result_array();
		$contact 				= $this->M_crud->tampil_data('tb_contact')->result_array();
	   	
		$data = array (
	        'title_bar'     => 'Blog',
	        'menu'         => 'navbar-standart',  
	        'deskripsi'    => '',  
	        // 'menu'			=> 0,       
			'blog' 	    	=> $blog,
			'contact' 	    => $contact,

			
			// META
			'deskripsi' => 'Faylogic Creative merupakan jasa pembuatan website dan aplikasi berbasis web yang berkomitmen menjadi partner dalam pembangunan dan pengembangan website dan menjadi bagian kesuksesan segala kebutuhan digital anda',
			'gambar' 	=> base_url()."file/logo/og-image.jpg",
			'title'		=> 'Blog - Faylogic Creative',
			'keywords'  => 'Jasa Pembuatan Website, Jasa Pembuatan Aplikasi, Website Development, Web Development, Jasa Pembuatan Website Karawang, Jasa Pembuatan Website Murah Karawang, Jasa Pembuatan Website Kreatif Karawang, Jasa Pembuatan Aplikasi Kasir, Jasa Pembuatan Website Sekolah, Jasa Pembuatan Company Profile',

		);

		$this->load->view('front/blog',$data);
	}



	function blog_detail($slug)
	{
		$cek_data = $this->M_crud->tampil_data_where('tb_blog', array('slug' => $slug))->result_array();
		$contact 				= $this->M_crud->tampil_data('tb_contact')->result_array();


		$this->M_crud->_limit(6);
		$this->M_crud->_order_by('tgl_blog','desc');
		$blog 		= $this->M_crud->tampil_data('tb_blog')->result_array();
		

		if (count($cek_data) > 0) 
		{
			$data = array(
				'title_bar' => $cek_data[0]['judul_blog']." | ".$cek_data[0]['author']." - Faylogic Creative",
				'menu' 		=> 'navbar-standart',				
				'data' 		=> $cek_data,
				
				// OPEN GRAPH
				'deskripsi' => $cek_data[0]['deskripsi'],
				'gambar' 	=> base_url()."/file/blog/".$cek_data[0]['file_thumbnail'],
				'title'		=> $cek_data[0]['author']." - ".$cek_data[0]['judul_blog'],
				'contact'   => $contact,
				'blog' 		=> $blog,

				// META
				'deskripsi' => $cek_data[0]['deskripsi'],
				'keywords'  => 'Jasa Pembuatan Website, Jasa Pembuatan Aplikasi, Website Development, Web Development, Jasa Pembuatan Website Karawang, Jasa Pembuatan Website Murah Karawang, Jasa Pembuatan Website Kreatif Karawang, Jasa Pembuatan Aplikasi Kasir, Jasa Pembuatan Website Sekolah, Jasa Pembuatan Company Profile',


			);

			$this->load->view('front/blog_detail',$data);

		}
		else
		{
			redirect(base_url('page404'));					
		}
	}

}
