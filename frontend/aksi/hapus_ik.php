<?php 
include '../config/koneksi.php';

$ik_id = $_GET['ik_id'];
$kegiatan_id = $_GET['kegiatan_id'];

$sql = "DELETE FROM indikator_kegiatan WHERE id=$ik_id";

if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
}else{
    echo "<script>alert('Data Berhasil di Simpan'); window.location.href='../indikator.php?kegiatan_id=$kegiatan_id';</script>";
}

?>