<?php
require_once '../logic/user_logic.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
    <link rel="stylesheet" href="../src/css/index.css">
    <title>Sistem Informasi Akademik Satya Wacana</title>
    <link rel="icon" href="../src.img/icon.png" type="image/png">
</head>
<body>
    <header class="header" id="header">
        <div class="header__container">
            <a href="#" class="header__logo">
                <img src="../src/img/logo.png" alt="UKSW Logo" class="header__logo-img">
                <span>SIASAT UKSW</span>
            </a>
            <div class="header__date">
                <span id="current-date"></span>
            </div>
            <button class="header__toggle" id="header-toggle">
                <i class="ri-menu-line"></i>
            </button>
        </div>
    </header>
    <nav class="sidebar" id="sidebar">
        <div class="sidebar__container">
            <div class="sidebar__user">
                <div class="sidebar__img">
                    <img src="<?= $user['foto']; ?>" alt="image">
                </div>
                <div class="sidebar__info">
                    <h3><?= $user['panggilan']; ?></h3>
                    <span><?= $user['email']; ?></span>
                </div>
            </div>
            <div class="sidebar__content">
                <div>
                    <h3 class="sidebar__title">AKADEMIK</h3>
                    <div class="sidebar__list">
                        <a href="#" class="sidebar__link active-link" data-page="dashboard">
                            <i class="ri-dashboard-fill"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="#" class="sidebar__link" data-page="kartu-studi">
                            <i class="ri-file-list-line"></i>
                            <span>Kartu Studi</span>
                        </a>
                        <a href="#" class="sidebar__link" data-page="jadwal-kuliah">
                            <i class="ri-calendar-todo-fill"></i>
                            <span>Jadwal Kuliah</span>
                        </a>
                        <a href="#" class="sidebar__link" data-page="hasil-studi">
                            <i class="ri-draft-line"></i>
                            <span>Hasil Studi</span>
                        </a>
                        <a href="#" class="sidebar__link" data-page="transkrip">
                            <i class="ri-file-paper-2-line"></i>
                            <span>Transkrip Nilai</span>
                        </a>
                    </div>
                </div>
                <div>
                    <h3 class="sidebar__title">ADMIN</h3>
                    <div class="sidebar__list">
                        <a href="#" class="sidebar__link" data-page="comingsoon">
                            <i class="ri-user-add-fill"></i>
                            <span>Registrasi Ulang</span>
                        </a>
                        <a href="#" class="sidebar__link" data-page="registrasi-matakuliah">
                            <i class="ri-file-list-3-fill"></i>
                            <span>Registrasi Matakuliah</span>
                        </a>
                        <a href="#" class="sidebar__link" data-page="comingsoon">
                            <i class="ri-file-add-line"></i>
                            <span>Request Matakuliah</span>
                        </a>
                        <a href="#" class="sidebar__link" data-page="tagihan">
                            <i class="ri-money-dollar-circle-fill"></i>
                            <span>Tagihan</span>
                        </a>
                        <a href="#" class="sidebar__link" data-page="keaktifan">
                            <i class="ri-check-double-fill"></i>
                            <span>Keaktifan Mahasiswa</span>
                        </a>
                        <a href="#" class="sidebar__link" data-page="peminjaman-buku">
                            <i class="ri-book-fill"></i>
                            <span>Peminjaman Buku</span>
                        </a>
                        <a href="#" class="sidebar__link" data-page="comingsoon">
                            <i class="ri-draft-fill"></i>
                            <span>Pendaftaran Skripsi/Thesis</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="sidebar__actions">
                <button>
                    <i class="ri-moon-clear-fill sidebar__link sidebar__theme" id="theme-button">
                        <span>Theme</span>
                    </i>
                </button>
                <button class="sidebar__link logout" onclick="window.location.href='../config/db_disconnection.php'">
                    <i class="ri-logout-box-r-fill"></i>
                    <span>Log Out</span>
                </button>
            </div>
        </div>
    </nav>
    <main class="main" id="main">
        <div id="page-content">
            <div id="dashboard" class="page-section active">
                <div class="dashboard__container">
                    <div class="top-section">
                        <div class="profile-header">
                            <div class="profile-photo square">
                                <img src="<?= $user['foto']; ?>" alt="Foto Profil">
                            </div>
                            <div class="profile-info">
                                <p><i class="ri-user-3-fill"></i> <?= $user['nama']; ?></p>
                                <p><i class="ri-barcode-box-fill"></i> <?= $user['nim']; ?></p>
                                <p><i class="ri-building-line"></i> <?= $user['fakultas']; ?></p>
                                <p><i class="ri-book-read-fill"></i> <?= $user['program_studi']; ?></p>
                            </div>
                        </div>
                        <div class="account-section">
                            <h3><i class="ri-user-settings-fill"></i> Informasi Akun</h3>
                            <div class="account-info">
                                <div class="info-item">
                                    <label>Email</label>
                                    <p><?= $user['email']; ?></p>
                                </div>
                                <div class="info-item password-section">
                                    <label>Password</label>
                                    <div class="password-container">
                                        <input type="password" value="<?= $user['password']; ?>" id="passwordField" readonly>
                                        <button class="toggle-password-btn">
                                            <i class="ri-eye-line" id="passwordToggleIcon"></i>
                                        </button>
                                        <button id="showPasswordFormBtn" class="change-password-btn">
                                            <i class="ri-lock-password-fill"></i> Ganti Password
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-section">
                        <h3><i class="ri-graduation-cap-fill"></i> Status Akademik</h3>
                        <div class="academic-status">
                            <div class="semester-info">
                                <h4>Semester Saat Ini</h4>
                                <p>Semester <?= $semester_now; ?></p>
                            </div>
                            <div class="sks-progress">
                                <div class="progress-item">
                                    <div class="progress-header">
                                        <span>SKS Semester Ini</span>
                                        <span><?= $dataSKS['semester_sks'] ?>/20 SKS</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: <?= $dataSKS['semester_sks'] / 20 * 100 ?>%;"></div>
                                    </div>
                                </div>
                                <div class="progress-item">
                                    <div class="progress-header">
                                        <span>Total SKS</span>
                                        <span><?= $dataSKS['total_sks'] ?>/144 SKS</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: <?= $dataSKS['total_sks'] / 144 * 100 ?>%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-section">
                        <h3><i class="ri-file-list-3-fill"></i> Data Administrasi</h3>
                        <div class="admin-info">
                            <div class="info-grid">
                                <div class="info-item">
                                    <label>Tempat, Tanggal Lahir</label>
                                    <p><?= $user['tempat_lahir']; ?>, <?php echo $user['tanggal_lahir']; ?></p>
                                </div>
                                <div class="info-item">
                                    <label>No. Kartu Keluarga</label>
                                    <p><?= $user['no_kk']; ?></p>
                                </div>
                                <div class="info-item">
                                    <label>NIK</label>
                                    <p><?= $user['nik']; ?></p>
                                </div>
                                <div class="info-item">
                                    <label>Bank</label>
                                    <p><?= $user['bank']; ?></p>
                                </div>
                                <div class="info-item">
                                    <label>No. Rekening</label>
                                    <p><?= $user['no_rek']; ?></p>
                                </div>
                                <div class="info-item">
                                    <label>Atas Nama Rekening</label>
                                    <p><?= $user['nama_rek']; ?></p>
                                </div>
                                <div class="info-item">
                                    <label>Hubungan dengan Pemilik Rekening</label>
                                    <p><?= $user['hubungan_rek']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="kartu-studi" class="page-section">
                <div class="dashboard__container">
                    <div class="dashboard-section">
                        <h3><i class="ri-file-list-line"></i> Kartu Studi</h3>
                        <div class="semester-info">
                            <p>Semester <?= $semester_now; ?></p>
                        </div>
                        <div class="table-container">
                            <table class="academic-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Matakuliah</th>
                                        <th>B/U</th>
                                        <th>SKS A</th>
                                        <th>SKS B</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($result_kartu_studi->num_rows > 0): ?>
                                    <?php 
                                    $no = 1;
                                    $total_sks_a = 0;
                                    $total_sks_b = 0;
                                    while ($row = $result_kartu_studi->fetch_assoc()) {
                                        $total_sks_a += $row['sks_a'];
                                        $total_sks_b += $row['sks_b'];
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['kode_matakuliah'] ?></td>
                                        <td><?= $row['nama_matakuliah'] ?></td>
                                        <td><span class="status-<?= strtolower($row['status_kelas']) ?>"><?= $row['status_kelas'] ?></span></td>
                                        <td><?= $row['sks_a'] ?></td>
                                        <td><?= $row['sks_b'] ?></td>
                                        <td>
                                            <div class="mk-info">
                                                <p><i class="ri-user-line"></i><?= $row['nama_dosen'] ?></p>
                                                <p><i class="ri-building-line"></i><?= $row['ruangan'] ?></p>
                                                <p><i class="ri-time-line"></i><?= $row['hari_waktu'] ?></p>
                                            </div>
                                        </td>
                                        <td>
                                            <form action="../logic/user_hapus_kuliah.php" method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus kelas ini?');">
                                                <input type="hidden" name="id_kuliah" value="<?= $row['id_kuliah'] ?>">
                                                <button type="submit" class="action-btn delete-btn">
                                                    <i class="ri-delete-bin-line"></i>
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4"><strong>Total</strong></td>
                                        <td><?= $total_sks_a ?></td>
                                        <td><?= $total_sks_b ?></td>
                                        <td></td>
                                        <td>
                                            <button class="action-btn ks-btn">
                                                <i class="ri-download-line"></i>
                                                Download
                                            </button>
                                        </td>
                                    </tr>
                                </tfoot>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="8">Tidak ada data kartu studi</td>
                                    </tr>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="hasil-studi" class="page-section">
                <div class="dashboard__container">
                    <div class="dashboard-section">
                        <h3><i class="ri-draft-line"></i> Hasil Studi</h3>
                        <div class="semester-info">
                            <p>Semester <?= $semester_now; ?></p>
                        </div>
                        <div class="table-container">
                            <table class="academic-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode MK</th>
                                        <th>Nama Matakuliah</th>
                                        <th>B/U</th>
                                        <th>SKS</th>
                                        <th>Nilai</th>
                                        <th>AK</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($result_hasil_studi->num_rows > 0): ?>
                                    <?php $no = 1;
                                    while ($row = $result_hasil_studi->fetch_assoc()) { 
                                        $nilai_konversi = konversi_nilai($row['nilai']);
                                        $ak = $nilai_konversi * $row['sks_a']; // Menghitung AK
                                        $total_ak += $ak;
                                        $total_sks += $row['sks_a'];
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['kode_matakuliah']; ?></td>
                                            <td><?php echo $row['nama_matakuliah']; ?></td>
                                            <td><?php echo $row['status_kelas']; ?></td>
                                            <td><?php echo $row['sks_a']; ?></td>
                                            <td class="nilai nilai-<?php echo strtolower($row['nilai']); ?>"><?php echo $row['nilai']; ?></td>
                                            <td><?php echo $ak; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4"><strong>Total</strong></td>
                                        <td><?php echo $total_sks; ?></td>
                                        <td></td>
                                        <td><?php echo $total_ak; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6"><strong>IP Semester</strong></td>
                                        <td><?php echo $total_sks ? number_format($total_ak / $total_sks, 2) : 0; ?></td>
                                    </tr>
                                </tfoot>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7">Tidak ada data hasil studi</td>
                                    </tr>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>            
            <div id="jadwal-kuliah" class="page-section">
                <div class="dashboard__container">
                    <div class="dashboard-section">
                        <h3><i class="ri-calendar-todo-fill"></i> Jadwal Kuliah</h3>
                        <div class="semester-info">
                            <p>Semester <?= $semester_now; ?></p>
                        </div>
                        <div class="table-container">
                            <table class="academic-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Matakuliah</th>
                                        <th>Dosen</th>
                                        <th>Jadwal</th>
                                        <th>Kehadiran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($result_jadwal_kuliah->num_rows > 0): ?>
                                    <?php
                                    $no = 1;
                                    $total_kehadiran = 0;
                                    $total_absensi = 0;
                                    while ($row = $result_jadwal_kuliah->fetch_assoc()) {
                                        $total_kehadiran += $row['absensi'];
                                        $total_absensi += 14;
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['kode_matakuliah'] ?></td>
                                        <td><?= $row['nama_matakuliah'] ?></td>
                                        <td>
                                            <div class="mk-info">
                                                <p><i class="ri-user-line"></i><?= $row['nama_dosen'] ?></p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mk-info">
                                                <p><i class="ri-building-line"></i><?= $row['ruangan'] ?></p>
                                                <p><i class="ri-time-line"></i><?= $row['hari_waktu'] ?></p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="kehadiran">
                                                <span><?= $row['absensi'] ?>/14</span>
                                                <div class="kehadiran-progress">
                                                    <div class="kehadiran-bar" style="width: <?= ($row['absensi'] / 14) * 100 ?>%"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <form action="../logic/user_presensi.php" method="POST">
                                                <input type="hidden" name="id_kuliah" value="<?= $row['id_kuliah'] ?>">
                                                <input type="hidden" name="absensi" value="<?= $row['absensi'] + 1 ?>">
                                                <button type="submit" class="action-btn presence-btn">
                                                    <i class="ri-user-follow-line"></i> Presensi 
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="7">Tidak ada data jadwal</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="transkrip" class="page-section">
                <div class="dashboard__container">
                    <div class="dashboard-section">
                        <h3><i class="ri-file-paper-2-line"></i> Transkrip Nilai</h3>
                        <div class="table-container">
                            <table class="academic-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode MK</th>
                                        <th>Nama Matakuliah</th>
                                        <th>B/U</th>
                                        <th>SKS</th>
                                        <th>Nilai</th>
                                        <th>AK</th>
                                        <th>Tahun Ambil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($result_jadwal_kuliah->num_rows > 0): ?>
                                    <?php
                                    $no = 1;
                                    $total_sks = 0;
                                    $total_ak = 0;

                                    while ($row = $result_transkrip->fetch_assoc()) {
                                        $nilai = $row['nilai'];
                                        $sks_a = $row['sks_a'];

                                        $ak = konversi_nilai($nilai) * $sks_a;
                                        $total_sks += $sks_a;
                                        $total_ak += $ak;
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['kode_matakuliah']; ?></td>
                                            <td><?php echo $row['nama_matakuliah']; ?></td>
                                            <td><?php echo $row['status_kelas']; ?></td>
                                            <td><?php echo $row['sks_a']; ?></td>
                                            <td><?php echo $row['nilai']; ?></td>
                                            <td><?php echo $ak; ?></td>
                                            <td><?php echo $row['semester']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-right"><strong>Total SKS</strong></td>
                                        <td><?php echo $total_sks; ?></td>
                                        <td></td>
                                        <td><?php echo $total_ak; ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="text-right"><strong>IPK</strong></td>
                                        <td><?php echo ($total_sks > 0) ? number_format($total_ak / $total_sks, 2) : 0; ?></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="10">Tidak ada data Transkrip</td>
                                    </tr>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>         
            <div id="registrasi-matakuliah" class="page-section">
                <div class="dashboard__container">
                    <div class="dashboard-section">
                        <h3><i class="ri-file-list-line"></i> Registrasi Matakuliah</h3>
                        <div class="semester-info">
                            <p>Semester <?= $semester_now; ?></p>
                        </div>
                        <div class="table-container">
                            <table class="academic-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Matakuliah</th>
                                        <th>SKS A</th>
                                        <th>SKS B</th>
                                        <th>Keterangan</th>
                                        <th>kapasitas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    while ($row = $result_registrasi_matakuliah->fetch_assoc()) {
                                        $id_kelas = $row['id_kelas'];
                                        $kapasitas = $row['kapasitas'];
                                        $max_kapasitas = 40;
                                        $status = ($kapasitas >= $max_kapasitas) ? 'Penuh' : 'Tersedia';
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['kode_matakuliah'] ?></td>
                                        <td><?= $row['nama_matakuliah'] ?></td>
                                        <td><?= $row['sks_a'] ?></td>
                                        <td><?= $row['sks_b'] ?></td>
                                        <td>
                                            <div class="mk-info">
                                                <p><i class="ri-user-line"></i><?= $row['nama_dosen'] ?></p>
                                                <p><i class="ri-building-line"></i><?= $row['ruangan'] ?></p>
                                                <p><i class="ri-time-line"></i><?= $row['hari_waktu'] ?></p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="kehadiran">
                                                <span><?= $kapasitas ?>/<?= $max_kapasitas ?></span>
                                                <div class="kehadiran-progress">
                                                    <div class="kehadiran-bar" style="width: <?= ($kapasitas / $max_kapasitas) * 100 ?>%"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php if ($status == 'Tersedia') { ?>
                                                <form action="../logic/user_ambil_matakuliah.php" method="POST">
                                                    <input type="hidden" name="id_kelas" value="<?= $id_kelas ?>">
                                                    <button type="submit" class="action-btn presence-btn">
                                                        <i class="ri-user-follow-line"></i>
                                                        Ambil
                                                    </button>
                                                </form>
                                            <?php } else { ?>
                                                <button class="action-btn delete-btn" disabled>
                                                    <i class="ri-lock-line"></i>
                                                    Kelas Penuh
                                                </button>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>   
            <div id="tagihan" class="page-section">
                <div class="dashboard__container">
                    <div class="dashboard-section">
                        <h3><i class="ri-money-dollar-circle-fill"></i>Tagihan Mahasiswa</h3>
                        <div class="semester-info">
                            <p>Semester <?= $semester_now; ?></p>
                        </div>
                        <div class="table-container">
                            <table class="academic-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Item</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>SPP/BPP</td>
                                        <td>Rp 1.500.000</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>SKS (18 SKS × Rp 250.000)</td>
                                        <td>Rp 4.500.000</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Layanan Kemahasiswaan</td>
                                        <td>Rp 334.000</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Denda</td>
                                        <td>Rp 0</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">Total Tagihan</td>
                                        <td>Rp 6.334.000</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Terbayar</td>
                                        <td>Rp 4.500.000</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Sisa Pembayaran</td>
                                        <td>Rp 1.834.000</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-info">
                            <div class="due-date">
                                <i class="ri-calendar-event-line"></i>
                                <span>Jatuh Tempo: 31 Januari 2024</span>
                            </div>
                            <button class="action-btn download-btn">
                                <i class="ri-download-line"></i>
                                Download Tagihan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="keaktifan" class="page-section">
                <div class="dashboard__container">
                    <div class="dashboard-section">
                        <h3><i class="ri-check-double-fill"></i>Keaktifan Mahasiswa</h3>
                        <div class="activity-category">
                            <div class="category-header">
                                <h4>Professional Skill</h4>
                                <div class="point-progress">
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 30%"></div>
                                    </div>
                                    <span>30/100 poin</span>
                                </div>
                            </div>
                            <div class="activity-list">
                                <div class="activity-item">
                                    <div class="activity-info">
                                        <h5>Peserta Workshop : Digital Portfolio</h5>
                                        <p>7 Juni 2024</p>
                                    </div>
                                    <div class="activity-points">30 poin</div>
                                </div>
                            </div>
                        </div>
                        <div class="activity-category">
                            <div class="category-header">
                                <h4>Humanistic Skill</h4>
                                <div class="point-progress">
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 100%"></div>
                                    </div>
                                    <span>180/100 poin</span>
                                </div>
                            </div>
                            <div class="activity-list">
                                <div class="activity-item">
                                    <div class="activity-info">
                                        <h5>Fasilitator Orientasi Mahasiswa Baru 2023</h5>
                                        <p>14-18 Agustus 2023</p>
                                    </div>
                                    <div class="activity-points">40 poin</div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-info">
                                        <h5>Panitia FTI DAYS 2023</h5>
                                        <p>15-16 & 18 September 2023</p>
                                    </div>
                                    <div class="activity-points">40 poin</div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-info">
                                        <h5>Ketua Panitia Creative Podcast Competition</h5>
                                        <p>6,8 & 10 Mei 2024</p>
                                    </div>
                                    <div class="activity-points">60 poin</div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-info">
                                        <h5>Fasilitator Latihan Dasar Kepemimpinan 2024</h5>
                                        <p>5-6 & 8-10 Juli 2024</p>
                                    </div>
                                    <div class="activity-points">40 poin</div>
                                </div>
                            </div>
                        </div>
                        <div class="activity-category">
                            <div class="category-header">
                                <h4>Wawasan Almamater</h4>
                                <div class="point-progress">
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 100%"></div>
                                    </div>
                                    <span>120/100 poin</span>
                                </div>
                            </div>
                            <div class="activity-list">
                                <div class="activity-item">
                                    <div class="activity-info">
                                        <h5>Peserta Orientasi Mahasiswa Baru 2022</h5>
                                        <p>15-24 September 2022</p>
                                    </div>
                                    <div class="activity-points">40 poin</div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-info">
                                        <h5>Peserta FTI DAYS 2022</h5>
                                        <p>21-23 September 2022</p>
                                    </div>
                                    <div class="activity-points">40 poin</div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-info">
                                        <h5>Peserta Latihan Dasar Kepemimpinan 2023</h5>
                                        <p>14-15 & 17-18 Juli 2023</p>
                                    </div>
                                    <div class="activity-points">40 poin</div>
                                </div>
                            </div>
                        </div>
                        <div class="activity-category">
                            <div class="category-header">
                                <h4>Penunjang Umum</h4>
                                <div class="point-progress">
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 0%"></div>
                                    </div>
                                    <span>0/100 poin</span>
                                </div>
                            </div>
                            <div class="activity-list">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="peminjaman-buku" class="page-section">
                <div class="dashboard__container">
                    <div class="dashboard-section">
                        <h3><i class="ri-book-fill"></i>Peminjaman Buku</h3>
                        <div class="table-container">
                            <table class="academic-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Buku</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Status</th>
                                        <th>Denda</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Algoritma dan Pemrograman</td>
                                        <td>10 Jan 2024</td>
                                        <td>24 Jan 2024</td>
                                        <td><span class="status-returned">Dikembalikan</span></td>
                                        <td>Rp 0</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Database System Concepts</td>
                                        <td>15 Jan 2024</td>
                                        <td>29 Jan 2024</td>
                                        <td><span class="status-borrowed">Dipinjam</span></td>
                                        <td>Rp 0</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Software Engineering</td>
                                        <td>1 Jan 2024</td>
                                        <td>15 Jan 2024</td>
                                        <td><span class="status-late">Terlambat</span></td>
                                        <td>Rp 30.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="loan-info">
                            <div class="info-item">
                                <i class="ri-information-line"></i>
                                <span>Durasi peminjaman maksimal: 14 hari</span>
                            </div>
                            <div class="info-item">
                                <i class="ri-money-dollar-circle-line"></i>
                                <span>Denda keterlambatan: Rp 2.000/hari</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="comingsoon" class="page-section">
                <div class="dashboard__container">
                    <div class="dashboard-section">
                        <div class="coming-soon">
                            <i class="ri-time-line"></i>
                            <h2>Coming Soon</h2>
                            <p>Fitur ini sedang dalam pengembangan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="../src/js/index.js"></script>
</body>
</html>