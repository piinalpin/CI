<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?=base_url();?>assets/images/favicon_1.ico">

        <title>Ubold - Responsive Admin Dashboard Template</title>

         <!--venobox lightbox-->
        <link rel="stylesheet" href="<?=base_url();?>assets/plugins/magnific-popup/css/magnific-popup.css"/>

        <link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?=base_url();?>assets/js/modernizr.min.js"></script>
        
    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="http://localhost/CI/admin" class="logo"><i class="icon-magnet icon-c-logo"></i><span>Ub<i class="md md-album"></i>ld</span></a>
                        <!-- Image Logo here -->
                        <!--<a href="index.html" class="logo">-->
                            <!--<i class="icon-c-logo"> <img src="assets/images/logo_sm.png" height="42"/> </i>-->
                            <!--<span><img src="assets/images/logo_light.png" height="20"/></span>-->
                        <!--</a>-->
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            


                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown top-menu-item-xs">
                                    
                                <li class="dropdown top-menu-item-xs">
                                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="<?=base_url();?>assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="ti-user m-r-10 text-custom"></i> Profile</a></li>
                                        <li><a href="javascript:void(0)"><i class="ti-settings m-r-10 text-custom"></i> Settings</a></li>
                                        <li><a href="javascript:void(0)"><i class="ti-lock m-r-10 text-custom"></i> Lock screen</a></li>
                                        <li class="divider"></li>
                                        <li><a href="javascript:void(0)"><i class="ti-power-off m-r-10 text-danger"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                               

                                <h4 class="page-title">Menu</h4>
                                
                            </div>
                        </div>

                        <!-- SECTION FILTER
                        ================================================== -->  
                        <!--<div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="portfolioFilter">
                                    <a href="#" data-filter="*" class="current">All</a>
                                    <a href="#" data-filter=".webdesign">Web Design</a>
                                    <a href="#" data-filter=".graphicdesign">Graphic Design</a>
                                    <a href="#" data-filter=".illustrator">Illustrator</a>
                                    <a href="#" data-filter=".photography">Photography</a>
                                </div>
                            </div>
                        </div> -->
                
                        <div class="row port">
                            <div class="portfolioContainer">
                                <div class="col-sm-6 col-lg-3 col-md-4 webdesign illustrator">
                                    <div class="gal-detail thumb">
                                        <a href="admin_utama">
                                            <img src="assets/images/gallery/admin.png" class="thumb-img" alt="work-thumbnail">
                                        </a>
                                        <h4><center>Admin</center></h4>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3 col-md-4 graphicdesign illustrator photography">
                                    <div class="gal-detail thumb">
                                        <a href="admin_dokter">
                                            <img src="assets/images/gallery/dokter.png" class="thumb-img" alt="work-thumbnail">
                                        </a>
                                        <h4><center>Dokter</center></h4>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3 col-md-4 webdesign graphicdesign">
                                    <div class="gal-detail thumb">
                                        <a href="admin_pegawai">
                                            <img src="assets/images/gallery/pegawai.png" class="thumb-img" alt="work-thumbnail">
                                        </a>
                                        <h4><center>Pegawai</center></h4>
                                    </div>
                                </div>

                                 <div class="col-sm-6 col-lg-3 col-md-4 illustrator photography">
                                    <div class="gal-detail thumb">
                                        <a href="pendaftaran">
                                            <img src="assets/images/gallery/pasienlogo.png" class="thumb-img" alt="work-thumbnail">
                                        </a>
                                        <h4><center>Pasien</center></h4>
                                    </div>
                                </div>


                                <div class="col-sm-6 col-lg-3 col-md-4 graphicdesign photography">
                                    <div class="gal-detail thumb">
                                        <a href="obat">
                                            <img src="assets/images/gallery/obatlogo.png" class="thumb-img" alt="work-thumbnail">
                                        </a>
                                        <h4><center>Obat</center></h4>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3 col-md-4 webdesign photography">
                                    <div class="gal-detail thumb">
                                        <a href="supplier">
                                            <img src="assets/images/gallery/supplierlogo.png" class="thumb-img" alt="work-thumbnail">
                                        </a>
                                        <h4><center>Supplier</center></h4>
                                    </div>
                                </div>

                                 
                                 <div class="col-sm-6 col-lg-3 col-md-4 webdesign graphicdesign">
                                    <div class="gal-detail thumb">
                                        <a href="admin_poliklinik_dashboard"">
                                            <img src="assets/images/gallery/poli.png" class="thumb-img" alt="work-thumbnail">
                                        </a>
                                        <h4><center>Poliklinik</center></h4>
                                    </div>
                                   </div>     


                                   <div class="col-sm-6 col-lg-3 col-md-4 illustrator photography">
                                    <div class="gal-detail thumb">
                                        <a href="admin_laporan">
                                            <img src="assets/images/gallery/laporanlogo.png" class="thumb-img" alt="work-thumbnail">
                                        </a>
                                        <h4><center>Laporan</center></h4>
                                    </div>
                                </div>                              

                               </div>
                                
                                

                            </div>
                        </div> <!-- End row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer">
                    © 2016. All rights reserved.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


       


        </div>
        <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?=base_url();?>assets/js/jquery.min.js"></script>
        <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
        <script src="<?=base_url();?>assets/js/detect.js"></script>
        <script src="<?=base_url();?>assets/js/fastclick.js"></script>
        <script src="<?=base_url();?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?=base_url();?>assets/js/jquery.blockUI.js"></script>
        <script src="<?=base_url();?>assets/js/waves.js"></script>
        <script src="<?=base_url();?>assets/js/wow.min.js"></script>
        <script src="<?=base_url();?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?=base_url();?>assets/js/jquery.scrollTo.min.js"></script>


        <script src="<?=base_url();?>assets/js/jquery.core.js"></script>
        <script src="<?=base_url();?>assets/js/jquery.app.js"></script>

        <script type="text/javascript" src="<?=base_url();?>assets/plugins/isotope/js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="<?=base_url();?>assets/plugins/magnific-popup/js/jquery.magnific-popup.min.js"></script>
          
        <script type="text/javascript">
            $(window).load(function(){
                var $container = $('.portfolioContainer');
                $container.isotope({
                    filter: '*',
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });

                $('.portfolioFilter a').click(function(){
                    $('.portfolioFilter .current').removeClass('current');
                    $(this).addClass('current');

                    var selector = $(this).attr('data-filter');
                    $container.isotope({
                        filter: selector,
                        animationOptions: {
                            duration: 750,
                            easing: 'linear',
                            queue: false
                        }
                    });
                    return false;
                }); 
            });
            $(document).ready(function() {
                $('.image-popup').magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    mainClass: 'mfp-fade',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                    }
                });
            });
        </script>
    
    </body>
</html>