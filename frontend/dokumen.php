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
            $sql = "SELECT a.id as id, a.nama as dokumen, c.nama as kegiatan, a.file as file FROM dokumen a JOIN opd_kegiatan b on b.kegiatan_id=a.kegiatan_id join kegiatan c on c.id=a.kegiatan_id where b.opd_id=$opd_id";
            $count =0;
            if($result = mysqli_query($con, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row= mysqli_fetch_array($result)){
                        $id = $row['id'];
                        $dokumen = $row['dokumen'];
                        $kegiatan= $row['kegiatan'];
                        $file= $row['file'];

                        $return_arr[] = array(
                            "id" => $id,
                            "dokumen" => $dokumen,
                            "kegiatan" => $kegiatan,
                            "file" => $file
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
                            <h3 class="box-title">Data Dokumen</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-right">
                                        <a href="create_dokumen.php" class="btn btn-primary">Tambah Dokumen</a>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top:25px;">
                                <table class="table table-responsive" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kegiatan</th>
                                            <th>Nama Dokumen</th>
                                            <th>File</th>
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
                                                    echo "<td>".$arr["kegiatan"]."</td>";
                                                    echo "<td>".$arr["dokumen"]."</td>";
                                                    echo "<td><a href='".$arr["file"]."' class='btn btn-primary' download>Download File</a></td>";
                                                    echo "<td>
                                                            <a href='aksi/hapus_dokumen.php?dok_id=".$arr["id"]."' class='btn btn-warning'>Hapus</a>
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
            <?php include 'config/footer.php'; ?>
    <script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
    </script>
</body>

</html>
