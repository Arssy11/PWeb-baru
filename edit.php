<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM motor WHERE id_motor='$id'");
$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Motor</title>

<style>
body{
    font-family: Arial, sans-serif;
    background:#f4f6f8;
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
}

.card{
    background:#fff;
    width:420px;
    padding:25px;
    border-radius:10px;
    box-shadow:0 6px 15px rgba(0,0,0,0.1);
}

.card h2{
    text-align:center;
    margin-bottom:20px;
}

label{
    font-size:14px;
    font-weight:bold;
}

input, select{
    width:100%;
    padding:10px;
    margin-top:6px;
    margin-bottom:14px;
    border:1px solid #ccc;
    border-radius:6px;
    font-size:14px;
}

input[type=file]{
    padding:6px;
}

button{
    width:100%;
    padding:12px;
    background:#ffc107;
    color:#000;
    border:none;
    border-radius:6px;
    font-size:15px;
    cursor:pointer;
}

button:hover{
    background:#e0a800;
}

.back{
    text-align:center;
    margin-top:15px;
}

.back a{
    text-decoration:none;
    color:#0d6efd;
    font-size:14px;
}
.img-preview{
    text-align:center;
    margin-bottom:15px;
}

.img-preview img{
    width:120px;
    height:120px;
    object-fit:cover;
    border-radius:8px;
    border:1px solid #ddd;
}
</style>

</head>
<body>

<div class="card">
    <h2>Edit Data Motor</h2>

    <!-- PREVIEW GAMBAR SAAT INI -->
    <div class="img-preview">
        <img src="gambar_motor/<?= $d['gambar_motor'] ?>">
        <p style="font-size:12px;color:#666;">Gambar saat ini</p>
    </div>

    <form action="update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_motor" value="<?= $d['id_motor'] ?>">

        <label>Merk Motor</label>
        <input type="text" name="merk_motor" value="<?= $d['merk_motor'] ?>" required>

        <label>Tipe Motor</label>
        <input type="text" name="tipe_motor" value="<?= $d['tipe_motor'] ?>" required>

        <label>Plat Nomor</label>
        <input type="text" name="plat_nomor" value="<?= $d['plat_nomor'] ?>" required>

        <label>Harga Sewa / Hari</label>
        <input type="number" name="harga_sewa" value="<?= $d['harga_sewa'] ?>" required>

        <label>Status</label>
        <select name="status_motor">
            <option value="Tersedia" <?= $d['status_motor']=="Tersedia"?"selected":"" ?>>Tersedia</option>
            <option value="Disewa" <?= $d['status_motor']=="Disewa"?"selected":"" ?>>Disewa</option>
        </select>

        <label>Gambar Baru (Opsional)</label>
        <input type="file" name="gambar_motor" accept=".jpg,.jpeg,.png">

        <button type="submit">✏️ Update Data</button>
    </form>

    <div class="back">
        <a href="index.php">← Kembali ke Dashboard</a>
    </div>
</div>

</body>
</html>
