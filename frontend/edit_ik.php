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
            $ik_id = $_GET['ik_id'];
            $kegiatan_id = $_GET['kegiatan_id'];

            include 'config/koneksi.php';
            $sql = "SELECT * FROM indikator_kegiatan WHERE id=$ik_id ";
            if($result = mysqli_query($con, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row= mysqli_fetch_array($result)){
                        $id = $row['id'];
                        $tolak_ukur = $row['tolak_ukur'];
                        $satuan_id = $row['satuan_id'];
                        $indikator_hasil_id = $row['indikator_hasil_id'];
                        $asb = $row['asb'];
                        // $return_arr[] = array(
                        //     "id" => $id,
                        //     "tolak_ukur" => $tolak_ukur,
                        //     "indikator_hasil_id" => $indikator_hasil_id,
                        //     "satuan_id" => $satuan_id,
                        //     "asb" => $asb
                        // );
                    }
                }
            }
            
        ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9">
                        <div class="white-box">
                            <h3 class="box-title">Create Indikator </h3>
                            <form action="aksi/update_ik.php" method="POST">
                                <input type="hidden" name="kegiatan_id" value="<?php echo $kegiatan_id; ?>">
                                <input type="hidden" name="ik_id" value="<?php echo $ik_id; ?>">
                                <div class="form-group">
                                    <label>Jenis Indikator Kegiatan</label>
                                    <select id="jenis" name="jenis" class="form-control" required>
                                    <option> --Silahkan Pilih-- </option>
                                        <?php 
                                            
                                            $sql="SELECT * FROM indikator_hasil";
                                            if($result = mysqli_query($con, $sql)){
                                                if(mysqli_num_rows($result) > 0){
                                                    while($row= mysqli_fetch_array($result)){
                                                        if($row['id']==$indikator_hasil_id){
                                                            echo "<option value='".$row['id']."' selected>".$row['nama']."</option>";
                                                        } else {
                                                            echo "<option value='".$row['id']."'>".$row['nama']."</option>";
                                                        }
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="tolak_ukur">Tolak Ukur</label>
                                    <input type="text" class="form-control" name="tolak_ukur" id="tolak_ukur" value="<?php echo $tolak_ukur;?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Satuan</label>
                                    <select id="satuan" name="satuan" class="form-control" required>
                                        <option> --Silahkan Pilih-- </option>
                                        <?php 
                                            $sql="SELECT * FROM satuan";
                                            if($result = mysqli_query($con, $sql)){
                                                if(mysqli_num_rows($result) > 0){
                                                    while($row= mysqli_fetch_array($result)){
                                                        if($row['id']==$satuan_id){
                                                            echo "<option value='".$row['id']."' selected>".$row['nama']."</option>";
                                                        } else {
                                                            echo "<option value='".$row['id']."'>".$row['nama']."</option>";
                                                        };
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="usulan_asb">Usulan ASB</label>
                                    <input type="text" class="form-control" name="usulan_asb" id="usulan_asb" value="<?php echo $asb; ?>" required>
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
    $(document).ready(function(){
        $("#satuan").select2({
                placeholder: "Please Select"
            });
    });
    </script>
</body>

</html>
