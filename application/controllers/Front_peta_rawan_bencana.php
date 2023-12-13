<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Front_peta_rawan_bencana extends CI_Controller 
{
    function __construct() 
    {
        parent::__construct();        
    }

    public function index()
    {        
        $data = array(
            'title_bar' 	  => 'Peta Sebaran Daerah Rawan Bencana',
            'title' 		  => 'Peta Sebaran Daerah Rawan Bencana', //H4
            'data_bencana'    => $this->M_crud->tampil_data('tb_bencana')->result_array(),
            'data_kecamatan'  => $this->M_crud->tampil_data('tb_kecamatan')->result_array(),
            'br_title' 		  => $this->uri->segment('1'),//Breadcumb
            'br_title_active' => $this->uri->segment('2'),//Breadcumb
            
        );
        $this->load->view('front/peta_rawan_bencana',$data);
    }

    function tampil_data_peta_sebaran()
    {
        $s_status_daerah = $this->input->post('s_status_daerah');
        $s_nm_kecamatan  = $this->input->post('s_nm_kecamatan');
        $s_nm_desa       = $this->input->post('s_nm_desa');
        if ($s_status_daerah != '') 
        {
            $this->M_crud->_where('status_rawan_bencana',$s_status_daerah);
        }

        if ($s_nm_kecamatan != '') 
        {
            $this->M_crud->_where('nm_kecamatan',$s_nm_kecamatan);
        }

        if ($s_nm_desa != '') 
        {
            $this->M_crud->_where('nm_desa',$s_nm_desa);
        }

        $data_daerah_rawan_bencana = $this->M_crud->tampil_data('v_daerah_rawan_bencana')->result_array();        
        $data = array(
            'cek_data' => $data_daerah_rawan_bencana,
        );
        echo json_encode($data);
    }

    function detail_data_peta_sebaran()
    {
        $id = $this->input->post('id');
        $data_daerah_rawan_bencana = $this->M_crud->tampil_data_where('v_daerah_rawan_bencana',array('id_rawan_bencana' => $id))->result_array();

        $id_desa = $this->input->post('id_desa');
        $data_rekam_bencana = $this->M_crud->tampil_data_where('v_rekam_bencana',array('id_desa' => $id_desa))->result_array();

        $data = array(
            'cek_data_daerah_rawan_bencana' => $data_daerah_rawan_bencana,
            'cek_data_rekam_bencana' => $data_rekam_bencana,
        );

        echo json_encode($data);
    }

    function pilih_desa()
    {
        $nm_kecamatan = $this->input->post('nm_kecamatan');
        $cek_data     = $this->M_crud->tampil_data_where('v_desa',array('nm_kecamatan' => $nm_kecamatan))->result_array();
        $data = array(
            'cek_data' => $cek_data,            
        );
        echo json_encode($data);
    }
}