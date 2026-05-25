<?php
date_default_timezone_set('Asia/Makassar');

function koneksi() {
    $host = "sql303.infinityfree.com";      
    $username = "if0_41989295";    
    $password = "ubpF725CHNfT";           
    $database = "if0_41989295_Prak501";     

    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
    return $conn;
}
?>