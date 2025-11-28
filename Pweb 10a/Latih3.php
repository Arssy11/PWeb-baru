<?php
// latih3.php
$nim  = "23.xx.x.xxx";
$nama = "Nama Lengkap";

$nilai = 80;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Latihan 3 - IF Sederhana</title>
</head>
<body>

<h2>Latihan 3 - Kondisi IF</h2>

<?php
if ($nilai >= 75) {
    echo "<p>Status: Lulus</p>";
} else {
    echo "<p>Status: Tidak Lulus</p>";
}

echo "<hr>";
echo "<p>NIM : $nim</p>";
echo "<p>Nama : $nama</p>";
?>

</body>
</html>

<!-- 
Analisis Error (contoh penjelasan):

Misalkan pada program aslinya terjadi error seperti ini:
if (nilai >= 75) {
    echo "Lulus"
}

Penyebab error:
1. Variabel PHP wajib diawali tanda $ → harusnya $nilai, bukan nilai.
2. Setelah echo "Lulus" seharusnya ada tanda titik koma (;) → echo "Lulus";
3. Di dalam PHP, kondisi if harus ditulis dalam tag PHP, bukan di luar tag.

Solusi:
- Perbaiki menjadi: if ($nilai >= 75) { echo "Lulus"; }
-->
