<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Back_blog extends MY_Controller 
{
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model(array('M_blog'));
	}

	public function index()
	{
		$data = array(
			'title_bar' 	  => 'Data Blog',
			'title' 		  => ' Blog', //H4
			'br_title' 		  => $this->uri->segment('1'),//Breadcumb
			'br_title_active' => $this->uri->segment('2'),//Breadcumb
		);
		$this->load->view('back/blog',$data);
	}

	function tambah_data()
	{	
		$data_kat_blog = $this->M_crud->tampil_data('tb_kat_blog')->result_array();
		$data_tags	   = $this->M_crud->tampil_data('tb_tags')->result_array();
		$data = array(
		'title_bar' 	  => 'Form Input Blog',
			'title' 		  => 'Form Input Blog', //H4
			'stat' 			  => 'new',
			'id_blog' 		  => '',
			'tgl_blog' 		  => '',
			'judul_blog' 	  => '',
			'author' 		  => '',
			'deskripsi' 	  => '',
			'tags' 			  => '',
			'data_tags' 	  => $data_tags,
			'data_kat_blog'   => $data_kat_blog,
			'br_title' 		  => $this->uri->segment('1'),//Breadcumb
			'br_title_active' => $this->uri->segment('2'),//Breadcumb
		);

		$this->load->view('back/blog_form',$data);
	}

	function tampil_data()
	{
		$list = $this->M_blog->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;  
            $row[] = '<a href="'.base_url().'konten/blog/edit?id='.$field->id_blog.'" id="edit" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
            <a href="javascript:void(0)" onclick="delete_data(this)" id="delete" data-id="'.$field->id_blog.'" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></a>
            ';          

            $row[] = $field->tgl_blog;
            $row[] = $field->judul_blog;
            $row[] = $field->author;
            $row[] = $field->nm_kat_blog;
            $row[] = substr($field->deskripsi, 0,100);   
            $row[] = $field->tags;
            $row[] = '<img class="img-thumbnail" style="width:100px;" src="'.base_url().'file/blog/'.$field->file_thumbnail.'">';                  
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_blog->count_all(),
            "recordsFiltered" => $this->M_blog->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}

	function simpan_data()
	{

		$id = $this->input->post('id_blog');
		$tgl_blog = $this->input->post('tgl_blog');
		$judul_blog = $this->input->post('judul_blog');
		$id_kat_blog = $this->input->post('id_kat_blog');
		$slug 	= url_title($judul_blog,'dash',TRUE);
		$author = $this->input->post('author');
		$deskripsi = $this->input->post('deskripsi');
		$file = $this->input->post('file');
		$tags = $this->input->post('tags');
		$stat  = $this->input->post('stat');
		$hasil 	=1;
		$err 	= '';		


		if ($stat == 'new') 
		{
			$tgl_blog 	= date('Y-m-d');
			$id = $this->M_crud->id_num_month_year('tb_blog','id_blog',' tgl_blog');
		}

		$set_data = array(
			'id_blog'  => $id,
			'tgl_blog' => $tgl_blog,
			'judul_blog' => $judul_blog,
			'id_kat_blog' 	 => $id_kat_blog,
			'slug' 	=> $slug,
			'author'=> $author,
			'deskripsi' => $deskripsi,
			'file_thumbnail'		=> $file,
			'tags' 			=> implode(',', $tags),
 		);

 		if ($stat == 'new') 
 		{
 			$cek_data = $this->M_crud->tampil_data_where('tb_blog',array('judul_blog' => $judul_blog))->result_array();
 			if (count($cek_data) > 0) 
 			{
 				$hasil = 0;
 				$err 	= 'Judul Blog Sudah Digunakan !';
 			}
 			else
 			{
 				if ($_FILES['file']['name'] != '') 
 				{
 				    $config = array(
 				        'upload_path'   => 'file/blog',
 				        'allowed_types' => 'gif|jpg|png|jpeg|bmp',
 				        'remove_space'  => true,
 				        'overwrite'     => false,
 				        'encrypt_name'  => false,
 				        'file_name'     => $slug.'-image',                  
 				        'max_size'      => '5000', #FILE SIZE 5 MB
 				        'detect_mime'   => true,
 				        'mod_mime_fix'  => true,
 				        'file_ext_tolower'=> true,
 				    );

 				    $this->load->library('upload',$config);
 				    $this->upload->initialize($config);

 				    if (!$this->upload->do_upload('file')) 
 				    {
 				        $hasil = 0;
 				        $err   = 'File Gagal Diupload ! Silahkan Cek Format dan Ukuran File Size !';
 				    }
 				    else
 				    {
 				        $data_upload = $this->upload->data();                
 				        $data_upload = $this->upload->data(); 
 				        $set_data['file_thumbnail'] = $data_upload['file_name'];
 				    }
 				}

 				$this->M_crud->ins_data('tb_blog',$set_data); 				 				
 			}
 		}
 		else
 		{
 			$ada = 0;
            $cek_data = $this->M_crud->tampil_data_where('tb_blog',array('id_blog' => $id))->result_array();

            if (count($cek_data) > 0) 
            {
            	$ada = 1;
            }
 			if ($_FILES['file']['name'] != '') 
 			{
 				if ($ada == 1) 
 				{
 					$file = $cek_data[0]['file_thumbnail'];
 					if ($file != NULL || $file != '') 
 					{
 					    unlink("./file/blog/".$file."");                        
 					}
 				}
 			    $config = array(
 			        'upload_path'   => 'file/blog',
 			        'allowed_types' => 'gif|jpg|png|jpeg|bmp',
 			        'remove_space'  => true,
 			        'overwrite'     => false,
 			        'encrypt_name'  => false,
 			        'file_name'     => $slug.'-image',                  
 			        'max_size'      => '5000', #FILE SIZE 5 MB
 			        'detect_mime'   => true,
 			        'mod_mime_fix'  => true,
 			        'file_ext_tolower'=> true,
 			    );

 			    $this->load->library('upload',$config);
 			    $this->upload->initialize($config);

 			    if (!$this->upload->do_upload('file')) 
 			    {
 			        $hasil = 0;
 			        $err   = 'File Gagal Diupload ! Silahkan Cek Format dan Ukuran File Size !';
 			    }
 			    else
 			    {
 			        $data_upload = $this->upload->data();                
 			        $data_upload = $this->upload->data(); 
 			        $set_data['file_thumbnail'] = $data_upload['file_name'];
 			    }
 			}
 			else
 			{
 				if ($ada == 1) 
 				{
 				    $set_data['file_thumbnail'] = $cek_data[0]['file_thumbnail'];
 				}
 			}

 			$cek_data = $this->M_crud->tampil_data_where('tb_blog',array('judul_blog' => $judul_blog, 'id_blog !=' => $id))->result_array(); 

 			if (count($cek_data) > 0) 
 			{
 				$hasil = 0;
 				$err 	= 'Judul Blog Sudah Digunakan !';
 			}	
 			else
 			{
 				$this->M_crud->upd_data('tb_blog',$set_data,array('id_blog' => $id));
 			}		
 		}

 		$data = array(
 			'hasil' => $hasil,
 			'err'	=> $err,
 		);

 		echo json_encode($data);
 	}

 	function edit_data()
 	{
 		$id = $this->input->get('id');
 		$cek_data = $this->M_crud->tampil_data_where('tb_blog',array('id_blog' => $id))->result_array();
		$data_kat_blog = $this->M_crud->tampil_data('tb_kat_blog')->result_array(); 
		$data_tags	   = $this->M_crud->tampil_data('tb_tags')->result_array();				
 		$hasil = 1;
 		$err	 = '';

 		if (count($cek_data) == 0) 
 		{
 			$hasil 	= 0;
 			$err  	= 'Data Tidak Ditemukan !';
 		}

 		$data = array(
 			'title_bar' 	  => 'Form Edit Blog',
 			'title' 		  => 'Form Edit Blog', //H4
 			'stat' 			  => 'edit',
 			'cek_data' 		  => $cek_data,
 			'data_kat_blog'   => $data_kat_blog,
 			'data_tags' 	  => $data_tags,
 			'br_title' 		  => $this->uri->segment('1'),//Breadcumb
 			'br_title_active' => $this->uri->segment('2'),//Breadcumb
 		);

 		$this->load->view('back/blog_form',$data);
 	}

 	function delete_data()
 	{
 		$id = $this->input->post('id_blog');
 		$cek_data = $this->M_crud->tampil_data_where('tb_blog',array('id_blog' => $id))->result_array();
 		$hasil = 1;
 		$err	 = '';

 		if (count($cek_data) == 0) 
 		{
 			$hasil = 0;
 			$err 	= 'Data Tidak Ditemukan !'; 
 		}
 		else
 		{
 			if ($cek_data[0]['file_thumbnail'] != '' || $cek_data[0]['file_thumbnail'] != NULL) 
 			{
 				unlink("./file/blog/".$cek_data[0]['file_thumbnail']."");  
 			}
 			$this->M_crud->del_data('tb_blog',array('id_blog' => $id));
 		}

 		$data = array(
 			'hasil' => $hasil,
 			'err' => $err,
 		);

 		echo json_encode($data);
 	}
}
