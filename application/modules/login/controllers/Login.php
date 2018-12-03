<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('login_model');
    }
 
    function index(){
        $this->load->view('login_view');
    }
 
    function auth(){

        
     
        $username=$this->input->post('username',TRUE);
        $password=$this->input->post('password',TRUE);
        
            $cek=$this->login_model->login($username,$password);
        
   
        //$cek_admin=$this->login_model->auth_admin($username,$password);
        $cek_dokter=$this->login_model->auth_dokter($username,$password);
        $cek_pegawai=$this->login_model->auth_pegawai($username,$password);

        if($cek->num_rows() > 0){ //jika login sebagai admin
                            $data=$cek_admin->row_array();
                            $this->session->set_userdata('masuk',TRUE);
                            if($data['level']=='1'){ //Akses admin
                            $this->session->set_userdata('akses',$data['level']);
                            $this->session->set_userdata('ses_id',$data['id']);
                            $this->session->set_userdata('ses_nama',$data['nama']);
                            redirect('http://localhost/CI/Admin');
                    }
                 }
        
        else if ($cek_dokter->num_rows() > 0) {
                            $data=$cek_dokter->row_array();
                            $this->session->set_userdata('akses',$data['level']);
                            $this->session->set_userdata('ses_id',$data['id']);
                            $this->session->set_userdata('ses_nama',$data['nama']);
                            redirect('http://localhost/CI/admin_dokter');
                    
        }
         else if($cek_pegawai->num_rows() > 0){
                            $data=$cek_pegawai->row_array();
                            $this->session->set_userdata('masuk',TRUE);
                            $this->session->set_userdata('akses','3');
                            $this->session->set_userdata('ses_id',$data['id']);
                            $this->session->set_userdata('ses_nama',$data['nama']);
                            redirect('http://localhost/CI/admin_dokter');
                    }
        else if($cek_pegawai->num_rows() > 0){
                            $data=$cek_pegawai->row_array();
                            $this->session->set_userdata('masuk',TRUE);
                            $this->session->set_userdata('akses','4');
                            $this->session->set_userdata('ses_id',$data['id']);
                            $this->session->set_userdata('ses_nama',$data['nama']);
                            redirect('http://localhost/CI/apoteker');
                    }
        else if($cek_pegawai->num_rows() > 0){
                            $data=$cek_pegawai->row_array();
                            $this->session->set_userdata('masuk',TRUE);
                            $this->session->set_userdata('akses','5');
                            $this->session->set_userdata('ses_id',$data['id']);
                            $this->session->set_userdata('ses_nama',$data['nama']);
                            redirect('http://localhost/CI/pendaftaran');
                    }
        else if($cek_pegawai->num_rows() > 0){
                            $data=$cek_pegawai->row_array();
                            $this->session->set_userdata('masuk',TRUE);
                            $this->session->set_userdata('akses','6');
                            $this->session->set_userdata('ses_id',$data['id']);
                            $this->session->set_userdata('ses_nama',$data['nama']);
                            redirect('http://localhost/CI/kasir');
                    }
        
        else
            $url=base_url();
                            echo $this->session->set_flashdata('msg','Username Atau Password Salah');
                            redirect('http://localhost/CI/login');
 
    }
 
    function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }
 
}