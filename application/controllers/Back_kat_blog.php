<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Back_kat_blog extends MY_Controller 
{
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model(array('M_kat_blog'));
	}

	public function index()
	{
		$data = array(
			'title_bar' 	  => 'Data Kategori Blog',
			'title' 		  => 'Kategori Blog', //H4
			'br_title' 		  => $this->uri->segment('1'),//Breadcumb
			'br_title_active' => $this->uri->segment('2'),//Breadcumb
		);
		$this->load->view('back/kategori_blog',$data);
	}

	function tampil_data()
	{
		$list = $this->M_kat_blog->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;  
            $row[] = '<a href="javascript:void(0)" onclick="edit_data(this)" id="edit" data-id="'.$field->id_kat_blog.'" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
            <a href="javascript:void(0)" onclick="delete_data(this)" id="delete" data-id="'.$field->id_kat_blog.'" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></a>
            ';          
            $row[] = $field->nm_kat_blog;                     
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_kat_blog->count_all(),
            "recordsFiltered" => $this->M_kat_blog->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}

	function simpan_data()
	{
		$id 		= $this->input->post('id_kat_blog');
		$nm_kat_blog 	= $this->input->post('nm_kat_blog');
		$stat 	  	= $this->input->post('stat');
		$hasil 		= 1;
		$err 		= '';

		if ($stat == 'new') 
		{
			$id = $this->M_crud->id('tb_kat_blog','id_kat_blog','KT');
		}

		$set_data  = array(
			'id_kat_blog' 	=> $id,
			'nm_kat_blog' 		=> $nm_kat_blog,			
		);

		if ($stat == 'new') 
		{
			$cek_data = $this->M_crud->tampil_data_where('tb_kat_blog',array('nm_kat_blog' => $nm_kat_blog))->result_array();
			if (count($cek_data) > 0) 
			{
				$hasil = 0;
				$err   = 'Kategori Blog Tersebut Sudah Digunakan !';
			}
			else
			{
				$this->M_crud->ins_data('tb_kat_blog',$set_data);									
			}
		}
		else
		{
			$cek_data = $this->M_crud->tampil_data_where('tb_kat_blog',array('nm_kat_blog' => $nm_kat_blog, 'id_kat_blog !=' => $id))->result_array();

			if (count($cek_data) > 0) 
			{
				$hasil = 0;
				$err   = 'Kategori Blog Tersebut Sudah Digunakan !';
			}
			else
			{
				$this->M_crud->upd_data('tb_kat_blog',$set_data,array('id_kat_blog' => $id));
			}
		}

		$data = array(
			'hasil' => $hasil,
			'err'  	=> $err,
		);

		echo json_encode($data);

	}

	function edit_data()
	{
		$id = $this->input->post('id_kat_blog');
		$cek_data 	 = $this->M_crud->tampil_data_where('tb_kat_blog',array('id_kat_blog' => $id))->result_array();
		$hasil 		= 1;
		$err 		= '';

		if (count($cek_data) == 0) 
		{
			$hasil = 0;
			$err = 'Data Tidak Ditemukan !';
		}		

		$data = array(
			'hasil' => $hasil,
			'err' 	=> $err,
			'cek_data' => $cek_data,
		);

		echo json_encode($data);	
	}

	function delete_data()
	{
		$id = $this->input->post('id_kat_blog');
		$hasil = 1;
		$err = '';
		$cek_data = $this->M_crud->tampil_data_where('tb_kat_blog',array('id_kat_blog' => $id))->result_array();
		
		if (count($cek_data) == 0) 
		{
			$hasil = 0;
			$err 	= 'Data Tidak Ditemukan !';
		}
		else
		{
			$this->M_crud->del_data('tb_kat_blog',array('id_kat_blog' => $id));
		}
		
		$data = array(
			'hasil' => $hasil,
			'err' 	=> $err,
		);

		echo json_encode($data);	
	}

	// function _upload_file($id,$path,$type,$max_size,$input_name)
	// {
	// 	if ($_FILES[$input_name]['name'] != '') 
	// 	{
	// 	    $config = array(
	// 	        'upload_path'   	=> $path,
	// 	        'allowed_types' 	=> $type,
	// 	        'remove_space'  	=> true,
	// 	        'overwrite'     	=> false,
	// 	        'encrypt_name'  	=> false,
	// 	        'file_name'     	=> $id,                  
	// 	        'max_size'      	=> $max_size, #FILE SIZE 5 MB
	// 	        'detect_mime'   	=> true,
	// 	        'mod_mime_fix'  	=> true,
	// 	        'file_ext_tolower'	=> true,
	// 	    );

	// 	    $this->load->library('upload',$config);
	// 	    $this->upload->initialize($config);

	// 	    if (!$this->upload->do_upload($input_name)) 
	// 	    {
	// 	        $hasil = 0;
	// 	        $err   = 'File Gagal Diupload ! Silahkan Cek Format dan Ukuran File Size !';
	// 	    }
	// 	    else
	// 	    {
	// 	        $data_upload = $this->upload->data();                
	// 	        $set_data[$input_name] = $data_upload['file_name'];
	// 	        $hasil = 1; #BOLEH LANJUT INSERT
	// 	    }
	// 	}
	// }
}