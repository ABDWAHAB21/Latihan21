<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../koneksi/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="dashbord.css">
</head>
<body>
    <h1>Selamat datang, <?= htmlspecialchars($_SESSION['admin_nama']) ?></h1>
    <a href="../koneksi/logout.php">Logout</a>
</body>
</html>