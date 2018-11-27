<?php
include 'frontend/config/koneksi.php';


$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);

$password_hash = md5($password);

// echo $email.' '.$password_hash;

$sql="SELECT * FROM users where username='$email' and password='$password_hash' LIMIT 1";

if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        
        if($row['level_id']==2){
            session_start();
            $_SESSION['username'] = $row['username'];
            $_SESSION['opd_id'] = $row['opd_id'];
            echo "<script>alert('Login Berhasil'); window.location.href='frontend/index.php';</script>";
        } else if($row['level_id']==3){
            $_SESSION['username'] = $row['username'];
            $_SESSION['bidang_id'] = $row['bidang_id'];
            echo "<script>alert('Login Berhasil'); window.location.href='admin/index.php';</script>";
        }
        
    }
    else{
        echo "<script>alert('Username dan Password tidak ditemukan'); window.location.href='index.php';</script>";
    }
    // else return false;
} else {
    echo "ko gagal";
}
?>