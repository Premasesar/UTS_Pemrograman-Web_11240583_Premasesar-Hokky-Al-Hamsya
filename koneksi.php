<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "akademik_mhs";
$koneksi = mysqli_connect($hostname, $username, $password, $database) or die("Koneksi ke MYSQL gagal");

if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}
?>