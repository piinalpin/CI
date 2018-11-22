<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pendaftaran extends CI_Controller {
	 public function __construct(){
		parent::__construct();
		$this->load->model('pendaftaran_model');
	}

	public function index(){
		$this->theme->load('awal_view');
	}

    

	public function ajax_list(){
		$this->load->helper('url');

		$list = $this->pendaftaran_model->get_datatables();
		$data = array();
		foreach ($list as $item) {
            $row = array();
			$row[] = $item->nama_pasien;
			$row[] = $item->nik_pasien;
			$row[] = $item->alamat_pasien;
			$row[] = $item->jk_pasien;

            $row[]  ='
            <a class="btn btn-sm btn-primary" href="javascript:void();" title="Pilih" onclick="new_periksa('."'".$item->id_pasien."'".')"><i class="fa fa-pencil"> Pilih</i>
            </a>'; 

            

			$data[] = $row;

        }

		$output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->pendaftaran_model->count_all(),
                        "recordsFiltered" => $this->pendaftaran_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);

	}

public function ajax_add_pasien(){
        $this->_validate();

        $data = array(
            'nama_pasien'        	 => $this->input->post('nama_pasien'),
            'alamat_pasien'        	 => $this->input->post('alamat_pasien'),
            'kelurahan_pasien'       => $this->input->post('nama_kelurahan'),
            'kecamatan_pasien'       => $this->input->post('nama_kecamatan'),
            'kota_pasien'            => $this->input->post('nama_kota'),
            'provinsi_pasien'        => $this->input->post('nama_provinsi'),
            'tempat_lahir_pasien'    => $this->input->post('tempat_lahir'),
            'tanggal_lahir_pasien'   => $this->input->post('tanggal_lahir'),
            'jk_pasien'        		 => $this->input->post('jenis_kelamin'),
            'gol_darah_pasien'       => $this->input->post('golongan_darah'),
            'no_telepon_pasien'      => $this->input->post('no_telephone'),
            'pekerjaan_pasien'       => $this->input->post('pekerjaan'),
            'wali_pasien'         	 => $this->input->post('wali_pasien'),
            'nik_pasien'         	 => $this->input->post('nik_pasien'),
            'no_kk_pasien'           => $this->input->post('no_kk_pasien'),
            'no_bbjs_pasien'         => $this->input->post('no_bbjs_pasien'),
        );
 
        $insert = $this->pendaftaran_model->save_pasien($data);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('nama_pasien') == '')
        {
            $data['inputerror'][] = 'nama_pasien';
            $data['error_string'][] = 'Nama Pasien harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('alamat_pasien') == '')
        {
            $data['inputerror'][] = 'alamat_pasien';
            $data['error_string'][] = 'Alamat Pasien harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('nama_kelurahan') == '')
        {
            $data['inputerror'][] = 'nama_kelurahan';
            $data['error_string'][] = 'Kelurahan Pasien harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('nama_kecamatan') == '')
        {
            $data['inputerror'][] = 'nama_kecamatan';
            $data['error_string'][] = 'Kecamatan Pasien harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('nama_kota') == '')
        {
            $data['inputerror'][] = 'nama_kota';
            $data['error_string'][] = 'Kota Pasien harus diisi';
            $data['status'] = FALSE;
        }


        if($this->input->post('nama_provinsi') == '')
        {
            $data['inputerror'][] = 'nama_provinsi';
            $data['error_string'][] = 'Provinsi Pasien harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('tempat_lahir') == '')
        {
            $data['inputerror'][] = 'tempat_lahir';
            $data['error_string'][] = 'Tempat Lahir Pasien harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('tanggal_lahir') == '')
        {
            $data['inputerror'][] = 'tanggal_lahir';
            $data['error_string'][] = 'Tanggal Lahir Pasien harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('jenis_kelamin') == '')
        {
            $data['inputerror'][] = 'jenis_kelamin';
            $data['error_string'][] = 'Jenis Kelamin Pasien harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('golongan_darah') == '')
        {
            $data['inputerror'][] = 'golongan_darah';
            $data['error_string'][] = 'Golongan Darah Pasien harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('no_telephone') == '')
        {
            $data['inputerror'][] = 'no_telephone';
            $data['error_string'][] = 'Nomor Telephone Pasien harus diisi';
            $data['status'] = FALSE;
        }


        if($this->input->post('pekerjaan') == '')
        {
            $data['inputerror'][] = 'pekerjaan';
            $data['error_string'][] = 'Pekerjaan harus diisi';
            $data['status'] = FALSE;
        }
        
        if($this->input->post('wali_pasien') == '')
        {
            $data['inputerror'][] = 'wali_pasien';
            $data['error_string'][] = 'Wali Pasien harus diisi';
            $data['status'] = FALSE;
        }

         if($this->input->post('nik_pasien') == '')
        {
            $data['inputerror'][] = 'nik_pasien';
            $data['error_string'][] = 'NIK harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('no_kk_pasien') == '')
        {
            $data['inputerror'][] = 'no_kk_pasien';
            $data['error_string'][] = 'Nomer KK harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('no_bbjs_pasien') == '')
        {
            $data['inputerror'][] = 'no_bbjs_pasien';
            $data['error_string'][] = 'NPmer BBJS harus diisi';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function ajax_pasien($id)
    {
        $data = $this->pendaftaran_model->get_pasien_by_id($id);
        echo json_encode($data);
    }

    public function get_poli($id)
    {
        $data = $this->pendaftaran_model->get_poli_by_id($id);
        $output = '';
        foreach ($data as $item) {
            $output .='
            <option value ="'.$item->id_poli.'">
                '.$item->nama_poli.'
            </option>
            ';
            $no++;
        }

        echo $output;
    }

}