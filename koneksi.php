<?php 
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'bioskop';

$koneksi = mysqli_connect($hostname, $username, $password, $database);

if($koneksi->connect_error){
    die('Koneksi Gagal');
}
?>