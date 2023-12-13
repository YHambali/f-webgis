<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Front_data_bencana extends CI_Controller 
{
    function __construct() 
    {
        parent::__construct();    
        $this->load->model(array('M_bencana','M_rekam_bencana'));
    
    }

    public function index()
    {        
        $data = array(
            'title_bar' 	  => 'Data Bencana',
            'title' 		  => 'Data Bencana', //H4
            'br_title' 		  => $this->uri->segment('1'),//Breadcumb
            'br_title_active' => $this->uri->segment('2'),//Breadcumb
            
        );
        $this->load->view('front/data_bencana',$data);
    }

    function tampil_data_bencana()
    {
        $list = $this->M_bencana->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;                    
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

    function tampil_data_rekam_bencana()
    {
        $list = $this->M_rekam_bencana->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;        
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
}