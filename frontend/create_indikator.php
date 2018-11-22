<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Ample Admin Template - The Ultimate Multipurpose admin template</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="../plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="#">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img src="../plugins/images/admin-logo.png" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="../plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><img src="../plugins/images/admin-text.png" alt="home" class="dark-logo" /><!--This is light logo text--><img src="../plugins/images/admin-text-dark.png" alt="home" class="light-logo" />
                     </span> </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li>
                    <li>
                        <a class="profile-pic" href="#"> <img src="../plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">Steave</b></a>
                    </li>
                </ul>
            </div> 
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php 
            include 'config/sidebar.php'
        ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Create Output Kegiatan</h3>
                        </div>

                         <form action="aksi/simpan_indikator.php" method="POST">
                            <input type="hidden" name="kegiatan_id" value='<?php echo $_GET['kegiatan_id']; ?>'>

                            <div class="form-group">
                                <label for="tolak_ukur">Tolak Ukur</label>
                                <input type="text" class="form-control" name="tolak_ukur" id="tolak_ukur">
                            </div>

                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <input type="text" class="form-control" name="satuan" id="satuan">
                            </div>

                            <div class="form-group">
                                <label for="ksatu">Target RPJMD</label>
                                <input type="number" class="form-control" name="ksatu" id="ksatu">
                            </div>

                            <div class="form-group">
                                <label for="rsatu">Pagu RPJMD</label>
                                <input type="number" class="form-control" name="rsatu" id="rsatu">
                            </div>

                            <div class="form-group">
                                <label for="kdua">Target Realisasi Capaian Kinerja RPJMD s/d RKPD Tahun Lalu (n-2) </label>
                                <input type="number" class="form-control" name="kdua" id="kdua">
                            </div>

                            <div class="form-group">
                                <label for="rdua">Pagu Realisasi Capaian Kinerja RPJMD s/d RKPD Tahun Lalu (n-2) </label>
                                <input type="number" class="form-control" name="rdua" id="rdua">
                            </div>

                            <div class="form-group">
                                <label for="ktiga">Target Kinerja dan Anggaran RKPD Tahun berjalan (tahun n-1) yang dievaluasi</label>
                                <input type="number" class="form-control" name="ktiga" id="ktiga">
                            </div>

                            <div class="form-group">
                                <label for="rtiga">Pagu Kinerja dan Anggaran RKPD Tahun berjalan (tahun n-1) yang dievaluasi</label>
                                <input type="number" class="form-control" name="rtiga" id="rtiga">
                            </div>

                            <div class="form-group">
                                <label for="kempat">Target Realisasi Kinerja Pada Triwulan I</label>
                                <input type="number" class="form-control" name="kempat" id="kempat">
                            </div>

                            <div class="form-group">
                                <label for="rempat">Pagu Realisasi Kinerja Pada Triwulan I</label>
                                <input type="number" class="form-control" name="rempat" id="rempat">
                            </div>

                            <div class="form-group">
                                <label for="klima">Target Realisasi Kinerja Pada Triwulan II</label>
                                <input type="number" class="form-control" name="klima" id="klima">
                            </div>

                            <div class="form-group">
                                <label for="rlima">Pagu Realisasi Kinerja Pada Triwulan II</label>
                                <input type="number" class="form-control" name="rlima" id="rlima">
                            </div>

                            <div class="form-group">
                                <label for="kenam">Target Realisasi Kinerja Pada Triwulan III</label>
                                <input type="number" class="form-control" name="kenam" id="kenam">
                            </div>

                            <div class="form-group">
                                <label for="renam">Pagu Realisasi Kinerja Pada Triwulan III</label>
                                <input type="number" class="form-control" name="renam" id="renam">
                            </div>
                            
                            <div class="form-group">
                                <label for="ktujuh">Target Realisasi Kinerja Pada Triwulan IV</label>
                                <input type="number" class="form-control" name="ktujuh" id="ktujuh">
                            </div>

                            <div class="form-group">
                                <label for="rtujuh">Pagu Realisasi Kinerja Pada Triwulan IV</label>
                                <input type="number" class="form-control" name="rtujuh" id="rtujuh">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Counter js -->
    <script src="../plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="../plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!-- chartist chart -->
    <script src="../plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
    <script src="../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <script src="../plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
</body>

</html>
