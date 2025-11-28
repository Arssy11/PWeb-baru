<?php
// latih7.php
$nim  = "23.xx.x.xxx";
$nama = "Nama Lengkap";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Latihan 7 - Form GET</title>
</head>
<body>

<h2>Latihan 7 - Form Metode GET</h2>

<form method="GET" action="">
    Nama Barang : <input type="text" name="barang"><br><br>
    Harga       : <input type="number" name="harga"><br><br>
    <input type="submit" value="Kirim">
</form>

<hr>

<?php
if (!empty($_GET['barang'])) {
    echo "<h3>Data yang diterima:</h3>";
    echo "<p>Nama Barang : " . $_GET['barang'] . "</p>";
    echo "<p>Harga       : " . $_GET['harga'] . "</p>";
}
?>

<hr>
<p>NIM : <?php echo $nim; ?></p>
<p>Nama : <?php echo $nama; ?></p>

</body>
</html>
