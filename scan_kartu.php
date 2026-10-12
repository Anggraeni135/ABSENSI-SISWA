<?php

session_start();
require "koneksi.php";

$uid = $_POST['uid_kartu'];

$stmt = mysqli_prepare(
    $koneksi,
    "SELECT * FROM users
     WHERE uid_kartu = ?
     LIMIT 1"
);

mysqli_stmt_bind_param($stmt, "s", $uid);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$user = mysqli_fetch_assoc($result);

if ($user) {

    $_SESSION['login'] = true;
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['nama'] = $user['nama'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['siswa_id'] = $user['siswa_id'];

    header("Location: dashboard.php");
    exit;

} else {

    echo "Kartu belum terdaftar.";
}
?>