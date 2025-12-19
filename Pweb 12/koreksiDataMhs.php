<?php
require "koneksi.php";

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM mhs WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

$hobi_db = explode(',', $row['hobi']);
$daftar_hobi = ["Membaca","Olahraga","Musik","Traveling"];
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Data Mahasiswa</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">
<div class="card shadow">
<div class="card-header bg-warning">
<h5 class="mb-0">Edit Data Mahasiswa</h5>
</div>

<div class="card-body">
<form action="simpanKoreksiDataMhs.php" method="POST">

<input type="hidden" name="id" value="<?= $row['id'] ?>">

<div class="row mb-2">
<div class="col-md-6">
<label>NIM</label>
<input type="text" name="nim" class="form-control" value="<?= $row['nim'] ?>">
</div>
<div class="col-md-6">
<label>Nama</label>
<input type="text" name="nama" class="form-control" value="<?= $row['nama'] ?>">
</div>
</div>

<div class="row mb-2">
<div class="col-md-6">
<label>Tempat Lahir</label>
<input type="text" name="tempatLahir" class="form-control" value="<?= $row['tempatLahir'] ?>">
</div>
<div class="col-md-6">
<label>Tanggal Lahir</label>
<input type="date" name="tanggalLahir" class="form-control" value="<?= $row['tanggalLahir'] ?>">
</div>
</div>

<div class="row mb-2">
<div class="col-md-4">
<label>Jumlah Saudara</label>
<input type="number" name="jmlSaudara" class="form-control" value="<?= $row['jmlSaudara'] ?>">
</div>
<div class="col-md-4">
<label>Kota</label>
<select name="kota" class="form-select">
<?php foreach(["Semarang","Solo","Kudus","Demak"] as $k): ?>
<option value="<?= $k ?>" <?= ($row['kota']==$k)?'selected':'' ?>>
<?= $k ?>
</option>
<?php endforeach; ?>
</select>
</div>
<div class="col-md-4">
<label>Jenis Kelamin</label><br>
<input type="radio" name="jenisKelamin" value="Pria" <?= ($row['jenisKelamin']=="Pria")?'checked':'' ?>> Pria
<input type="radio" name="jenisKelamin" value="Wanita" <?= ($row['jenisKelamin']=="Wanita")?'checked':'' ?>> Wanita
</div>
</div>

<div class="mb-2">
<label>Status</label><br>
<input type="radio" name="statusKeluarga" value="Belum Menikah" <?= ($row['statusKeluarga']=="Belum Menikah")?'checked':'' ?>> Belum Menikah
<input type="radio" name="statusKeluarga" value="Menikah" <?= ($row['statusKeluarga']=="Menikah")?'checked':'' ?>> Menikah
</div>

<div class="mb-2">
<label>Hobi</label><br>
<?php foreach($daftar_hobi as $h): ?>
<input type="checkbox" name="hobi[]" value="<?= $h ?>"
<?= in_array($h,$hobi_db)?'checked':'' ?>> <?= $h ?>
<?php endforeach; ?>
</div>

<div class="mb-2">
<label>Alamat</label>
<textarea name="alamat" class="form-control"><?= $row['alamat'] ?></textarea>
</div>

<div class="mb-2">
<label>Email</label>
<input type="email" name="email" class="form-control" value="<?= $row['email'] ?>">
</div>

<div class="text-end">
<button class="btn btn-warning">Update</button>
<a href="tampilDataMhs.php" class="btn btn-secondary">Batal</a>
</div>

</form>
</div>
</div>
</div>

</body>
</html>
