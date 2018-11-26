<?php
$servername = "localhost";
$username = "simencrang2018_kegiatan";
$password = "pass8080word";
$dbname = "simencrang2018_kegiatan";

// $username = "root";
// $password = "";
// $dbname = "sepengki";


// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    return true;
}

?> 