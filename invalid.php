<?php
session_start();
require 'koneksi.php';

$id = $_GET['id'];

if ($id == 1) {
    $user = $_POST["username"];
    $password = $_POST["password"];
    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$user'");
    $data = mysqli_fetch_array($query);
    $status = "";

    if ($data) {
        if ($password == $data['password']) {
            $_SESSION['user_id'] = $data['UserID'];
            $_SESSION['username'] = $data['username'];
            header('location: dashboard.php');
            exit();
        } else {
            $status = "password_salah";
        }
    } else {
        $status = "belum_registrasi";
    }
} else {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if (mysqli_query($koneksi, $sql)) {
        header('location: login.php');
        exit;
    } else {
        header("Location: registrasi.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gagal Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="card p-2 rounded-4" style="width: 30rem;">
        <div class="card-body">
            <?php if ($status == "password_salah"): ?>
                <h5 class="card-title text-center">Password Salah!</h5>
                <p class="card-text">Password yang Anda masukan salah! Silahkan coba login ulang kembali!</p>
                <a href="login.php" class="btn btn-primary mt-0">Login ulang</a>
            <?php elseif ($status == "belum_registrasi"): ?>
                <h5 class="card-title text-center">Anda Belum Registrasi!</h5>
                <p class="card-text">Anda belum memiliki akun! Silahkan melakukan registrasi terlebih dahulu!</p>
                <a href="registrasi.php" class="btn btn-primary mt-0">Registrasi</a>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>