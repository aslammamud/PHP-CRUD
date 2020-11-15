<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName="student";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }

?>