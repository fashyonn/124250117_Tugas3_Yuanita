<?php
session_start();
$pesanan = $_SESSION['data'];
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
            <a class="navbar-brand float-end text-white fw-semibold" href="#">
                <i class="d-inline-block align-text-top bi bi-person-circle"></i>
                Yuanita
            </a>
        </div>
    </nav>

    <div class="card mt-5 border-0">
        <div class="card-header text-white fw-semibold fs-3" style="background-color: #8E1616; width: 70rem;">
            Invoice Pemesanan Tiket
        </div>
        <div class="card-body" style="background-color: #3A2A2A;">
            <table class="table">
                <tbody>
                    <?php foreach ($pesanan as $label => $isi): ?>
                        <?php
                        if ($label == 'Total Bayar')
                            continue;
                        ?>
                        <tr>
                            <td><?php echo ($label); ?></td>
                            <td><?php echo $isi; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr class="table-danger">
                        <th>Total Bayar</th>
                        <th><?php echo "Rp" . number_format($pesanan['Total Bayar'], 0, ',', '.'); ?></th>
                    </tr>
                </tbody>
            </table>
            <a href="formPesan.php" class="btn btn-primary mt-0">Pesan Lagi</a>
        </div>
    </div>
</body>

</html>