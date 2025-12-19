<?php
require "koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM mhs ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Mahasiswa</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
<h3>Data Mahasiswa</h3>
<a href="tambahDataMhs.php" class="btn btn-primary mb-2">+ Tambah</a>

<div class="table-responsive">
<table class="table table-bordered table-striped">
<tr class="table-dark">
<th>No</th>
<th>NIM</th>
<th>Nama</th>
<th>Tempat Lahir</th>
<th>Tgl Lahir</th>
<th>Alamat</th>
<th>Kota</th>
<th>Email</th>
<th>Aksi</th>
</tr>

<?php $no=1; while($r=mysqli_fetch_assoc($data)): ?>
<tr>
<td><?= $no++ ?></td>
<td><?= $r['nim'] ?></td>
<td><?= $r['nama'] ?></td>
<td><?= $r['tempatLahir'] ?></td>
<td><?= $r['tanggalLahir'] ?></td>
<td><?= $r['alamat'] ?></td>
<td><?= $r['kota'] ?></td>
<td><?= $r['email'] ?></td>
<td>
<a href="koreksiDataMhs.php?id=<?= $r['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
<a href="hapusDataMhs.php?id=<?= $r['id'] ?>"
   onclick="return confirm('Hapus data?')"
   class="btn btn-danger btn-sm">Hapus</a>
</td>
</tr>
<?php endwhile; ?>
</table>
</div>
</div>

</body>
</html>
