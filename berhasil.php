<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userid  = $_SESSION['user_id'];
$user    = $_POST['namaPelanggan'];
$email   = $_POST['emailPelanggan'];
$film    = $_POST['film'];
$jumlah  = $_POST['tiket'];
$kursi   = $_POST['kursi'];
$payment = $_POST['mp'];


$add = "INSERT INTO pemesan (nama, UserID, email, FilmID, jumlah, kursi, pembayaran) 
        VALUES ('$user', '$userid', '$email', '$film', '$jumlah', '$kursi', '$payment')";

$query = mysqli_query($koneksi, $add);

if ($query) {
    $last_id = mysqli_insert_id($koneksi);
    unset($_SESSION['namaPelanggan']);
    unset($_SESSION['emailPelanggan']);
    unset($_SESSION['film']);
    unset($_SESSION['tiket']);
    unset($_SESSION['kursi']);
    unset($_SESSION['mp']);
} else {
    header("Location: formPesan.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Behasil Hore!!</title>

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
            <h5 class="card-title text-center">Pemesanan Tiket Berhasil</h5>
            <p class="card-text">Tiket selanjutnya akan dikirim melalui email. Cek email secara berkala!</p>
            <a href="invoice.php?id=<?= $last_id ?>" class="btn btn-primary mt-0">Detail Pemesanan</a>
        </div>
    </div>
</body>

</html>