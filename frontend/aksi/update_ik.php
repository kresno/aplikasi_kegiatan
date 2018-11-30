<?php 
include '../config/koneksi.php';

$ik_id = $_POST['ik_id'];
$kegiatan_id = $_POST['kegiatan_id'];
$indikator_hasil_id = $_POST['jenis'];
$tolak_ukur = $_POST['tolak_ukur'];
$satuan_id = $_POST['satuan'];
$asb = $_POST['usulan_asb'];
$time= date("Y-m-d H:i:s");

$sql = "UPDATE indikator_kegiatan SET kegiatan_id=$kegiatan_id, indikator_hasil_id=$indikator_hasil_id, tolak_ukur='$tolak_ukur', satuan_id=$satuan_id, asb=$asb where id=$ik_id";
if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
}else{
    echo "<script>alert('Data Berhasil di Simpan'); window.location.href='../indikator.php?kegiatan_id=$kegiatan_id';</script>";
}

?>