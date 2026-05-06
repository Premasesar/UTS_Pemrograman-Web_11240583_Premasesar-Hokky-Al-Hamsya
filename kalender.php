<?php
session_start();
require_once "koneksi.php";

$pageTitle = "Kalender Akademik 2025-2026";
require_once "includes/header.php";

// Data Semester Ganjil dari PDF
$ganjil = [
    ['Upload Jadwal Kuliah', 'Paling lambat 22 Agustus 2025'],
    ['Pembayaran Biaya Pend dan Dispen. Mhs. Lama', 'Maks 29 Agustus 2025'],
    ['Bimbingan dan Entry KRS Mahasiswa Lama', '1 Agus - 2 Sept 2025'],
    ['Pengesahan KRS ke Dosen Pemb Akademik', 'Paling lambat 9 Sept 2025'],
    ['Pembayaran Biaya Pendidikan Mahasiswa Baru', 'Maks 15 September 2025'],
    ['Pembekalan PETA', '15 September 2025'],
    ['Pekan Ta\'aruf Mahasiswa Baru (Reguler & Malam)', '16 - 17 September 2025'],
    ['Bimbingan dan Entry KRS Mhs Baru', '17 - 18 September 2025'],
    ['Kuliah dan Praktikum Tahap 1', '22 Sept - 14 Nov 2025'],
    ['Pendaftaran Pembimbing KP, Skripsi', 'Maksimal 26 Sept 2025'],
    ['Perubahan KRS', '29 Sept - 3 Okt 2025'],
    ['Wisuda Sarjana', 'Oktober 2025'],
    ['Masa Ujian Tengah Semester (UTS)', '17 - 21 November 2025'],
    ['Kuliah dan Praktikum Tahap 2', '24 Nov 2025 - 16 Jan 2026'],
    ['Ujian Akhir Semester (UAS)', '19 - 23 Januari 2026'],
    ['Batas Akhir Penyerahan, Upload Nilai Akhir Sem', '30 Januari 2026']
];

// Data Semester Genap dari PDF
$genap = [
    ['Pembayaran Biaya Pend dan Dispensasi', 'Maks 6 Januari 2026'],
    ['Upload Jadwal Kuliah', 'Paling lambat 30 Jan 2026'],
    ['Bimbingan dan Entry KRS Mahasiswa', '26 Jan - 13 Feb 2026'],
    ['Pengesahan KRS ke Dosen Pemb Akademik', 'Paling lambat 13 Feb 2026'],
    ['Kuliah dan Praktikum Tahap 1', '16 Feb - 1 Mei 2026'],
    ['Pendaftaran Pembimbing KP, Skripsi', 'Maksimal 17 Feb 2026'],
    ['Perubahan KRS', '23 - 27 Feb 2026'],
    ['Libur Idul Fitri (Untuk Mhs)', '9 Maret - 27 Maret 2026'],
    ['Masa Ujian Tengah Semester (UTS)', '4 Mei - 8 Mei 2026'],
    ['Kuliah dan Praktikum Tahap 2', '11 Mei - 3 Juli 2026'],
    ['Pembekalan Kuliah Kerja Lapangan', '15 Juni 2026'],
    ['Pelaksanaan Kuliah Kerja Lapangan', '1 Juli - 31 Agust 2026'],
    ['Ujian Akhir Semester (UAS)', '6 Juli - 10 Juli 2026'],
    ['Penyerahan dan Upload Nilai Akhir Sem', '17 Juli 2026']
];
?>

<style>
    .nav-pills .nav-link.active {
        background-color: #00796b !important;
        color: white !important;
        font-weight: bold;
    }
    .nav-pills .nav-link {
        color: #00796b;
        font-weight: 500;
    }
    .table-custom th {
        background-color: #e0f2f1;
        color: #004d40;
    }
</style>

<div class="card border-0 shadow-sm rounded-4 p-4">
    <div class="d-flex align-items-center mb-4">
        <div class="bg-success text-white rounded-circle p-3 me-3 d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
            <i class="fas fa-calendar-alt fs-4"></i>
        </div>
        <div>
            <h4 class="mb-0 fw-bold text-dark">Kalender Akademik 2025-2026</h4>
            <p class="text-muted small mb-0">Jadwal Kegiatan STMIK El Rahma Yogyakarta</p>
        </div>
    </div>

    <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active px-4 rounded-pill" id="ganjil-tab" data-bs-toggle="pill" data-bs-target="#ganjil" type="button" role="tab">Semester Ganjil 2025-1</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link px-4 rounded-pill" id="genap-tab" data-bs-toggle="pill" data-bs-target="#genap" type="button" role="tab">Semester Genap 2025-2</button>
        </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">
        
        <div class="tab-pane fade show active" id="ganjil" role="tabpanel">
            <div class="table-responsive border rounded-3">
                <table class="table table-hover table-striped mb-0 table-custom align-middle">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center">No</th>
                            <th width="55%">Nama Kegiatan Akademik</th>
                            <th width="40%"><i class="far fa-clock me-1"></i> Waktu Pelaksanaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($ganjil as $g): ?>
                        <tr>
                            <td class="text-center fw-bold text-muted"><?= $no++ ?></td>
                            <td class="fw-semibold text-dark"><?= $g[0] ?></td>
                            <td><span class="badge bg-light text-dark border"><i class="far fa-calendar me-1 text-success"></i> <?= $g[1] ?></span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="genap" role="tabpanel">
            <div class="table-responsive border rounded-3">
                <table class="table table-hover table-striped mb-0 table-custom align-middle">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center">No</th>
                            <th width="55%">Nama Kegiatan Akademik</th>
                            <th width="40%"><i class="far fa-clock me-1"></i> Waktu Pelaksanaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($genap as $g): ?>
                        <tr>
                            <td class="text-center fw-bold text-muted"><?= $no++ ?></td>
                            <td class="fw-semibold text-dark"><?= $g[0] ?></td>
                            <td><span class="badge bg-light text-dark border"><i class="far fa-calendar me-1 text-success"></i> <?= $g[1] ?></span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<?php require_once "includes/footer.php"; ?>