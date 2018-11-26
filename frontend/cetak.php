<!DOCTYPE html>
<html lang="en">

<?php include 'config/head.php' ?>

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
        <?php
        include 'config/navbar.php';
        ?>
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
            $opd_id = $_SESSION['opd_id'];
            $sql = "SELECT e.nama as jenis, a.nama as kegiatan, g.nama as indikator, d.tolak_ukur as tolak_ukur, f.nama as satuan, d.asb as asb
                    FROM kegiatan a 
                    join opd_kegiatan b on a.id=b.kegiatan_id 
                    join program c on c.id=a.program_id
                    join indikator_kegiatan d on d.kegiatan_id=a.id
                    join indikator_hasil e on e.id=d.indikator_hasil_id
                    join satuan f on f.id=d.satuan_id 
                    join indikator_sasaran g on g.id=a.indikator_sasaran_id
                    where b.opd_id=$opd_id
                    order by a.id";
            $count =0;
            if($result = mysqli_query($con, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row= mysqli_fetch_array($result)){
                        $kegiatan = $row['kegiatan'];
                        $jenis = $row['jenis'];
                        $tolak_ukur = $row['tolak_ukur'];
                        $satuan = $row['satuan'];
                        $asb = $row['asb'];
                        $indikator = $row['indikator'];
                        $return_arr[] = array(
                            "kegiatan" => $kegiatan,
                            "jenis" => $jenis,
                            "asb" => $asb,
                            "indikator" => $indikator,
                            "tolak_ukur" => $tolak_ukur,
                            "satuan" => $satuan
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
                            <h3 class="box-title">Data Kegiatan</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div style="margin-top:25px;">
                                <table class="table table-responsive" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kegiatan</th>
                                            <th>Indikator Sasaran</th>
                                            <th>Jenis Indikator</th>
                                            <th>Tolak Ukur</th>
                                            <th>Satuan</th>
                                            <th>Usulan ASB</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(!empty($return_arr))
                                            {
                                                foreach($return_arr as $arr){
                                                    echo "<tr>";
                                                    echo "<td>".++$count."</td>";
                                                    echo "<td>".$arr["kegiatan"]."</td>";
                                                    echo "<td>".$arr["indikator"]."</td>";
                                                    echo "<td>".$arr["jenis"]."</td>";
                                                    echo "<td>".$arr["tolak_ukur"]."</td>";
                                                    echo "<td>".$arr["satuan"]."</td>";
                                                    echo "<td>".$arr["asb"]."</td>";
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
                <!-- /.row -->
            </div>
            <?php include 'config/footer.php'; ?>

    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script>
    $(document).ready( function () {
        $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'print'
            ]
        });
    });
    </script>
</body>

</html>
