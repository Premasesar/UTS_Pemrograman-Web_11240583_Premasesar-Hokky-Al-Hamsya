<?php
session_start();
require_once "koneksi.php";
require_once "includes/helpers.php";
$pageTitle = "Sistem Overview";
require_once "includes/header.php";

// Statistik data
$total_mhs = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(DISTINCT nim) as t FROM mahasiswa"))['t'];
$total_mk  = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as t FROM mahasiswa"))['t'];
$rata_na   = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT ROUND(AVG(nilai_akhir),2) as t FROM mahasiswa"))['t'];
?>

<style>
    /* Gradient Stat Cards yang matching sama Login */
    .card-stat {
        border: none; border-radius: 20px; color: white; transition: 0.3s; padding: 25px;
        position: relative; overflow: hidden;
    }
    .card-stat:hover { transform: translateY(-5px); }
    .card-stat i { position: absolute; right: -10px; bottom: -10px; font-size: 5rem; opacity: 0.15; }
    
    .bg-elrahma-dark { background: linear-gradient(135deg, #004d40, #002621); }
    .bg-elrahma-green { background: linear-gradient(135deg, #00796b, #004d40); }
    .bg-elrahma-teal { background: linear-gradient(135deg, #00897b, #00695c); }
</style>

<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card-stat bg-elrahma-dark shadow-lg">
            <h6 class="text-uppercase opacity-75 small">Total Mahasiswa</h6>
            <h2 class="display-5 fw-bold mb-0"><?= $total_mhs ?></h2>
            <i class="fas fa-user-graduate"></i>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card-stat bg-elrahma-green shadow-lg">
            <h6 class="text-uppercase opacity-75 small">Total Mata Kuliah</h6>
            <h2 class="display-5 fw-bold mb-0"><?= $total_mk ?></h2>
            <i class="fas fa-book"></i>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card-stat bg-elrahma-teal shadow-lg">
            <h6 class="text-uppercase opacity-75 small">Rata-rata Nilai</h6>
            <h2 class="display-5 fw-bold mb-0"><?= $rata_na ?? '0' ?></h2>
            <i class="fas fa-chart-line"></i>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card p-4 border-0 shadow-sm">
            <div class="d-flex align-items-center gap-3">
                <img src="https://www.google.com/s2/favicons?domain=stmikelrahma.ac.id&sz=256" width="60" class="bg-light p-2 rounded-4">
                <div>
                    <h4 class="fw-bold mb-1 text-success">STMIK El Rahma Yogyakarta</h4>
                    <p class="text-muted mb-0 italic">"Jago IT, Qur'ani, Lulus Jadi Jutawan"</p>
                </div>
            </div>
            <hr class="my-4 opacity-5">
            <p>Selamat datang di dashboard akademik. Gunakan menu navigasi di sebelah kiri untuk mengelola data nilai dan kalender akademik dengan cepat.</p>
        </div>
    </div>
</div>

<?php require_once "includes/footer.php"; ?>