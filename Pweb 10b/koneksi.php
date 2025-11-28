<?php
$koneksi = mysqli_connect("localhost", "root", "", "universitas");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
