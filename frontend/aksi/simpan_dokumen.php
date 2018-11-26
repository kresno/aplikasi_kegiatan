<?php 
include '../config/koneksi.php';

$kegiatan_id = $_POST['kegiatan'];
$nama_dokumen = $_POST['nama_dokumen'];
$keterangan = $_POST['keterangan'];

$ekstensi = array('xlsx', 'pdf', 'xls', 'doc', 'docx');

$nama = $_FILES["file"]["name"];
$ukuran = $_FILES["file"]["temp_size"];
$file_tmp = $_FILES["file"]["temp_name"];


$x = explode('.', $nama);
$ekstensi_file = strtolower(end($x));
$new_nama = md5(round(microtime(true)).$x).'.' .end($x);;

$file = $x;
echo $new_nama.' '.$ukuran;

// if(in_array($ekstensi_file, $ekstensi) == TRUE){
//     if($ukuran<2044070){
//         move_uploaded_file($file_tmp, './upload/'.$new_nama);
//         $query = "INSERT INTO dokumen (kegiatan_id, 'nama, keterangan, file) VALUES('$kegiatan_id', '$nama_dokumen', '$keterangan', '$file')";
//         if (!mysqli_query($con,$query)) {
//             die('Error: ' . mysqli_error($con));
//         }else{
//             echo "<script>alert('Data Berhasil di Simpan'); window.location.href='../kegiatan.php';</script>";
//         }
//     }
// }

?>