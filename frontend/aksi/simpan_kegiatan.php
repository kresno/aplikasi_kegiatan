<?php 
include '../config/koneksi.php';
session_start();

$program_id = $_POST['program'];
$indikator_sasaran = $_POST['indikator_sasaran'];
$kegiatan = $_POST['kegiatan'];
$keyword = $_POST['keyword'];
$catatan = $_POST['catatan'];
$jenis_kegiatan = $_POST['jenis_kegiatan'];
$time= date("Y-m-d H:i:s");

$sql = "INSERT INTO kegiatan (nama, deskripsi, keyword, program_id, indikator_sasaran_id, jenis_kegiatan, catatan, created_at, updated_at) 
        VALUES ('$kegiatan', '$kegiatan', '$keyword', '$program_id', '$indikator_sasaran', '$jenis_kegiatan', '$catatan', '$time', '$time')";
if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
}else{
    
    $last_id = mysqli_insert_id($con);
    $opd_id = $_SESSION['opd_id'];
    $sql1 = "INSERT INTO opd_kegiatan (opd_id, kegiatan_id, created_at, updated_at) VALUES ('$opd_id', '$last_id', '$time', '$time')";

    if (!mysqli_query($con,$sql1)) {
        die('Error: ' . mysqli_error($con));
    } else {
        echo "<script>alert('Data Berhasil di Simpan'); window.location.href='../kegiatan.php';</script>";
    }

}

?>