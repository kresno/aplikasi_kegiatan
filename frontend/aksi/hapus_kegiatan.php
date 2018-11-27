<?php 
include '../config/koneksi.php';

$kegiatan_id = $_GET['kegiatan_id'];

$sql = "DELETE FROM kegiatan where id=$kegiatan_id; DELETE FROM indikator_kegiatan where kegiatan_id=$kegiatan_id; DELETE FROM opd_kegiatan where kegiatan_id=$kegiatan_id;";

if (!mysqli_multi_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
}else{
    echo "<script>alert('Data Berhasil di Hapus'); window.location.href='../kegiatan.php';</script>";
}

?>