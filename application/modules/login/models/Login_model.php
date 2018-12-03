<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
class Login_model extends CI_Model{
 
     function auth_admin($username,$password){
        $query=$this->db->FROM ("admin");
        $query=$this->db->WHERE (" username='$username' AND password=MD5('$password') ");
        $query=$this->db->WHERE("level",1);

        $query = $this->db->get();
        return $query->row();
    }

    function auth_dokter($username,$password){
        $query=$this->db->FROM ("dokter");
        $query=$this->db->WHERE (" username='$username' AND password=MD5('$password') ");
        $query=$this->db->WHERE("level",2);

        $query = $this->db->get();
        return $query->row();
           }
 
     function auth_pegawai($username,$password){
        $query=$this->db->FROM ("pegawai");
        $query=$this->db->WHERE (" username='$username' AND password=MD5('$password') ");
        //$query=$this->db->WHERE("level",3 "OR" 3 "OR" 4 "OR" 5 "OR" 6);
        $query=$this->db->WHERE("level",3);
        $query=$this->db->WHERE("level",4);
        $query=$this->db->WHERE("level",5);
        $query=$this->db->WHERE("level",6);

        $query = $this->db->get();
        return $query->row();
            }
 
    function login($username, $password){
        $query=$this->db->FROM ("admin","dokter","pegawai");
        $query=$this->db->WHERE (" username='$username' AND password=MD5('$password') ");
        $query=$this->db->WHERE("level", $level);

        $query = $this->db->get();
        return $query->row();

    }

}