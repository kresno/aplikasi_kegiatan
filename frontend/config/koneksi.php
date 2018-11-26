<?php
$servername = "localhost";
// $username = "ruangaci";
// $password = "085310526076atisser221292";
// $dbname = "ruangaci_pj";

$username = "simencrang2018_kegiatan";
$password = "pass8080sword";
$dbname = "simencrang2018_kegiatan";


// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    return true;
}

?> 