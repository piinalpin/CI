<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
class Admin_Periksa_model extends CI_Model { 
	var $table = 'periksa';
	var $column_order = array('nama_periksa',null); 
    //set column field database for datatable orderable     
    var $column_search = array('no_rm','tgl_periksa'); 
    //set column field database for datatable searchable just firstname , lastname , address are searchable     
    var $order = array('id_periksa' => 'asc'); 

    public function __construct()
    {
        parent::__construct();
    }


	 private function _get_datatables_query()
    {
        $this->db->from($this->table);
        $this->db->where('status', 1);


        // $this->getDokterByIdPoli();
        //$this->db->from('dokter');
       // $this->db->where('id_dokter', i);


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
                    $this->db->order_by('no_rm', $_POST['order']['0']['dir']);
                    break;
                case 2:
                    $this->db->order_by('tgl_periksa', $_POST['order']['0']['dir']);
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

    
    public function get_periksa_by_id($id){
        $this->db->from('periksa');
        $this->db->where('id_periksa');
        $this->db->set('status_periksa=0',$id);

        $query = $this->db->get();
        return $query->row();

    }


     public function save_periksa($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function delete_periksa($id){
        // UPDATE periksa SET status = 0 WHERE id_periksa = 1
        $this->db->set('status', 0);
        $this->db->where('id_periksa', $id);
        return $this->db->update('periksa');
    }

    public function edit_periksa($id_periksa, $data)
    {
        $this->db->where('id_periksa', $id_periksa);
        return $this->db->update($this->table, $data);
    }

     public function getDokterByIdPoli() {
        // SELECT * FROM `jadwal_dokter` as `jd`, `poli` as `p`, `dokter` as `d` WHERE `jd`.`id_poli` = $id_poli AND `p`.`id_poli` = `jd`.`id_poli` AND `jd`.`hari` = '$hari' AND `d`.`id_dokter` = `jd`.`id_dokter`
        $this->db->from('periksa as jd');
        $this->db->from('dokter as d');
        $this->db->from('pegawai as p');
       // $this->db->where('jd.id_periksa', (int)$id_periksa);
        $this->db->where('p.id_pegawai = jd.id_pegawai');
        $this->db->where('d.id_dokter = jd.id_dokter');
        $query = $this->db->get();
        return $query->result();
    }

}