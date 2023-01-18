<?php
$servername = "localhost";
$username = "root";
$password = "BalauruMysql99";
$database = "php_hospital";

$connect = mysqli_connect($servername, $username, $password, $database);

// if ($connect->connect_error) {
//   die("Connection failed: " . $connect->connect_error);
// }
// echo "Connected successfully";
?>