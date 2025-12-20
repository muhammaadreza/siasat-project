<?php
session_start();
require_once '../config/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $conn->real_escape_string($_POST['nim']);
    $password = $_POST['password'];

    if ($nim === 'admin' && $password === 'admin') {
        $_SESSION['nim'] = 'admin';
        $_SESSION['nama'] = 'Administrator';
        header("Location: ../admin/admin.php");
        exit();
    }

    $sql = "SELECT * FROM tb_mahasiswa WHERE nim = '$nim'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if ($password === $user['password']) {
            $_SESSION['nim'] = $user['nim'];
            $_SESSION['nama'] = $user['nama'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Password Salah";
        }
    } else {
        $error = "NIM Tidak Terdaftar";
    }
}
?>