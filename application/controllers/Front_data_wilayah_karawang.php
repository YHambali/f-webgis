<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Front_data_wilayah_karawang extends CI_Controller 
{
    function __construct() 
    {
        parent::__construct();    
        $this->load->model(array('M_kecamatan','M_desa'));
    
    }

    public function index()
    {        
        $data = array(
            'title_bar' 	  => 'Data Wilayah Karawang',
            'title' 		  => 'Data Wilayah Karawang', //H4
            'data_bencana'    => $this->M_crud->tampil_data('tb_bencana')->result_array(),
            'data_kecamatan'  => $this->M_crud->tampil_data('tb_kecamatan')->result_array(),
            'br_title' 		  => $this->uri->segment('1'),//Breadcumb
            'br_title_active' => $this->uri->segment('2'),//Breadcumb
            
        );
        $this->load->view('front/data_wilayah_karawang',$data);
    }

    function tampil_data_kecamatan()
    {
        $list = $this->M_kecamatan->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;                   
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

    function tampil_data_desa()
    {
        $list = $this->M_desa->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;  
                 
            $row[] = $field->nm_kecamatan;                     
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
}