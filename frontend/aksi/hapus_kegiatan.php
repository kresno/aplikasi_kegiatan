<?php 
include '../config/koneksi.php';

$kegiatan_id = $_GET['kegiatan_id'];

$sql = "START TRANSACTION;
        DELETE FROM kegiatan WHERE id=$kegiatan_id;
        DELETE FROM indikator_kegiatan WHERE kegiatan_id=$kegiatan_id;
        DELETE FROM opd_kegiatan WHERE kegiatan_id=$kegiatan_id;
        COMMIT;";

if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
}else{
    echo "<script>alert('Data Berhasil di Simpan'); window.location.href='../kegiatan.php';</script>";
}

?>