<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_Periksa extends CI_Controller {
	 public function __construct(){
		parent::__construct();
		$this->load->model('admin_periksa_model');
	}

	public function index(){
		$this->theme->load('admin_periksa_view');
	}

    

	public function ajax_list(){
		$this->load->helper('url');

		$list = $this->admin_periksa_model->get_datatables();
		$data = array();
		 $no = 1;
        foreach ($list as $item) {
            $row = array();
            $row[] = $no++;
		    $row[] = $item->no_rm;
			$row[] = $item->id_resep;
			$row[] = $item->tgl_periksa;
            $row[] = $item->id_dokter;
            $row[] = $item->id_pegawai;

                 $row[]  =['
            <button class="btn btn-sm btn-danger" title="Hapus" onclick="delete_periksa('."'".$item->id_periksa."'".')"><i class="fa fa-trash"> Hapus</i>
            </button> 
            <button class="btn btn-sm btn-warning" title="Pilih" onclick="edit_periksa_'.$item->id_periksa.'()"><i class="fa fa-pencil"> Edit</i>
            </button>

       <!-- Modal untuk penyedia Boga -->
<div class="modal fade" id="modal_edit_periksa_'.$item->id_periksa.'" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Input periksa</h3>
            </div>
            <div class="modal-body">
                <form action="#" id="form_edit_periksa_'.$item->id_periksa.'" class="form-horizontal">
                    <input type="hidden" name="id" value="'.$item->id_periksa.'">
                    <div class="form-body form">
                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Id Pasien</label>
                            <div class="col-md-9">
                                <input type="text" name="id_pasien" value="'.$item->id_pasien.'" class="form-control" style="width:100%">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Nomor Rekam Medis</label>
                            <div class="col-md-9">
                                <input type="text" name="no_rm" class="form-control" style="width:100%" value="'.$item->no_rm.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Id Resep</label>
                            <div class="col-md-9">
                                <input type="text" name="id_resep" class="form-control" style="width:100%" value="'.$item->id_resep.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Tanggal Periksa</label>
                            <div class="col-md-9">
                                <input type="date" name="tgl_periksa" class="form-control" style="width:100%" value="'.$item->tgl_periksa.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Id Dokter</label>
                            <div class="col-md-9">
                                <input type="text" name="id_dokter" class="form-control" style="width:100%" value="'.$item->id_dokter.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Id Pegawai</label>
                            <div class="col-md-9">
                                <input type="text" name="id_pegawai" class="form-control" style="width:100%" value="'.$item->id_pegawai.'">
                                <span class="help-block"></span>
                            </div>
                        </div>                        
                        
                         

                    </div>
                </form>
                <button type="button" id="btnSave" onclick="save_edit_periksa_'.$item->id_periksa.'()" class="btn btn-primary">Simpan Data Periksa</button>
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
    function edit_periksa_'.$item->id_periksa.'(){
        $("#form_edit_periksa_'.$item->id_periksa.'")[0].reset(); // reset form on modals
        $(".form-group").removeClass("has-error"); // clear error class
        $(".help-block").empty(); // clear error string

        $(".modal-title").text("Form Edit Periksa : No Rekam Medis '.$item->no_rm.'");
        $("#modal_edit_periksa_'.$item->id_periksa.'").modal("show"); // show bootstrap modal 
    }
    function save_edit_periksa_'.$item->id_periksa.'(){
        $("#btnSave").text("Menyimpan....."); //change button text
        $("#btnSave").attr("disabled",true); //set button disable 
        var url;

        url = "admin_periksa/ajax_edit_periksa";
     
        // ajax adding data to database
     
        var formData = new FormData($("#form_edit_periksa_'.$item->id_periksa.'")[0]);
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
                    $("#modal_edit_periksa_'.$item->id_periksa.'").modal("hide");
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('."'".'[name="'."'".'+data.inputerror[i]+'."'".'"]'."'".').parent().parent().addClass("has-error"); //select parent twice to select div form-group class and add has-error class
                        $('."'".'[name="'."'".'+data.inputerror[i]+'."'".'"]'."'".').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $("#btnSave").text("Simpan Data Periksa"); //change button text
                $("#btnSave").attr("disabled",false); //set button enable 
     
     
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert("Terjadi kesalahan saat menyimpan data");
                $("#btnSave").text("Simpan Data Periksa"); //change button text
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
                        "recordsTotal" => $this->admin_periksa_model->count_all(),
                        "recordsFiltered" => $this->admin_periksa_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);

	}


    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('no_rm') == '')
        {
            $data['inputerror'][] = 'no_rm';
            $data['error_string'][] = 'Nomor Rekam Medis harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('resep') == '')
        {
            $data['inputerror'][] = 'resep';
            $data['error_string'][] = 'Resep harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('tgl_periksa') == '')
        {
            $data['inputerror'][] = 'tgl_periksa';
            $data['error_string'][] = 'Tanggal Periksa harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('id_dokter') == '')
        {
            $data['inputerror'][] = 'id_dokter';
            $data['error_string'][] = 'Id Dokter harus diisi';
            $data['status'] = FALSE;
        }


        if($this->input->post('id_pegawai') == '')
        {
            $data['inputerror'][] = 'id_pegawai';
            $data['error_string'][] = 'Id pegawai harus diisi';
            $data['status'] = FALSE;
        }

       
         

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }   


     public function ajax_edit_periksa()
    {
   //     $this->_validate();
         $data = array(
            'no_rm'                 => $this->input->post('no_rm'),
            'id_resep'           => $this->input->post('id_resep'),
            'tgl_periksa'          => $this->input->post('tgl_periksa'),
            'id_dokter'                => $this->input->post('id_dokter'),
            'id_pegawai'      => $this->input->post('id_pegawai'),
        );
 
        $insert = $this->admin_periksa_model->edit_periksa($this->input->post('id'), $data);
        echo json_encode(array("status" => TRUE));
    }


 public function ajax_delete_periksa()
    {
        $id = $this->input->post('id_periksa');
        $this->admin_periksa_model->delete_periksa($id);
        echo json_encode(array("status" => TRUE));

    }
  

}



  
