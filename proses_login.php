<?php

session_start();
require "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$role     = $_POST['role'];

$stmt = mysqli_prepare(
    $koneksi,
    "SELECT * FROM users
     WHERE username = ?
     AND role = ?"
);

mysqli_stmt_bind_param(
    $stmt,
    "ss",
    $username,
    $role
);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$user = mysqli_fetch_assoc($result);

if ($user && password_verify($password, $user['password'])) {

    $_SESSION['login'] = true;
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['nama'] = $user['nama'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['siswa_id'] = $user['siswa_id'];

    header("Location: dashboard.php");
    exit;

} else {

    echo "Username, password, atau role salah.";
}
?>