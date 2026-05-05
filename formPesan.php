<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan</title>

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
            <a class="navbar-brand float-end text-white fw-semibold" href="#">
                <i class="d-inline-block align-text-top bi bi-person-circle"></i>
                Yuanita
            </a>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="pesan-container">
            <div class="title">
                <h1>Form Pemesanan</h1>
            </div>
            <form action="berhasil.php" method="post">
                <div class="row-pesan">
                    <div class="col-pesan col-md-6 mb-3">
                        <div class="form-input">
                            <label class="form-label" for="namaPelanggan">Nama :</label>
                            <input type="text" name="namaPelanggan" id="namaPelanggan" required>
                        </div>
                    </div>
                    <div class="col-pesan col-md-6 mb-3">
                        <div class="form-input">
                            <label class="form-label" for="emailPelanggan">Email :</label>
                            <input type="email" name="emailPelanggan" id="emailPelanggan" required>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="radio-box">
                        <p>Film yang ingin di pesan : </p>
                        <label class="radio-opsi">
                            <input type="radio" name="film" value="Goat" required>Goat
                        </label>
                        <label class="radio-opsi">
                            <input type="radio" name="film" value="Sore" required>Sore
                        </label>
                        <label class="radio-opsi">
                            <input type="radio" name="film" value="Five Night at Freddy's 2" required>Five Night at Freddy's 2
                        </label>
                        <label class="radio-opsi">
                            <input type="radio" name="film" value="Jumbo" required>Jumbo
                        </label>
                        <label class="radio-opsi">
                            <input type="radio" name="film" value="Rangga & Cinta" required>Rangga & Cinta
                        </label>
                    </div>
                </div>
                <div class="row-pesan">
                    <div class="col-pesan col-md-6 mb-3">
                        <div class="form-input">
                            <label class="form-label" for="jumlahTiket">Jumlah tiket :</label>
                            <input type="number" name="tiket" id="jumlahTiket" required>
                        </div>
                    </div>
                    <div class="col-pesan col-md-6 mb-3">
                        <div class="form-input">
                            <label class="form-label" for="pilihKursi">Pilih Kursi :</label>
                            <input type="text" name="kursi" id="pilihKursi" required>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="radio-box">
                        <p>Metode pembayaran :</p>
                        <div class="payment-row">
                            <label class="payment">
                                <input type="radio" name="mp" value="Cash" required> Cash
                            </label>
                            <label class="payment">
                                <input type="radio" name="mp" value="Qris" required> Qris
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class=" btn-pesan">Pesan</button>
                <button type="reset" class="btn-ulang">Muat Ulang</button>
            </form>
        </div>
    </div>
</body>
</html>