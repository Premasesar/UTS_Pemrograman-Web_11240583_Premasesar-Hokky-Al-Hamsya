<?php
session_start();
require_once "../koneksi.php";
if (!isset($_SESSION['hakakses'])) { header("Location: ../login.php"); exit; }

$id = mysqli_real_escape_string($koneksi, $_GET['id']);

mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id='$id'");
header("Location: index.php");
?>