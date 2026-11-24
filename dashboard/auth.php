<?php
// Penjaga halaman: dipakai oleh dashboard.php dan proses.php
require __DIR__ . '/../koneksi_unit.php';

// ===== SESUAIKAN DENGAN LOGIN ANDA =====
const SESSION_LOGIN = 'user_id';          // nama session dari login.php Anda
const URL_LOGIN     = '../login.php';
const URL_KELUAR    = '../logout.php';
const URL_BERANDA   = '../halaman-utama/index.php';
const WAJIB_ROLE    = 'admin';            // isi '' kalau belum memakai role
// =======================================

if (empty($_SESSION[SESSION_LOGIN])) {
    header('Location: ' . '../login.php');
    exit;
}
if (WAJIB_ROLE !== '' && ($_SESSION['role'] ?? '') !== WAJIB_ROLE) {
    http_response_code(403);
    exit('Akses ditolak. Halaman ini khusus admin.');
}
if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(16));
}