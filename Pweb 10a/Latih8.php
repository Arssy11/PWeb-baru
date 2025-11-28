<?php
// latih8.php
$nim  = "23.xx.x.xxx";
$nama = "Nama Lengkap";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Latihan 8 - Form POST</title>
</head>
<body>

<h2>Latihan 8 - Form Metode POST</h2>

<form method="POST" action="">
    Nama Mahasiswa : <input type="text" name="nama_mhs"><br><br>
    Kelas          : <input type="text" name="kelas"><br><br>
    <input type="submit" value="Kirim">
</form>

<hr>

<?php
if (!empty($_POST['nama_mhs'])) {
    echo "<h3>Data yang diterima:</h3>";
    echo "<p>Nama Mahasiswa : " . $_POST['nama_mhs'] . "</p>";
    echo "<p>Kelas          : " . $_POST['kelas'] . "</p>";
}
?>

<hr>
<p>NIM : <?php echo $nim; ?></p>
<p>Nama : <?php echo $nama; ?></p>

</body>
</html>
