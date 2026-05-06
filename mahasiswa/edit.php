<?php
session_start();
require_once "../koneksi.php";
require_once "../includes/helpers.php";
if (!isset($_SESSION['hakakses'])) { header("Location: ../login.php"); exit; }

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id='$id'"));

if (isset($_POST['update'])) {
    $nim = $_POST['nim']; $nama = $_POST['nama']; $prodi = $_POST['prodi'];
    $smt = $_POST['smt']; $mk = $_POST['mk']; $sks = $_POST['sks'];
    $tugas = $_POST['tugas']; $uts = $_POST['uts']; $uas = $_POST['uas'];

    $na = ($tugas * 0.20) + ($uts * 0.30) + ($uas * 0.50);
    $konversi = nilaiKeHuruf($na);
    $huruf = $konversi['huruf']; $bobot = $konversi['bobot'];

    mysqli_query($koneksi, "UPDATE mahasiswa SET nim='$nim', nama='$nama', program_studi='$prodi', semester='$smt', mata_kuliah='$mk', sks='$sks', nilai_tugas='$tugas', nilai_uts='$uts', nilai_uas='$uas', nilai_akhir='$na', huruf='$huruf', bobot='$bobot' WHERE id='$id'");
    header("Location: index.php"); exit;
}
$pageTitle = "Edit Data Nilai"; $pageIcon = "fas fa-edit";
require_once "../includes/header.php";
?>
<div class="card shadow-sm col-md-8 mx-auto border-warning">
    <div class="card-header bg-warning text-dark">Form Edit Nilai</div>
    <div class="card-body p-4">
        <form method="POST">
            <div class="row mb-3">
                <div class="col-md-4"><label>NIM</label><input type="text" name="nim" class="form-control" value="<?= $data['nim'] ?>" required></div>
                <div class="col-md-8"><label>Nama</label><input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6"><label>Prodi</label><input type="text" name="prodi" class="form-control" value="<?= $data['program_studi'] ?>" required></div>
                <div class="col-md-6"><label>Semester</label><input type="number" name="smt" class="form-control" value="<?= $data['semester'] ?>" required></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-8"><label>Mata Kuliah</label><input type="text" name="mk" class="form-control" value="<?= $data['mata_kuliah'] ?>" required></div>
                <div class="col-md-4"><label>SKS</label><input type="number" name="sks" class="form-control" value="<?= $data['sks'] ?>" required></div>
            </div>
            <div class="row mb-4">
                <div class="col-md-4"><label>Nilai Tugas</label><input type="number" name="tugas" class="form-control" value="<?= $data['nilai_tugas'] ?>" required></div>
                <div class="col-md-4"><label>Nilai UTS</label><input type="number" name="uts" class="form-control" value="<?= $data['nilai_uts'] ?>" required></div>
                <div class="col-md-4"><label>Nilai UAS</label><input type="number" name="uas" class="form-control" value="<?= $data['nilai_uas'] ?>" required></div>
            </div>
            <button type="submit" name="update" class="btn btn-warning">Update Data</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
<?php require_once "../includes/footer.php"; ?>