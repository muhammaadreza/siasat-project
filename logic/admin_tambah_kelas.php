<?php
require_once '../config/db_connection.php';
require_once 'admin_logic.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_matakuliah = $_POST['kode_matakuliah'];
    $kode_dosen = $_POST['kode_dosen'];
    $hari_waktu = $_POST['hari_waktu'];
    $ruangan = $_POST['ruangan'];

    $sql = "INSERT INTO tb_kelas (kode_matakuliah, kode_dosen, hari_waktu, ruangan, semester) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $kode_matakuliah, $kode_dosen, $hari_waktu, $ruangan, $semester_now);

    if ($stmt->execute()) {
        echo "<script>
                alert('Berhasil Menambah kelas');
                window.location.href = '../admin/admin.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal Menambah kelas');
                window.location.href = '../admin/admin.php';
              </script>";
    }
}
?>