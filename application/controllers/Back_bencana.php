<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Back_bencana extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_bencana'));
    }

    public function index()
    {
        $data = array(
            'title_bar' 	  => 'Data Bencana',
            'title' 		  => 'Bencana', //H4
            'br_title' 		  => $this->uri->segment('1'),//Breadcumb
            'br_title_active' => $this->uri->segment('2'),//Breadcumb
        );
        $this->load->view('back/bencana',$data);
    }

    function tampil_data()
	{
		$list = $this->M_bencana->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;  
            $row[] = '<a href="javascript:void(0)" onclick="edit_data(this)" id="edit" data-id="'.$field->id_bencana.'" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
            <a href="javascript:void(0)" onclick="delete_data(this)" id="delete" data-id="'.$field->id_bencana.'" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></a>
            ';          
            $row[] = $field->nm_bencana;                     
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_bencana->count_all(),
            "recordsFiltered" => $this->M_bencana->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}

    function simpan_data()
    {
        $id 		= $this->input->post('id_bencana');
        $nm_bencana = $this->input->post('nm_bencana');
        $stat 	  	= $this->input->post('stat');
        $hasil 		= 1;
        $err 		= '';

        if ($stat == 'new') 
        {
            $id = $this->M_crud->id('tb_bencana','id_bencana','KT');
        }

        $set_data  = array(
            'id_bencana' 	=> $id,
            'nm_bencana' 	=> $nm_bencana,			
        );

        if ($stat == 'new') 
        {
            $cek_data = $this->M_crud->tampil_data_where('tb_bencana',array('nm_bencana' => $nm_bencana))->result_array();
            if (count($cek_data) > 0) 
            {
                $hasil = 0;
                $err   = 'Nama Bencana Tersebut Sudah Digunakan !';
            }
            else
            {
                $this->M_crud->ins_data('tb_bencana',$set_data);									
            }
        }
        else
        {
            $cek_data = $this->M_crud->tampil_data_where('tb_bencana',array('nm_bencana' => $nm_bencana, 'id_bencana !=' => $id))->result_array();

            if (count($cek_data) > 0) 
            {
                $hasil = 0;
                $err   = 'Nama Bencana Tersebut Sudah Digunakan !';
            }
            else
            {
                $this->M_crud->upd_data('tb_bencana',$set_data,array('id_bencana' => $id));
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
        $id = $this->input->post('id_bencana');
        $cek_data 	 = $this->M_crud->tampil_data_where('tb_bencana',array('id_bencana' => $id))->result_array();
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
        $id = $this->input->post('id_bencana');
        $hasil = 1;
        $err = '';
        $cek_data = $this->M_crud->tampil_data_where('tb_bencana',array('id_bencana' => $id))->result_array();
		
        if (count($cek_data) == 0) 
        {
            $hasil = 0;
            $err 	= 'Data Tidak Ditemukan !';
        }
        else
        {
            $this->M_crud->del_data('tb_bencana',array('id_bencana' => $id));
        }
		
        $data = array(
            'hasil' => $hasil,
            'err' 	=> $err,
        );

        echo json_encode($data);	
    }
}