<?php 
include '../config/koneksi.php';

session_start();

$user_id = $_SESSION['user_id'];
$program_id = $_POST['program'];
$indikator_sasaran_id = $_POST['indikator_sasaran'];
$ksatu = $_POST['ksatu'];
$kdua = $_POST['kdua'];
$ktiga = $_POST['ktiga'];

$sql = "INSERT INTO trx_program (program_id, indikator_id, ksatu, kdua, ktiga) VALUES ('$program_id', '$indikator_sasaran_id', $ksatu, $kdua, $ktiga)";
if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
}else{
    echo "<script>alert('Data Berhasil di Simpan'); window.location.href='../program.php';</script>";
}

?>