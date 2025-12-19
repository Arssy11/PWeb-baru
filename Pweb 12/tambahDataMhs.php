<!DOCTYPE html>
<html>
<head>
<title>Tambah Mahasiswa</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
<h3>Tambah Data Mahasiswa</h3>

<form action="simpanDataMhs.php" method="POST">

<div class="mb-2">
<label>NIM</label>
<input type="text" name="nim" class="form-control" required>
</div>

<div class="mb-2">
<label>Nama</label>
<input type="text" name="nama" class="form-control" required>
</div>

<div class="mb-2">
<label>Tempat Lahir</label>
<input type="text" name="tempatLahir" class="form-control">
</div>

<div class="mb-2">
<label>Tanggal Lahir</label>
<input type="date" name="tanggalLahir" class="form-control">
</div>

<div class="mb-2">
<label>Jumlah Saudara</label>
<input type="number" name="jmlSaudara" class="form-control">
</div>

<div class="mb-2">
<label>Alamat</label>
<textarea name="alamat" class="form-control"></textarea>
</div>

<div class="mb-2">
<label>Kota</label>
<select name="kota" class="form-select">
<option>Semarang</option>
<option>Solo</option>
<option>Kudus</option>
</select>
</div>

<div class="mb-2">
<label>Jenis Kelamin</label><br>
<input type="radio" name="jenisKelamin" value="Pria"> Pria
<input type="radio" name="jenisKelamin" value="Wanita"> Wanita
</div>

<div class="mb-2">
<label>Status</label><br>
<input type="radio" name="statusKeluarga" value="Belum Menikah"> Belum Menikah
<input type="radio" name="statusKeluarga" value="Menikah"> Menikah
</div>

<div class="mb-2">
<label>Hobi</label><br>
<input type="checkbox" name="hobi[]" value="Membaca"> Membaca
<input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga
<input type="checkbox" name="hobi[]" value="Musik"> Musik
</div>

<div class="mb-2">
<label>Email</label>
<input type="email" name="email" class="form-control">
</div>

<button class="btn btn-success mt-3">Simpan</button>
<a href="tampilDataMhs.php" class="btn btn-secondary mt-3">Kembali</a>

</form>
</div>

</body>
</html>
