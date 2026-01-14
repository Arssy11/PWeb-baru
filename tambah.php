<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Motor</title>

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
    background:#0d6efd;
    color:#fff;
    border:none;
    border-radius:6px;
    font-size:15px;
    cursor:pointer;
}

button:hover{
    background:#0b5ed7;
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
</style>

</head>
<body>

<div class="card">
    <h2>Tambah Data Motor</h2>

    <form action="simpan.php" method="post" enctype="multipart/form-data">

        <label>Merk Motor</label>
        <input type="text" name="merk_motor" placeholder="Contoh: Honda" required>

        <label>Tipe Motor</label>
        <input type="text" name="tipe_motor" placeholder="Contoh: Vario 160" required>

        <label>Plat Nomor</label>
        <input type="text" name="plat_nomor" placeholder="Contoh: H 1234 AB" required>

        <label>Harga Sewa / Hari</label>
        <input type="number" name="harga_sewa" placeholder="Contoh: 80000" required>

        <label>Status</label>
        <select name="status_motor">
            <option value="Tersedia">Tersedia</option>
            <option value="Disewa">Disewa</option>
        </select>

        <label>Gambar Motor</label>
        <input type="file" name="gambar_motor" accept=".jpg,.jpeg,.png" required>

        <button type="submit">💾 Simpan Data</button>
    </form>

    <div class="back">
        <a href="index.php">← Kembali ke Dashboard</a>
    </div>
</div>

</body>
</html>
