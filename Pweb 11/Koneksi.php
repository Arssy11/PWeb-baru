<?php
// koneksi.php
// Ganti credential DB sesuai environment Anda
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'universitas');

$myNIM = 'NIM_Anda';    // <-- Ganti dengan NIM Anda
$myNama = 'Nama_Anda';  // <-- Ganti dengan Nama Anda

// buat koneksi
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
?>
