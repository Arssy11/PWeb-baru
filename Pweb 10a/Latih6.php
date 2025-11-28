<?php
// latih6.php
$nim  = "23.xx.x.xxx";
$nama = "Nama Lengkap";

$hobi = ["Membaca", "Olahraga", "Musik", "Traveling"];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Latihan 6 - Array</title>
</head>
<body>

<h2>Latihan 6 - Array dan Foreach</h2>

<p>Daftar Hobi:</p>
<ul>
<?php
foreach ($hobi as $item) {
    echo "<li>$item</li>";
}
?>
</ul>

<hr>
<p>NIM : <?php echo $nim; ?></p>
<p>Nama : <?php echo $nama; ?></p>

</body>
</html>
