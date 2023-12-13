<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Back_kecamatan extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_kecamatan'));
    }

    public function index()
    {
        $data = array(
            'title_bar' 	  => 'Data Kecamatan',
            'title' 		  => 'Kecamatan', //H4
            'br_title' 		  => $this->uri->segment('1'),//Breadcumb
            'br_title_active' => $this->uri->segment('2'),//Breadcumb
        );
        $this->load->view('back/kecamatan',$data);
    }

    function tampil_data()
    {
        $list = $this->M_kecamatan->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;  
            $row[] = '<a href="javascript:void(0)" onclick="edit_data(this)" id="edit" data-id="'.$field->id_kecamatan.'" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
            <a href="javascript:void(0)" onclick="delete_data(this)" id="delete" data-id="'.$field->id_kecamatan.'" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></a>
            ';          
            $row[] = $field->nm_kecamatan;                     
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_kecamatan->count_all(),
            "recordsFiltered" => $this->M_kecamatan->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function simpan_data()
    {
        $id 		    = $this->input->post('id_kecamatan');
        $nm_kecamatan   = $this->input->post('nm_kecamatan');
        $stat 	  	    = $this->input->post('stat');
        $hasil 		    = 1;
        $err 		    = '';

        if ($stat == 'new') 
        {
            $id = $this->M_crud->id('tb_kecamatan','id_kecamatan','KC');
        }

        $set_data  = array(
            'id_kecamatan' 	=> $id,
            'nm_kecamatan' 	=> $nm_kecamatan,			
        );

        if ($stat == 'new') 
        {
            $cek_data = $this->M_crud->tampil_data_where('tb_kecamatan',array('nm_kecamatan' => $nm_kecamatan))->result_array();
            if (count($cek_data) > 0) 
            {
                $hasil = 0;
                $err   = 'Nama Bencana Tersebut Sudah Digunakan !';
            }
            else
            {
                $this->M_crud->ins_data('tb_kecamatan',$set_data);									
            }
        }
        else
        {
            $cek_data = $this->M_crud->tampil_data_where('tb_kecamatan',array('nm_kecamatan' => $nm_kecamatan, 'id_kecamatan !=' => $id))->result_array();

            if (count($cek_data) > 0) 
            {
                $hasil = 0;
                $err   = 'Nama Bencana Tersebut Sudah Digunakan !';
            }
            else
            {
                $this->M_crud->upd_data('tb_kecamatan',$set_data,array('id_kecamatan' => $id));
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
        $id = $this->input->post('id_kecamatan');
        $cek_data 	 = $this->M_crud->tampil_data_where('tb_kecamatan',array('id_kecamatan' => $id))->result_array();
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
        $id = $this->input->post('id_kecamatan');
        $hasil = 1;
        $err = '';
        $cek_data = $this->M_crud->tampil_data_where('tb_kecamatan',array('id_kecamatan' => $id))->result_array();
		
        if (count($cek_data) == 0) 
        {
            $hasil = 0;
            $err 	= 'Data Tidak Ditemukan !';
        }
        else
        {
            $boleh = 1;
            // Cek Ke Data Rekam Bencana
            $cek_data_rekam_bencana = $this->M_crud->tampil_data_where('v_rekam_bencana',array('id_kecamatan' => $id))->result_array();
            if (count($cek_data_rekam_bencana) > 0) 
            {
                $hasil = 0;
                $err   = "Data Tidak Dapat Dihapus, Terdapat di Data Rekam Bencana !";
                $boleh = 0;
            }

            // Cek Ke Data Rawan Bencana
            $cek_data_rawan_bencana = $this->M_crud->tampil_data_where('v_daerah_rawan_bencana',array('id_kecamatan' => $id))->result_array();
            if (count($cek_data_rawan_bencana) > 0) 
            {
                $hasil = 0;
                $err   = "Data Tidak Dapat Dihapus, Terdapat di Data Rawan Bencana !";
                $boleh = 0;
            }

            if ($boleh == 1) 
            {
                $this->M_crud->del_data('tb_kecamatan',array('id_kecamatan' => $id));
            }
        }
		
        $data = array(
            'hasil' => $hasil,
            'err' 	=> $err,
        );

        echo json_encode($data);	
    }
}