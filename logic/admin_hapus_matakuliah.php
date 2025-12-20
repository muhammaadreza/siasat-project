<?php
require_once '../config/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_matakuliah = $_POST['kode_matakuliah'];

    $sql = "DELETE FROM tb_matakuliah WHERE kode_matakuliah = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $kode_matakuliah);

    if ($stmt->execute()) {
        echo "<script>
                window.location.href = '../admin/admin.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal Menghapus Matakuliah');
                window.location.href = '../admin/admin.php';
              </script>";
    }
}
?>
