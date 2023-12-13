<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Back_user extends CI_Controller {
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model(array('M_user','M_crud'));
	}

	public function index()
	{
		$data = array(
			'title_bar' 	  => 'Data User',
			'title' 		  => 'User', //H4
			'br_title' 		  => $this->uri->segment('1'),//Breadcumb
			'br_title_active' => $this->uri->segment('2'),//Breadcumb
		);

		$this->load->view('back/user',$data);
	}

	function tampil_data()
	{
		$list = $this->M_user->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) 
        {
            $status_aktif = "<a class='btn btn-sm btn-info' href='javascript:void(0)' onclick='status_aktif(this)' data-id='".$field->id_user."'>PASIF</a>";
            if ($field->status_aktif == 1) 
            {
                $status_aktif = "<a class='btn btn-sm btn-success' href='javascript:void(0)' onclick='status_aktif(this)' data-id='".$field->id_user."'>AKTIF</a>";
            }

            $no++;
            $row = array();
            $row[] = $no;  
            $row[] = '<a href="javascript:void(0)" onclick="edit_data(this)" id="edit" data-id_user="'.$field->id_user.'" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
            <a href="javascript:void(0)" onclick="delete_data(this)" id="delete" data-id_user="'.$field->id_user.'" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></a>
            ';          
            $row[] = $field->id_user;
            $row[] = $field->usr;
            $row[] = 'protected';                   
            $row[] = $status_aktif;                                  
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_user->count_all(),
            "recordsFiltered" => $this->M_user->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}	

    function simpan_data()
    {
        $id_user = $this->input->post('id_user');
        $username  = $this->input->post('username');
        $password = $this->input->post('password');
        $stat   = $this->input->post('stat',TRUE); #EDIT / NEW
        $hasil  = 1;
        $err   = '';

        if ($stat == 'new') 
        {
            $tanggal = date('Y-m-d');
        	$id_user = $this->M_crud->id('tb_user','id_user','US');
        }

        $set_data = array(
            'id_user' => $id_user,
            'usr' => $username,
            'pswd' => md5($password),
            'status_aktif'  	=> 0,
        );

        if ($stat == 'new') 
        {
            // CEK USER
            $cek_user = $this->M_crud->tampil_data_where('tb_user', array('usr' => $username))->result_array();

            if (count($cek_user) > 0) 
            {
                $hasil = 2;
                $err   = 'Username Sudah Digunakan !';
            }
            else
            {
                $this->M_crud->ins_data('tb_user',$set_data);
                $hasil = 1; 
            }
        }
        else
        {
            $this->M_crud->upd_data('tb_user',$set_data,array('id_user' => $id_user));
        }

        $data = array(
            'hasil' => $hasil,
            'err'   => $err,
        );
        echo json_encode($data);
    }

    function edit_data()
    {
        $hasil = 0;
        $err    ='';
        $id_user = $this->input->post('id_user');
        $data_user = $this->M_crud->tampil_data_where('tb_user', array('id_user' => $id_user))->result_array();
        if (count($data_user) > 0) {
            $hasil = 1;
        }

        $data = array(
            'hasil'  => $hasil,
            'data_user' => $data_user,
        );

        echo json_encode($data);
    }

    function delete_data()
    {
        $id_user = $this->input->post('id_user');
        $this->M_crud->del_data('tb_user',array('id_user' => $id_user));
        $data['hasil'] = 1;
        echo json_encode($data);
    }   

    function status_aktif()
    {
        $id = $this->input->post('id_user');
        $cek_data = $this->M_crud->tampil_data_where('tb_user',array('id_user' => $id))->result_array();


        $hasil = 1;
        $err    = '';
        if (count($cek_data) > 0) 
        {
            foreach ($cek_data as $c) 
            {
                $status_aktif = 1;
                if ($c['status_aktif'] == 1) 
                {
                    $status_aktif = 0;
                }

                $set_data = array(
                    'status_aktif' => $status_aktif,
                );

                $this->M_crud->upd_data('tb_user',$set_data,array('id_user' => $id));
            }
        }
        else
        {
            $hasil  = 0;
            $err    = 'Data Tidak Ditemukan !';
        }

        $data = array(
            'hasil' => $hasil,
            'err'   => $err,
        );

        echo json_encode($data);
    }
}