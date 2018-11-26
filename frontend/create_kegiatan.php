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
                    <div class="col-md-9">
                        <div class="white-box">
                            <h3 class="box-title">Create Kegiatan</h3>
                            <form action="aksi/simpan_kegiatan.php" method="POST">
                                <div class="form-group">
                                    <label>Program</label>
                                    <select id="program" name="program" class="form-control" required>
                                        <option> --Silahkan Pilih-- </option>
                                        <?php 
                                            include 'config/koneksi.php';
                                            $sql="SELECT program.id as id, program.nama as nama FROM program";
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
                                    <label>Indikator Sasaran</label>
                                    <select id="indikator_sasaran" name="indikator_sasaran" class="form-control" required>
                                        <option> --Silahkan Pilih-- </option>
                                        <?php 
                                            $sql="SELECT * FROM indikator_sasaran ";
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
                                    <label for="jenis_kegiatan">Jenis Kegiatan</label>
                                    <select id="jenis_kegiatan" name="jenis_kegiatan" class="form-control" required>
                                        <option >-- Silahkan Pilih -- </option>
                                        <option value="1">Fisik</option>
                                        <option value="1">Non Fisik</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="kegiatan">Kegiatan</label>
                                    <input type="text" class="form-control" name="kegiatan" id="kegiatan" required>
                                </div>

                                <div class="form-group">
                                    <label for="keyword">Kata Kunci / Keyword</label>
                                    <input type="text" class="form-control" name="keyword" id="keyword" required>
                                </div>

                                <div class="form-group">
                                    <label for="catatan">Catatan</label>
                                    <input type="text" class="form-control" name="catatan" id="catatan" placeholder="Catatan Untuk Kegiatan Fisik Jika diperlukan Persyaratan yang harus dilengkapi" required>
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
            $("#indikator_sasaran").select2({
                placeholder: "Please Select"
            });
        });
    </script>
</body>

</html>
