<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Back_rawan_bencana extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_rawan_bencana'));
    }

    public function index()
    {
        $data = array(
            'title_bar' 	  => 'Data Daerah Rawan Bencana',
            'title' 		  => 'Daerah Rawan Bencana', //H4
            'br_title' 		  => $this->uri->segment('1'),//Breadcumb
            'br_title_active' => $this->uri->segment('2'),//Breadcumb
        );
        $this->load->view('back/rawan_bencana',$data);
    }

    function tampil_data()
    {
        $list = $this->M_rawan_bencana->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;  
            $row[] = '<a href="'.base_url().'konten/data-daerah-rawan-bencana/edit?id='.$field->id_rawan_bencana.'" id="edit" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
            <a href="javascript:void(0)" onclick="delete_data(this)" id="delete" data-id="'.$field->id_rawan_bencana.'" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></a>
            ';          
            $row[] = $field->nm_kecamatan;
            $row[] = $field->nm_desa;
            $row[] = $field->ket_wilayah;
            $row[] = $field->ket_rawan_bencana;
            $row[] = $field->status_rawan_bencana;
            $row[] = $field->latitude;
            $row[] = $field->longitude;
            $row[] = $field->tgl_update;                     
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_rawan_bencana->count_all(),
            "recordsFiltered" => $this->M_rawan_bencana->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function tambah_data()
    {	
        $data = array(
            'title_bar' 	    => 'Form Input Daerah Rawan Bencana',
            'title' 		    => 'Form Input Daerah Rawan Bencana', //H4
            'stat' 			    => 'new',
            'id_rawan_bencana'  => '',
            'id_desa' 		    => '',
            'ket_wilayah'       => '',
            'ket_rawan_bencana' => '',
            'status_rawan_bencana' 	  => '',
            'latitude'          => '',
            'longitude'         => '',                        
            'data_desa'         => $this->M_crud->tampil_data('tb_desa')->result_array(),
            'br_title' 		    => $this->uri->segment('1'),//Breadcumb
            'br_title_active'   => $this->uri->segment('2'),//Breadcumb
        );

        $this->load->view('back/rawan_bencana_form',$data);
    }

    function simpan_data()
    {
        $id                   = $this->input->post('id_rawan_bencana');
        $id_desa              = $this->input->post('id_desa');
        $ket_wilayah          = $this->input->post('ket_wilayah');
        $ket_rawan_bencana    = $this->input->post('ket_rawan_bencana');
        $status_rawan_bencana = $this->input->post('status_rawan_bencana');
        $latitude             = $this->input->post('latitude');
        $longitude            = $this->input->post('longitude');
        $stat                 = $this->input->post('stat');
        $hasil                = 1;
        $err                  = '';
        
        if ($stat == 'new') 
        {            
            $id = $this->M_crud->id_num_year('tb_daerah_rawan_bencana','id_rawan_bencana','tgl_update');
        }

        $set_data = array(
            'id_rawan_bencana'=> $id,
            'id_desa' => $id_desa,
            'ket_wilayah' => $ket_wilayah,
            'ket_rawan_bencana' => $ket_rawan_bencana,
            'status_rawan_bencana' => $status_rawan_bencana,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'tgl_update' => date('Y-m-d'),
        );

        if ($stat == 'new') 
        {
            // CEK DATA 
            $cek_data = $this->M_crud->tampil_data_where('tb_daerah_rawan_bencana',array('id_desa' => $id_desa))->result_array();

            if (count($cek_data) > 0) 
            {
                $hasil = 0;
                $err   = "Daerah Tersebut Sudah Diinput !";
            }
            else
            {
                $this->M_crud->ins_data('tb_daerah_rawan_bencana',$set_data);
            }
        }
        else
        {
            $cek_data = $this->M_crud->tampil_data_where('tb_daerah_rawan_bencana',array('id_desa' => $id_desa,'id_rawan_bencana !=' => $id))->result_array();

            if (count($cek_data) > 0) 
            {
                $hasil = 0;
                $err   = "Daerah Tersebut Sudah Diinput !";
                
            }   
            else
            {
                $this->M_crud->upd_data('tb_daerah_rawan_bencana',$set_data,array('id_rawan_bencana' => $id));
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
        $cek_data = $this->M_crud->tampil_data_where('tb_daerah_rawan_bencana',array('id_rawan_bencana' => $id))->result_array();
                
        $data = array(
            'title_bar' 	  => 'Form Edit Daerah Rawan Bencana',
            'title' 		  => 'Form Edit Daerah Rawan Bencana', //H4
            'stat' 			  => 'edit',
            'cek_data' 		  => $cek_data,
            'data_desa'       => $this->M_crud->tampil_data('tb_desa')->result_array(),
            'br_title' 		  => $this->uri->segment('1'),//Breadcumb
            'br_title_active' => $this->uri->segment('2'),//Breadcumb
        );

        $this->load->view('back/rawan_bencana_form',$data);
    }
    
    function delete_data()
    {
        $id = $this->input->post('id_rawan_bencana');
        $cek_data = $this->M_crud->tampil_data_where('tb_daerah_rawan_bencana',array('id_rawan_bencana' => $id))->result_array();
        $hasil = 1;
        $err	 = '';

        if (count($cek_data) == 0) 
        {
            $hasil = 0;
            $err 	= 'Data Tidak Ditemukan !'; 
        }
        else
        {
            $this->M_crud->del_data('tb_daerah_rawan_bencana',array('id_rawan_bencana' => $id));
        }

        $data = array(
            'hasil' => $hasil,
            'err' => $err,
        );

        echo json_encode($data);
    }
    

}