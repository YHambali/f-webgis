<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Back_desa extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_desa'));
    }

    public function index()
    {
        $data = array(
            'title_bar' 	  => 'Data Desa',
            'title' 		  => 'Desa', //H4
            'br_title' 		  => $this->uri->segment('1'),//Breadcumb
            'br_title_active' => $this->uri->segment('2'),//Breadcumb
            'data_kecamatan'  => $this->M_crud->tampil_data('tb_kecamatan')->result_array(),
        );
        $this->load->view('back/desa',$data);
    }

    function tampil_data()
    {
        $list = $this->M_desa->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;  
            $row[] = '<a href="javascript:void(0)" onclick="edit_data(this)" id="edit" data-id="'.$field->id_desa.'" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
            <a href="javascript:void(0)" onclick="delete_data(this)" id="delete" data-id="'.$field->id_desa.'" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></a>
            ';          
            $row[] = $field->id_kecamatan;                     
            $row[] = $field->nm_desa;                     
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_desa->count_all(),
            "recordsFiltered" => $this->M_desa->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function simpan_data()
    {
        $id 		= $this->input->post('id_desa');
        $id_kecamatan   = $this->input->post('id_kecamatan');
        $nm_desa    = $this->input->post('nm_desa');
        $stat 	  	= $this->input->post('stat');
        $hasil 		= 1;
        $err 		= '';

        if ($stat == 'new') 
        {
            $id = $this->M_desa->id_desa('tb_desa',$id_kecamatan,'id_desa','DS');
        }

        $set_data  = array(
            'id_desa' 	    => $id,
            'id_kecamatan'  => $id_kecamatan,
            'nm_desa' 	    => $nm_desa,			
        );

        if ($stat == 'new') 
        {
            $cek_data = $this->M_crud->tampil_data_where('tb_desa',array('nm_desa' => $nm_desa))->result_array();
            if (count($cek_data) > 0) 
            {
                $hasil = 0;
                $err   = 'Nama Desa Tersebut Sudah Digunakan !';
            }
            else
            {
                $this->M_crud->ins_data('tb_desa',$set_data);									
            }
        }
        else
        {
            $cek_data = $this->M_crud->tampil_data_where('tb_desa',array('nm_desa' => $nm_desa, 'id_desa !=' => $id))->result_array();

            if (count($cek_data) > 0) 
            {
                $hasil = 0;
                $err   = 'Nama Desa Tersebut Sudah Digunakan !';
            }
            else
            {
                $this->M_crud->upd_data('tb_desa',$set_data,array('id_desa' => $id));
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
        $id = $this->input->post('id_desa');
        $cek_data 	 = $this->M_crud->tampil_data_where('tb_desa',array('id_desa' => $id))->result_array();
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
        $id = $this->input->post('id_desa');
        $hasil = 1;
        $err = '';
        $cek_data = $this->M_crud->tampil_data_where('tb_desa',array('id_desa' => $id))->result_array();
		
        if (count($cek_data) == 0) 
        {
            $hasil = 0;
            $err 	= 'Data Tidak Ditemukan !';
        }
        else
        {
            $this->M_crud->del_data('tb_desa',array('id_desa' => $id));
        }
		
        $data = array(
            'hasil' => $hasil,
            'err' 	=> $err,
        );

        echo json_encode($data);	
    }
}