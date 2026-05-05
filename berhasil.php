<?php
$hargaTiket = $_POST['film'];
switch ($hargaTiket) {
    case "Goat":
        $hargaTiket = "Rp80.000";
        $harga = 80000;
        break;

    case "Sore":
        $hargaTiket = "Rp65.000";
        $harga = 65000;
        break;

    case "Five Night at Freddy's 2":
        $hargaTiket = "Rp70.000";
        $harga = 70000;
        break;

    case "Jumbo":
        $hargaTiket = "Rp60.000";
        $harga = 60000;
        break;

    case "Rangga & Cinta":
        $hargaTiket = "Rp70.000";
        $harga = 70000;
        break;
}

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $totalBayar = $harga * $_POST['tiket'];

    $_SESSION['data'] = [
        'Nama' => $_POST['namaPelanggan'],
        'Email' => $_POST['emailPelanggan'],
        'Film' => $_POST['film'],
        'Jumlah Tiket' => $_POST['tiket'],
        'Kursi' => $_POST['kursi'],
        'Metode Pembayaran' => $_POST['mp'],
        'Harga per tiket' => $hargaTiket,
        'Total Bayar' => $totalBayar
    ];
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
            <a href="invoice.php" class="btn btn-primary mt-0">Detail Pemesanan</a>
        </div>
    </div>
</body>

</html>