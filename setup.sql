-- =====================================================
--  SETUP DATABASE - Sistem SIAKAD 
--  Database : akademik_mhs
-- =====================================================

CREATE DATABASE IF NOT EXISTS akademik_mhs;
USE akademik_mhs;

-- =====================================================
-- Tabel user (dosen / admin)
-- =====================================================
CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    nama VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    hakakses ENUM('admin','dosen') NOT NULL DEFAULT 'dosen',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =====================================================
-- Tabel mahasiswa (data mahasiswa + nilai)
-- =====================================================
CREATE TABLE IF NOT EXISTS mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(20) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    program_studi VARCHAR(60) NOT NULL,
    semester TINYINT NOT NULL DEFAULT 1,
    mata_kuliah VARCHAR(80) NOT NULL,
    sks TINYINT NOT NULL DEFAULT 3,
    nilai_tugas DECIMAL(5,2) DEFAULT 0,
    nilai_uts DECIMAL(5,2) DEFAULT 0,
    nilai_uas DECIMAL(5,2) DEFAULT 0,
    nilai_akhir DECIMAL(5,2) DEFAULT 0,
    huruf CHAR(2) DEFAULT '-',
    bobot DECIMAL(3,2) DEFAULT 0.00,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- =====================================================
-- Data default user
-- Password admin: admin123 | Password dosen: dosen123
-- =====================================================
INSERT INTO user (username, nama, password, hakakses) VALUES
('admin',  'Administrator',      MD5('admin123'),  'admin'),
('dosen', 'Asih Winantu',   MD5('dosen123'),  'dosen');
