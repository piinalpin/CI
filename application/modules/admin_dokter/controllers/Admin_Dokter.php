<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_Dokter extends CI_Controller {
     public function __construct(){
        parent::__construct();
        $this->load->model('admin_dokter_model');
    }

    public function index(){
        $this->theme->load('admin_dokter_view');
    }

    

    public function ajax_list(){
        $this->load->helper('url');

        $list = $this->admin_dokter_model->get_datatables();
        $data = array();
        $no = 1;
        foreach ($list as $item) {
            $row = array();
            $row[] = $no++;
            $row[] = $item->nama_dokter;
            $row[] = $item->alamat_dokter;
            $row[] = $item->username;
            $row[] = $item->password;

                $row[]  =['
            <button class="btn btn-sm btn-danger" title="Hapus" onclick="delete_dokter('."'".$item->id_dokter."','".$item->nama_dokter."'".')"><i class="fa fa-trash"> Hapus</i>
            </button> 
            <button class="btn btn-sm btn-warning" title="Pilih" onclick="edit_dokter_'.$item->id_dokter.'()"><i class="fa fa-pencil"> Edit</i>
            </button>

            <!-- Modal untuk penyedia Boga -->
<div class="modal fade" id="modal_edit_dokter_'.$item->id_dokter.'" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Input Dokter</h3>
            </div>
            <div class="modal-body">
                <form action="#" id="form_edit_dokter_'.$item->id_dokter.'" class="form-horizontal">
                    <input type="hidden" name="id" value="'.$item->id_dokter.'">
                    <div class="form-body form">
                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Nama Dokter</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_dokter" value="'.$item->nama_dokter.'" class="form-control" style="width:100%">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">
                                <input type="text" name="alamat_dokter" class="form-control" style="width:100%" value="'.$item->alamat_dokter.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Tempat Lahir</label>
                            <div class="col-md-9">
                                <input type="text" name="tempat_lahir_dokter" class="form-control" style="width:100%" value="'.$item->tempat_lahir_dokter.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Tanggal Lahir</label>
                            <div class="col-md-9">
                                <input type="text" name="tanggal_lahir_dokter" class="form-control" style="width:100%" value="'.$item->tanggal_lahir_dokter.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Nomor Telephone</label>
                            <div class="col-md-9">
                                <input type="text" name="no_telp_dokter" class="form-control" style="width:100%" value="'.$item->no_telp_dokter.'">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Spesialis</label>
                            <div class="col-md-9">
                                <input type="text" name="spesialis" class="form-control" style="width:100%" value="'.$item->spesialis.'">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        

                        
                         <div class="form-group modalEdit">
                            <label class="control-label col-md-3">Jenis Kelamin</label>
                            <div class="col-md-9">
                                <input type="text" name="jk_dokter" class="form-control" style="width:100%" value="'.$item->jk_dokter.'">
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
                <button type="button" id="btnSave" onclick="save_edit_dokter_'.$item->id_dokter.'()" class="btn btn-primary">Simpan Data Dokter</button>
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
    function edit_dokter_'.$item->id_dokter.'(){
        $("#form_edit_dokter_'.$item->id_dokter.'")[0].reset(); // reset form on modals
        $(".form-group").removeClass("has-error"); // clear error class
        $(".help-block").empty(); // clear error string

        $(".modal-title").text("Form Edit Dokter : '.$item->nama_dokter.'");
        $("#modal_edit_dokter_'.$item->id_dokter.'").modal("show"); // show bootstrap modal 
    }
    function save_edit_dokter_'.$item->id_dokter.'(){
        $("#btnSave").text("Menyimpan....."); //change button text
        $("#btnSave").attr("disabled",true); //set button disable 
        var url;

        url = "admin_dokter/ajax_edit_dokter";
     
        // ajax adding data to database
     
        var formData = new FormData($("#form_edit_dokter_'.$item->id_dokter.'")[0]);
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
                    $("#modal_edit_dokter_'.$item->id_dokter.'").modal("hide");
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('."'".'[name="'."'".'+data.inputerror[i]+'."'".'"]'."'".').parent().parent().addClass("has-error"); //select parent twice to select div form-group class and add has-error class
                        $('."'".'[name="'."'".'+data.inputerror[i]+'."'".'"]'."'".').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $("#btnSave").text("Simpan Data Dokter"); //change button text
                $("#btnSave").attr("disabled",false); //set button enable 
     
     
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert("Terjadi kesalahan saat menyimpan data");
                $("#btnSave").text("Simpan Data Dokter"); //change button text
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
                        "recordsTotal" => $this->admin_dokter_model->count_all(),
                        "recordsFiltered" => $this->admin_dokter_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);

    }

    public function ajax_add_dokter(){
        $this->_validate();

        $data = array(
            'nama_dokter'                   => $this->input->post('nama_dokter'),
             'spesialis'                 => $this->input->post('spesialis'),
            'alamat_dokter'                 => $this->input->post('alamat_dokter'),
            'tempat_lahir_dokter'           => $this->input->post('tempat_lahir_dokter'),
            'tanggal_lahir_dokter'              => $this->input->post('tanggal_lahir_dokter'),
            'no_telp_dokter'                => $this->input->post('no_telp_dokter'),
            'jk_dokter'                          => $this->input->post('jk_dokter'),
            'username'                       => $this->input->post('username'),
            'password'                       => $this->input->post('password'),
           
        );
 
        $insert = $this->admin_dokter_model->save_dokter($data);
        echo json_encode(array("status" => TRUE));
    }


    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('nama_dokter') == '')
        {
            $data['inputerror'][] = 'nama_dokter';
            $data['error_string'][] = 'Nama Dokter harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('alamat_dokter') == '')
        {
            $data['inputerror'][] = 'alamat_dokter';
            $data['error_string'][] = 'Alamat Dokter harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('spesialis') == '')
        {
            $data['inputerror'][] = 'spesialis';
            $data['error_string'][] = 'spesialis Dokter harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('tempat_lahir_dokter') == '')
        {
            $data['inputerror'][] = 'tempat_lahir_dokter';
            $data['error_string'][] = 'Tempat Lahir Dokter harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('tanggal_lahir_dokter') == '')
        {
            $data['inputerror'][] = 'tanggal_lahir_dokter';
            $data['error_string'][] = 'tanggal lahir dokter harus diisi';
            $data['status'] = FALSE;
        }


        if($this->input->post('no_telp_dokter') == '')
        {
            $data['inputerror'][] = 'no_telp_dokter';
            $data['error_string'][] = 'NO Telephone Dokter harus diisi';
            $data['status'] = FALSE;
        }

       
         if($this->input->post('jk_dokter') == '')
        {
            $data['inputerror'][] = 'jk_dokter';
            $data['error_string'][] = 'jenis Kelamin harus diisi';
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




    public function ajax_dokter($id)
    {
        $data = $this->admin_dokter_models->get_dokter_by_id($id);
        echo json_encode($data);
    }

   
 public function ajax_delete_dokter()
    {
        $id = $this->input->post('id_dokter');
        $this->admin_dokter_model->delete_dokter($id);
        echo json_encode(array("status" => TRUE));

    }

    public function ajax_edit_dokter()
    {
        $this->_validate();
        $data = array(
            'nama_dokter'                   => $this->input->post('nama_dokter'),
             'spesialis'                 => $this->input->post('spesialis'),
            'alamat_dokter'                 => $this->input->post('alamat_dokter'),
            'tempat_lahir_dokter'           => $this->input->post('tempat_lahir_dokter'),
            'tanggal_lahir_dokter'              => $this->input->post('tanggal_lahir_dokter'),
            'no_telp_dokter'                => $this->input->post('no_telp_dokter'),
            'jk_dokter'                          => $this->input->post('jk_dokter'),
            'username'                       => $this->input->post('username'),
            'password'                       => $this->input->post('password'),
            
        );
 
        $insert = $this->admin_dokter_model->edit_dokter($this->input->post('id'), $data);
        echo json_encode(array("status" => TRUE));
    }

}



