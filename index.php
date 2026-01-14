<?php
include 'cek_login.php';
include 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM motor");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Sewa Motor</title>

<style>
body{
    margin:0;
    font-family: Arial, sans-serif;
    background:#f4f6f8;
}

/* ===== HEADER ===== */
.navbar{
    background:#0d6efd;
    color:#fff;
    padding:15px 25px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.navbar h2{
    margin:0;
    font-size:20px;
}

.navbar a{
    color:#fff;
    text-decoration:none;
    margin-left:10px;
    font-size:14px;
}

/* ===== CONTAINER ===== */
.container{
    padding:25px;
}

/* ===== ACTION BUTTON ===== */
.actions{
    margin-bottom:15px;
}

.actions a{
    text-decoration:none;
    padding:10px 16px;
    border-radius:6px;
    font-size:14px;
    margin-right:8px;
    color:#fff;
}

.actions .add{
    background:#198754;
}

.actions .print{
    background:#6f42c1;
}

/* ===== TABLE ===== */
.table-wrapper{
    background:#fff;
    border-radius:12px;
    overflow:hidden;
    box-shadow:0 6px 15px rgba(0,0,0,0.1);
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#f1f3f5;
    padding:12px;
    font-size:14px;
    text-align:center;
}

td{
    padding:12px;
    font-size:14px;
    text-align:center;
    vertical-align:top;
}

tr:nth-child(even){
    background:#fafafa;
}

/* ===== IMAGE BOX ===== */
.img-box{
    width:100px;
    height:100px;
    border-radius:8px;
    overflow:hidden;
    border:1px solid #ddd;
    display:flex;
    align-items:center;
    justify-content:center;
    margin:0 auto 6px;
}

.img-box img{
    width:100%;
    height:100%;
    object-fit:cover;
}

/* ===== FORM ===== */
select, input[type=file], button{
    font-size:12px;
    padding:5px;
    margin-top:4px;
}

button{
    border:none;
    border-radius:4px;
    padding:6px 10px;
    cursor:pointer;
}

.btn-change{
    background:#0d6efd;
    color:#fff;
}

.btn-upload{
    background:#198754;
    color:#fff;
}

/* ===== ACTION ===== */
.action a{
    display:inline-block;
    padding:6px 10px;
    margin:3px 0;
    font-size:12px;
    border-radius:4px;
    color:#fff;
    text-decoration:none;
}

.action .edit{
    background:#ffc107;
    color:#000;
}

.action .hapus{
    background:#dc3545;
}
</style>

</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <h2>Dashboard Sewa Motor</h2>
    <div>
        <?= $_SESSION['username']; ?> |
        <a href="logout.php" onclick="return confirm('Logout?')">Logout</a>
    </div>
</div>

<!-- CONTENT -->
<div class="container">

    <div class="actions">
        <a href="tambah.php" class="add">+ Tambah Motor</a>
        <a href="cetak_pdf.php" target="_blank" class="print">🖨 Cetak PDF</a>
    </div>

    <div class="table-wrapper">
        <table>
            <tr>
                <th>No</th>
                <th>Merk</th>
                <th>Tipe</th>
                <th>Plat</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Gambar Motor</th>
                <th>KTP</th>
                <th>Aksi</th>
            </tr>

            <?php $no=1; while($d=mysqli_fetch_array($data)){ ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $d['merk_motor'] ?></td>
                <td><?= $d['tipe_motor'] ?></td>
                <td><?= $d['plat_nomor'] ?></td>
                <td>Rp <?= number_format($d['harga_sewa']) ?></td>
                <td><?= $d['status_motor'] ?></td>

                <!-- GAMBAR MOTOR -->
                <td>
                    <div class="img-box">
                        <img src="gambar_motor/<?= $d['gambar_motor'] ?>">
                    </div>

                    <form action="pilih_gambar.php" method="post">
                        <input type="hidden" name="id_motor" value="<?= $d['id_motor'] ?>">
                        <select name="gambar_motor" required>
                            <?php
                            $files = scandir("gambar_motor/");
                            foreach($files as $f){
                                if($f!="." && $f!=".."){
                                    $ext = strtolower(pathinfo($f, PATHINFO_EXTENSION));
                                    if(in_array($ext,['jpg','jpeg','png'])){
                                        $sel = ($f==$d['gambar_motor'])?"selected":"";
                                        echo "<option value='$f' $sel>$f</option>";
                                    }
                                }
                            }
                            ?>
                        </select><br>
                        <button class="btn-change" type="submit">Ganti</button>
                    </form>
                </td>

                <!-- KTP -->
                <td>
                    <div class="img-box">
                        <?php if(!empty($d['foto_ktp'])){ ?>
                            <img src="ktp/<?= $d['foto_ktp'] ?>">
                        <?php } ?>
                    </div>

                    <form action="upload_ktp.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_motor" value="<?= $d['id_motor'] ?>">
                        <input type="file" name="foto_ktp" required><br>
                        <button class="btn-upload" type="submit">Upload</button>
                    </form>
                </td>

                <!-- AKSI -->
                <td class="action">
                    <a href="edit.php?id=<?= $d['id_motor'] ?>" class="edit">Edit</a>
                    <a href="hapus.php?id=<?= $d['id_motor'] ?>"
                       onclick="return confirm('Yakin hapus data?')"
                       class="hapus">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>

</div>

</body>
</html>
