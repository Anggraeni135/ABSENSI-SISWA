<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Absensi</title>
</head>

<body>

<h1>Dashboard Absensi</h1>

<h2>
    Selamat datang,
    <?= htmlspecialchars($_SESSION['nama']) ?>
</h2>

<p>
    Login sebagai:
    <?= htmlspecialchars($_SESSION['role']) ?>
</p>

<?php if ($_SESSION['role'] == 'siswa'): ?>

    <a href="index.php">Absensi</a>

<?php elseif ($_SESSION['role'] == 'orang_tua'): ?>

    <a href="orang_tua.php">
        Data Kehadiran Anak
    </a>

<?php elseif ($_SESSION['role'] == 'wali_kelas'): ?>

    <a href="wali_kelas.php">
        Data Kehadiran Siswa
    </a>

<?php endif; ?>

<br><br>

<a href="logout.php">Logout</a>

</body>
</html>