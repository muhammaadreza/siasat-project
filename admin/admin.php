<?php
require_once '../logic/admin_logic.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
    <link rel="stylesheet" href="../src/css/admin.css">
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
                    <img src="../src/img/admin.png" alt="image">
                </div>
                <div class="sidebar__info">
                    <h3>Admin</h3>
                    <span>Administrator</span>
                </div>
            </div>
            <div class="sidebar__content">
                <div>
                    <h3 class="sidebar__title">AKADEMIK</h3>
                    <div class="sidebar__list">
                        <a href="#" class="sidebar__link" data-page="dosen">
                            <i class="ri-file-paper-2-line"></i>
                            <span>Dosen</span>
                        </a>
                        <a href="#" class="sidebar__link" data-page="mahasiswa">
                            <i class="ri-file-list-line"></i>
                            <span>Mahasiswa</span>
                        </a>
                        <a href="#" class="sidebar__link active-link" data-page="matakuliah">
                            <i class="ri-calendar-todo-fill"></i>
                            <span>Matakuliah</span>
                        </a>
                        <a href="#" class="sidebar__link" data-page="kelas">
                            <i class="ri-draft-line"></i>
                            <span>Kelas</span>
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
            <div id="matakuliah" class="page-section active">
                <div class="dashboard__container">
                    <div class="dashboard-section">
                        <h3><i class="ri-file-list-line"></i> Matakuliah</h3>
                        <button class="action-btn download-btn" id="addMatakuliahBtn">
                            <i class="ri-add-line"></i> Tambah Matakuliah
                        </button>

                        <div class="table-container">
                            <table class="academic-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Matakuliah</th>
                                        <th>SKS A</th>
                                        <th>SKS B</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($result_matakuliah->num_rows > 0): ?>
                                    <?php 
                                    $no = 1;
                                    while ($row = $result_matakuliah->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['kode_matakuliah'] ?></td>
                                        <td><?= $row['nama_matakuliah'] ?></td>
                                        <td><?= $row['sks_a'] ?></td>
                                        <td><?= $row['sks_b'] ?></td>
                                        <td>
                                            <button type="button" class="action-btn ks-btn"">
                                                <i class="ri-edit-line"></i> Edit
                                            </button>
                                            <form action="../logic/admin_hapus_matakuliah.php" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                <input type="hidden" name="kode_matakuliah" value="<?= $row['kode_matakuliah'] ?>">
                                                <button type="submit" class="action-btn delete-btn">
                                                    <i class="ri-delete-bin-line"></i>
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php else: ?>
                                    <tr>
                                        <td colspan="8">Tidak ada data kelas</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="add-matakuliah" class="page-section">
                <div class="dashboard__container">
                    <div class="dashboard-section">
                        <h3><i class="ri-book-open-line"></i> Tambah Matakuliah</h3>
                        <form action="../logic/admin_tambah_matakuliah.php" method="POST" class="form-container">
                            <div class="form-group">
                                <label for="kode_matakuliah">Kode Matakuliah</label>
                                <input type="text" name="kode_matakuliah" id="kode_matakuliah" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_matakuliah">Nama Matakuliah</label>
                                <input type="text" name="nama_matakuliah" id="nama_matakuliah" required>
                            </div>
                            <div class="form-group">
                                <label for="sks_a">SKS A</label>
                                <input type="number" name="sks_a" id="sks_a" min="1" max="6" required>
                            </div>
                            <div class="form-group">
                                <label for="sks_b">SKS B</label>
                                <input type="number" name="sks_b" id="sks_b" min="1" max="6" required>
                            </div>
                            <button type="submit" name="submit_matakuliah" class="action-btn download-btn">
                                <i class="ri-save-2-line"></i> Simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div id="edit-matakuliah" class="page-section">
                <div class="dashboard__container">
                    <div class="dashboard-section">
                        <h3><i class="ri-book-open-line"></i> Edit Matakuliah</h3>

                        <form action="../logic/admin_edit_matakuliah.php" method="POST" class="form-container">
                            <input type="hidden" name="kode_matakuliah" id="kode_matakuliah">
                            <div class="form-group">
                                <label for="nama_matakuliah">Nama Matakuliah</label>
                                <input type="text" name="nama_matakuliah" id="nama_matakuliah" required>
                            </div>

                            <div class="form-group">
                                <label for="sks_a">SKS A</label>
                                <input type="number" name="sks_a" id="sks_a" required>
                            </div>

                            <div class="form-group">
                                <label for="sks_b">SKS B</label>
                                <input type="number" name="sks_b" id="sks_b" required>
                            </div>
                            <button type="submit" name="submit_edit_matakuliah" class="action-btn">
                                <i class="ri-save-2-line"></i> Simpan Perubahan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div id="kelas" class="page-section">
                <div class="dashboard__container">
                    <div class="dashboard-section">
                        <h3><i class="ri-file-list-line"></i> Kelas</h3>

                        <button class="action-btn download-btn" id="addKelasBtn">
                            <i class="ri-add-line"></i> Tambah Kelas
                        </button>

                        <div class="table-container">
                            <table class="academic-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Matakuliah</th>
                                        <th>Keterangan</th>
                                        <th>Kapasitas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($result_kelas->num_rows > 0): ?>
                                    <?php 
                                    $no = 1;
                                    while ($row = $result_kelas->fetch_assoc()) {
                                        $id_kelas = $row['id_kelas'];
                                        $kapasitas = $row['kapasitas'];
                                        $max_kapasitas = 40;
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['kode_matakuliah'] ?></td>
                                        <td><?= $row['nama_matakuliah'] ?></td>
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
                                            <button type="button" class="action-btn presence-btn" id_kelas="<?= $row['id_kelas'] ?>"
                                                    kode_matakuliah="<?= $row['kode_matakuliah'] ?>"
                                                    kode_dosen="<?= $row['kode_dosen'] ?>"
                                                    hari_waktu="<?= $row['hari_waktu'] ?>"
                                                    ruangan="<?= $row['ruangan'] ?>">
                                                <i class="ri-edit-line"></i> Edit
                                            </button>

                                            <form action="../logic/admin_hapus_kelas.php" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                <input type="hidden" name="id_kelas" value="<?= $row['id_kelas'] ?>">
                                                <button type="submit" class="action-btn delete-btn">
                                                    <i class="ri-delete-bin-line"></i>
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php else: ?>
                                    <tr>
                                        <td colspan="8">Tidak ada data kelas</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="add-kelas" class="page-section">
                <div class="dashboard__container">
                    <div class="dashboard-section">
                        <h3><i class="ri-building-line"></i> Tambah Kelas</h3>
                        <form action="../logic/admin_tambah_kelas.php" method="POST" class="form-container">

                            <div class="form-group">
                                <label for="kode_matakuliah">Matakuliah</label>
                                <select name="kode_matakuliah" id="kode_matakuliah" required>
                                    <option value=""></option>
                                    <?php foreach ($result_matakuliah as $mk): ?>
                                    <option value="<?= $mk['kode_matakuliah'] ?>"><?= $mk['nama_matakuliah'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="kode_dosen">Dosen</label>
                                <select name="kode_dosen" id="kode_dosen" required>
                                    <option value=""></option>
                                    <?php foreach ($result_dosen as $dosen): ?>
                                    <option value="<?= $dosen['kode_dosen'] ?>"><?= $dosen['nama_dosen'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="hari_waktu">Hari & Waktu</label>
                                <input type="text" name="hari_waktu" id="hari_waktu" required>
                            </div>

                            <div class="form-group">
                                <label for="ruangan">Ruangan</label>
                                <input type="text" name="ruangan" id="ruangan" required>
                            </div>

                            <button type="submit" name="submit_kelas" class="action-btn download-btn">
                                <i class="ri-save-2-line"></i> Simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div id="edit-kelas" class="page-section">
                <div class="dashboard__container">
                    <div class="dashboard-section">
                        <h3><i class="ri-building-line"></i> Tambah Kelas</h3>
                        <form action="../logic/admin_edit_kelas.php" method="POST" class="form-container">
                            <input type="hidden" name="id_kelas" id="id_kelas">

                            <div class="form-group">
                                <label for="kode_matakuliah">Matakuliah</label>
                                <select name="kode_matakuliah" id="kode_matakuliah" required>
                                    <?php foreach ($result_matakuliah as $mk): ?>
                                    <option value="<?= $mk['kode_matakuliah'] ?>"><?= $mk['nama_matakuliah'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="kode_dosen">Dosen</label>
                                <select name="kode_dosen" id="kode_dosen" required>
                                    <?php foreach ($result_dosen as $dosen): ?>
                                    <option value="<?= $dosen['kode_dosen'] ?>"><?= $dosen['nama_dosen'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="hari_waktu">Hari & Waktu</label>
                                <input type="text" name="hari_waktu" id="hari_waktu" required>
                            </div>

                            <div class="form-group">
                                <label for="ruangan">Ruangan</label>
                                <input type="text" name="ruangan" id="ruangan" required>
                            </div>

                            <button type="submit" name="submit_kelas" class="action-btn download-btn">
                                <i class="ri-save-2-line"></i> Simpan
                            </button>
                        </form>
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
    <script src="../src/js/admin.js"></script>
</body>
</html>