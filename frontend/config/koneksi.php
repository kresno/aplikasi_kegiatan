<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "simencrang_kegiatan";

// $username = "simencrang2018_kegiatan";
// $password = "pass8080word";
// $dbname = "simencrang2018_kegiatan";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    return true;
}

?> 