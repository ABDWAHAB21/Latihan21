<?php
session_start();
require __DIR__ . '/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    if(isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $query = mysqli_query($koneksi, "SELECT * FROM login WHERE username='$username' AND password='$password'");
        if(mysqli_num_rows($query) > 0) {
            $data = mysqli_fetch_array($query);
            $_SESSION['login'] = $data;
            echo '<script>alert("Login berhasil! ' .$data['username'].'"); location.href="index.php";</script>';
        } else {
            echo '<script>alert("Username atau password salah.");</script>';
        }
    }

    
    ?>


    <section class="login-section">
        <div class="login-box">
            <form method="post" action="">
                <h2>Login</h2>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="text" name="username" placeholder="" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" placeholder="" required>>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox"> Remember me</label>
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit">Login</button>
                <div class="register-link">
                    <p>Don't have an account? <a href="register.php">Register</a></p>
                </div>
                <p id="error"></p>
            </form>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@8.0.13/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@8.0.13/dist/ionicons/ionicons.js"></script>

    <script src="login.js"></script>
</body>
</html>