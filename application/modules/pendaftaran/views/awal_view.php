<!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <link src="<?=base_url();?>assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link src="<?=base_url();?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
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
                            <button class="btn btn-success" onclick="input_pasien()"><i class="fa fa-plus"></i> Input Pasien Baru</button>
                            <br><br>

                            <table id="table_awal" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
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

                                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>Antrian Periksa Pasien</b></h4>
                            <br><br>

                            <table id="table_periksa" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Dokter</th>
                                    <th>Aksi</th>
                                    
                                </tr>
                                </thead>


                                <tbody>
                                    
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>


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
        $('#modal_input_pasien').modal('hide');
        $('#datepicker-autoclose').datepicker({
            
            format:"yyyy-mm-dd",
            autoclose: true,
            todayHighlight: true
        });
        table = $('#table_awal').DataTable({
            "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
         
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?=site_url('pendaftaran/ajax_list')?>",
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
                        "targets": [ -2 ], //2 last column (photo)
                        "orderable": false, //set not orderable
                    },
                    { 
                        "targets": [ -3 ], //2 last column (photo)
                        "orderable": false, //set not orderable
                    },
                ]
        });
        table2 = $('#table_periksa').DataTable({
            "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
         
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?=site_url('pendaftaran/ajax_list_periksa')?>",
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
                        "targets": [ 0 ], //last column
                        "orderable": false, //set not orderable
                    },
                    { 
                        "targets": [ 1 ], //2 last column (photo)
                        "orderable": false, //set not orderable
                    },
                    { 
                        "targets": [ 2 ], //2 last column (photo)
                        "orderable": false, //set not orderable
                    },
                    { 
                        "targets": [ 3 ], //2 last column (photo)
                        "orderable": false, //set not orderable
                    },
                    { 
                        "targets": [ 4 ], //2 last column (photo)
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
     
        setInterval( function () {
            switch(check_time()){
                case '14:00:00':
                    reload_table2();
                    break;
                case '14:00:01':
                    reload_table2();
                    break;
                case '14:00:02':
                    reload_table2();
                    break;
                case '14:00:03':
                    reload_table2();
                    break;
                case '14:00:04':
                    reload_table2();
                    break;
                case '14:00:05':
                    reload_table2();
                    break;
                case '14:00:06':
                    reload_table2();
                    break;
                case '14:00:07':
                    reload_table2();
                    break;
                case '14:00:08':
                    reload_table2();
                    break;
                case '14:00:09':
                    reload_table2();
                    break;
                case '14:00:10':
                    reload_table2();
                    break;
                default:
                    console.log('Not Run');
                    break;
            }
        }, 10000);
    });

   function addZero(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

    function reload_table(){
        table.ajax.reload(null,false);
    }

    function reload_table2() {
        table2.ajax.reload(null,false);
    }

    function input_pasien(){
        //save_method = 'add';

        $('#form_pasien')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        $('.modal-title').text('Form Input Pasien');
        $('#modal_input_pasien').modal('show'); // show bootstrap modal 
    }

   function save_pasien(){
        $('#btnSave').text('Menyimpan.....'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        var url;
     
        
     url = "<?=site_url('pendaftaran/ajax_add_pasien')?>";
        // ajax adding data to database
     
        var formData = new FormData($('#form_pasien')[0]);
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
                    $('#modal_input_pasien').modal('hide');
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $('#btnSave').text('Simpan Data Pasien'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
     
     
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Terjadi kesalahan saat menyimpan data');
                $('#btnSave').text('Simpan Data Pasien'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
     
            }

        });


    }

function save_periksa(){
        $('#btnSave').text('Menyimpan.....'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        var url;
     
        
     url = "<?=site_url('pendaftaran/add_periksa')?>";
        // ajax adding data to database
     
        var formData = new FormData($('#form_periksa')[0]);
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
                    reload_table2();
                    $('#modal_new_periksa').modal('hide');
                    $('#modal_new_periksa').modal('reset');
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $('#btnSave').text('Simpan Data Pasien'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
     
     
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Terjadi kesalahan saat menyimpan data');
                $('#btnSave').text('Simpan Data Pasien'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
     
            }

        });


    }
    function check_time() {
        var date = new Date();
        var time = addZero(date.getHours())+":"+addZero(date.getMinutes())+":"+addZero(date.getSeconds());
        return time;
    }

    function delete_pasien(id_pasien, nama_pasien){
    //if(confirm('Are you sure delete this data?')){
        // ajax delete data to database
        var url;
         url = "<?=site_url('/pendaftaran/ajax_delete')?>";

         swal({
          title: "Are you sure?",
          text: "Delete Pasien : " + nama_pasien,
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false
        },
        function(){
          swal("Deleted!", "Data pasien has been deleted.", "success");
          $.ajax({
            url: url,
            type: 'POST',
            data: {'id_pasien': id_pasien},
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Terjadi kesalahan saat menghapus data');
                $('#btnSave').text('Hapus Data pasien'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
     
            }
        });
        reload_table();
        });

      
    }


    function di_periksa(id_periksa){
    //if(confirm('Are you sure delete this data?')){
        // ajax delete data to database
        var url;
         url = "<?=site_url('/pendaftaran/ajax_delete_periksa')?>";

         swal({
          title: "Are you sure?",
          text: "Enter To Chek Up " ,
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false
        },
        function(){
          swal("Deleted!", "Data periksa has been deleted.", "success");
          $.ajax({
            url: url,
            type: 'POST',
            data: {'id_periksa': id_periksa},
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Terjadi kesalahan saat menghapus data');
                $('#btnSave').text('Hapus Data periksa'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
     
            }
        });
        reload_table();
        });

      
    }





    function getDokter() {
        var id_poli = document.getElementById('poli').value;
        var hari = document.getElementById('hari').value;
        $("#dokter").load("<?=base_url();?>pendaftaran/get_nama_dokter/" + id_poli +"/" + hari);
    }

    function new_periksa(id){
        $('#form_periksa')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        $('.modal-title').text('Form Daftar Periksa');
        $("#poli").load("<?=base_url();?>pendaftaran/get_poli");


        $.ajax({
        url : "<?php echo site_url('pendaftaran/ajax_pasien/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id"]').val(data.id_pasien);
            $('[name="no_rm"]').val(data.no_rm);
            $('[name="nama"]').val(data.nama_pasien);
            $('[name="jk"]').val(data.jk_pasien);
            $('[name="goldarah"]').val(data.gol_darah_pasien);
            $('[name="notlpn"]').val(data.no_telepon_pasien);


            $('#modal_new_periksa').modal('show');  // show bootstrap modal when complete loaded

            $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

        
           
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
           
        }
    });

    }
</script>



<!-- Modal untuk penyedia Boga -->
<div class="modal fade" id="modal_input_pasien" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Input Pasien</h3>
            </div>
            <div class="modal-body">
                <form action="#" id="form_pasien" class="form-horizontal">
                    <input type="hidden" name="id">
                    <div class="form-body form">
                        
                        <div class="form-group">
                            <label class="control-label col-md-3"></label>
                            <div class="col-md-9">
                                <input type="hidden" name="no_rm" class="form-control" 
                                 value="<?php echo random_string('numeric', 6);?>">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    


                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Pasien</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_pasien" class="form-control" placeholder="Masukkan nama pasien">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">
                                <input type="text" name="alamat_pasien" class="form-control" placeholder="Masukkan alamat pasien">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Kelurahan</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_kelurahan" class="form-control" placeholder="Masukkan nama Kelurahan">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Kecamatan</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_kecamatan" class="form-control" placeholder="Masukkan nama Kecamatan">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Kota</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_kota" class="form-control" placeholder="Masukkan nama Kota">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Provinsi</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_provinsi" class="form-control" placeholder="Masukkan nama Provinsi">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Tempat Lahir</label>
                            <div class="col-md-9">
                                <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal Lahir</label>
                            <div class="col-md-9">
                                <input type="date" id="datepicker-autoclose" name="tanggal_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir">
                                <span class="help-block"></span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3">Jenis Kelamin</label>
                            <div class="col-md-9">
                                <select class="selectpicker" data-style="btn-white" name="jenis_kelamin">
                                        <option>Laki-laki</option>
                                        <option>Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Golongan Darah</label>
                            <div class="col-md-9">
                                 <select class="selectpicker" data-style="btn-white" name="golongan_darah">
                                        <option>A</option>
                                        <option>B</option>
                                        <option>O</option>
                                        <option>AB</option>
                                </select>
                            </div>
                        </div>
                    

                        <div class="form-group">
                            <label class="control-label col-md-3">No Telephon</label>
                            <div class="col-md-9">
                                <input type="text" name="no_telephone" class="form-control" placeholder="Masukkan No Handphone Anda">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Pekerjaan</label>
                            <div class="col-md-9">
                                <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Wali Pasien</label>
                            <div class="col-md-9">
                                <input type="text" name="wali_pasien" class="form-control" placeholder="Masukkan Nama Wali">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">NIK Pasien</label>
                            <div class="col-md-9">
                                <input type="text" name="nik_pasien" class="form-control" placeholder="Masukkan NIK Pasien">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Nomer KK Pasien</label>
                            <div class="col-md-9">
                                <input type="text" name="no_kk_pasien" class="form-control" placeholder="Masukkan Nama Wali">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Nomer BBJS Pasien</label>
                            <div class="col-md-9">
                                <input type="text" name="no_bbjs_pasien" class="form-control" placeholder="Masukkan Nama Wali">
                                <span class="help-block"></span>
                            </div>
                        </div>

                    </div>
                </form>
                <button type="button" id="btnSave" onclick="save_pasien()" class="btn btn-primary">Simpan Data Pasien</button>
            </div>
            <div class="modal-footer">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->


<script src="assets/plugins/notifyjs/js/notify.js"></script>
<script src="assets/plugins/notifications/notify-metro.js"></script>




            <!-- ============================================================== -->
            <!-- Start right Content here Prin Antrian -->
            <!-- ============================================================== -->                      
            <div class="content-page" id="print_antrian">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
                            <div class="col-md-5">
                                <div class="panel panel-default">
                                    <!-- <div class="panel-heading">
                                        <h4>Invoice</h4>
                                    </div> -->
                                    <div class="panel-body">
                                        <div class="clearfix">
                                            <div class="pull-left">
                                                <h4 class="text-right"><img src="assets/images/logo_dark.png" alt="velonic"></h4>
                                                
                                            </div>
                                            <div class="pull-right">
                                                <h4>Struk Antrian<br>
                                                    <strong>2015-04-23654789</strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                                <div class="pull-left m-t-30">
                                                    <address>
                                                      <strong>Alamat Rumah Sakit</strong><br>
                                                      Klinik Rawat Jalan AL-Mubarok<br>
                                                      Ngalik Ngeposari Semanu<br>
                                                      Gunung Kidul, DIY<br>
                                                      <abbr title="Phone">Tlp:</abbr> (087) 4739-1439
                                                      </address>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                    <p><strong>Tanggal Antrian: </strong> Jun 15, 2015</p>
                                                    <!--<p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p> -->
                                                    <p class="m-t-10"><strong>ID Pasien: </strong> #123456</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-h-50"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table m-t-30">
                                                        <thead>
                                                            <th>Nama</th>
                                                          </thead>
                                                        
                                                        <tbody>
                                                            <tr>
                                                                <td>Ahmad</td>
                                                            </tr>
                                                        </tbody>

                                                        <thead>
                                                            <th>Poli</th>
                                                          </thead>
                                                          <tbody>
                                                            <tr>
                                                                <td>Poli Gigi</td>
                                                            </tr>
                                                        </tbody>

                                                        <thead>
                                                            <th>Dokter</th>
                                                          </thead>
                                                          <tbody>
                                                            <tr>
                                                                <td>Dr.Mahmud</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px;">
                                            <div class="col-md-3 col-md-offset-9">
                                                <p class="text-right">NO.ANTRIAN</p>
                                                <h3 class="text-right"><strong>G10</strong></h3>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="hidden-print">
                                            <div class="pull-right">
                                                <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <a href="#" class="btn btn-primary waves-effect waves-light">Submit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer">
                    © 2016. All rights reserved.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->



<!-- Modal untuk penyedia Boga -->
<div class="modal fade" id="modal_new_periksa" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Input Pasien</h3>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="form_periksa" class="form-horizontal">
                    <input type="hidden" name="id">
                    <div class="form-body form">

                        <div class="form-group">
                            <label class="control-label col-md-3"></label>
                            <div class="col-md-9">
                                <input type="hidden" name="id" class="form-control" >
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3"></label>
                            <div class="col-md-9">
                                <input type="hidden" name="no_rm" class="form-control" >
                                <span class="help-block"></span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Pasien</label>
                            <div class="col-md-9">
                                <input type="text" name="nama" class="form-control" >
                                <input type="hidden" name="status" value="1">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Jenis Kelamin</label>
                            <div class="col-md-9">
                                <input type="text" name="jk" class="form-control" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Golongan Darah</label>
                            <div class="col-md-9">
                                 <input type="text" name="goldarah" class="form-control">
                            </div>
                        </div>

                        <?php
                            $arrayDay = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
                            $arrayMonth = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                            if (date('D') == 'Sun') {
                                $hari = $arrayDay[0];
                            }elseif (date('D') == 'Mon') {
                                $hari = $arrayDay[1];
                            }elseif (date('D') == 'Tue') {
                                $hari = $arrayDay[2];
                            }elseif (date('D') == 'Wed') {
                                $hari = $arrayDay[3];
                            }elseif (date('D') == 'Thu') {
                                $hari = $arrayDay[4];
                            }elseif (date('D') == 'Fri') {
                                $hari = $arrayDay[5];
                            }elseif (date('D') == 'Sat') {
                                $hari = $arrayDay[6];
                            }else{
                                $hari = 'Not defined day.';
                            }
                            $month = $arrayMonth[date('n')];
                        ?>

                        <!-- -->
                        <div class="form-group">
                             <label class="control-label col-md-3" > Hari, Tanggal </label>
                             <div class="col-md-9">
                               <input type="text" class="form-control" value="<?php echo $hari.', '.date('d').' '.$month.' '.date('Y'); ?>" disabled>
                               <input type="hidden" class="form-control" id=hari value="<?php echo $hari;?>">
                                <span class="help-block"></span>
                             </div>
                        </div>

                         <!-- -->
                        <div class="form-group">
                             <label class="control-label col-md-3" > Pilih Poli</label>
                             <div class="col-md-9">
                                 <select class="form-control" id="poli" name="poli" onchange="getDokter()">
                                    <!-- get data using ajax -->
                                       
                                 </select>
                                <span class="help-block"></span>
                             </div>
                        </div>
                        <!-- -->

                        <div class="form-group">
                             <label class="control-label col-md-3" > Dokter </label>
                             <div class="col-md-9">
                                 <select class="form-control" id="dokter" name="dokter">
                                   <!-- get data using ajax -->
                                       
                                 </select>
                                <span class="help-block"></span>
                             </div>
                        </div>


                    </div>
                <button type="button" id="btnSave" onclick="save_periksa()" class="btn btn-primary">Simpan Daftar Periksa</button>
               
                <a class="hidden-print">
                    <div class="pull-right">

                        <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                </a>

                </form>

                

            </div>
            <div class="modal-footer">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


 


<!-- End Bootstrap modal -->
  