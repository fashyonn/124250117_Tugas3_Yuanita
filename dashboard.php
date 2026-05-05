<?php
$daftarFilm = [
    [
        "img" => "image/GOAT.jpg",
        "judul" => "Goat",
        "genre" => "Animasi / Komedi / Keluarga / Olahraga",
        "durasi" => "± 100",
        "jadwal" => "Tayang puku 14.30 WIB",
        "sinopsis" => 'Kisah Will, seekor kambing kecil dengan mimpi besar menjadi pemain
                        profesional "roarball" — olahraga penuh aksi di dunia binatang antropomorfik —
                        yang harus membuktikan dirinya di tengah rintangan dan penolakan.',
        "harga" => "Rp 80.000"
    ],
    [
        "img" => "image/Sore.jpg",
        "judul" => "Sore: Istri dari Masa Depan",
        "genre" => "Romantis / Drama / Fantasi",
        "durasi" => "± 105",
        "jadwal" => "Tayang pukul 19.00 WIB",
        "sinopsis" => "Seorang wanita misterius datang dari masa depan dan mengaku                        sebagai istri seorang pria yang hidupnya berantakan. Ia berusaha mengubah takdir
                        dengan memperbaiki kebiasaan dan pilihan hidup sang pria sebelum semuanya
                        terlambat.",
        "harga" => "Rp 65.000"
    ],
    [
        "img" => "image/FNF.jpg",
        "judul" => "Five Night at Freddy's 2",
        "genre" => "Horor / Thriller",
        "durasi" => "± 110",
        "jadwal" => "Tayang pukul 21.00 WIB",
        "sinopsis" => "Teror animatronik kembali menghantui penjaga malam dengan
                        misteri yang lebih gelap dan mematikan. Sekuel ini menghadirkan ketegangan lebih
                        intens dari film pertamanya.",
        "harga" => "Rp 70.000"
    ],
    [
        "img" => "image/Jumbo.jpg",
        "judul" => "Jumbo",
        "genre" => "Animasi / Keluarga / Petualangan",
        "durasi" => "± 102",
        "jadwal" => "Tayang pukul 11.00 WIB",
        "sinopsis" => "Don, anak bertubuh besar yang sering diremehkan, ingin
                        membuktikan kemampuannya melalui pertunjukan bakat. Film ini menyuguhkan cerita
                        hangat tentang kepercayaan diri dan persahabatan.",
        "harga" => "Rp 60.000"
    ],
    [
        "img" => "image/R&C.jpg",
        "judul" => "Rangga & Cinta",
        "genre" => "Romantis / Musikal / Remaja",
        "durasi" => "± 119",
        "jadwal" => "Tayang pukul 15.45 WIB",
        "sinopsis" => "Versi musikal dari kisah cinta legendaris remaja SMA yang penuh
                        puisi dan konflik perasaan. Nostalgia dipadukan dengan arasemen musik modern.",
        "harga" => "Rp 70.000"
    ]
]
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
                <a class="navbar-brand float-end text-white fw-semibold" href="#">
                    <i class="d-inline-block align-text-top bi bi-person-circle"></i>
                    Yuanita
                </a>
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

                    <?php
                    for ($i = 0; $i < count($daftarFilm); $i++): ?>
                        <div class="col-md-6 mb-4">
                            <div class="box row g-0 border border-secondary rounded overflow-hidden">
                                <div class="col-5">
                                    <img src=<?= $daftarFilm[$i]["img"] ?> alt="">
                                </div>
                                <div class="col-7">
                                    <div class="movie-info">
                                        <h2><?= $daftarFilm[$i]["judul"] ?></h2>
                                        <div class="genre"><?= $daftarFilm[$i]["genre"] ?></div>
                                        <div class="duration"><?= $daftarFilm[$i]["durasi"] ?></div>
                                        <div class="schedule"><?= $daftarFilm[$i]["jadwal"] ?></div>
                                        <p class="synopsis"><?= $daftarFilm[$i]["sinopsis"] ?></p>
                                        <div class="price"><?= $daftarFilm[$i]["harga"] ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>

                    <a href="formPesan.php"><button class="btn-dash">Pesan Sekarang</button></a>

                </div>
            </div>
        </div>
    </div>
</body>

</html>