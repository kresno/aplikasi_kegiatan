<?php 
include '../config/koneksi.php';

$program_id = $_POST['program'];
$kegiatan = $_POST['kegiatan'];

$sql = "INSERT INTO kegiatan(trxprogram_id, nama) VALUES ('$program_id', '$kegiatan')";
if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
}else{
    echo "<script>alert('Data Berhasil di Simpan'); window.location.href='../kegiatan.php';</script>";
}

?>