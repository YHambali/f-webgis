<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Back_rekam_bencana extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_rekam_bencana'));
    }

    public function index()
    {
        $data = array(
            'title_bar' 	  => 'Data Rekam Bencana',
            'title' 		  => 'Rekam Bencana', //H4
            'br_title' 		  => $this->uri->segment('1'),//Breadcumb
            'br_title_active' => $this->uri->segment('2'),//Breadcumb
        );
        $this->load->view('back/rekam_bencana',$data);
    }

    function tampil_data()
    {
        $list = $this->M_rekam_bencana->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;  
            $row[] = '<a href="'.base_url().'konten/data-rekam-bencana/edit?id='.$field->id_rekam_bencana.'" id="edit" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
            <a href="javascript:void(0)" onclick="delete_data(this)" id="delete" data-id="'.$field->id_rekam_bencana.'" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></a>
            ';          
            $row[] = $field->nm_kecamatan;
            $row[] = $field->nm_desa;
            $row[] = $field->nm_bencana;
            $row[] = $field->tgl_bencana;
            $row[] = $field->ket_bencana;                     
            $row[] = '<a href="'.base_url().'file/rekam_bencana/'.$field->file_dokumentasi.'" target="_blank" class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-file-alt"></i> Lihat Dokumentasi</a>';                     
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_rekam_bencana->count_all(),
            "recordsFiltered" => $this->M_rekam_bencana->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function tambah_data()
    {	
        $data = array(
            'title_bar' 	  => 'Form Input Rekam Bencana',
            'title' 		  => 'Form Input Rekam Bencana', //H4
            'stat' 			  => 'new',
            'id_rekam_bencana'=> '',
            'id_desa' 		  => '',
            'id_bencana'      => '',
            'tgl_bencana' 	  => '',
            'ket_bencana' 	  => '',
            'data_desa'       => $this->M_crud->tampil_data('tb_desa')->result_array(),
            'data_bencana'    => $this->M_crud->tampil_data('tb_bencana')->result_array(),
            'br_title' 		  => $this->uri->segment('1'),//Breadcumb
            'br_title_active' => $this->uri->segment('2'),//Breadcumb
        );

        $this->load->view('back/rekam_bencana_form',$data);
    }

    function simpan_data()
    {
        $id = $this->input->post('id_rekam_bencana');
        $id_desa = $this->input->post('id_desa');
        $id_bencana = $this->input->post('id_bencana');
        $tgl_bencana = $this->input->post('tgl_bencana');
        $ket_bencana = $this->input->post('ket_bencana');
        $file = $this->input->post('file');
        $stat = $this->input->post('stat');
        $hasil = 1;
        $err   = '';
        
        if ($stat == 'new') 
        {            
            $id = $this->M_crud->id_num_year_var('tb_rekam_bencana','id_rekam_bencana','tgl_bencana',$tgl_bencana);
        }

        $set_data = array(
            'id_rekam_bencana'=> $id,
            'id_desa' => $id_desa,
            'id_bencana' => $id_bencana,
            'tgl_bencana' => $tgl_bencana,
            'ket_bencana' => $ket_bencana,
            'file_dokumentasi' => $file,
        );

        if ($stat == 'new') 
        {
            if ($_FILES['file']['name'] != '') 
            {
                $config = array(
                    'upload_path'   => 'file/rekam_bencana',
                    'allowed_types' => 'pdf',
                    'remove_space'  => true,
                    'overwrite'     => false,
                    'encrypt_name'  => false,
                    'file_name'     => $id,                  
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
                    $set_data['file_dokumentasi'] = $data_upload['file_name'];
                    $this->M_crud->ins_data('tb_rekam_bencana',$set_data);
                }
            }

        }
        else
        {
            $cek_data = $this->M_crud->tampil_data_where('tb_rekam_bencana',array('id_rekam_bencana' => $id))->result_array();

            if (count($cek_data) > 0) 
            {
                if ($_FILES['file']['name'] != '') 
                {
                    $file = $cek_data[0]['file_dokumentasi'];
                    if ($file != NULL || $file != '') 
                    {
                        unlink("./file/rekam_medis/".$file."");                        
                    }

                    $config = array(
                        'upload_path'   => 'file/rekam_bencana',
                        'allowed_types' => 'pdf',
                        'remove_space'  => true,
                        'overwrite'     => false,
                        'encrypt_name'  => false,
                        'file_name'     => $id,                  
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
                        $set_data['file_dokumentasi'] = $data_upload['file_name'];
                    }
                }
                else
                {
                    $set_data['file_dokumentasi'] = $cek_data[0]['file_dokumentasi'];
                }

                $this->M_crud->upd_data('tb_rekam_bencana',$set_data,array('id_rekam_bencana' => $id));
            }   
            else
            {
                $hasil = 0;
                $err   = "Data Tidak Ditemukan !";
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
        $cek_data = $this->M_crud->tampil_data_where('tb_rekam_bencana',array('id_rekam_bencana' => $id))->result_array();
        
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
            'data_desa'       => $this->M_crud->tampil_data('tb_desa')->result_array(),
            'data_bencana'    => $this->M_crud->tampil_data('tb_bencana')->result_array(),
            'br_title' 		  => $this->uri->segment('1'),//Breadcumb
            'br_title_active' => $this->uri->segment('2'),//Breadcumb
        );

        $this->load->view('back/rekam_bencana_form',$data);
    }
    
    function delete_data()
    {
        $id = $this->input->post('id_rekam_bencana');
        $cek_data = $this->M_crud->tampil_data_where('tb_rekam_bencana',array('id_rekam_bencana' => $id))->result_array();
        $hasil = 1;
        $err	 = '';

        if (count($cek_data) == 0) 
        {
            $hasil = 0;
            $err 	= 'Data Tidak Ditemukan !'; 
        }
        else
        {
            if ($cek_data[0]['file_dokumentasi'] != '' || $cek_data[0]['file_dokumentasi'] != NULL) 
            {
                unlink("./file/rekam_bencana/".$cek_data[0]['file_dokumentasi']."");  
            }
            $this->M_crud->del_data('tb_rekam_bencana',array('id_rekam_bencana' => $id));
        }

        $data = array(
            'hasil' => $hasil,
            'err' => $err,
        );

        echo json_encode($data);
    }
    

}