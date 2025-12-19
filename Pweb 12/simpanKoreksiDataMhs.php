<?php
require "koneksi.php";

$id = $_POST['id'];
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$tempat = $_POST['tempatLahir'];
$tgl = $_POST['tanggalLahir'];
$jml = $_POST['jmlSaudara'];
$alamat = $_POST['alamat'];
$kota = $_POST['kota'];
$jk = $_POST['jenisKelamin'];
$status = $_POST['statusKeluarga'];
$hobi = isset($_POST['hobi']) ? implode(',', $_POST['hobi']) : '';
$email = $_POST['email'];

$sql = "UPDATE mhs SET
nim=?, nama=?, tempatLahir=?, tanggalLahir=?, jmlSaudara=?,
alamat=?, kota=?, jenisKelamin=?, statusKeluarga=?, hobi=?, email=?
WHERE id=?";

$stmt = $koneksi->prepare($sql);
$stmt->bind_param(
 "ssssissssssi",
 $nim,$nama,$tempat,$tgl,$jml,
 $alamat,$kota,$jk,$status,$hobi,$email,$id
);
$stmt->execute();

header("Location: tampilDataMhs.php");
