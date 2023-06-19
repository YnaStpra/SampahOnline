<?php

$sname = "localhost";
$uname = "root";
$pword = "";

$dbname = "bangsampah";

$conn = mysqli_connect($sname, $uname, $pword, $dbname);

if (!$conn){
    echo "Connection Failed";
}
$_SESSION['conn'] = $conn;
?>
