# 🎓 Sistem Informasi Akademik (SIAKAD) - STMIK El Rahma

Aplikasi web PHP + MySQL interaktif untuk mengelola nilai akademik mahasiswa dan informasi jadwal kampus. Dilengkapi dengan antarmuka UI modern bergaya *Glassmorphism* dan sistem keamanan berlapis.

## 🛠️ Teknologi
PHP 7.4+ | MySQL | Bootstrap 5 | Font Awesome 6 | CSS Glassmorphism | Anti SQL-Injection

## 📂 Struktur File Utama
```text
siakad/
├── login.php          → Halaman login (Desain Glassmorphism IT Theme)
├── loginsubmit.php    → Proses autentikasi (Terlindungi Anti SQL-Injection)
├── logout.php         → Proses keluar sistem
├── menu.php           → Dashboard dengan statistik total mahasiswa & rata-rata IPK
├── kalender.php       → [FITUR BARU] Jadwal Kalender Akademik 2025-2026
├── koneksi.php        → Konfigurasi koneksi MySQL
├── setup.sql          → Script pembuatan database & tabel
├── README.md          → Dokumentasi project
├── includes/
│   ├── header.php     → Template sidebar dinamis (Efek menu aktif) & topbar
│   ├── footer.php     → Template footer
│   └── helpers.php    → Fungsi otomatis konversi nilai angka ke huruf & bobot
└── mahasiswa/
    ├── index.php      → Daftar seluruh nilai mahasiswa
    ├── tambah.php     → Form input nilai baru (Dilengkapi Error Handling NIM Ganda)
    ├── edit.php       → Form update data nilai
    ├── hapus.php      → Proses hapus data (Aman dari manipulasi URL)
    └── rekap.php      → Ranking mahasiswa berdasarkan IPK tertinggi + Predikat Kelulusan