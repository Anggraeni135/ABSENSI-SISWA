<?php
session_start();

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Absensi</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #eef3f8;
        }

        .login-box {
            width: 380px;
            margin: 70px auto;
            padding: 30px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,.15);
            text-align: center;
        }

        .logo {
            width: 100px;
            height: 100px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        input, select, button {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            box-sizing: border-box;
            border-radius: 7px;
            border: 1px solid #ccc;
        }

        button {
            background: #1976d2;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background: #125ca3;
        }

        .kartu {
            background: #198754;
        }
    </style>
</head>

<body>

<div class="login-box">

    <img src="foto sekolah.png" class="logo">

    <h2>ABSENSI SISWA</h2>
    <p>Silakan Login</p>

    <form action="proses_login.php" method="POST">

        <input type="text"
               name="username"
               placeholder="Nama / Username"
               required>

        <input type="password"
               name="password"
               placeholder="Password"
               required>

        <select name="role" required>
            <option value="">-- Pilih Login --</option>
            <option value="siswa">Siswa</option>
            <option value="orang_tua">Orang Tua</option>
            <option value="wali_kelas">Wali Kelas</option>
        </select>

        <button type="submit">
            LOGIN
        </button>

    </form>

    <hr>

    <h3>Login dengan Kartu</h3>

    <form action="scan_kartu.php" method="POST">

        <input type="text"
               name="uid_kartu"
               id="uid_kartu"
               placeholder="Tempelkan Kartu OSIS / Kartu Pelajar"
               autofocus
               required>

        <button type="submit" class="kartu">
            SCAN KARTU
        </button>

    </form>

</div>

</body>
</html>