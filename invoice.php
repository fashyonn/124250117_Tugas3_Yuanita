<?php
session_start();
require 'koneksi.php';

$userid = $_SESSION['user_id'];
$user = $_SESSION['username'];
$id_pesanan = $_GET['id'];

if (isset($_POST['id_pesanan'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $film = $_POST['judul'];
    $jumlah = $_POST['jumlah'];
    $kursi = $_POST['kursi'];

    $sql_update = "UPDATE pemesan
        SET
        nama = '$nama',
        email = '$email',
        FilmID = '$film',
        jumlah = '$jumlah',
        kursi = '$kursi'
        WHERE PesanID = $id_pesanan";

    $update_query = mysqli_query($koneksi, $sql_update);
    if ($update_query) {
        header("Location: invoice.php?id=$id_upd&status=updated");
        exit();
    } else {
        die("Gagal update data: " . mysqli_error($koneksi));
    }
}
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_target = mysqli_real_escape_string($koneksi, $id_pesanan);
    $kondisi = "p.PesanID = '$id_target' AND p.UserID = '$userid'";
} else {
    $kondisi = "p.UserID = '$userid' ORDER BY p.PesanID DESC LIMIT 1";
}

$sql = "SELECT p.*, d.judul, d.harga 
        FROM pemesan p
        JOIN daftarfilm d ON p.FilmID = d.FilmID 
        WHERE $kondisi";

$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='dashboard.php';</script>";
    exit();
}

$total = $data['harga'] * $data['jumlah'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>

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
    <nav class="navbar fixed-top" style="background-color: #8E1616;">
        <div class="container-fluid">
            <a class="navbar-brand text-white fw-semibold" href="dashboard.php">Movie</a>

            <div class="dropdown">
                <a class="navbar-brand float-end text-white fw-semibold dropdown-toggle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="d-inline-block align-text-top bi bi-person-circle"></i>
                    <?= $user ?>
                </a>

                <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                    <li>
                        <a class="dropdown-item" href="invoice.php">
                            <i class="bi bi-ticket-perforated me-2"></i>Tiket yang Dipesan
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item text-danger" href="logout.php">
                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="card mb-4 border-0 mx-auto" style="margin-top: 80px !important;">
        <div class="card-header text-white fw-semibold fs-3" style="background-color: #8E1616; width: 70rem;">
            Invoice Pemesanan Tiket
        </div>
        <div class="card-body" style="background-color: #3A2A2A;">
            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            Nama</td>

                        <td><?= $data['nama'] ?></td>
                    </tr>
                    <tr>
                        <td>
                            Email</td>

                        <td><?= $data['email'] ?></td>
                    </tr>
                    <tr>
                        <td>
                            Film</td>

                        <td><?= $data['judul'] ?></td>
                    </tr>
                    <tr>
                        <td>
                            Jumlah Tiket</td>

                        <td><?= $data['jumlah'] ?></td>
                    </tr>
                    <tr>
                        <td>
                            Kursi</td>

                        <td><?= $data['kursi'] ?></td>
                    </tr>
                    <tr>
                        <td>
                            Metode Pembayaran</td>

                        <td><?= $data['pembayaran'] ?></td>
                    </tr>
                    <tr>
                        <td>Ha
                            rga per tiket</td>

                        <td>Rp<?= number_format($data['harga'], 0, ',', '.'); ?></td>
                    </tr>
                    <tr class="table-danger">
                        <th>To
                            tal Bayar</th>

                        <th>Rp<?= number_format($total, 0, ',', '.'); ?></th>
                    </tr>
                </tbody>
            </table>

            <a href="delete.php?id=<?= $data['PesanID'] ?>" class="fw-normal btn btn-dash float-end">Batalkan Pesanan</a>
            <a href="edit.php?id=<?= $data['PesanID'] ?>" class="fw-normal btn btn-dash float-end me-2">Edit Pesanan</a>

            <a href="formPesan.php" class="btn btn-primary mt-3">Pesan Lagi</a>
        </div>
    </div>
</body>

</html>