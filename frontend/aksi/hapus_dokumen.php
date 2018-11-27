<?php 
include '../config/koneksi.php';

$ik_id = $_GET['ik_id'];

$sql = "START TRANSACTION;
        DELETE FROM dokumen WHERE id=$ik_id;
        COMMIT;";

if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
}else{
    echo "<script>alert('Data Berhasil di Simpan'); window.location.href='../indikator.php';</script>";
}

?>