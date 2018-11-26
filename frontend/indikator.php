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
        <?php 
            include 'config/navbar.php'
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
            $kegiatan_id = $_GET['kegiatan_id'];
            $kegiatan_nama = $_GET['nama'];
            $sql = "SELECT a.id, a.tolak_ukur as tolak_ukur, b.nama as satuan, c.nama as jenis, a.asb as asb FROM indikator_kegiatan a join satuan b on a.satuan_id=b.id join indikator_hasil c on c.id=a.indikator_hasil_id where a.kegiatan_id=$kegiatan_id";
            
            $count =0;
            if($result = mysqli_query($con, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row= mysqli_fetch_array($result)){
                        $id = $row['id'];
                        $tolak_ukur = $row['tolak_ukur'];
                        $satuan = $row['satuan'];
                        $jenis = $row['jenis'];
                        $usulan_asb = $row['asb'];

                        $return_arr[] = array(
                            "id" => $id,
                            "tolak_ukur" => $tolak_ukur,
                            "satuan" => $satuan,
                            "jenis" => $jenis,
                            "usulan_asb" => $usulan_asb
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
                            <h3 class="box-title">Data Indikator</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-right">
                                        <a href="create_indikator.php?kegiatan_id=<?php echo $kegiatan_id; ?>" class="btn btn-primary">Tambah Indikator Kegiatan</a>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top:25px;">
                                <table class="table table-responsive" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tolak Ukur</th>
                                            <th>Satuan</th>
                                            <th>Jenis Indikator</th>
                                            <th>Usulan ASB</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(!empty($return_arr))
                                            {
                                                foreach($return_arr as $arr){
                                                    echo "<tr>";
                                                    echo "<td>".++$count."</td>";
                                                    echo "<td>".$arr["tolak_ukur"]."</td>";
                                                    echo "<td>".$arr["satuan"]."</td>";
                                                    echo "<td>".$arr["jenis"]."</td>";
                                                    echo "<td>".$arr["usulan_asb"]."</td>";
                                                    echo "<td>
                                                            <a href='edit_ik.php?ik_id=".$arr["id"]."' class='btn btn-success'>Edit</a>
                                                            <a href='hapus_ik.php?ik_id=".$arr["id"]."' class='btn btn-warning'>Hapus</a>
                                                          </td>";
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
            <!-- /.container-fluid -->
            <?php include 'config/footer.php'; ?>

    <script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
    </script>
</body>

</html>
