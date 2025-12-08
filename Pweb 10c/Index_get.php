<!DOCTYPE html>
<html>
<head>
    <title>Form Mahasiswa - GET</title>
</head>
<body>

<h2>Form Input Data Mahasiswa (GET)</h2>

<form method="GET" action="">
    NIM : <input type="text" name="nim"><br><br>
    Nama : <input type="text" name="nama"><br><br>
    Alamat : <input type="text" name="alamat"><br><br>
    <input type="submit" value="Kirim">
</form>

<hr>

<?php
if (!empty($_GET['nim'])) {
    echo "<h3>Data yang dikirim :</h3>";
    echo "NIM : " . $_GET['nim'] . "<br>";
    echo "Nama : " . $_GET['nama'] . "<br>";
    echo "Alamat : " . $_GET['alamat'] . "<br>";
}
?>

</body>
</html>
