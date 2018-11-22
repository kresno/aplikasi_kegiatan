<?php
include('config/koneksi.php');

    $return_arr = array();

    $sql="SELECT * FROM indikator_sasaran";

    if($result = mysqli_query($con, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row= mysqli_fetch_array($result)){
                $id = $row['id'];
                $nama_indikator = $row['nama'];

                $return_arr[] = array("id" => $id,
                    "nama_indikator" => $nama);
            }
            echo json_encode($return_arr);
        }
    }
    // echo $_GET["sektor_id"];

?>
