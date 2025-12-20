<?php
require_once '../config/db_connection.php';
require_once 'admin_logic.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kelas = $_POST['id_kelas'];
    $kode_matakuliah = $_POST['kode_matakuliah'];
    $kode_dosen = $_POST['kode_dosen'];
    $hari_waktu = $_POST['hari_waktu'];
    $ruangan = $_POST['ruangan'];

    $sql_update = "UPDATE tb_kelas SET kode_matakuliah = ?, kode_dosen = ?, hari_waktu = ?, ruangan = ? WHERE id_kelas = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("sissi", $kode_matakuliah, $kode_dosen, $hari_waktu, $ruangan, $id_kelas);

    if ($stmt_update->execute()) {
        echo "<script>
                alert('Berhasil edit kelas');
                window.location.href = '../admin/admin.php';
              </script>";
    } else {
        echo "Terjadi kesalahan: " . $conn->error;
    }
}
?>