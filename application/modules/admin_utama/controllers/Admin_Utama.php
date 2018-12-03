<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_Utama extends CI_Controller {
	 public function __construct(){
		parent::__construct();
		$this->load->model('admin_utama_model');
	}

	public function index(){
		$this->theme->load('admin_view');
	}

    

	public function ajax_list(){
		$this->load->helper('url');

		$list = $this->admin_utama_model->get_datatables();
		$data = array();
		$no = 1;
        foreach ($list as $item) {
            $row = array();
            $row[] = $no++;
			$row[] = $item->nama_admin;
			$row[] = $item->username;
			$row[] = $item->password;

            $row[]  =['
            <button class="btn btn-sm btn-danger" title="Hapus" onclick="delete_admin('."'".$item->id_admin."','".$item->nama_admin."'".')"><i class="fa fa-trash"> Hapus</i>
            </button> 
            <button class="btn btn-sm btn-warning" title="Pilih" onclick="edit_admin_'.$item->id_admin.'()"><i class="fa fa-pencil"> Edit</i>
            </button>


            <!-- Modal untuk penyedia Boga -->
<div class="modal fade" id="modal_edit_admin_'.$item->id_admin.'" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Input Admin</h3>
            </div>
            <div class="modal-body">
                <form action="#" id="form_edit_admin_'.$item->id_admin.'" class="form-horizontal">
                    <input type="hidden" name="id" value="'.$item->id_admin.'">
                    <div class="form-body form">
                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Nama Admin</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_admin" value="'.$item->nama_admin.'" class="form-control" style="width:100%">
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
                <button type="button" id="btnSave" onclick="save_edit_admin_'.$item->id_admin.'()" class="btn btn-primary">Simpan Data Admin</button>
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
    function edit_admin_'.$item->id_admin.'(){
        $("#form_edit_admin_'.$item->id_admin.'")[0].reset(); // reset form on modals
        $(".form-group").removeClass("has-error"); // clear error class
        $(".help-block").empty(); // clear error string

        $(".modal-title").text("Form Edit Admin : '.$item->nama_admin.'");
        $("#modal_edit_admin_'.$item->id_admin.'").modal("show"); // show bootstrap modal 
    }
    function save_edit_admin_'.$item->id_admin.'(){
        $("#btnSave").text("Menyimpan....."); //change button text
        $("#btnSave").attr("disabled",true); //set button disable 
        var url;

        url = "admin_utama/ajax_edit_admin";
     
        // ajax adding data to database
     
        var formData = new FormData($("#form_edit_admin_'.$item->id_admin.'")[0]);
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
                    $("#modal_edit_admin_'.$item->id_admin.'").modal("hide");
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('."'".'[name="'."'".'+data.inputerror[i]+'."'".'"]'."'".').parent().parent().addClass("has-error"); //select parent twice to select div form-group class and add has-error class
                        $('."'".'[name="'."'".'+data.inputerror[i]+'."'".'"]'."'".').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $("#btnSave").text("Simpan Data Admin"); //change button text
                $("#btnSave").attr("disabled",false); //set button enable 
     
     
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert("Terjadi kesalahan saat menyimpan data");
                $("#btnSave").text("Simpan Data Admin"); //change button text
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
                        "recordsTotal" => $this->admin_utama_model->count_all(),
                        "recordsFiltered" => $this->admin_utama_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);

	}

	public function ajax_add_admin(){
     $this->_validate();

        $data = array(
            'nama_admin'        	 	  	 => $this->input->post('nama_admin'),
            'username'        		 		 => $this->input->post('username'),
            'password'        				 => $this->input->post('password'),
           
        );
 
        $insert = $this->admin_utama_model->save_admin($data);
        echo json_encode(array("status" => TRUE));
    }


     private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('nama_admin') == '')
        {
            $data['inputerror'][] = 'nama_admin';
            $data['error_string'][] = 'Nama Admin harus diisi';
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
            $data['error_string'][] = 'Password admin harus diisi';
            $data['status'] = FALSE;
        }


        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function ajax_admin($id)
    {
        $data = $this->admin_utama_model->get_admin_by_id($id);
        echo json_encode($data);
    }

    public function ajax_delete_admin()
    {
        $id = $this->input->post('id_admin');
        $this->admin_utama_model->delete_admin($id);
        echo json_encode(array("status" => TRUE));

    }

    public function ajax_edit_admin()
    {
        $this->_validate();
        $data = array(
           'nama_admin'                  => $this->input->post('nama_admin'),
            'username'                       => $this->input->post('username'),
            'password'                       => $this->input->post('password'),
            
        );
 
        $insert = $this->admin_utama_model->edit_admin($this->input->post('id'), $data);
        echo json_encode(array("status" => TRUE));
    }

}

