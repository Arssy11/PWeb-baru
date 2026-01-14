<?php
include 'koneksi.php';

$id     = $_POST['id_motor'];
$gambar = $_POST['gambar_motor'];

mysqli_query($conn, 
    "UPDATE motor SET gambar_motor='$gambar' WHERE id_motor='$id'"
);

header("location:index.php");
?>
