<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Supplier extends CI_Controller {
	 public function __construct(){
		parent::__construct();
		$this->load->model('supplier_models');
	}

	public function index(){
		$this->theme->load('supplier_views');
	}

	public function ajax_list(){
		$this->load->helper('url');

		$list = $this->supplier_models->get_datatables();
		$data = array();
        $no = 1;
		foreach ($list as $item) {
            $row = array();
            $row[] = $no++;
			$row[] = $item->nama_supplier;
			$row[] = $item->Alamat;
			$row[] = $item->no_telp_supplier;
			$row[] = $item->email;

            $row[]  =['
            <button class="btn btn-sm btn-danger" title="Hapus" onclick="delete_supplier('."'".$item->id_supplier."','".$item->nama_supplier."'".')"><i class="fa fa-trash"> Hapus</i>
            </button> 
            <button class="btn btn-sm btn-warning" title="Pilih" onclick="edit_supplier_'.$item->id_supplier.'()"><i class="fa fa-pencil"> Edit</i>
            </button>

            <!-- Modal untuk penyedia Boga -->
<div class="modal fade" id="modal_edit_supplier_'.$item->id_supplier.'" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Input Supplier</h3>
            </div>
            <div class="modal-body">
                <form action="#" id="form_edit_supplier_'.$item->id_supplier.'" class="form-horizontal">
                    <input type="hidden" name="id" value="'.$item->id_supplier.'">
                    <div class="form-body form">
                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Nama Supplier</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_supplier" value="'.$item->nama_supplier.'" class="form-control" style="width:100%">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">
                                <input type="text" name="Alamat" class="form-control" style="width:100%" value="'.$item->Alamat.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Nomor Telepon</label>
                            <div class="col-md-9">
                                <input type="text" name="no_telp_supplier" class="form-control" style="width:100%" value="'.$item->no_telp_supplier.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input type="text" name="email" class="form-control" style="width:100%" value="'.$item->email.'">
                                <span class="help-block"></span>
                            </div>
                        </div>
 

                    </div>
                </form>
                <button type="button" id="btnSave" onclick="save_edit_supplier_'.$item->id_supplier.'()" class="btn btn-primary">Simpan Data Supplier</button>
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
    function edit_supplier_'.$item->id_supplier.'(){
        $("#form_edit_supplier_'.$item->id_supplier.'")[0].reset(); // reset form on modals
        $(".form-group").removeClass("has-error"); // clear error class
        $(".help-block").empty(); // clear error string

        $(".modal-title").text("Form Edit Supplier : '.$item->nama_supplier.'");
        $("#modal_edit_supplier_'.$item->id_supplier.'").modal("show"); // show bootstrap modal 
    }
    function save_edit_supplier_'.$item->id_supplier.'(){
        $("#btnSave").text("Menyimpan....."); //change button text
        $("#btnSave").attr("disabled",true); //set button disable 
        var url;

        url = "supplier/ajax_edit_supplier";
     
        // ajax adding data to database
     
        var formData = new FormData($("#form_edit_supplier_'.$item->id_supplier.'")[0]);
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
                    $("#modal_edit_supplier_'.$item->id_supplier.'").modal("hide");
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('."'".'[name="'."'".'+data.inputerror[i]+'."'".'"]'."'".').parent().parent().addClass("has-error"); //select parent twice to select div form-group class and add has-error class
                        $('."'".'[name="'."'".'+data.inputerror[i]+'."'".'"]'."'".').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $("#btnSave").text("Simpan Data Supplier"); //change button text
                $("#btnSave").attr("disabled",false); //set button enable 
     
     
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert("Terjadi kesalahan saat menyimpan data");
                $("#btnSave").text("Simpan Data Supplier"); //change button text
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
                        "recordsTotal" => $this->supplier_models->count_all(),
                        "recordsFiltered" => $this->supplier_models->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);

	}

    public function ajax_add_supplier(){
        $this->_validate();

        $data = array(
            'nama_supplier'      => $this->input->post('nama_supplier'),
            'Alamat'        	 => $this->input->post('Alamat'),
            'no_telp_supplier'   => $this->input->post('no_telp_supplier'),
            'email'              => $this->input->post('email'),
            
        );
 
        $insert = $this->supplier_models->save_supplier($data);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('nama_supplier') == '')
        {
            $data['inputerror'][] = 'nama_supplier';
            $data['error_string'][] = 'Nama Supplier harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('Alamat') == '')
        {
            $data['inputerror'][] = 'Alamat';
            $data['error_string'][] = 'Alamat Supplier harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('no_telp_supplier') == '')
        {
            $data['inputerror'][] = 'no_telp_supplier';
            $data['error_string'][] = 'Nomor Telepon Supplier harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('email') == '')
        {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'Email Supplier harus diisi';
            $data['status'] = FALSE;
        }


        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function ajax_supplier($id)
    {
        $data = $this->supplier_models->get_supplier_by_id($id);
        echo json_encode($data);
    }

    public function ajax_delete_supplier()
    {
        $id = $this->input->post('id_supplier');
        $this->supplier_models->delete_supplier($id);
        echo json_encode(array("status" => TRUE));

    }

    public function ajax_edit_supplier()
    {
        $this->_validate();
        $data = array(
            'nama_supplier'      => $this->input->post('nama_supplier'),
            'Alamat'             => $this->input->post('Alamat'),
            'no_telp_supplier'   => $this->input->post('no_telp_supplier'),
            'email'              => $this->input->post('email'),
            
        );
 
        $insert = $this->supplier_models->edit_supplier($this->input->post('id'), $data);
        echo json_encode(array("status" => TRUE));
    }

}

