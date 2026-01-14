<?php
include 'koneksi.php';

$id     = $_POST['id_motor'];
$merk   = $_POST['merk_motor'];
$tipe   = $_POST['tipe_motor'];
$plat   = $_POST['plat_nomor'];
$harga  = $_POST['harga_sewa'];
$status = $_POST['status_motor'];

if($_FILES['gambar_motor']['name'] != ""){
    $gambar = $_FILES['gambar_motor']['name'];
    $tmp    = $_FILES['gambar_motor']['tmp_name'];
    move_uploaded_file($tmp, "gambar/".$gambar);

    $query = "UPDATE motor SET
        merk_motor='$merk',
        tipe_motor='$tipe',
        plat_nomor='$plat',
        harga_sewa='$harga',
        status_motor='$status',
        gambar_motor='$gambar'
        WHERE id_motor='$id'";
}else{
    $query = "UPDATE motor SET
        merk_motor='$merk',
        tipe_motor='$tipe',
        plat_nomor='$plat',
        harga_sewa='$harga',
        status_motor='$status'
        WHERE id_motor='$id'";
}

mysqli_query($conn, $query);
header("location:index.php");
?>
