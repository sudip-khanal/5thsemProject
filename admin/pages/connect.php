<?php
ini_set('display_errors', 1);
error_reporting(~0);

$host = "localhost";
$username = "root";
$pass = "jiban";
$databaseName="ecommerce_sample_db";
$dbConnect = mysqli_connect($host, $username, $pass,$databaseName);

?>
