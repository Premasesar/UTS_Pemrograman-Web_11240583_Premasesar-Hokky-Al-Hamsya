<?php
if (!isset($_SESSION['username'])) {
    $login_path = (strpos($_SERVER['PHP_SELF'], '/mahasiswa/') !== false) ? '../login.php' : 'login.php';
    header("Location: $login_path");
    exit();
}
$is_sub = (strpos($_SERVER['PHP_SELF'], '/mahasiswa/') !== false);
$link_dashboard = $is_sub ? '../menu.php' : 'menu.php';
$link_data      = $is_sub ? 'index.php' : 'mahasiswa/index.php';
$link_tambah    = $is_sub ? 'tambah.php' : 'mahasiswa/tambah.php';
$link_rekap     = $is_sub ? 'rekap.php' : 'mahasiswa/rekap.php';
$link_kalender  = $is_sub ? '../kalender.php' : 'kalender.php';
$link_logout    = $is_sub ? '../logout.php' : 'logout.php';

// PERBAIKAN: Menangkap nama file yang sedang dibuka agar menu bisa menyala
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'SIAKAD El Rahma' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root { --primary: #004d40; --accent: #a5d6a7; }
        body { background: #f0f2f5; font-family: 'Segoe UI', sans-serif; }

        /* SIDEBAR MODERN DARK */
        .sidebar {
            position: fixed; top: 0; left: 0; width: 260px; height: 100vh;
            background: #002621; color: white; display: flex; flex-direction: column;
            z-index: 100; box-shadow: 4px 0 15px rgba(0,0,0,0.1);
        }
        .sidebar-brand {
            padding: 25px 20px; border-bottom: 1px solid rgba(255,255,255,0.05);
            display: flex; align-items: center; gap: 12px;
        }
        .brand-logo img {
            width: 42px; height: 42px; border-radius: 50%; background: white; padding: 3px;
            border: 2px solid var(--accent);
        }
        .sidebar-nav { flex: 1; padding: 20px 0; }
        .sidebar-nav a {
            display: flex; align-items: center; gap: 12px; color: rgba(255,255,255,0.6);
            text-decoration: none; padding: 12px 24px; font-size: 0.9rem; transition: 0.3s;
        }
        /* Efek Menu Menyala */
        .sidebar-nav a:hover, .sidebar-nav a.active {
            background: rgba(165, 214, 167, 0.1); color: var(--accent); font-weight: 600;
            border-left: 4px solid var(--accent);
        }

        /* MAIN CONTENT */
        .main-content { margin-left: 260px; min-height: 100vh; }
        .topbar {
            background: white; padding: 15px 30px; display: flex; justify-content: space-between;
            align-items: center; border-bottom: 1px solid #e0e0e0; position: sticky; top: 0; z-index: 99;
        }
        .page-body { padding: 30px; }
        .card { border: none; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); }
    </style>
</head>
<body>
<div class="sidebar">
    <div class="sidebar-brand">
        <div class="brand-logo"><img src="https://www.google.com/s2/favicons?domain=stmikelrahma.ac.id&sz=256"></div>
        <div class="brand-text"><h6 class="m-0 fw-bold">EL RAHMA</h6><small style="font-size: 10px; opacity: 0.5;">SIAKAD v2.0</small></div>
    </div>
    <nav class="sidebar-nav">
        <a href="<?= $link_dashboard ?>" class="<?= ($currentPage=='menu.php')?'active':'' ?>"><i class="fas fa-th-large"></i> Dashboard</a>
        <a href="<?= $link_kalender ?>" class="<?= ($currentPage=='kalender.php')?'active':'' ?>"><i class="fas fa-calendar-alt"></i> Kalender</a>
        <a href="<?= $link_data ?>" class="<?= ($currentPage=='index.php' && $is_sub)?'active':'' ?>"><i class="fas fa-table"></i> Data Nilai</a>
        <a href="<?= $link_tambah ?>" class="<?= ($currentPage=='tambah.php')?'active':'' ?>"><i class="fas fa-plus-circle"></i> Input Nilai</a>
        <a href="<?= $link_rekap ?>" class="<?= ($currentPage=='rekap.php')?'active':'' ?>"><i class="fas fa-chart-pie"></i> Rekap IPK</a>
        <a href="<?= $link_logout ?>" class="mt-5 text-danger"><i class="fas fa-power-off"></i> Logout</a>
    </nav>
</div>
<div class="main-content">
    <div class="topbar">
        <h5 class="m-0 fw-bold text-dark"><?= $pageTitle ?></h5>
        <div class="user-pill d-flex align-items-center gap-2 bg-light px-3 py-1 rounded-pill border">
            <i class="fas fa-user-circle text-success fs-5"></i>
            <small class="fw-bold text-muted"><?= $_SESSION['username'] ?></small>
        </div>
    </div>
    <div class="page-body">