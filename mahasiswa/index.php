<?php
session_start();
require_once "../koneksi.php";
require_once "../includes/helpers.php";
$pageTitle = "Daftar Nilai Mahasiswa";
require_once "../includes/header.php";

$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY nim ASC");
?>
<div class="card border-0 shadow-sm rounded-4 p-4">
    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th>NIM</th><th>Nama</th><th>Mata Kuliah</th><th>Nilai</th><th>Huruf</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($query)): ?>
            <tr>
                <td><?= $row['nim'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['mata_kuliah'] ?></td>
                <td><?= $row['nilai_akhir'] ?></td>
                <td><span class="badge bg-primary"><?= $row['huruf'] ?></span></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                    <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php require_once "../includes/footer.php"; ?>