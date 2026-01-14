<?php
include 'koneksi.php';

/* ===============================
   PASTIKAN FOLDER KTP ADA
================================ */
if (!is_dir('ktp')) {
    mkdir('ktp', 0777, true);
}

/* ===============================
   AMBIL DATA
================================ */
$id_motor = $_POST['id_motor'];
$file     = $_FILES['foto_ktp']['name'];
$tmp      = $_FILES['foto_ktp']['tmp_name'];

/* ===============================
   VALIDASI FILE
================================ */
$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
$allowed = ['jpg','jpeg','png'];

if (!in_array($ext, $allowed)) {
    die("Format KTP harus JPG, JPEG, atau PNG");
}

/* ===============================
   NAMA FILE UNIK
================================ */
$nama_baru = time() . '_' . $file;

/* ===============================
   UPLOAD FILE
================================ */
move_uploaded_file($tmp, 'ktp/' . $nama_baru);

/* ===============================
   SIMPAN KE DATABASE
================================ */
mysqli_query(
    $conn,
    "UPDATE motor SET foto_ktp='$nama_baru' WHERE id_motor='$id_motor'"
);

/* ===============================
   KEMBALI KE INDEX
================================ */
header("Location: index.php");
exit;
?>
