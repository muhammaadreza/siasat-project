<?php
// Koneksi ke database
require_once '../config/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kuliah = $_POST['id_kuliah'];

    $query = "DELETE FROM tb_kuliah WHERE id_kuliah = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $id_kuliah);

    if ($stmt->execute()) {
        echo "<script>
                alert('Data berhasil dihapus.');
                window.location.href = '../views/index.php';
              </script>";
    } else {
        echo "<script>
                alert('Terjadi kesalahan saat menghapus data.');
                window.location.href = '../views/index.php';
              </script>";
    }
    $stmt->close();
}
$conn->close();
