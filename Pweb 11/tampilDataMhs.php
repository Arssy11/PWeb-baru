<?php
require_once 'koneksi.php';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Daftar Mahasiswa</title>
  <style>
    body{font-family: Arial, sans-serif; margin:20px;}
    table{border-collapse:collapse; width:100%;}
    th, td{border:1px solid #ccc; padding:6px; text-align:left;}
    th{background:#f0f0f0;}
    .top {margin-bottom:12px;}
    .msg {color: green;}
  </style>
</head>
<body>
  <h2>Daftar Mahasiswa</h2>
  <p><strong>Identitas:</strong> <?php echo htmlspecialchars($myNIM); ?> - <?php echo htmlspecialchars($myNama); ?></p>

  <div class="top">
    <a href="tambahDataMhs.php">+ Tambah Data Mahasiswa</a>
  </div>

<?php
if (isset($_GET['msg']) && $_GET['msg'] === 'success') {
    echo "<p class='msg'>Data berhasil disimpan.</p>";
}

// ambil data
$sql = "SELECT * FROM mahasiswa ORDER BY id DESC";
$res = $conn->query($sql);
if (!$res) {
    echo "<p>Terjadi kesalahan: " . htmlspecialchars($conn->error) . "</p>";
    exit;
}

if ($res->num_rows === 0) {
    echo "<p>Tidak ada data mahasiswa.</p>";
} else {
    echo "<table>";
    echo "<tr>
      <th>#</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>Tempat Lahir</th>
      <th>Tanggal Lahir</th>
      <th>Alamat</th>
      <th>Kota</th>
      <th>JK</th>
      <th>No HP</th>
      <th>Umur</th>
      <th>Status</th>
      <th>Hobi</th>
    </tr>";
    $i = 1;
    while ($row = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $i++ . "</td>";
        echo "<td>" . htmlspecialchars($row['nim']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
        echo "<td>" . htmlspecialchars($row['tempatLahir']) . "</td>";
        echo "<td>" . htmlspecialchars($row['tanggalLahir']) . "</td>";
        echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
        echo "<td>" . htmlspecialchars($row['kota']) . "</td>";
        echo "<td>" . htmlspecialchars($row['jenisKelamin']) . "</td>";
        echo "<td>" . htmlspecialchars($row['noHP']) . "</td>";
        echo "<td>" . htmlspecialchars($row['umur']) . "</td>";
        echo "<td>" . htmlspecialchars($row['status']) . "</td>";
        echo "<td>" . htmlspecialchars($row['hobi']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
$conn->close();
?>
</body>
</html>
