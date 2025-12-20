<?php
require_once '../config/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_matakuliah = $_POST['kode_matakuliah'];
    $nama_matakuliah = $_POST['nama_matakuliah'];
    $sks_a = $_POST['sks_a'];
    $sks_b = $_POST['sks_b'];


    $sql = "INSERT INTO tb_matakuliah (kode_matakuliah, nama_matakuliah, sks_a, sks_b) 
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $kode_matakuliah, $nama_matakuliah, $sks_a, $sks_b);

    if ($stmt->execute()) {
        echo "<script>
                alert('Berhasil Menambah Matakuliah');
                window.location.href = '../admin/admin.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal Menambah Matakuliah');
                window.location.href = '../admin/admin.php';
              </script>";
    }
}
?>
