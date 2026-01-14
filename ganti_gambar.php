<?php
include 'koneksi.php';

$id = $_POST['id_motor'];

$gambar = $_FILES['gambar_motor']['name'];
$tmp    = $_FILES['gambar_motor']['tmp_name'];

// kasih nama unik
$gambar_baru = time().'_'.$gambar;

// upload ke folder
move_uploaded_file($tmp, "gambar_motor/".$gambar_baru);

// update database
mysqli_query($conn, "UPDATE motor SET gambar_motor='$gambar_baru' WHERE id_motor='$id'");

// kembali ke index
header("location:index.php");
?>
$allowed = ['jpg','jpeg','png'];
$ext = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));

if(!in_array($ext, $allowed)){
    die("Format gambar harus JPG atau PNG");
}
