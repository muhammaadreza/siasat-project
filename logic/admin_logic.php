<?php
session_start();
require_once '../config/db_connection.php';

if (!isset($_SESSION['nim'])) {
    header("Location: login.php");
    exit();
}

$nim = $_SESSION['nim'];
$user_query = "SELECT * FROM tb_mahasiswa WHERE nim = '$nim'";
$user_result = $conn->query($user_query);
$user = $user_result->fetch_assoc();
$semester_now = '7 (2023/2024)';

$sql_matakuliah = "SELECT * FROM tb_matakuliah";
$result_matakuliah = $conn->query($sql_matakuliah);

$sql_dosen = "SELECT * FROM tb_dosen";
$result_dosen = $conn->query($sql_dosen);

$sql_kelas = "SELECT tb_kelas.id_kelas, tb_matakuliah.kode_matakuliah, tb_matakuliah.nama_matakuliah, tb_matakuliah.sks_a, tb_matakuliah.sks_b, tb_dosen.kode_dosen, tb_dosen.nama_dosen, tb_kelas.hari_waktu, tb_kelas.ruangan, tb_kelas.semester, (SELECT COUNT(*) FROM tb_kuliah WHERE id_kelas = tb_kelas.id_kelas) AS kapasitas 
              FROM tb_kelas
              JOIN tb_matakuliah ON tb_kelas.kode_matakuliah = tb_matakuliah.kode_matakuliah
              JOIN tb_dosen ON tb_kelas.kode_dosen = tb_dosen.kode_dosen";
$result_kelas = $conn->query($sql_kelas);

$sql_mahasiswa = "SELECT * FROM tb_mahasiswa";
$result_mahasiswa = $conn->query($sql_mahasiswa);
?>

