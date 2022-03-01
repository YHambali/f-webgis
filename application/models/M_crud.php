<?php
class M_crud extends CI_Model
{	
	function __construct()
	{
		parent::__construct();		
	}

	function compile_sql($query)
	{
		$query;
		return $this->db->last_query();
	}
	
	function tampil_data($table)
	{
		return $this->db->get($table);
	}

	function tampil_data_where($table,$where)
	{
		return $this->db->get_where($table,$where);
	}

	function tampil_data_page($table,$number,$offset)
	{
      $this->db->limit($number,$offset);
      return $this->db->get($table);
    }

	function ins_data($tabel, $data)
	{
		return $this->db->insert($tabel, $data);
	}
			
	function upd_data($tabel,$data,$where)
	{
		return $this->db->update($tabel, $data, $where);
	}
	
	function del_data($tabel,$where)
	{
		return $this->db->delete($tabel,$where);
	}

	function _order_by($order,$value)
	{
		return $this->db->order_by($order,$value);
	}

	function _where($colom,$param)
	{		
		return $this->db->where($colom,$param);
	}
	
	function _limit($limit)
	{
		return $this->db->limit($limit);
	}

	function id($table,$id,$kode)
	{
		$this->db->select_max('substr('.$id.', 3,3)','kd_max');
		$q = $this->db->get($table);  		
	   	$kd = "";
	   	if($q->num_rows() > 0)
	   	{
	       foreach($q->result() as $k)
	       {
	           $tmp = ((int)$k->kd_max)+1;
	           $kd = sprintf("%03s", $tmp);
	       }
	   	}
	   	else
	   	{
	       $kd = "001";
	   	}
	  	return $kode.$kd;
	}	

	function id_4_num($table,$id,$kode)
	{
			$this->db->select_max('substr('.$id.', 3,4)','kd_max');
			$q = $this->db->get($table);  		
		   	$kd = "";
		   	if($q->num_rows() > 0)
		   	{
		       foreach($q->result() as $k)
		       {
		           $tmp = ((int)$k->kd_max)+1;
		           $kd = sprintf("%04s", $tmp);
		       }
		   	}
		   	else
		   	{
		       $kd = "0001";
		   	}
		  	return $kode.$kd;
	}

	function id_num_year($table,$id,$colom)
	{
		$year =date('Y');
		$this->db->select_max('substr('.$id.', 5,4)','kd_max');
		$this->db->where('extract(year from '.$colom.')=',$year);
		$q = $this->db->get($table);  		
	   	$kd = "";
	   	if($q->num_rows() > 0){
	       foreach($q->result() as $k){
	           $tmp = ((int)$k->kd_max)+1;
	           $kd = sprintf("%04s", $tmp);
	       }
	   	}else{
	       $kd = "0001";
	   	}
	  	return $year.$kd;
	}

	function id_num_month_year($table,$id,$colom)
	{
		$year =date('Y');
		$month=date('m');
		$this->db->select_max('substr('.$id.', 7,4)','kd_max');
		$this->db->where('extract(year from '.$colom.')=',$year);
		$this->db->where('extract(month from '.$colom.')=',$month);
		$q = $this->db->get($table);  		
	   	$kd = "";
	   	if($q->num_rows() > 0){
	       foreach($q->result() as $k){
	           $tmp = ((int)$k->kd_max)+1;
	           $kd = sprintf("%04s", $tmp);
	       }
	   	}else{
	       $kd = "0001";
	   	}
	  	return $year.$month.$kd;
	}
}