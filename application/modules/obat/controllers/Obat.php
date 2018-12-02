<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Obat extends CI_Controller {
	 public function __construct(){
		parent::__construct();
		$this->load->model('obat_models');
	}

	public function index(){
		$this->theme->load('obat_views');
	}

	public function ajax_list(){
		$this->load->helper('url');

		$list = $this->obat_models->get_datatables();
		$data = array();
        $no = 1;
		foreach ($list as $item) {
            $row = array();
            $row[] = $no++;
			$row[] = $item->nama_obat;
			$row[] = $item->jenis_obat;
			$row[] = $item->berat;
			$row[] = $item->harga;
            $row[] = $item->stock;
            $row[] = $item->gambar;


            $row[]  =['
            <button class="btn btn-sm btn-danger" title="Hapus" onclick="delete_obat('."'".$item->id_obat."','".$item->nama_obat."'".')"><i class="fa fa-trash"> Hapus</i>
            </button> 
            <button class="btn btn-sm btn-warning" title="Pilih" onclick="edit_obat_'.$item->id_obat.'()"><i class="fa fa-pencil"> Edit</i>
            </button>

            <!-- Modal untuk penyedia Boga -->
<div class="modal fade" id="modal_edit_obat_'.$item->id_obat.'" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Input Obat</h3>
            </div>
            <div class="modal-body">
                <form action="#" id="form_edit_obat'.$item->id_obat.'" class="form-horizontal">
                    <input type="hidden" name="id" value="'.$item->id_obat.'">
                    <div class="form-body form">
                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Nama Obat</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_obat" value="'.$item->nama_obat.'" class="form-control" style="width:100%">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Jenis Obat</label>
                            <div class="col-md-9">
                                <input type="text" name="jenis_obat" class="form-control" style="width:100%" value="'.$item->jenis_obat.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Berat Obat</label>
                            <div class="col-md-9">
                                <input type="text" name="berat" class="form-control" style="width:100%" value="'.$item->berat.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Harga Obat</label>
                            <div class="col-md-9">
                                <input type="text" name="harga" class="form-control" style="width:100%" value="'.$item->harga.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Stock Obat</label>
                            <div class="col-md-9">
                                <input type="text" name="stock" class="form-control" style="width:100%" value="'.$item->stock.'">
                                <span class="help-block"></span>
                            </div>
                        </div>
 
                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Gambar Obat</label>
                            <div class="col-md-9">
                                <input type="text" name="gambar" class="form-control" style="width:100%" value="'.$item->gambar.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                    </div>
                </form>
                <button type="button" id="btnSave" onclick="save_edit_obat_'.$item->id_obat.'()" class="btn btn-primary">Simpan Data Obat</button>
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
    function edit_obat_'.$item->id_obat.'(){
        $("#form_edit_obat'.$item->id_obat.'")[0].reset(); // reset form on modals
        $(".form-group").removeClass("has-error"); // clear error class
        $(".help-block").empty(); // clear error string

        $(".modal-title").text("Form Edit Obat : '.$item->nama_obat.'");
        $("#modal_edit_obat_'.$item->id_obat.'").modal("show"); // show bootstrap modal 
    }
    function save_edit_obat_'.$item->id_obat.'(){
        $("#btnSave").text("Menyimpan....."); //change button text
        $("#btnSave").attr("disabled",true); //set button disable 
        var url;

        url = "obat/ajax_edit_obat";
     
        // ajax adding data to database
     
        var formData = new FormData($("#form_edit_obat'.$item->id_obat.'")[0]);
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
                    $("#modal_edit_obat_'.$item->id_obat.'").modal("hide");
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('."'".'[name="'."'".'+data.inputerror[i]+'."'".'"]'."'".').parent().parent().addClass("has-error"); //select parent twice to select div form-group class and add has-error class
                        $('."'".'[name="'."'".'+data.inputerror[i]+'."'".'"]'."'".').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $("#btnSave").text("Simpan Data obat"); //change button text
                $("#btnSave").attr("disabled",false); //set button enable 
     
     
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert("Terjadi kesalahan saat menyimpan data");
                $("#btnSave").text("Simpan Data obat"); //change button text
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
                        "recordsTotal" => $this->obat_models->count_all(),
                        "recordsFiltered" => $this->obat_models->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);

	}

    public function ajax_add_obat(){
        $this->_validate();

        $data = array(
            'nama_obat'         => $this->input->post('nama_obat'),
            'jenis_obat'        => $this->input->post('jenis_obat'),
            'berat'             => $this->input->post('berat'),
            'harga'             => $this->input->post('harga'),
            'stock'             => $this->input->post('stock'),
            'gambar'            => $this->input->post('gambar'),
            
        );
 
        $insert = $this->obat_models->save_obat($data);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('nama_obat') == '')
        {
            $data['inputerror'][] = 'nama_obat';
            $data['error_string'][] = 'Nama Obat harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('jenis_obat') == '')
        {
            $data['inputerror'][] = 'jenis_obat';
            $data['error_string'][] = 'Jenis Obat harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('berat') == '')
        {
            $data['inputerror'][] = 'berat';
            $data['error_string'][] = 'Berat Obat harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('harga') == '')
        {
            $data['inputerror'][] = 'harga';
            $data['error_string'][] = 'Harga Obat harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('stock') == '')
        {
            $data['inputerror'][] = 'stock';
            $data['error_string'][] = 'Stock Obat harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('gambar') == '')
        {
            $data['inputerror'][] = 'gambar';
            $data['error_string'][] = 'Gambar Obat harus diisi';
            $data['status'] = FALSE;
        }


        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function ajax_obat($id)
    {
        $data = $this->obat_models->get_obat_by_id($id);
        echo json_encode($data);
    }

    public function ajax_delete_obat()
    {
        $id = $this->input->post('id_obat');
        $this->obat_models->delete_obat($id);
        echo json_encode(array("status" => TRUE));

    }

    public function ajax_edit_obat()
    {
        $this->_validate();
        $data = array(
            'nama_obat'         => $this->input->post('nama_obat'),
            'jenis_obat'        => $this->input->post('jenis_obat'),
            'berat'             => $this->input->post('berat'),
            'harga'             => $this->input->post('harga'),
            'stock'             => $this->input->post('stock'),
            'gambar'            => $this->input->post('gambar'),
            
        );
 
        $insert = $this->obat_models->edit_obat($this->input->post('id'), $data);
        echo json_encode(array("status" => TRUE));
    }

}

