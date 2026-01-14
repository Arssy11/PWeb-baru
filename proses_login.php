<?php
session_start();
include 'koneksi.php';

$user = $_POST['username'];
$pass = $_POST['password'];

$query = mysqli_query($conn,
    "SELECT * FROM user WHERE username='$user' AND password='$pass'"
);

$data = mysqli_fetch_array($query);

if($data){
    $_SESSION['login'] = true;
    $_SESSION['username'] = $data['username'];
    header("location:index.php");
}else{
    echo "<script>
        alert('Login gagal');
        window.location='login.php';
    </script>";
}
?>
