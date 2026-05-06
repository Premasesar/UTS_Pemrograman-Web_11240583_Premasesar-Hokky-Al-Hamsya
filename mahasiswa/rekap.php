<?php
session_start();
// Memanggil koneksi dari luar folder
require_once "../koneksi.php";
require_once "../includes/helpers.php";

if (!isset($_SESSION['hakakses'])) {
    header("Location: ../login.php");
    exit;
}

$pageTitle = "Rekap IPK Mahasiswa";
require_once "../includes/header.php";

// Query canggih untuk menghitung total SKS dan IPK per mahasiswa
$q = mysqli_query($koneksi, "
    SELECT nim, nama, program_studi, 
           ROUND(SUM(bobot*sks)/SUM(sks), 2) as ipk, 
           COUNT(*) as jml_mk, 
           SUM(sks) as total_sks 
    FROM mahasiswa 
    GROUP BY nim, nama, program_studi 
    ORDER BY ipk DESC
");
?>
<div class="card border-0 shadow-sm rounded-4 p-4">
    <h5 class="text-success mb-4 fw-bold"><i class="fas fa-trophy me-2 text-warning"></i>Peringkat Akademik Mahasiswa</h5>
    
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th class="text-center">Rank</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Program Studi</th>
                    <th class="text-center">SKS Diambil</th>
                    <th class="text-center">IPK</th>
                    <th>Predikat</th>
                </tr>
            </thead>
            <tbody>
                <?php $rank = 1; while ($row = mysqli_fetch_assoc($q)): ?>
                <tr>
                    <td class="text-center fw-bold text-muted">#<?= $rank++ ?></td>
                    <td class="fw-bold"><?= $row['nim'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><small class="text-muted"><?= $row['program_studi'] ?></small></td>
                    <td class="text-center"><span class="badge bg-secondary"><?= $row['total_sks'] ?> SKS</span></td>
                    <td class="text-center">
                        <span class="badge bg-success fs-6 rounded-pill px-3"><?= number_format($row['ipk'], 2) ?></span>
                    </td>
                    <td>
                        <?php
                        $ipk = $row['ipk'];
                        if ($ipk >= 3.51) { echo '<span class="badge bg-warning text-dark border"><i class="fas fa-medal me-1"></i> Cum Laude</span>'; }
                        elseif ($ipk >= 3.01) { echo '<span class="badge bg-primary"><i class="fas fa-star me-1"></i> Sangat Memuaskan</span>'; }
                        elseif ($ipk >= 2.76) { echo '<span class="badge bg-info text-dark"><i class="fas fa-check me-1"></i> Memuaskan</span>'; }
                        else { echo '<span class="badge bg-secondary">Cukup</span>'; }
                        ?>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once "../includes/footer.php"; ?>