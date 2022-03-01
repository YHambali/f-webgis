<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Sitemap extends CI_Controller 
{
 public function index()
 {   
    $this->load->helper('url');
     $data = array(
     	'blog' 	   => $this->M_crud->tampil_data('tb_blog')->result_array(),
     	'product'  => $this->M_crud->tampil_data('v_product')->result_array(),
        'portfolio'=> $this->M_crud->tampil_data('v_portfolio')->result_array(),
     );
     $this->load->view('sitemap',$data);
 }
}