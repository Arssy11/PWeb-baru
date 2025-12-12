<?php
require_once 'koneksi.php'; // pastikan koneksi.php mendefinisikan $conn, $myNIM, $myNama

// Hanya terima POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: tambahDataMhs.php');
    exit;
}

// ambil dan trim nilai
$nim = isset($_POST['nim']) ? trim($_POST['nim']) : '';
$nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
$tempatLahir = isset($_POST['tempatLahir']) ? trim($_POST['tempatLahir']) : '';
$tanggalLahir = isset($_POST['tanggalLahir']) ? trim($_POST['tanggalLahir']) : '';
$alamat = isset($_POST['alamat']) ? trim($_POST['alamat']) : '';
$kota = isset($_POST['kota']) ? trim($_POST['kota']) : '';
$jenisKelamin = isset($_POST['jenisKelamin']) ? trim($_POST['jenisKelamin']) : '';
$noHP = isset($_POST['noHP']) ? trim($_POST['noHP']) : '';

// umur: jika kosong set null, else cast ke int
$umur = (isset($_POST['umur']) && $_POST['umur'] !== '') ? (int) $_POST['umur'] : null;

// status: dari select (mis. "Kawin" atau "Belum Kawin")
$status = isset($_POST['status']) ? trim($_POST['status']) : '';

// hobi: checkbox array -> gabungkan ke string, contoh "Membaca, Memasak"
$hobi = "";
if (isset($_POST['hobi']) && is_array($_POST['hobi'])) {
    // bersihkan tiap item lalu gabungkan
    $cleanHobi = array_map(function($h) {
        return trim($h);
    }, $_POST['hobi']);
    // hapus nilai kosong bila ada
    $cleanHobi = array_filter($cleanHobi, function($v) { return $v !== ''; });
    $hobi = implode(", ", $cleanHobi);
}

// validasi sederhana
$errors = [];
if ($nim === '') $errors[] = "NIM harus diisi.";
if ($nama === '') $errors[] = "Nama harus diisi.";
if ($tempatLahir === '') $errors[] = "Tempat lahir harus diisi.";
if ($tanggalLahir === '') $errors[] = "Tanggal lahir harus diisi.";
if ($status === '') $errors[] = "Status harus dipilih (Kawin / Belum Kawin).";

if (!empty($errors)) {
    echo "<h3>Terjadi kesalahan:</h3><ul>";
    foreach ($errors as $e) {
        echo "<li>" . htmlspecialchars($e) . "</li>";
    }
    echo "</ul><p><a href='tambahDataMhs.php'>Kembali</a></p>";
    exit;
}

// prepare insert
$sql = "INSERT INTO mahasiswa
  (nim, nama, tempatLahir, tanggalLahir, alamat, kota, jenisKelamin, noHP, umur, status, hobi)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . htmlspecialchars($conn->error));
}

/*
 Binding types:
  s = string
  i = integer
  d = double
  b = blob

 Urutan kolom:
 nim(s), nama(s), tempatLahir(s), tanggalLahir(s),
 alamat(s), kota(s), jenisKelamin(s), noHP(s),
 umur(i), status(s), hobi(s)
*/
$bindTypes = "ssssssssiss";

// Jika $umur === null, beberapa versi mysqli akan menginsert NULL jika variabel bernilai NULL.
// Pastikan $umur variabel ada (boleh null).
// Bind parameters
$stmt->bind_param(
    $bindTypes,
    $nim,
    $nama,
    $tempatLahir,
    $tanggalLahir,
    $alamat,
    $kota,
    $jenisKelamin,
    $noHP,
    $umur,   // integer atau null
    $status,
    $hobi
);

// eksekusi
$exec = $stmt->execute();
if ($exec) {
    // sukses -> redirect ke tampilan data
    header('Location: tampilDataMhs.php?msg=success');
    exit;
} else {
    // tampilkan error kalau gagal
    echo "<h3>Gagal menyimpan data:</h3>";
    echo "<p>" . htmlspecialchars($stmt->error) . "</p>";
    echo "<p><a href='tambahDataMhs.php'>Kembali</a></p>";
}

$stmt->close();
$conn->close();
?>
