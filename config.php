<?php
// config.php - Database Configuration and Connection Setup
$host = "localhost"; 
$user = "root";      
$pass = "";          
$db   = "coffeeshop";
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>