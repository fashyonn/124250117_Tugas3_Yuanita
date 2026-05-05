<?php
require 'koneksi.php';

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

if (mysqli_query($koneksi, $sql)) {
    header('location: login.php');
    exit;
} else {
    header("Location: registrasi.php");
}
?>