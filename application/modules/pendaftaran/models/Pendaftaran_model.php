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
        $this->db->where('status_pasien','1');
        $query = $this->db->get();
        return $query->result();
    }

    function get_data_periksa(){
        $this->db->from('periksa as pr');
        $this->db->from('dokter as d');
        $this->db->from('pasien as ps');
        $this->db->where('ps.id_pasien = pr.id_pasien');
        $this->db->where('d.id_dokter = pr.id_dokter');
        $this->db->where('pr.status', 1);
        if (date('H:i:s') < date('H:i:s', strtotime("14:00:00")) && date('H:i:s') >= date('H:i:s', strtotime("00:00:00"))) {
            $this->db->where('pr.jam', 'pagi');
        }
        elseif (date('H:i:s') > date('H:i:s', strtotime("14:00:00"))) {
            $this->db->where('pr.jam', 'sore');
        }
        $this->db->where('pr.tgl_periksa', date("Y-m-d"));
        $this->db->order_by('pr.id_periksa', 'asc');
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

     public function edit_pasien($id_pasien, $data)
    {
        $this->db->where('id_pasien', $id_pasien);
        return $this->db->update($this->table, $data);
    }
 
    public function delete_pasien($id)
    {   
        //// UPDATE supplier SET status = 0 WHERE id_supplier = 1
        $this->db->set('status_pasien', 0);
        $this->db->where('id_pasien', $id);
        return $this->db->update($this->table);
    }




    public function get_poli_by_id(){
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

//

 /*   public function get_jadwal_jam_by_id($id){
        
        $this->db->from('jadwal_dokter');

        $query = $this->db->get();
        return $query->result();
    }
*/
     public function get_nama_dokter_by_id($id,$poli,$jam){
        
         $this->db->from('jadwal_dokter');
         $this->db->where('jam', $jam) ;
         $this->db->where('id_poli', $id_poli);


        $this->db->from('dokter');
        $this->db->where('id_dokter',$id_dokter);
        $query = $this->db->get();

        return $query->result();
    }

    public function getDokterByIdPoli($id_poli, $hari) {
        // SELECT * FROM `jadwal_dokter` as `jd`, `poli` as `p`, `dokter` as `d` WHERE `jd`.`id_poli` = $id_poli AND `p`.`id_poli` = `jd`.`id_poli` AND `jd`.`hari` = '$hari' AND `d`.`id_dokter` = `jd`.`id_dokter`
        $this->db->from('jadwal_dokter as jd');
        $this->db->from('dokter as d');
        $this->db->from('poli as p');
        $this->db->where('jd.id_poli', (int)$id_poli);
        $this->db->where('p.id_poli = jd.id_poli');
        $this->db->where('d.id_dokter = jd.id_dokter');
        $this->db->where('jd.hari', $hari);
        $query = $this->db->get();
        return $query->result();
    }

    public function save_periksa($data){
        $this->db->insert('periksa', $data);
        return $this->db->insert_id();
    }

}