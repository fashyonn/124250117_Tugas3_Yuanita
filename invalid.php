<?php
session_start();
require 'koneksi.php';

$user = $_POST["username"];
$password = $_POST["password"];
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE user = '$user'");
$data = mysqli_fetch_array($query);
$kondisi = false;

if ($data) {
    if ($password == $data['password']) {
        echo "<script>window.location.href = 'dashboard.php';</script>";
        exit();
    } else {
        function pass()
        {
            echo "Password salah!";
            $kondisi = true;
        }
    }
} else {
    function reg()
    {
        echo "Anda belum Registrasi!";
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
            <?php if (!$kondisi) { ?>
                <h5 class="card-title text-center"><?= pass() ?></h5>
                <p class="card-text">Password yang Anda masukan salah! Silahkan coba login ulang kembali!</p>
                <a href="login.php" class="btn btn-primary mt-0">Login ulang</a>
            <?php } else { ?>
                <h5 class="card-title text-center"><?= reg() ?></h5>
                <p class="card-text">Anda belum memiliki akun! Silahkan melakukan registrasi terlebih dahulu!</p>
                <a href="registrasi.php" class="btn btn-primary mt-0">Registrasi</a>
            <?php } ?>
        </div>
    </div>
</body>

</html>