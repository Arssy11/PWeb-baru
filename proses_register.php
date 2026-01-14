<?php
include 'koneksi.php';

$user = $_POST['username'];
$pass = $_POST['password'];

// cek username
$cek = mysqli_query($conn, "SELECT * FROM user WHERE username='$user'");
if(mysqli_num_rows($cek) > 0){
    echo "<script>
        alert('Username sudah digunakan');
        window.location='register.php';
    </script>";
    exit;
}

// simpan akun
mysqli_query($conn,
    "INSERT INTO user (username, password)
     VALUES ('$user','$pass')"
);

echo "<script>
    alert('Akun berhasil dibuat');
    window.location='login.php';
</script>";
?>
