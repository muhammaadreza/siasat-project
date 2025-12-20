<?php
session_start();
require_once '../config/db_connection.php';

if (!isset($_SESSION['nim'])) {
    header("Location: login.php");
    exit();
}

$nim = $_SESSION['nim'];
$user_query = "SELECT * FROM tb_mahasiswa WHERE nim = '$nim'";
$user_result = $conn->query($user_query);
$user = $user_result->fetch_assoc();
$semester_now = '7 (2023/2024)';

$query_kartu_studi = "
    SELECT 
        tb_matakuliah.kode_matakuliah, 
        tb_matakuliah.nama_matakuliah, 
        tb_matakuliah.sks_a, 
        tb_matakuliah.sks_b, 
        tb_dosen.nama_dosen, 
        tb_kelas.hari_waktu, 
        tb_kelas.ruangan, 
        tb_kelas.semester,
        tb_kuliah.id_kuliah,
        tb_kuliah.status_kelas 
    FROM tb_kuliah
    JOIN tb_kelas ON tb_kuliah.id_kelas = tb_kelas.id_kelas
    JOIN tb_matakuliah ON tb_kelas.kode_matakuliah = tb_matakuliah.kode_matakuliah
    JOIN tb_dosen ON tb_kelas.kode_dosen = tb_dosen.kode_dosen
    WHERE tb_kuliah.nim = '$nim'
";
$result_kartu_studi = $conn->query($query_kartu_studi);

$query_jadwal_kuliah = "
    SELECT
        tb_matakuliah.kode_matakuliah,
        tb_matakuliah.nama_matakuliah,
        tb_dosen.nama_dosen,
        tb_kuliah.id_kuliah,
        tb_kelas.hari_waktu,
        tb_kelas.ruangan,
        tb_kuliah.absensi,
        tb_kuliah.status_kelas
    FROM tb_kuliah
    JOIN tb_kelas ON tb_kuliah.id_kelas = tb_kelas.id_kelas
    JOIN tb_matakuliah ON tb_kelas.kode_matakuliah = tb_matakuliah.kode_matakuliah
    JOIN tb_dosen ON tb_kelas.kode_dosen = tb_dosen.kode_dosen
    WHERE tb_kuliah.nim = '$nim'
";
$result_jadwal_kuliah = $conn->query($query_jadwal_kuliah);

function konversi_nilai($nilai) {
    switch ($nilai) {
        case 'A':
            return 4;
        case 'AB':
            return 3.5;
        case 'B':
            return 3;
        case 'BC':
            return 2.5;
        case 'C':
            return 2;
        case 'CD':
        case 'D':
        case 'E':
            return 0;
        default:
            return 0;
    }
}

$query_hasil_studi = "
    SELECT 
        tb_matakuliah.kode_matakuliah, 
        tb_matakuliah.nama_matakuliah, 
        tb_matakuliah.sks_a, 
        tb_matakuliah.sks_b, 
        tb_dosen.nama_dosen, 
        tb_kelas.hari_waktu, 
        tb_kelas.ruangan, 
        tb_kelas.semester,
        tb_kuliah.status_kelas,
        tb_kuliah.nilai
    FROM tb_kuliah
    JOIN tb_kelas ON tb_kuliah.id_kelas = tb_kelas.id_kelas
    JOIN tb_matakuliah ON tb_kelas.kode_matakuliah = tb_matakuliah.kode_matakuliah
    JOIN tb_dosen ON tb_kelas.kode_dosen = tb_dosen.kode_dosen
    WHERE tb_kuliah.nim = '$nim' AND tb_kelas.semester = '$semester_now'
    AND tb_kuliah.nilai IS NOT NULL
";
$result_hasil_studi = $conn->query($query_hasil_studi);

$query_transkrip = "
    SELECT 
        tb_matakuliah.kode_matakuliah, 
        tb_matakuliah.nama_matakuliah, 
        tb_matakuliah.sks_a, 
        tb_dosen.nama_dosen, 
        tb_kelas.hari_waktu, 
        tb_kelas.ruangan, 
        tb_kelas.semester,
        tb_kuliah.status_kelas,
        tb_kuliah.nilai
    FROM tb_kuliah
    JOIN tb_kelas ON tb_kuliah.id_kelas = tb_kelas.id_kelas
    JOIN tb_matakuliah ON tb_kelas.kode_matakuliah = tb_matakuliah.kode_matakuliah
    JOIN tb_dosen ON tb_kelas.kode_dosen = tb_dosen.kode_dosen
    WHERE tb_kuliah.nim = '$nim' AND tb_kuliah.nilai IS NOT NULL
";
$result_transkrip = $conn->query($query_transkrip);

function hitungSKS($nim, $semester = null) {
    global $conn;
    $sqlTotalSKS = "
        SELECT SUM(mk.sks_a) AS total_sks
        FROM tb_kuliah k
        INNER JOIN tb_kelas c ON k.id_kelas = c.id_kelas
        INNER JOIN tb_matakuliah mk ON c.kode_matakuliah = mk.kode_matakuliah
        WHERE k.nim = ?";

    $stmt = $conn->prepare($sqlTotalSKS);
    $stmt->bind_param("i", $nim);
    $stmt->execute();
    $result = $stmt->get_result();
    $dataTotal = $result->fetch_assoc();
    $totalSKS = $dataTotal['total_sks'] ?? 0;

    $semesterSKS = 0;
    if ($semester !== null) {
        $sqlSemesterSKS = "
            SELECT SUM(mk.sks_a) AS semester_sks
            FROM tb_kuliah k
            INNER JOIN tb_kelas c ON k.id_kelas = c.id_kelas
            INNER JOIN tb_matakuliah mk ON c.kode_matakuliah = mk.kode_matakuliah
            WHERE k.nim = ? AND c.semester LIKE ?";
        
        $semesterParam = "%" . $semester . "%";
        $stmt = $conn->prepare($sqlSemesterSKS);
        $stmt->bind_param("is", $nim, $semesterParam);
        $stmt->execute();
        $result = $stmt->get_result();
        $dataSemester = $result->fetch_assoc();
        $semesterSKS = $dataSemester['semester_sks'] ?? 0;
    }

    return [
        "total_sks" => $totalSKS,
        "semester_sks" => $semesterSKS
    ];
}
$dataSKS = hitungSKS($nim, $semester_now);

$query_registrasi_matakuliah = "
    SELECT 
        tb_matakuliah.kode_matakuliah, 
        tb_matakuliah.nama_matakuliah, 
        tb_matakuliah.sks_a, 
        tb_matakuliah.sks_b, 
        tb_dosen.nama_dosen, 
        tb_kelas.hari_waktu, 
        tb_kelas.ruangan, 
        tb_kelas.semester,
        tb_kelas.id_kelas,
        (SELECT COUNT(*) FROM tb_kuliah WHERE id_kelas = tb_kelas.id_kelas) AS kapasitas
    FROM tb_kelas
    JOIN tb_matakuliah ON tb_kelas.kode_matakuliah = tb_matakuliah.kode_matakuliah
    JOIN tb_dosen ON tb_kelas.kode_dosen = tb_dosen.kode_dosen
";
$result_registrasi_matakuliah = $conn->query($query_registrasi_matakuliah);
?>