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
                            <h3 class="box-title">Create Data Program</h3>
                            <form action="aksi/simpan_program.php" method="POST">
                                <div class="form-group">
                                    <label>Program</label>
                                    <select id="program" name="program" class="form-control">
                                        <option> --Silahkan Pilih-- </option>
                                        <?php 
                                            include 'config/koneksi.php';
                                            $sql="SELECT * FROM program ";
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
                                    <select id="indikator_sasaran" name="indikator_sasaran" class="form-control">
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
                                    <label for="ksatu">Target RPJMD 2016-2021(%)</label>
                                    <input type="number" class="form-control" name="ksatu" id="ksatu">
                                </div>

                                <div class="form-group">
                                    <label for="kdua">Realisasi Capaian Kinerja RPJMD s/d RKPD Tahun Lalu (n-2)(%)</label>
                                    <input type="number" class="form-control" name="kdua" id="kdua">
                                </div>

                                <div class="form-group">
                                    <label for="kdua">Target Kinerja dan Anggaran RKPD Tahun berjalan (tahun n-1) yang dievaluasi(%)</label>
                                    <input type="number" class="form-control" name="ktiga" id="ktiga">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- /.container-fluid -->
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
