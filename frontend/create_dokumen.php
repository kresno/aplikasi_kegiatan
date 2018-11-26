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
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Create Dokumen</h3>
                            <form action="aksi/simpan_dokumen.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Kegiatan</label>
                                    <select id="kegiatan" name="kegiatan" class="form-control" required>
                                        <option> --Silahkan Pilih-- </option>
                                        <?php 
                                            include 'config/koneksi.php';
                                            $opd_id = $_SESSION['opd_id'];
                                            $sql="SELECT a.id AS id, a.nama AS nama 
                                            FROM kegiatan a 
                                            JOIN opd_kegiatan b ON a.id=b.kegiatan_id WHERE b.opd_id=$opd_id";
                                            if($result = mysqli_query($con, $sql)){
                                                if(mysqli_num_rows($result) > 0){
                                                    while($row= mysqli_fetch_array($result)){
                                                        echo "<option value='".$row['id']."'>".$row['nama']."</option>";
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            
                                <div class="form-group">
                                    <label for="nama-dokumen">Nama Dokumen</label>
                                    <input type="text" class="form-control" name="nama_dokumen" id="nama_dokumen" required>
                                </div>

                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan" id="keterangan" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="keterangan">Pilih Dokumen</label>
                                    <input type="file" class="form-control" name="file" id="file" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
            <?php include 'config/footer.php'; ?>
    <script>
        $(document).ready(function () {
            $("#program").select2({
                placeholder: "Please Select"
            });
        });
    </script>
</body>

</html>
