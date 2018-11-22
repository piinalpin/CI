<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
class Pendaftaran_model extends CI_Model { 
	var $table = 'pasien';
	var $column_order = array('nama_pasien',null); 
    //set column field database for datatable orderable     
    var $column_search = array('nama_pasien'); 
    //set column field database for datatable searchable just firstname , lastname , address are searchable     
    var $order = array('id_pasien' => 'asc'); 

    public function __construct()
    {
        parent::__construct();
    }

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

    public function save_pasien($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function get_poli_by_id($id){
        $this->db->from('poli');
        
        $query = $this->db->get();
        return $query->result();
    }

    public function get_pasien_by_id($id){
        $this->db->from($this->table);
        $this->db->where('id_pasien', $id);

        $query = $this->db->get();
        return $query->row();

    }

}