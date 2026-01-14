<?php
include 'koneksi.php';

$merk   = $_POST['merk_motor'];
$tipe   = $_POST['tipe_motor'];
$plat   = $_POST['plat_nomor'];
$harga  = $_POST['harga_sewa'];
$status = $_POST['status_motor'];

$gambar = $_FILES['gambar_motor']['name'];
$tmp    = $_FILES['gambar_motor']['tmp_name'];

move_uploaded_file($tmp, "gambar/" . $gambar);

$query = "INSERT INTO motor 
(merk_motor, tipe_motor, plat_nomor, harga_sewa, status_motor, gambar_motor)
VALUES
('$merk','$tipe','$plat','$harga','$status','$gambar')";

mysqli_query($conn, $query);

header("location:index.php");
?>
