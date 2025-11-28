<?php
// latih4.php
$nim  = "23.xx.x.xxx";
$nama = "Nama Lengkap";

$nilai = 87;
$grade = "";

if ($nilai >= 85) {
    $grade = "A";
} elseif ($nilai >= 70) {
    $grade = "B";
} elseif ($nilai >= 60) {
    $grade = "C";
} elseif ($nilai >= 50) {
    $grade = "D";
} else {
    $grade = "E";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Latihan 4 - Grade Nilai</title>
</head>
<body>

<h2>Latihan 4 - Grade Nilai</h2>

<?php
echo "<p>Nilai : $nilai</p>";
echo "<p>Grade : $grade</p>";
echo "<hr>";
echo "<p>NIM : $nim</p>";
echo "<p>Nama : $nama</p>";
?>

</body>
</html>
