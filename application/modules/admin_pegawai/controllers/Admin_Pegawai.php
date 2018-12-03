<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_Pegawai extends CI_Controller {
	 public function __construct(){
		parent::__construct();
		$this->load->model('admin_pegawai_model');
	}

	public function index(){
		$this->theme->load('admin_pegawai_view');
	}

    

	public function ajax_list(){
		$this->load->helper('url');

		$list = $this->admin_pegawai_model->get_datatables();
		$data = array();
		 $no = 1;
        foreach ($list as $item) {
            $row = array();
            $row[] = $no++;
			$row[] = $item->nama_pegawai;
            $row[] = $item->alamat_pegawai;
			$row[] = $item->username;
			$row[] = $item->password;
            $row[] = $item->level;

                 $row[]  =['
            <button class="btn btn-sm btn-danger" title="Hapus" onclick="delete_pegawai('."'".$item->id_pegawai."','".$item->nama_pegawai."'".')"><i class="fa fa-trash"> Hapus</i>
            </button> 
            <button class="btn btn-sm btn-warning" title="Pilih" onclick="edit_pegawai_'.$item->id_pegawai.'()"><i class="fa fa-pencil"> Edit</i>
            </button>


       <!-- Modal untuk penyedia Boga -->
<div class="modal fade" id="modal_edit_pegawai_'.$item->id_pegawai.'" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Input Pegawai</h3>
            </div>
            <div class="modal-body">
                <form action="#" id="form_edit_pegawai_'.$item->id_pegawai.'" class="form-horizontal">
                    <input type="hidden" name="id" value="'.$item->id_pegawai.'">
                    <div class="form-body form">
                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Nama Pegawai</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_pegawai" value="'.$item->nama_pegawai.'" class="form-control" style="width:100%">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">
                                <input type="text" name="alamat_pegawai" class="form-control" style="width:100%" value="'.$item->alamat_pegawai.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Tempat Lahir</label>
                            <div class="col-md-9">
                                <input type="text" name="tempat_lahir_pegawai" class="form-control" style="width:100%" value="'.$item->tempat_lahir_pegawai.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Tanggal Lahir</label>
                            <div class="col-md-9">
                                <input type="text" name="tgl_lahir_pegawai" class="form-control" style="width:100%" value="'.$item->tgl_lahir_pegawai.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Nomor Telephone</label>
                            <div class="col-md-9">
                                <input type="text" name="no_tlpn_pegawai" class="form-control" style="width:100%" value="'.$item->no_tlpn_pegawai.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Tanggal Resmi Jadi Pegawai</label>
                            <div class="col-md-9">
                                <input type="text" name="tgl_masuk_sebagai_pegawai" class="form-control" style="width:100%" value="'.$item->tgl_masuk_sebagai_pegawai.'">
                                <span class="help-block"></span>
                            </div>
                        </div>                        
                        
                         <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Jenis Kelamin</label>
                            <div class="col-md-9">
                                <input type="text" name="jk_pegawai" class="form-control" style="width:100%" value="'.$item->jk_pegawai.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                          <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Level</label>
                            <div class="col-md-9">
                                <input type="text" name="level" class="form-control" style="width:100%" value="'.$item->level.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Username</label>
                            <div class="col-md-9">
                                <input type="text" name="username" class="form-control" style="width:100%" value="'.$item->username.'">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Password</label>
                            <div class="col-md-9">
                                <input type="text" name="password" class="form-control" style="width:100%" value="'.$item->password.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                    </div>
                </form>
                <button type="button" id="btnSave" onclick="save_edit_pegawai_'.$item->id_pegawai.'()" class="btn btn-primary">Simpan Data Pegawai</button>
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
    function edit_pegawai_'.$item->id_pegawai.'(){
        $("#form_edit_pegawai_'.$item->id_pegawai.'")[0].reset(); // reset form on modals
        $(".form-group").removeClass("has-error"); // clear error class
        $(".help-block").empty(); // clear error string

        $(".modal-title").text("Form Edit Pegawai : '.$item->nama_pegawai.'");
        $("#modal_edit_pegawai_'.$item->id_pegawai.'").modal("show"); // show bootstrap modal 
    }
    function save_edit_pegawai_'.$item->id_pegawai.'(){
        $("#btnSave").text("Menyimpan....."); //change button text
        $("#btnSave").attr("disabled",true); //set button disable 
        var url;

        url = "admin_pegawai/ajax_edit_pegawai";
     
        // ajax adding data to database
     
        var formData = new FormData($("#form_edit_pegawai_'.$item->id_pegawai.'")[0]);
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
                    $("#modal_edit_pegawai_'.$item->id_pegawai.'").modal("hide");
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('."'".'[name="'."'".'+data.inputerror[i]+'."'".'"]'."'".').parent().parent().addClass("has-error"); //select parent twice to select div form-group class and add has-error class
                        $('."'".'[name="'."'".'+data.inputerror[i]+'."'".'"]'."'".').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $("#btnSave").text("Simpan Data Pegawai"); //change button text
                $("#btnSave").attr("disabled",false); //set button enable 
     
     
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert("Terjadi kesalahan saat menyimpan data");
                $("#btnSave").text("Simpan Data Pegawai"); //change button text
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
                        "recordsTotal" => $this->admin_pegawai_model->count_all(),
                        "recordsFiltered" => $this->admin_pegawai_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);

	}

	public function ajax_add_pegawai(){
        $this->_validate();

        $data = array(
            'nama_pegawai'        	 	  	 => $this->input->post('nama_pegawai'),
            'alamat_pegawai'        	 	 => $this->input->post('alamat_pegawai'),
            'tempat_lahir_pegawai'       	 => $this->input->post('tempat_lahir_pegawai'),
            'tgl_lahir_pegawai'     	 => $this->input->post('tgl_lahir_pegawai'),
            'no_tlpn_pegawai'          	  	 => $this->input->post('no_tlpn_pegawai'),
            'tgl_masuk_sebagai_pegawai'      => $this->input->post('tgl_masuk_sebagai_pegawai'),
            'jk_pegawai'                 => $this->input->post('jk_pegawai'),
             'level'   						 => $this->input->post('level'),
            'username'        		 		 => $this->input->post('username'),
            'password'        				 => $this->input->post('password'),
           
        );
 
        $insert = $this->admin_pegawai_model->save_pegawai($data);
        echo json_encode(array("status" => TRUE));
    }




    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('nama_pegawai') == '')
        {
            $data['inputerror'][] = 'nama_pegawai';
            $data['error_string'][] = 'Nama Pegawai harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('alamat_pegawai') == '')
        {
            $data['inputerror'][] = 'alamat_pegawai';
            $data['error_string'][] = 'Alamat Pegawai harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('tempat_lahir_pegawai') == '')
        {
            $data['inputerror'][] = 'tempat_lahir_pegawai';
            $data['error_string'][] = 'Tempat Lahir Pegawaai harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('tgl_lahir_pegawai') == '')
        {
            $data['inputerror'][] = 'tgl_lahir_pegawai';
            $data['error_string'][] = 'Tanggal Lahir Pegawaai harus diisi';
            $data['status'] = FALSE;
        }


        if($this->input->post('no_tlpn_pegawai') == '')
        {
            $data['inputerror'][] = 'no_tlpn_pegawai';
            $data['error_string'][] = 'NO Telephone Pegawaai harus diisi';
            $data['status'] = FALSE;
        }

       
         if($this->input->post('jk_pegawai') == '')
        {
            $data['inputerror'][] = 'jk_pegawai';
            $data['error_string'][] = 'jenis Kelamin harus diisi';
            $data['status'] = FALSE;
        }

         if($this->input->post('level') == '')
        {
            $data['inputerror'][] = 'level';
            $data['error_string'][] = 'Level harus diisi';
            $data['status'] = FALSE;
        }

         if($this->input->post('username') == '')
        {
            $data['inputerror'][] = 'username';
            $data['error_string'][] = 'Username harus diisi';
            $data['status'] = FALSE;
        }
         if($this->input->post('password') == '')
        {
            $data['inputerror'][] = 'password';
            $data['error_string'][] = 'Password harus diisi';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }   


     public function ajax_pegawai($id)
    {
        $data = $this->admin_pegawai_models->get_pegawai_by_id($id);
        echo json_encode($data);
    }


 public function ajax_delete_pegawai()
    {
        $id = $this->input->post('id_pegawai');
        $this->admin_pegawai_model->delete_pegawai($id);
        echo json_encode(array("status" => TRUE));

    }

    public function ajax_edit_pegawai()
    {
        $this->_validate();
         $data = array(
            'nama_pegawai'                   => $this->input->post('nama_pegawai'),
            'alamat_pegawai'                 => $this->input->post('alamat_pegawai'),
            'tempat_lahir_pegawai'           => $this->input->post('tempat_lahir_pegawai'),
            'tgl_lahir_pegawai'          => $this->input->post('tgl_lahir_pegawai'),
            'no_tlpn_pegawai'                => $this->input->post('no_tlpn_pegawai'),
            'tgl_masuk_sebagai_pegawai'      => $this->input->post('tgl_masuk_sebagai_pegawai'),
            'jk_pegawai'                 => $this->input->post('jk_pegawai'),
             'level'                         => $this->input->post('level'),
            'username'                       => $this->input->post('username'),
            'password'                       => $this->input->post('password'),
           
        );
 
        $insert = $this->admin_pegawai_model->edit_pegawai($this->input->post('id'), $data);
        echo json_encode(array("status" => TRUE));
    }

}



  
