<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="<?=base_url('assets/admin/img/favicon.ico') ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>DRP Online - Administrator Section</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?=base_url('assets/admin/css/bootstrap.min.css') ?>" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?=base_url('assets/admin/css/animate.min.css') ?>" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?=base_url('assets/admin/css/light-bootstrap-dashboard.css?v=1.4.0') ?>" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?=base_url('assets/admin/css/demo.css') ?>" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?=base_url('assets/admin/css/pe-icon-7-stroke.css') ?>" rel="stylesheet" />
	
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/admin/DataTables/datatables.min.css') ?>"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/admin/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css') ?>"/>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>


    <!--   Core JS Files   -->
    <script src="<?=base_url('assets/admin/js/jquery.3.2.1.min.js') ?>" type="text/javascript"></script>
	<script src="<?=base_url('assets/admin/js/bootstrap.min.js') ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?=base_url('assets/admin/DataTables/datatables.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/admin/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js')?>"></script>

    <!--  Charts Plugin -->
	<script src="<?=base_url('assets/admin/js/chartist.min.js') ?>"></script>

    <!--  Notifications Plugin    -->
    <script src="<?=base_url('assets/admin/js/bootstrap-notify.js') ?>"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="<?=base_url('assets/admin/js/light-bootstrap-dashboard.js?v=1.4.0') ?>"></script>
    

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="<?=base_url('assets/admin/js/demo.js') ?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();
        });
    </script>

<div class="wrapper">
    <div class="sidebar" data-color="orange" data-image="<?=base_url('assets/admin/img/sidebar-5.jpg') ?>">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            
            <?php $this->load->view('templates/admin_menu'); ?>
    	</div>
    </div>

    <div class="main-panel">

        <?=$contents;?>
        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>
                </p>
            </div>
        </footer>

    </div>
</div>

<!-- Modal untuk penyedia Boga -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Penyedia Boga</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Penyedia</label>
                            <div class="col-md-9">
                                <input name="nama" placeholder="Nama" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Pemilik</label>
                            <div class="col-md-9">
                                <input name="pemilik" placeholder="Pemilik" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">NIK</label>
                            <div class="col-md-9">
                                <input name="nik" placeholder="NIK" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">NPWP</label>
                            <div class="col-md-9">
                                <input type="text" name="npwp" placeholder="NPWP" class="form-control">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">
                                <input type="text" name="alamat" placeholder="Nama jalan, RT/RW" class="form-control">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Kelurahan</label>
                            <div class="col-md-9">
                                <input type="text" name="kelurahan" placeholder="Kelurahan" class="form-control">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Kecamatan</label>
                            <div class="col-md-9">
                                <input type="text" name="kecamatan" placeholder="Kecamatan" class="form-control">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Rek. BPD DIY</label>
                            <div class="col-md-9">
                                <input type="text" name="rek_bpd" placeholder="Nomor Rekening BPD DIY" class="form-control">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Rek. Bank Jogja</label>
                            <div class="col-md-9">
                                <input type="text" name="reg_bankjogja" placeholder="Nomor Rekening Bnak Jogja" class="form-control">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group" id="photo-preview">
                            <label class="control-label col-md-3">Foto</label>
                            <div class="col-md-9">
                                (No photo)
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" id="label-photo">Upload Photo </label>
                            <div class="col-md-9">
                                <input name="photo" type="file">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<!-- Modal untuk Product Penyedia Boga -->
<div class="modal fade" id="modal_product_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Produk Penyedia Boga</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_menu" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Produk</label>
                            <div class="col-md-9">
                                <input name="nama_produk" placeholder="Nama produk" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Deskripsi Produk</label>
                            <div class="col-md-9">
                                <input name="deskripsi" placeholder="Penjelasan singkat produk" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Harga Produk</label>
                            <div class="col-md-9">
                                <input name="harga" placeholder="Harga produk" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group" id="photo_preview">
                            <label class="control-label col-md-3">Foto</label>
                            <div class="col-md-9">
                                (No photo)
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" id="label_photo">Upload Photo Product </label>
                            <div class="col-md-9">
                                <input name="photo" type="file">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSaveMenu" onclick="save_product()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<!--Start of Modal untuk tambah Anchor-->
<div class="modal fade" id="modal_anchor" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Tambah Anchor Baru</h3>
            </div>
            <div class="modal-body">
                <table id="table_non" class="table table-striped" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nama Perusahaan</th>
                            <th>Pemilik</th>
                            <th>Alamat</th>
                            <th style="width:100px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--End of Modal untuk tambah Anchor-->

<!--Start of Modal untuk tambah Anggota Gandeng-Gendong-->
<div class="modal fade" id="modal_gg" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Tambah Anggota Gandeng-Gendong</h3>
            </div>
            <div class="modal-body">
                <table id="table_gandeng_non" class="table table-striped" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nama Perusahaan</th>
                            <th>Pemilik</th>
                            <th>Alamat</th>
                            <th style="width:100px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--End of Modal untuk tambah Anggota Gandeng-Gendong-->
</body>



</html>
