<?php
session_start();
require __DIR__ . '/koneksi.php';

$registrationError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username      = trim($_POST['username'] ?? '');
    $password      = $_POST['password'] ?? '';
    $nama          = trim($_POST['nama'] ?? '');
    $jenisKelamin  = $_POST['jenis_kelamin'] ?? '';
    $provinsiId    = trim($_POST['provinsi_id'] ?? '');
    $provinsiNama  = trim($_POST['provinsi_nama'] ?? '');
    $kabupatenId   = trim($_POST['kabupaten_id'] ?? '');
    $kabupatenNama = trim($_POST['kabupaten_nama'] ?? '');
    $kecamatanId   = trim($_POST['kecamatan_id'] ?? '');
    $kecamatanNama = trim($_POST['kecamatan_nama'] ?? '');
    $kelurahanId   = trim($_POST['kelurahan_id'] ?? '');
    $kelurahanNama = trim($_POST['kelurahan_nama'] ?? '');

    if (
        $username === '' || $password === '' || $nama === '' ||
        !in_array($jenisKelamin, ['Laki-laki', 'Perempuan'], true) ||
        $provinsiId === '' || $provinsiNama === '' ||
        $kabupatenId === '' || $kabupatenNama === '' ||
        $kecamatanId === '' || $kecamatanNama === '' ||
        $kelurahanId === '' || $kelurahanNama === ''
    ) {
        $registrationError = 'Lengkapi semua data, termasuk pilihan wilayah.';
    } else {
        // 1. Cek password dengan password pendaftaran di database
        $cek = mysqli_query($koneksi, 'SELECT password_khusus FROM kunci_admin WHERE id = 1');
        $kunci = $cek ? mysqli_fetch_assoc($cek) : null;

        $diizinkan = $kunci && hash_equals($kunci['password_khusus'], hash('sha256', $password));

        if (!$diizinkan) {
            $registrationError = 'Anda tidak boleh mendaftar.';
        } else {
            // 2. Simpan sebagai admin (role ditulis di server, bukan dari form)
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $statement = mysqli_prepare(
                $koneksi,
                "INSERT INTO login (
                    username, nama, password, jenis_kelamin,
                    provinsi_id, provinsi_nama, kabupaten_id, kabupaten_nama,
                    kecamatan_id, kecamatan_nama, kelurahan_id, kelurahan_nama, role
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'admin')"
            );

            if ($statement) {
                mysqli_stmt_bind_param(
                    $statement,
                    'ssssssssssss',
                    $username, $nama, $passwordHash, $jenisKelamin,
                    $provinsiId, $provinsiNama, $kabupatenId, $kabupatenNama,
                    $kecamatanId, $kecamatanNama, $kelurahanId, $kelurahanNama
                );

                if (mysqli_stmt_execute($statement)) {
                    mysqli_stmt_close($statement);
                    echo '<script>alert("Registrasi berhasil! Silakan login."); window.location.href="login.php";</script>';
                    exit;
                }

                if (mysqli_stmt_errno($statement) === 1062) {
                    $registrationError = 'Username sudah dipakai. Gunakan username lain.';
                } else {
                    error_log('Registrasi gagal: ' . mysqli_stmt_error($statement));
                    $registrationError = 'Registrasi gagal. Coba lagi.';
                }
                mysqli_stmt_close($statement);
            } else {
                error_log('Gagal menyiapkan registrasi: ' . mysqli_error($koneksi));
                $registrationError = 'Registrasi gagal. Coba lagi.';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
     <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <section class="register-section">
        <div class="register-box">
            <form method="post">
                <h2>Register</h2>
                <div class="input-box-register">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="nama" placeholder=" " required>
                    <label>Nama Lengkap</label>
                </div>
                <div class="input-box-register">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="text" name="username" placeholder=" " required>
                    <label>Username</label>
                </div>
                <div class="input-box-register">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" placeholder=" " required>
                    <label>Password</label>
                </div>
                <div class="input-box-register">
                    <span class="label">Jenis Kelamin</span>
                    <label class="radio">
                    <input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
                    </label>
                    <label class="radio">
                    <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                    </label>
                </div>
                <div class="input-box-register">
                    <label for="provinsi">Provinsi</label>
                    <select id="provinsi" required>
                    <option value="">-- Pilih Provinsi --</option>
                    </select>
                </div>
                <div class="input-box-register">
                    <label for="kabupaten">Kabupaten/Kota</label>
                    <select id="kabupaten" required disabled>
                    <option value="">-- Pilih Kabupaten/Kota --</option>
                    </select>
                </div>
                <div class="input-box-register">
                    <label for="kecamatan">Kecamatan</label>
                    <select id="kecamatan" required disabled>
                    <option value="">-- Pilih Kecamatan --</option>
                    </select>
                </div>
                <div class="input-box-register">
                    <label for="kelurahan">Kelurahan</label>
                    <select id="kelurahan" required disabled>
                    <option value="">-- Pilih Kelurahan --</option>
                    </select>
                </div>
                <input type="hidden" name="provinsi_id"   id="provinsi_id">
                <input type="hidden" name="provinsi_nama" id="provinsi_nama">
                <input type="hidden" name="kabupaten_id"   id="kabupaten_id">
                <input type="hidden" name="kabupaten_nama" id="kabupaten_nama">
                <input type="hidden" name="kecamatan_id"   id="kecamatan_id">
                <input type="hidden" name="kecamatan_nama" id="kecamatan_nama">
                <input type="hidden" name="kelurahan_id"   id="kelurahan_id">
                <input type="hidden" name="kelurahan_nama" id="kelurahan_nama">
                <button type="submit">Daftar</button>
                <p id="registration-error"><?php echo htmlspecialchars($registrationError, ENT_QUOTES, 'UTF-8'); ?></p>
                <p id="error"></p>
            </form>
        </div>
    </section>
    <script src="API_SET.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@8.0.13/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@8.0.13/dist/ionicons/ionicons.js"></script>
</body>
</html>