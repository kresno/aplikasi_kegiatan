<?php 
include '../config/koneksi.php';

$ik_id = $_GET['ik_id'];

$sql = "DELETE FROM dokumen WHERE id=$ik_id";

if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
}else{
    echo "<script>alert('Data Berhasil di Hapus'); window.location.href='../indikator.php';</script>";
}

?>