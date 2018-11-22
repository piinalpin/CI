<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
class Supplier_models extends CI_Model { 
	var $table = 'supplier';
    //set column field database for datatable orderable     
    var $column_search = array('nama_supplier','Alamat'); 
    //set column field database for datatable searchable just firstname , lastname , address are searchable     
    var $order = array('id_supplier' => 'asc'); 

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_datatables_query()
    {
        $this->db->from($this->table);
        $this->db->where('status', 1);
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
            switch ($_POST['order']['0']['column']) {
                case 1:
                    $this->db->order_by('nama_supplier', $_POST['order']['0']['dir']);
                    break;
                case 2:
                    $this->db->order_by('Alamat', $_POST['order']['0']['dir']);
                    break;
                case 4:
                    $this->db->order_by('email', $_POST['order']['0']['dir']);
                    break;
                default:
                    # code...
                    break;
            }
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

    public function save_supplier($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }


    public function get_supplier_by_id($id){
        $this->db->from($this->table);
        $this->db->where('id_supplier', $id);

        $query = $this->db->get();
        return $query->row();

    }

    public function delete_supplier($id){
        // UPDATE supplier SET status = 0 WHERE id_supplier = 1
        $this->db->set('status', 0);
        $this->db->where('id_supplier', $id);
        return $this->db->update($this->table);
    }

    public function edit_supplier($id_supplier, $data)
    {
        $this->db->where('id_supplier', $id_supplier);
        return $this->db->update($this->table, $data);
    }

}