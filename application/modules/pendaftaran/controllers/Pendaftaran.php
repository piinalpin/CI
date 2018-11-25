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

    public function acak(){
        echo random_string('numeric', 6); 
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

            $row[]  =['
            <button class="btn btn-sm btn-primary" href="javascript:void();" title="Periksa" onclick="new_periksa('."'".$item->id_pasien."'".')"><i class="fa fa-medkit"> Periksa</i>
            </button> 

            
            <button class="btn btn-sm btn-warning"  title="Edit" onclick="edit_pasien_'.$item->id_pasien.'()"><i class="fa fa-pencil"> Edit</i>
            </button>

            <button class="btn btn-sm btn-danger"
             href="javascript:void();" title="Delete" onclick="delete_pasien('."'".$item->id_pasien."','".$item->nama_pasien."'".')"><i class="fa fa-trash"> Delete</i>
            </button>

            <!-- Modal untuk penyedia Boga -->
<div class="modal fade" id="modal_edit_pasien_'.$item->id_pasien.'" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Edit Pasien</h3>
            </div>
            <div class="modal-body">
                <form action="#" id="form_edit_pasien_'.$item->id_pasien.'" class="form-horizontal">
                    <input type="hidden" name="id" value="'.$item->id_pasien.'">
                    <div class="form-body form">
                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Nama Pasien</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_pasien"  value="'.$item->nama_pasien.'" class="form-control"
                                    style="width:100%">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">
                                <input type="text" name="alamat_pasien" class="form-control" style="width:100%" value="'.$item->alamat_pasien.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Kelurahan</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_kelurahan" class="form-control" style="width:100%" value="'.$item->kelurahan_pasien.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Kecamatan</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_kecamatan" class="form-control" style="width:100%" value="'.$item->kecamatan_pasien.'">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Kota</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_kota" class="form-control" style="width:100%" value="'.$item->kota_pasien.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Provinsi</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_provinsi" class="form-control" style="width:100%" value="'.$item->provinsi_pasien.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Tempat Lahir</label>
                            <div class="col-md-9">
                                <input type="text" name="tempat_lahir" class="form-control" style="width:100%" value="'.$item->tempat_lahir_pasien.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Tanggal Lahir</label>
                            <div class="col-md-9">
                                <input type="date" id="datepicker-autoclose" name="tanggal_lahir" class="form-control" style="width:100%" value="'.$item->tanggal_lahir_pasien.'">
                                <span class="help-block"></span>
                            </div>
                        </div>


                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Jenis Kelamin</label>
                            <div class="col-md-9">
                                <input type="text" name="jenis_kelamin" class="form-control" style="width:100%" value="'.$item->jk_pasien.'" readonly>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Golongan Darah</label>
                            <div class="col-md-9">
                                <input type="text" name="golongan_darah" class="form-control" style="width:100%" value="'.$item->gol_darah_pasien.'" readonly>
                            </div>
                        </div>
                    

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">No Telephon</label>
                            <div class="col-md-9">
                                <input type="text" name="no_telephone" class="form-control" style="width:100%" value="'.$item->no_telepon_pasien.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Pekerjaan</label>
                            <div class="col-md-9">
                                <input type="text" name="pekerjaan" class="form-control" style="width:100%" value="'.$item->pekerjaan_pasien.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Wali Pasien</label>
                            <div class="col-md-9">
                                <input type="text" name="wali_pasien" class="form-control" style="width:100%" value="'.$item->wali_pasien.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">NIK Pasien</label>
                            <div class="col-md-9">
                                <input type="text" name="nik_pasien" class="form-control" style="width:100%" value="'.$item->nik_pasien.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Nomer KK Pasien</label>
                            <div class="col-md-9">
                                <input type="text" name="no_kk_pasien" class="form-control" style="width:100%" value="'.$item->no_kk_pasien.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Nomer BBJS Pasien</label>
                            <div class="col-md-9">
                                <input type="text" name="no_bbjs_pasien" class="form-control" style="width:100%" value="'.$item->no_bbjs_pasien.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                    </div>
                </form>
                <button type="button" id="btnSave" onclick="save_edit_pasien_'.$item->id_pasien.'()" class="btn btn-primary">Simpan Data Pasien</button>
            </div>
            <div class="modal-footer">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->


<script type="text/javascript">
    $("input").change(function(){
        $(this).parent().parent().removeClass("has-error");
        $(this).next().empty();
        });
    function edit_pasien_'.$item->id_pasien.'(){
        $("#form_edit_pasien_'.$item->id_pasien.'")[0].reset(); // reset form on modals
        $(".form-group").removeClass("has-error"); // clear error class
        $(".help-block").empty(); // clear error string

        $(".modal-title").text("Form Edit Pasien : '.$item->nama_pasien.'");
        $("#modal_edit_pasien_'.$item->id_pasien.'").modal("show"); // show bootstrap modal 
    }
    function save_edit_pasien_'.$item->id_pasien.'(){
        $("#btnSave").text("Menyimpan....."); //change button text
        $("#btnSave").attr("disabled",true); //set button disable 
        var url;

        url = "pendaftaran/ajax_edit_pasien";
     
        // ajax adding data to database
     
        var formData = new FormData($("#form_edit_pasien_'.$item->id_pasien.'")[0]);
        $.ajax({
            url : url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data)
            {
     
                if(data.status) //if success close modal and reload ajax table
                {
                    reload_table();
                    $("#modal_edit_pasien_'.$item->id_pasien.'").modal("hide");
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('."'".'[name="'."'".'+data.inputerror[i]+'."'".'"]'."'".').parent().parent().addClass("has-error"); //select parent twice to select div form-group class and add has-error class
                        $('."'".'[name="'."'".'+data.inputerror[i]+'."'".'"]'."'".').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $("#btnSave").text("Simpan Data Pasien"); //change button text
                $("#btnSave").attr("disabled",false); //set button enable 
     
     
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert("Terjadi kesalahan saat menyimpan data");
                $("#btnSave").text("Simpan Data Pasien"); //change button text
                $("#btnSave").attr("disabled",false); //set button enable 
     
            }
        });
        $.Notification.notify("success","top right", "Data has been changed");
    }
</script>


'
]; 

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
            'no_rm'                  => $this->input->post('no_rm'),



        );
 
        $insert = $this->pendaftaran_model->save_pasien($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit_pasien()
    {
        $this->_validate();
        $data = array(
            'nama_pasien'            => $this->input->post('nama_pasien'),
            'nama_pasien'            => $this->input->post('nama_pasien'),
            'alamat_pasien'          => $this->input->post('alamat_pasien'),
            'kelurahan_pasien'       => $this->input->post('nama_kelurahan'),
            'kecamatan_pasien'       => $this->input->post('nama_kecamatan'),
            'kota_pasien'            => $this->input->post('nama_kota'),
            'provinsi_pasien'        => $this->input->post('nama_provinsi'),
            'tempat_lahir_pasien'    => $this->input->post('tempat_lahir'),
            'tanggal_lahir_pasien'   => $this->input->post('tanggal_lahir'),
            'jk_pasien'              => $this->input->post('jenis_kelamin'),
            'gol_darah_pasien'       => $this->input->post('golongan_darah'),
            'no_telepon_pasien'      => $this->input->post('no_telephone'),
            'pekerjaan_pasien'       => $this->input->post('pekerjaan'),
            'wali_pasien'            => $this->input->post('wali_pasien'),
            'nik_pasien'             => $this->input->post('nik_pasien'),
            'no_kk_pasien'           => $this->input->post('no_kk_pasien'),
            'no_bbjs_pasien'         => $this->input->post('no_bbjs_pasien'),
           //'no_rm'                  => $this->input->post('no_rm'),



        );
        
        $insert =  $this->pendaftaran_model->edit_pasien($this->input->post('id'), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete()
    {
        $id = $this->input->post('id_pasien');
        $this->pendaftaran_model->delete_pasien($id);
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

    public function get_poli()
    {
        $data = $this->pendaftaran_model->get_poli_by_id();
        $output = '';
        $output .= '<option value="" selected disabled hidden>Choose here</option>';
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

//
    public function get_jadwal_jam($id)
    {
        $data = $this->pendaftaran_model->get_jadwal_jam_by_id($id);
        $output = '';
        foreach ($data as $item) {
            $output .='
            <option value ="'.$item->jam.'">
                
                '.$item->jam.'
            </option>
            ';
            $no++;
        }

        echo $output;


    }

//
    public function get_nama_dokter($id_poli, $hari)
    {
       
        $data = $this->pendaftaran_model->getDokterByIdPoli($id_poli, $hari);
        $output = '';
        foreach ($data as $item) {
            $output .='
            <option value ="'.$item->nama_dokter.'">
                
                '.$item->nama_dokter.' - '.$item->jam.'
            </option>
            ';
            $no++;
        }
        echo $output;
    }





    public function add_periksa(){
       
        $data = array(
            'id_pasien'            => $this->input->post('id'),
            'no_rm'                => $this->input->post('no_rm'),
           
            'tgl_periksa'          => date('Y-m-d'),
             'jam'                 => $this->input->post('jam'),
             'nama_dokter'         => $this->input->post('nama_dokter')


        );

        $insert = $this->pendaftaran_model->save_periksa($data);
        echo json_encode(array("status" => TRUE));
    }



}