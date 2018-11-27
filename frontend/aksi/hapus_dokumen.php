<?php 
include '../config/koneksi.php';

$dok_id = $_GET['dok_id'];

$sql = "DELETE FROM dokumen WHERE id=$dok_id";

if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
}else{
    echo "<script>alert('Data Berhasil di Hapus'); window.location.href='../indikator.php';</script>";
}

?>