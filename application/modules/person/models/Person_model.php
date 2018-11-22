<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class person_model extends CI_Model {
		public function read_person(){
			$this->db->from('person');
			$query = $this->db->get();

			return $query->result();
		}
		public function insert($data){

			return $this->db->insert('person',$data);

		}
		
		public function get_person_by_id($id){
			$this->db->from('person');
			$this->db->where('id',$id);

			$query = $this->db->get();

			return $query->row();
		}

		public function update($data, $id)
		{
			$this->db->where('id',$id);

			return $this->db->update('person',$data);
		}
}
 ?>