<?php
// latih5.php
$nim  = "23.xx.x.xxx";
$nama = "Nama Lengkap";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Latihan 5 - Perulangan For</title>
</head>
<body>

<h2>Latihan 5 - Perulangan For</h2>

<?php
for ($i = 1; $i <= 10; $i++) {
    echo "Perulangan ke-$i <br>";
}

echo "<hr>";
echo "<p>NIM : $nim</p>";
echo "<p>Nama : $nama</p>";
?>

</body>
</html>
