<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_Laporan extends CI_Controller {
	 public function __construct(){
		parent::__construct();
	//	$this->load->model('admin_model');
	}

	public function index(){
		$this->theme->load('admin_laporan_view');
	}


  
}