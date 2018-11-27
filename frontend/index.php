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
        <?php
        include 'config/navbar.php';
        ?>
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->    
        <?php 
            include 'config/sidebar.php';
        ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4> 
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
                <?php 
                include 'config/koneksi.php';
                $opd_id = $_SESSION['opd_id'];
                $sql = "select sum(counting) as jumlah_program from (select COUNT(DISTINCT(kegiatan.program_id)) as counting from kegiatan join opd_kegiatan on opd_kegiatan.kegiatan_id=kegiatan.id where opd_kegiatan.opd_id=$opd_id GROUP by kegiatan.program_id) as jumlah_program";
                
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result) > 0){
                    $row= mysqli_fetch_assoc($result);
                    $jumlah_program=$row['jumlah_program'];
                }

                $sql = "select count(kegiatan.id) as jumlah_kegiatan from kegiatan join opd_kegiatan on kegiatan.id=opd_kegiatan.kegiatan_id where opd_kegiatan.opd_id=$opd_id";
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result) > 0){
                    $row= mysqli_fetch_assoc($result);
                    $jumlah_kegiatan=$row['jumlah_kegiatan'];
                }
                
                $sql = "select count(indikator_kegiatan.id) as jumlah_indikator from kegiatan join opd_kegiatan on kegiatan.id=opd_kegiatan.kegiatan_id join indikator_kegiatan on kegiatan.id=indikator_kegiatan.kegiatan_id where opd_kegiatan.opd_id=$opd_id";
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result) > 0){
                    $row= mysqli_fetch_assoc($result);
                    $jumlah_indikator=$row['jumlah_indikator'];
                }
                ?>

                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Program</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success"><?php if($jumlah_program>0) {echo $jumlah_program;} else { echo "0";} ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Kegiatan</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple"><?php if($jumlah_kegiatan>0) {echo $jumlah_kegiatan;} else { echo "0";} ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Indikator</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info"><?php if($jumlah_indikator>0) {echo $jumlah_indikator;} else { echo "0";} ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Agenda Perencanaan</h4> 
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=le7ejga7vslrrs3cs5jgqct2o8%40group.calendar.google.com&amp;color=%232F6309&amp;ctz=Asia%2FJakarta" style="border-width:0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>
                    </div>
                </div>
                <!--/.row -->
                <!--row -->
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <?php include 'config/footer.php';?>
</body>

</html>
