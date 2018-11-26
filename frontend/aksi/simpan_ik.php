<?php 
include '../config/koneksi.php';

$kegiatan_id = $_POST['kegiatan_id'];
$indikator_hasil_id = $_POST['jenis'];
$tolak_ukur = $_POST['tolak_ukur'];
$satuan_id = $_POST['satuan'];
$asb = $_POST['usulan_asb'];
$time= date("Y-m-d H:i:s");

$sql = "INSERT INTO indikator_kegiatan (kegiatan_id, indikator_hasil_id, tolak_ukur, satuan_id, asb, created_at, updated_at) 
        VALUES ('$kegiatan_id', $indikator_hasil_id, '$tolak_ukur', '$satuan_id', '$asb', '$time', '$time')";
if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
}else{
    echo "<script>alert('Data Berhasil di Simpan'); window.location.href='../indikator.php?kegiatan_id=$kegiatan_id';</script>";
}

?>