<?php
require_once '../config/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kuliah = $_POST['id_kuliah'];
    $absensi = $_POST['absensi'];

    if ($absensi > 14) {
        echo "<script>
                alert('Presensi sudah mencapai batas maksimal.');
                window.location.href = '../views/index.php';
              </script>";
        exit;
    }

    $query = "UPDATE tb_kuliah SET absensi = ? WHERE id_kuliah = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $absensi, $id_kuliah);

    if ($stmt->execute()) {
        echo "<script>
                alert('Presensi berhasil!');
                window.location.href = '../views/index.php';
              </script>";
    } else {
        echo "<script>
                alert('Terjadi kesalahan saat memproses presensi.');
                window.location.href = '../views/index.php';
              </script>";
    }
    $stmt->close();
}
$conn->close();
