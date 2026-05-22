<?php
date_default_timezone_set('Asia/Makassar');

function koneksi() {
    $host = "localhost";      
    $username = "root";    
    $password = "";           
    $database = "PRAK501";     


    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Koneksi ke database gagal: " . mysqli_connect_error());
    }
    
    return $conn;
}
?>