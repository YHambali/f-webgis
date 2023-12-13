<?php
class M_desa extends CI_Model
{	
    var $table          = 'v_desa'; //nama tabel dari database
    var $column_order   = array(null,'nm_kecamatan','nm_desa'); //field yang ada di table user
    var $column_search  = array('nm_kecamatan','nm_desa'); //field yang diizin untuk pencarian 
    var $order          = array('id_desa' => 'asc'); // default order 

    private function _get_datatables_query()
    {         
        $this->db->from($this->table);
    
        $i = 0;
        
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {                    
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
    
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
            
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
        
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
        
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function id_desa($table,$id_kecamatan,$id,$kode)
    {
        $this->db->where('substr('.$id.',1,5)=',$id_kecamatan);
        $this->db->select_max('substr('.$id .', 8,3)','kd_max');
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
        return $id_kecamatan.$kode.$kd;
    }	
}
