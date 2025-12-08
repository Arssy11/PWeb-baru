<?php
include "koneksi.php";

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$hp = $_POST['hp'];
$umur = $_POST['umur'];
$status = $_POST['status'];
$hobi = implode(", ", $_POST['hobi']);

$sql = "INSERT INTO mahasiswa VALUES('', '$nim', '$nama', '$alamat', '$hp', '$umur', '$status', '$hobi')";

if (mysqli_query($koneksi, $sql)) {
    echo "Data berhasil disimpan.<br>";
    echo "<a href='index_post.php'>Kembali</a>";
} else {
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
}
?>
