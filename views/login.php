<?php
require_once '../logic/login_logic.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
    <link rel="stylesheet" href="../src/css/login.css">
    <title>Login - Sistem Informasi Akademik Satya Wacana</title>
</head>

<body class="login-page">
    <div class="login-container">
        <div class="login-header">
            <img src="../src/img/logo.png" alt="UKSW Logo">
            <h2>SIASAT UKSW</h2>
            <p>Sistem Informasi Akademik Satya Wacana</p>
        </div>

        <?php if(isset($error)): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" action="" class="login-form">
            <div class="form-group">
                <label for="nim">Nomor Induk Mahasiswa</label>
                <div class="input-container">
                    <i class="ri-user-3-line"></i>
                    <input type="text" id="nim" name="nim" placeholder="Masukkan NIM anda" required>
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-container">
                    <i class="ri-lock-2-line"></i>
                    <input type="password" id="password" name="password" placeholder="Masukkan password anda" required>
                    <button type="button" class="toggle-password .toggle-password-btn" aria-label="Show password">
                        <i class="ri-eye-line" id="passwordToggleIcon"></i>
                    </button>
                </div>
            </div>
            <button type="submit" class="login-btn" onclick="window.location.href='index.html'">Login</button>
            <a href="#" class="forgot-password">Lupa Password?</a>
        </form>
    </div>
    <script src="../src/js/login.js"></script>
</body>

</html>