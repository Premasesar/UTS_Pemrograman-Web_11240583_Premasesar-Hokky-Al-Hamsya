<?php
session_start();
// Memanggil koneksi dari luar folder
require_once "../koneksi.php";
require_once "../includes/helpers.php";

if (!isset($_SESSION['hakakses'])) {
    header("Location: ../login.php");
    exit;
}

if (isset($_POST['submit'])) {
    $nim   = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $nama  = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $prodi = mysqli_real_escape_string($koneksi, $_POST['prodi']);
    $mk    = mysqli_real_escape_string($koneksi, $_POST['mk']);

    $smt = $_POST['smt']; $sks = $_POST['sks'];
    $tugas = $_POST['tugas']; $uts = $_POST['uts']; $uas = $_POST['uas'];

    $na = ($tugas * 0.20) + ($uts * 0.30) + ($uas * 0.50);
    $konversi = nilaiKeHuruf($na);
    $huruf = $konversi['huruf'];
    $bobot = $konversi['bobot'];

    $query = "INSERT INTO mahasiswa (nim, nama, program_studi, semester, mata_kuliah, sks, nilai_tugas, nilai_uts, nilai_uas, nilai_akhir, huruf, bobot) 
              VALUES ('$nim', '$nama', '$prodi', '$smt', '$mk', '$sks', '$tugas', '$uts', '$uas', '$na', '$huruf', '$bobot')";
    
    try {
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Data Nilai Berhasil Disimpan!'); window.location='index.php';</script>";
            exit;
        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            $error = "Gagal! NIM Mahasiswa tersebut sudah terdaftar di database.";
        } else {
            $error = "Gagal menyimpan: " . $e->getMessage();
        }
    }
}

$pageTitle = "Input Nilai Baru";
require_once "../includes/header.php";
?>
<div class="card border-0 shadow-sm rounded-4 p-4">
    <h5 class="text-success mb-4 fw-bold"><i class="fas fa-edit me-2"></i>Form Input Nilai Akademik</h5>
    <?php if(isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
    
    <form method="POST">
        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <label class="form-label text-success fw-bold small">NIM</label>
                <input type="text" name="nim" class="form-control bg-light" required>
            </div>
            <div class="col-md-8">
                <label class="form-label text-success fw-bold small">NAMA MAHASISWA</label>
                <input type="text" name="nama" class="form-control bg-light" required>
            </div>
        </div>
        
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label text-success fw-bold small">PROGRAM STUDI</label>
                <select name="prodi" class="form-select bg-light" required>
                    <option value="">- Pilih Program Studi -</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Teknik Informatika">Informatika</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label text-success fw-bold small">SEMESTER</label>
                <input type="number" name="smt" class="form-control bg-light" min="1" max="8" required>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-8">
                <label class="form-label text-success fw-bold small">MATA KULIAH</label>
                <input type="text" name="mk" class="form-control bg-light" required>
            </div>
            <div class="col-md-4">
                <label class="form-label text-success fw-bold small">SKS</label>
                <input type="number" name="sks" class="form-control bg-light" min="1" max="6" required>
            </div>
        </div>

        <hr>
        
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <label class="form-label text-success fw-bold small">NILAI TUGAS (20%)</label>
                <input type="number" name="tugas" class="form-control bg-light" step="0.01" max="100" required>
            </div>
            <div class="col-md-4">
                <label class="form-label text-success fw-bold small">NILAI UTS (30%)</label>
                <input type="number" name="uts" class="form-control bg-light" step="0.01" max="100" required>
            </div>
            <div class="col-md-4">
                <label class="form-label text-success fw-bold small">NILAI UAS (50%)</label>
                <input type="number" name="uas" class="form-control bg-light" step="0.01" max="100" required>
            </div>
        </div>
        
        <button type="submit" name="submit" class="btn btn-success px-5 rounded-pill shadow-sm"><i class="fas fa-save me-2"></i>Simpan Data</button>
        <a href="index.php" class="btn btn-light px-4 rounded-pill border">Batal</a>
    </form>
</div>
<?php require_once "../includes/footer.php"; ?>