<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Person extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('person_model');
	}
	public function index()
	{
		$person_view = $this->person_model->read_person();
		$judul		 = 'Halaman Utama Class Person';
		$author		 = 'Kiki';
		$list		 = array('Merah','Kuning','Hijau');
		$data		 = array(
					'title' => $judul,
					'author' => $author,
					'warna'	=> $list,
					'list_person' => $person_view,
						);
		$this->load->view('person_view',$data);
	}

	public function add(){

		$content['message']= '';
		if ($_POST) {
			$data = array(
			'name'				=>$this->input->post('name'),
			'description'		=>$this->input->post('description')
			);
				$simpan = $this->person_model->insert($data);

				if ($simpan) {
					$content['message'] = 'Data berhasil disimpan';
				}else{
					$content['message'] = 'Gagal menyimpan data';
				}
			}	
		
		
		$this->load->view('form_add',$content);

	}
	public function update($id){
		$content['message'] = '';
		if ($_POST){
			$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description')
				);
			$ubah = $this->person_model->update($data, $id);
			if ($ubah){
				$content['message'] = 'Berhasil ubah data';
			}else{
				$content['message'] = 'Gagal ubah data';
			}

		}

		$data = $this->person_model->get_person_by_id($id);

		$content['person'] = $data;
		$content['method'] = 'update';
		$this->load->view('form_add',$content);
	}
}
 ?>