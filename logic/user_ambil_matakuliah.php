<?php
require_once '../config/db_connection.php';
require_once 'user_logic.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kelas = $_POST['id_kelas'];

    $query_cek = "SELECT * FROM tb_kuliah WHERE id_kelas = ? AND nim = ?";
    $stmt = $conn->prepare($query_cek);
    $stmt->bind_param("ii", $id_kelas, $nim);
    $stmt->execute();
    $result_cek = $stmt->get_result();

    if ($result_cek->num_rows > 0) {
        echo "<script>alert('Anda sudah terdaftar di kelas ini!'); window.location.href = '../views/index.php';</script>";
        exit();
    } else {
        $insert_kuliah = "
            INSERT INTO tb_kuliah (id_kelas, nim)
            VALUES ('$id_kelas', '$nim')
        ";

        if ($conn->query($insert_kuliah)) {
            echo "<script>alert('Berhasil mengambil mata kuliah!'); window.location.href = '../views/index.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan saat mengambil mata kuliah.'); window.location.href = '../views/index.php';</script>";
        }
    }
}
?>
