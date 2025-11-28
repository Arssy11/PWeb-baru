<!DOCTYPE html>
<html>
<head>
    <title>Form Mahasiswa - POST</title>
</head>
<body>

<h2>Form Input Data Mahasiswa (POST)</h2>

<form method="POST" action="">
    NIM : <input type="text" name="nim"><br><br>
    Nama : <input type="text" name="nama"><br><br>
    Alamat : <input type="text" name="alamat"><br><br>

    No HP : <input type="text" name="hp"><br><br>
    Umur : <input type="number" name="umur"><br><br>

    Status : 
    <input type="radio" name="status" value="Kawin">Kawin
    <input type="radio" name="status" value="Belum Kawin">Belum Kawin
    <br><br>

    Hobi : 
    <input type="checkbox" name="hobi[]" value="Membaca">Membaca
    <input type="checkbox" name="hobi[]" value="Olah Raga">Olah Raga
    <input type="checkbox" name="hobi[]" value="Musik">Musik
    <input type="checkbox" name="hobi[]" value="Traveling">Traveling
    <br><br>

    <input type="submit" value="Kirim">
</form>

<hr>

<?php
if (!empty($_POST['nim'])) {
    echo "<h3>Data yang dikirim :</h3>";
    echo "NIM : " . $_POST['nim'] . "<br>";
    echo "Nama : " . $_POST['nama'] . "<br>";
    echo "Alamat : " . $_POST['alamat'] . "<br>";
    echo "No HP : " . $_POST['hp'] . "<br>";
    echo "Umur : " . $_POST['umur'] . "<br>";
    echo "Status : " . $_POST['status'] . "<br>";

    if (!empty($_POST['hobi'])) {
        echo "Hobi : " . implode(", ", $_POST['hobi']) . "<br>";
    }
}
?>

</body>
</html>
