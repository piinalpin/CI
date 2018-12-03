<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_Poliklinik_Dashboard extends CI_Controller {
	 public function __construct(){
		parent::__construct();
		$this->load->model('admin_poliklinik_dashboard_model');
	}

	public function index(){
		$this->theme->load('admin_poliklinik_dashboard_view');
        
       // $this->theme->load('poliklinik_view');
	}

    

	public function ajax_list(){
		$this->load->helper('url');

		$list = $this->admin_poliklinik_dashboard_model->get_datatables();
		$data = array(); 
        $no = 1;
        foreach ($list as $item) {
            $row = array();
            $row[] = $no++;
          	$row[] = $item->nama_poli;

            $row[]  =['
            <button class="btn btn-sm btn-danger" title="Hapus" onclick="delete_poli('."'".$item->id_poli."','".$item->nama_poli."'".')"><i class="fa fa-trash"> Hapus</i>
            </button> 
            <button class="btn btn-sm btn-warning" title="Pilih" onclick="edit_poli_'.$item->id_poli.'()"><i class="fa fa-pencil"> Edit</i>
            </button>

            <button class="btn btn-sm btn-primary" title="Jadwal" onclick="delete_poli('."'".$item->id_poli."','".$item->nama_poli."'".')"> Jadwal Jaga Poliklinik
            </button> 


               <!-- Modal untuk penyedia Boga -->
<div class="modal fade" id="modal_edit_poli_'.$item->id_poli.'" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Input Poli</h3>
            </div>
            <div class="modal-body">
                <form action="#" id="form_edit_poli_'.$item->id_poli.'" class="form-horizontal">
                    <input type="hidden" name="id" value="'.$item->id_poli.'">
                    <div class="form-body form">
                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Nama Poli</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_poli" value="'.$item->nama_poli.'" class="form-control" style="width:100%">
                                <span class="help-block"></span>
                            </div>
                        </div>


                    </div>
                </form>
                <button type="button" id="btnSave" onclick="save_edit_poli_'.$item->id_poli.'()" class="btn btn-primary">Simpan Data Poli</button>
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
    function edit_poli_'.$item->id_poli.'(){
        $("#form_edit_poli_'.$item->id_poli.'")[0].reset(); // reset form on modals
        $(".form-group").removeClass("has-error"); // clear error class
        $(".help-block").empty(); // clear error string

        $(".modal-title").text("Form Edit Poli : '.$item->nama_poli.'");
        $("#modal_edit_poli_'.$item->id_poli.'").modal("show"); // show bootstrap modal 
    }
    function save_edit_poli_'.$item->id_poli.'(){
        $("#btnSave").text("Menyimpan....."); //change button text
        $("#btnSave").attr("disabled",true); //set button disable 
        var url;

        url = "admin_poliklinik_dashboard/ajax_edit_poli";
     
        // ajax adding data to database
     
        var formData = new FormData($("#form_edit_poli_'.$item->id_poli.'")[0]);
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
                    $("#modal_edit_poli_'.$item->id_poli.'").modal("hide");
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('."'".'[name="'."'".'+data.inputerror[i]+'."'".'"]'."'".').parent().parent().addClass("has-error"); //select parent twice to select div form-group class and add has-error class
                        $('."'".'[name="'."'".'+data.inputerror[i]+'."'".'"]'."'".').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $("#btnSave").text("Simpan Data Poli"); //change button text
                $("#btnSave").attr("disabled",false); //set button enable 
     
     
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert("Terjadi kesalahan saat menyimpan data");
                $("#btnSave").text("Simpan Data Poli"); //change button text
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
                        "recordsTotal" => $this->admin_poliklinik_dashboard_model->count_all(),
                        "recordsFiltered" => $this->admin_poliklinik_dashboard_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);

	}

	public function ajax_add_poliklinik(){
        $this->_validate();

        $data = array(
            'nama_poli'        	 	  	 => $this->input->post('nama_poli'),
           
           
        );
 
        $insert = $this->admin_poliklinik_dashboard_model->save_poliklinik($data);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('nama_poli') == '')
        {
            $data['inputerror'][] = 'nama_poli';
            $data['error_string'][] = 'Nama Poliklinik harus diisi';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }   


    public function ajax_poli($id)
    {
        $data = $this->admin_poliklinik_dashboard_models->get_poli_by_id($id);
        echo json_encode($data);
    }


     public function ajax_delete_poli()
    {
        $id = $this->input->post('id_poli');
        $this->admin_poliklinik_dashboard_model->delete_poli($id);
        echo json_encode(array("status" => TRUE));

    }

    public function ajax_edit_poli()
    {
        $this->_validate();
        $data = array(
           'nama_poli'                  => $this->input->post('nama_poli'),
            
            
        );
 
        $insert = $this->admin_poliklinik_dashboard_model->edit_poli($this->input->post('id'), $data);
        echo json_encode(array("status" => TRUE));
    }

  
}