<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gagal Login</title>
</head>

<body>
    <?php
        if ($_POST["username"] == "yuanita" && $_POST["password"] == "124250117") {
            echo "<script>window.location.href = 'dashboard.php';</script>";
            exit();
        } else {
            echo "<h1>Anda tidak valid!</h1>";
        }
    ?>
</body>

</html>