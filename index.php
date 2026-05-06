<?php
session_start();
if (!isset($_SESSION['hakakses'])) {
    header("Location: login.php");
} else {
    header("Location: menu.php");
}
exit;
?>