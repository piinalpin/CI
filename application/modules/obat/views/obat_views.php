<!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    
    <link src="<?=base_url();?>assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link src="<?=base_url();?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url();?>assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
    <style type="text/css">
        .modalEdit{
            width: 100%;
        }
    </style>
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group pull-right m-t-15">
                            <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                            <ul class="dropdown-menu drop-menu-right" role="menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>

                        <h4 class="page-title">Datatable</h4>
                        <ol class="breadcrumb">
                            <li>
                                <a href="#">Ubold</a>
                            </li>
                            <li>
                                <a href="#">Tables</a>
                            </li>
                            <li class="active">
                                Datatable
                            </li>
                        </ol>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>Default Example</b></h4>
                            <button class="btn btn-success" onclick="input_obat()"><i class="fa fa-plus"></i> Input Data Obat Baru</button>
                            <br><br>

                            <table id="table_awal" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Obat</th>
                                    <th>Jenis</th>
                                    <th>Berat</th>
                                    <th>Harga</th>
                                    <th>Stock</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                    
                                </tr>
                                </thead>


                                <tbody>
                                    
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                                <!-- end row -->


            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer">
            © 2016. All rights reserved.
        </footer>

    </div>
<script src="<?=base_url();?>assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/dataTables.bootstrap.js"></script>
<script src="<?=base_url();?>assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>

<script src="<?=base_url();?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/buttons.bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/jszip.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/pdfmake.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/vfs_fonts.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/buttons.print.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/dataTables.keyTable.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/responsive.bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/dataTables.scroller.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/dataTables.colVis.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>
<!--FooTable-->
<script src="<?=base_url();?>assets/plugins/footable/js/footable.all.min.js"></script>

<script src="<?=base_url();?>assets/pages/datatables.init.js"></script>

<script src="<?=base_url();?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
    var save_method; //for save method string
    var table;
    var base_url = '<?=base_url();?>';
    $(document).ready(function () {
        $('#modal_input_obat').modal('hide');
        $('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        table = $('#table_awal').DataTable({
            "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
         
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?=site_url('obat/ajax_list')?>",
                    "type": "POST"
                },
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": true,
                "bInfo": false,
                "bAutoWidth": false,
         
                //Set column definition initialisation properties.
                "columnDefs": [
                    { 
                        "targets": [ -1 ], //last column
                        "orderable": false, //set not orderable
                    },
                    { 
                        "targets": [ -3 ], //last column
                        "orderable": false, //set not orderable
                    },

                    { 
                        "targets": [ -6 ], //last column
                        "orderable": false, //set not orderable
                    },
                ]
        });
        $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
        });
        $("textarea").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("select").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
     
        
    });

    function reload_table(){
        table.ajax.reload(null,false); 
    }

    function input_obat(){
        $('#form_obat')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        $('.modal-title').text('Form Input Obat');
        $('#modal_input_obat').modal('show'); // show bootstrap modal 
    }

    function save_obat(){
        $('#btnSave').text('Menyimpan.....'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        var url;
     
        url = "<?=site_url('obat/ajax_add_obat')?>";
     
        // ajax adding data to database
     
        var formData = new FormData($('#form_obat')[0]);
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
                    $('#modal_input_obat').modal('hide');
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $('#btnSave').text('Simpan Data Obat'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
     
     
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Terjadi kesalahan saat menyimpan data');
                $('#btnSave').text('Simpan Data Obat'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
     
            }
        });
    }

    function delete_obat(id_obat, nama_obat) {
        var url;
        url = "<?=site_url('/obat/ajax_delete_obat')?>";
        swal({
          title: "Are you sure?",
          text: "Delete obat : " + nama_obat,
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false
        },
        function(){
          swal("Deleted!", "Data Obat has been deleted.", "success");
          $.ajax({
            url: url,
            type: 'POST',
            data: {'id_obat': id_obat},
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Terjadi kesalahan saat menghapus data');
                $('#btnSave').text('Hapus Data Obat'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
     
            }
        });
        reload_table();
        });
    }
</script>


<!-- Modal untuk penyedia Boga -->
<div class="modal fade" id="modal_input_obat" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Input Obat</h3>
            </div>
            <div class="modal-body">
                <form action="#" id="form_obat" class="form-horizontal">
                    <input type="hidden" name="id">
                    <div class="form-body form">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Obat</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_obat" class="form-control" placeholder="Masukkan Nama Obat">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Jenis Obat</label>
                            <div class="col-md-9">
                                <input type="text" name="jenis_obat" class="form-control" placeholder="Masukkan Jenis Obat">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Berat Obat</label>
                            <div class="col-md-9">
                                <input type="text" name="berat" class="form-control" placeholder="Masukkan Berat Obat">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Harga Obat</label>
                            <div class="col-md-9">
                                <input type="text" name="harga" class="form-control" placeholder="Masukkan Harga Obat">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Stock Obat</label>
                            <div class="col-md-9">
                                <input type="text" name="stock" class="form-control" placeholder="Masukkan Stock Obat">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Gambar Obat</label>
                            <div class="col-md-9">
                                <input type="text" name="gambar" class="form-control" placeholder="Masukkan Gambar Obat">
                                <span class="help-block"></span>
                            </div>
                        </div>
 

                    </div>
                </form>
                <button type="button" id="btnSave" onclick="save_obat()" class="btn btn-primary">Simpan Data Obat</button>
            </div>
            <div class="modal-footer">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal --><script src="assets/plugins/notifyjs/js/notify.js"></script>
        <script src="assets/plugins/notifications/notify-metro.js"></script>