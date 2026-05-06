<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id = mysqli_query($koneksi, "SELECT * FROM pemesan");

if ($id) {
    $last_id = mysqli_insert_id($koneksi);
}

$id_pesanan = $_GET['id'];
$user = $_SESSION['username'];

$sql = "SELECT p.*, d.judul
        FROM pemesan p
        JOIN daftarfilm d ON p.FilmID = d.FilmID 
        WHERE p.PesanID = '$id_pesanan'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tiket</title>

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
                        <a class="dropdown-item" href="invoice.php?id=<?= $last_id ?>">
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
            Edit Pesanan Tiket
        </div>
        <form action="invoice.php?id=<?= $id_pesanan ?>" method="post">
            <input type="hidden" name="id_pesanan" value="<?= $id_pesanan ?>">
            <div class="card-body" style="background-color: #3A2A2A;">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                <label for="nama">Nama</label>
                            </td>
                            <td>
                                <input type="text" class="edit form-control border-0 bg-transparent" id="nama"
                                    value="<?= $data['nama'] ?>" name="nama" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="email">Email</label>
                            </td>
                            <td>
                                <input type="text" class="edit form-control border-0 bg-transparent" id="email"
                                    value="<?= $data['email'] ?>" name="email" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="judul">Film</label>
                            </td>
                            <td>
                                <select class="form-select border-0 bg-transparent text-white" id="judul" name="judul" required>
                                    <option value="<?= $data['FilmID'] ?>" selected disabled><?= $data['judul'] ?></option>
                                    <option value="1">Goat</option>
                                    <option value="2">Sore: Istri dari Masa Depan</option>
                                    <option value="3">Five Night at Freddy's 2</option>
                                    <option value="4">Jumbo</option>
                                    <option value="5">Rangga & Cinta</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="jumlah">Jumlah Tiket</label>
                            </td>
                            <td>
                                <input type="number" class="edit form-control border-0 bg-transparent" id="jumlah"
                                    value="<?= $data['jumlah'] ?>" name="jumlah" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="kursi">Kursi</label>
                            </td>
                            <td>
                                <input type="text" class="edit form-control border-0 bg-transparent" id="kursi"
                                    value="<?= $data['kursi'] ?>" name="kursi" required>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <button type="submit" class="btn-pesan mb-2">Simpan perubahan</button>
            </div>
        </form>
    </div>
</body>

</html>