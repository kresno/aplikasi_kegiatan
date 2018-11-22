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

            $sql = "SELECT id as id, username as username, password as pwd FROM users";
            $count =0;
            if($result = mysqli_query($con, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row= mysqli_fetch_array($result)){
                        $id = $row['id'];
                        $username = $row['username'];
                        $pwd= $row['pwd'];

                        $return_arr[] = array(
                            "id" => $id,
                            "username" => $username,
                            "pwd" => $pwd
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
                                            <th>id</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(!empty($return_arr))
                                            {
                                                foreach($return_arr as $arr){
                                                    echo "<tr>";
                                                    echo "<td>".$arr["id"]."</td>";
                                                    echo "<td>".$arr["username"]."</td>";
                                                    echo "<td>".$arr["pwd"]."</td>";
                                                    echo "<td>
                                                            <a href='edit_dokumen.php?kegiatan_id=".$arr["id"]."' class='btn btn-success'>Edit</a>
                                                            <a href='indikator.php?kegiatan_id=".$arr["id"]."&nama=".$arr["username"]."' class='btn btn-primary'>Output</a>
                                                            <a href='hapus_kegiatan.php?kegiatan_id=".$arr["id"]."' class='btn btn-warning'>Hapus</a>
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
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
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

    <script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
    </script>
</body>

</html>