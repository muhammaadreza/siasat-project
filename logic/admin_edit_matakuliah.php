<?php
require_once '../config/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_matakuliah = $_POST['kode_matakuliah'];
    $nama_matakuliah = $_POST['nama_matakuliah'];
    $sks_a = $_POST['sks_a'];
    $sks_b = $_POST['sks_b'];

    $sql_update = "UPDATE tb_matakuliah SET nama_matakuliah = ?, sks_a = ?, sks_b = ? WHERE kode_matakuliah = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("siis", $nama_matakuliah, $sks_a, $sks_b, $kode_matakuliah);

    if ($stmt_update->execute()) {
        echo "<script>
                alert('Berhasil edit Matakuliah');
                window.location.href = '../admin/admin.php';
              </script>";
    } else {
        echo "Terjadi kesalahan: " . $conn->error;
    }
}
?>