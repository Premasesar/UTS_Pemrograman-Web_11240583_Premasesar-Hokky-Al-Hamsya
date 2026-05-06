<?php
session_start();
include "koneksi.php";

// ANTI HACKER: Membersihkan inputan agar terhindar dari SQL Injection
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = md5($_POST['pass']); 

$query = "SELECT * FROM `user` WHERE username = '$username'";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);

// Cek apakah data ditemukan dan password cocok
if ($data && $password == $data['password']) {
    $_SESSION['hakakses'] = $data['hakakses'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['nama']     = $data['nama'];
    header("Location: menu.php");
} else {
    echo "<script>alert('Login Gagal! Username atau Password salah.'); window.location='login.php';</script>";
}
?>