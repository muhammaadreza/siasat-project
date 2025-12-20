<?php
require_once '../config/db_connection.php';
require_once 'admin_logic.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kelas = $_POST['id_kelas'];

    $sql = "DELETE FROM tb_kelas WHERE id_kelas = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_kelas);

    if ($stmt->execute()) {
        echo "<script>
                window.location.href = '../admin/admin.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal Menghapus kelas');
                window.location.href = '../admin/admin.php';
              </script>";
    }
}
?>