<?php
require_once 'koneksi.php'; // harus ada $conn, $myNIM, $myNama
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Tambah Data Mahasiswa</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body{font-family: Arial, sans-serif; margin:20px; max-width:900px;}
    label{display:block; margin-top:8px;}
    input[type=text], input[type=date], textarea, select {width:320px; padding:6px; box-sizing:border-box;}
    .row {margin-bottom:8px;}
    .inline {display:inline-block; margin-right:12px;}
    .actions {margin-top:12px;}
  </style>
</head>
<body>
  <h2>Tambah Data Mahasiswa</h2>

  <p><strong>Identitas:</strong>
    <?php echo isset($myNIM) ? htmlspecialchars($myNIM) : ''; ?>
    -
    <?php echo isset($myNama) ? htmlspecialchars($myNama) : ''; ?>
  </p>

  <p><a href="tampilDataMhs.php">Lihat Data Mahasiswa</a></p>

  <form action="simpanDataMhs.php" method="post">
    <div class="row">
      <label>NIM
        <input type="text" name="nim" required>
      </label>
    </div>

    <div class="row">
      <label>Nama
        <input type="text" name="nama" required>
      </label>
    </div>

    <div class="row">
      <label>Tempat Lahir
        <input type="text" name="tempatLahir" required>
      </label>
    </div>

    <div class="row">
      <label>Tanggal Lahir
        <input type="date" name="tanggalLahir" required>
      </label>
    </div>

    <div class="row">
      <label>Alamat
        <textarea name="alamat" rows="2"></textarea>
      </label>
    </div>

    <div class="row">
      <label>Kota
        <input type="text" name="kota">
      </label>
    </div>

    <div class="row">
      <label>Jenis Kelamin
        <select name="jenisKelamin" required>
          <option value="">-- Pilih Jenis Kelamin --</option>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </label>
    </div>

    <div class="row">
      <label>No. HP
        <input type="text" name="noHP">
      </label>
    </div>

    <div class="row">
      <label>Umur
        <input type="text" name="umur" placeholder="Isi angka (contoh: 21)">
      </label>
    </div>

    <div class="row">
      <label>Status</label>
      <select name="status" required>
        <option value="">-- Pilih Status --</option>
        <option value="Kawin">Kawin</option>
        <option value="Belum Kawin">Belum Kawin</option>
      </select>
    </div>

    <div class="row">
      <label>Hobi (pilih satu atau lebih):</label>
      <label class="inline"><input type="checkbox" name="hobi[]" value="Membaca"> Membaca</label>
      <label class="inline"><input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga</label>
      <label class="inline"><input type="checkbox" name="hobi[]" value="Memasak"> Memasak</label>
      <label class="inline"><input type="checkbox" name="hobi[]" value="Musik"> Musik</label>
      <label class="inline"><input type="checkbox" name="hobi[]" value="Menonton"> Menonton</label>
      <br>
      <small>Jika ingin menambahkan pilihan hobi lain, edit file dan tambahkan checkbox baru.</small>
    </div>

    <div class="actions">
      <button type="submit">Simpan Data</button>
      <button type="reset" style="margin-left:8px;">Reset</button>
    </div>
  </form>
</body>
</html>
