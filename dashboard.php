<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['username'];

$id = mysqli_query($koneksi, "SELECT * FROM pemesan");

if($id){
    $last_id = mysqli_insert_id($koneksi);
}

$query = mysqli_query($koneksi, "SELECT * FROM daftarfilm");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

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
    <div class="dash">
        <nav class="navbar" style="background-color: #8E1616;">
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
        <div class="header">
            <h1>NIKMATI</h1>
            <h1><span>FILM</span></h1>
            <h1>FAVORITMU</h1>
            <h5>Di balik layar yang menyala, selalu ada kisah yang siap menginspirasi, menghibur, dan menggetarkan hati.
                Melalui layanan ini, kami menghadirkan kemudahan bagi Anda untuk memesan tiket dan menjadi bagian dari
                setiap momen tak terlupakan di bioskop.</h5>
            <hr class="border border-secondary border-1 opacity-50">

            <div class="title">Now Playing</div>

            <div class="container">
                <div class="row">

                    <?php while ($data = mysqli_fetch_array($query)) { ?>
                        <div class="col-md-6 mb-4">
                            <div class="box row g-0 border border-secondary rounded overflow-hidden h-100">
                                <div class="col-5">
                                    <img src="image/<?= $data["img"] ?>" alt="">
                                </div>
                                <div class="col-7">
                                    <div class="movie-info">
                                        <h2><?= $data["judul"] ?></h2>
                                        <div class="genre"><?= $data["genre"] ?></div>
                                        <div class="duration">± <?= $data["durasi"] ?></div>
                                        <div class="schedule">Tayang Pukul <?= $data["jadwal"] ?> WIB</div>
                                        <p class="synopsis"><?= $data["sinopsis"] ?></p>
                                        <div class="price">Rp<?= number_format($data["harga"], 0, ',', '.'); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <a href="formPesan.php"><button class="btn-dash">Pesan Sekarang</button></a>

                </div>
            </div>
        </div>
    </div>
</body>

</html>