<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<style>
body{
    font-family:Arial;
    background:#f4f6f8;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}
.box{
    background:#fff;
    padding:25px;
    width:320px;
    border-radius:8px;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
}
input,button{
    width:100%;
    padding:10px;
    margin-top:10px;
}
button{
    background:#198754;
    color:#fff;
    border:none;
}
a{
    display:block;
    text-align:center;
    margin-top:10px;
}
</style>
</head>
<body>

<div class="box">
<h3 align="center">Buat Akun</h3>

<form action="proses_register.php" method="post">
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit">Daftar</button>
</form>

<a href="login.php">Sudah punya akun? Login</a>
</div>

</body>
</html>
