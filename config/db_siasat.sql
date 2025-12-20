-- Membuat database
CREATE DATABASE db_siasat;

-- Menggunakan database
USE db_siasat;

-- Tabel Mahasiswa
CREATE TABLE tb_mahasiswa (
    nim INT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    fakultas VARCHAR(100),
    program_studi VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255) NOT NULL,
    tempat_lahir VARCHAR(100),
    tanggal_lahir DATE,
    no_kk VARCHAR(50),
    nik VARCHAR(50) UNIQUE,
    bank VARCHAR(50),
    no_rek VARCHAR(50),
    nama_rek VARCHAR(100),
    hubungan_rek VARCHAR(50),
    foto VARCHAR(100)
);

CREATE TABLE tb_matakuliah (
    kode_matakuliah VARCHAR(10) PRIMARY KEY,
    nama_matakuliah VARCHAR(100) NOT NULL,
    sks_a INT,
    sks_b INT
);

CREATE TABLE tb_dosen (
    kode_dosen INT(10) PRIMARY KEY,
    nama_dosen VARCHAR(100) NOT NULL
);

CREATE TABLE tb_kelas (
    id_kelas INT AUTO_INCREMENT PRIMARY KEY,
    kode_matakuliah VARCHAR(10),
    kode_dosen INT,
    hari_waktu VARCHAR(50),
    ruangan VARCHAR(50),
    semester VARCHAR(50),
    FOREIGN KEY (kode_matakuliah) REFERENCES tb_matakuliah(kode_matakuliah),
    FOREIGN KEY (kode_dosen) REFERENCES tb_dosen(kode_dosen)
);

CREATE TABLE tb_kuliah (
    id_kuliah VARCHAR(20) PRIMARY KEY,
    id_kelas INT,
    nim INT,
    status_kelas VARCHAR(10),
    absensi INT,
    nilai VARCHAR(10),
    FOREIGN KEY (id_kelas) REFERENCES tb_kelas(id_kelas),
    FOREIGN KEY (nim) REFERENCES tb_mahasiswa(nim)
);

INSERT INTO tb_mahasiswa (
    nim, nama, fakultas, program_studi, email, password, tempat_lahir, tanggal_lahir, no_kk, nik, bank, no_rek, nama_rek, hubungan_rek) 
    VALUES (
    672022049, 
    'Muhammad Indrasta Reza Maulana', 
    'Fakultas Teknologi Informasi', 
    'S1 Teknik Informatika',
    '672022049@student.uksw.edu', 
    'cuki', 
    'Salatiga', 
    '2004-01-25', 
    '1234XXXXXXXXX', 
    '1234XXXXXXXXX', 
    'Bank Central Asia', 
    '1370XXXXXXXXX', 
    'Muhammad Indrasta Reza Maulana', 
    'Pribadi'
);

INSERT INTO tb_matakuliah (kode_matakuliah, nama_matakuliah, sks_a, sks_b) VALUES
('TC212J', 'PEMROGRAMAN BERORIENTASI OBJEK J', 3, 4),
('TC223Q', 'PEMROGRAMAN WEB Q', 3, 4),
('TC515H', 'SISTEM BASIS DATA H', 3, 4),
('TC633D', 'METODE PENELITIAN D', 3, 3),
('TC715A', 'MANAJEMEN PROYEK A', 3, 3),
('TC717B', 'PENGUJIAN SISTEM B', 3, 3);

INSERT INTO tb_dosen (kode_dosen, nama_dosen) VALUES
(84702, 'Dina Robiana Sitompul'),
(67810, 'Danang Tri Widiatmoko'),
(55905, 'Ariya Dwika Cahyono'),
(67523, 'Indrastanti Ratna Widiasari'),
(67545, 'Suprihadi');

INSERT INTO tb_kelas (id_kelas, kode_matakuliah, kode_dosen, hari_waktu, ruangan, semester) VALUES
('1', 'TC212J', 84702, 'Kamis, 13:00-16:00', 'FTI 467', '7 (2023/2024)'),
('2', 'TC223Q', 67810, 'Jumat, 10:00-13:00', 'FTI 467', '7 (2023/2024)'),
('3', 'TC515H', 55905, 'Senin, 10:00-12:00', 'FTI 308', '7 (2023/2024)'),
('4', 'TC633D', 67523, 'Kamis, 10:00-13:00', 'FTI 333', '7 (2023/2024)'),
('5', 'TC715A', 67545, 'Rabu, 10:00-13:00', 'FTI 329', '7 (2023/2024)'),
('6', 'TC717B', 67545, 'Selasa, 13:00-16:00', 'FTI 306', '7 (2023/2024)');

INSERT INTO tb_kuliah (id_kuliah, id_kelas, nim, status_kelas, absensi, nilai) VALUES
('1', '1', 672022049, 'B', 1, 'A'),
('2', '2', 672022049, 'B', 2, 'AB'),
('3', '3', 672022049, 'B', 3, 'B'),
('4', '4', 672022049, 'B', 4, 'BC'),
('5', '5', 672022049, 'B', 5, 'C'),
('6', '6', 672022049, 'B', 6, 'CD');