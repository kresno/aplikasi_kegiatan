<!DOCTYPE html>
<html lang="en">

<?php 
    include 'config/head.php';
?>

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
        <?php 
            include 'config/koneksi.php';
            $kegiatan_id = $_GET['kegiatan_id'];
            $kegiatan_nama = $_GET['nama'];
            $sql = "SELECT * FROM indikator_kegiatan where kegiatan_id=$kegiatan_id";
            
            $count =0;
            if($result = mysqli_query($con, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row= mysqli_fetch_array($result)){
                        $id = $row['id'];
                        $tolak_ukur = $row['tolak_ukur'];
                        $satuan = $row['satuan'];
                        $ksatu = $row['ksatu'];
                        $rsatu = $row['rsatu'];
                        $kdua = $row['kdua'];
                        $rdua = $row['rdua'];
                        $ktiga = $row['ktiga'];
                        $rtiga = $row['rtiga'];
                        $kempat = $row['kempat'];
                        $rempat = $row['rempat'];
                        $klima = $row['klima'];
                        $rlima = $row['rlima'];
                        $kenam = $row['kenam'];
                        $renam = $row['renam'];
                        $ktujuh = $row['ktujuh'];
                        $rtujuh = $row['rtujuh'];

                        $return_arr[] = array(
                            "id" => $id,
                            "tolak_ukur" => $tolak_ukur,
                            "satuan" => $satuan,
                            "ksatu" => $ksatu,
                            "rsatu" => $rsatu,
                            "kdua" => $kdua,
                            "rdua" => $rdua,
                            "ktiga" => $ktiga,
                            "rtiga" => $rtiga,
                            "kempat" => $kempat,
                            "rempat" => $rempat,
                            "klima" => $klima,
                            "rlima" => $rlima,
                            "kenam" => $kenam,
                            "renam" => $renam,
                            "ktujuh" => $ktujuh,
                            "rtujuh" => $rtujuh
                        );
                    }
                }
            }
        ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Data Indikator Kegiatan: <?php echo $kegiatan_nama; ?></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-right">
                                        <a href="create_indikator.php?kegiatan_id=<?php echo $kegiatan_id; ?>" class="btn btn-primary">Tambah Indikator</a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr style="height: 22px;">
                                        <td style="height: 66px; width: 237px;" rowspan="3" align="center">Indikator Kinerja Program (Outcome)/Kegiatan (Output)</td>
                                        <td style="height: 44px; width: 44px;" colspan="3" rowspan="2" align="center">Target RPJMD pada Tahun 2016 s/d 2021 (Periode RPJMD)</td>
                                        <td style="height: 44px; width: 30px;" colspan="2" rowspan="2" align="center">Realisasi Capaian Kinerja RPJMD s/d RKPD Tahun Lalu (n-2) </td>
                                        <td style="height: 44px; width: 30px;" colspan="2" rowspan="2" align="center">Target Kinerja dan Anggaran RKPD Tahun berjalan (tahun n-1) yang dievaluasi</td>
                                        <td style="height: 22px; width: 120px;" colspan="8" align="center">Realisasi Kinerja Pada Triwulan</td>
                                    </tr>
                                    <tr style="height: 22px;">
                                        <td style="height: 22px; width: 30px;" colspan="2" align="center">I</td>
                                        <td style="height: 22px; width: 30px;" colspan="2" align="center">II</td>
                                        <td style="height: 22px; width: 30px;" colspan="2" align="center">III</td>
                                        <td style="height: 22px; width: 30px;" colspan="2" align="center">IV</td>
                                    </tr>
                                    <tr style="height: 22px;">
                                        <td style="height: 22px; width: 30px;" align="center">K</td>
                                        <td style="height: 22px; width: 30px;" align="center">Satuan</td>
                                        <td style="height: 22px; width: 14px;" align="center">Rp. (000)</td>
                                        <td style="height: 22px; width: 15px;" align="center">K</td>
                                        <td style="height: 22px; width: 15px;" align="center">Rp. (000)</td>
                                        <td style="height: 22px; width: 15px;" align="center">K</td>
                                        <td style="height: 22px; width: 15px;" align="center">Rp. (000)</td>
                                        <td style="height: 22px; width: 15px;" align="center">K</td>
                                        <td style="height: 22px; width: 15px;" align="center">Rp. (000)</td>
                                        <td style="height: 22px; width: 15px;" align="center">K</td>
                                        <td style="height: 22px; width: 15px;" align="center">Rp. (000)</td>
                                        <td style="height: 22px; width: 15px;" align="center">K</td>
                                        <td style="height: 22px; width: 15px;" align="center">Rp. (000)</td>
                                        <td style="height: 22px; width: 15px;" align="center">K</td>
                                        <td style="height: 22px; width: 15px;" align="center">Rp. (000)</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(!empty($return_arr))
                                            {
                                                foreach($return_arr as $arr){
                                                    echo "<tr>";
                                                    echo "<td align='left'>".$arr["tolak_ukur"]."</td>";
                                                    echo "<td align='right'>".$arr["ksatu"]."</td>";
                                                    echo "<td align='left'>".$arr["satuan"]."</td>";
                                                    echo "<td align='right'>".number_format($arr["rsatu"]/1000)."</td>";
                                                    echo "<td align='right'>".$arr["kdua"]."</td>";
                                                    echo "<td align='right'>".number_format($arr["rdua"]/1000)."</td>";
                                                    echo "<td align='right'>".$arr["ktiga"]."</td>";
                                                    echo "<td align='right'>".number_format($arr["rtiga"]/1000)."</td>";
                                                    echo "<td align='right'>".$arr["kempat"]."</td>";
                                                    echo "<td align='right'>".number_format($arr["rempat"]/1000)."</td>";
                                                    echo "<td align='right'>".$arr["klima"]."</td>";
                                                    echo "<td align='right'>".number_format($arr["rlima"]/1000)."</td>";
                                                    echo "<td align='right'>".$arr["kenam"]."</td>";
                                                    echo "<td align='right'>".number_format($arr["renam"]/1000)."</td>";
                                                    echo "<td align='right'>".$arr["ktujuh"]."</td>";
                                                    echo "<td align='right'>".number_format($arr["rtujuh"]/1000)."</td>";
                                                    echo "</tr>";
                                                }
                                            } 
                                            
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
    <?php 
        include 'config/koneksi.php';

    ?>
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
