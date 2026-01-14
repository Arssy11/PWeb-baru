<!DOCTYPE html>
<html>
<head>
<title>Login</title>
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
    background:#0d6efd;
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
<h3 align="center">Login</h3>

<form action="proses_login.php" method="post">
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit">Login</button>
</form>

<a href="register.php">Buat akun baru</a>
</div>

</body>
</html>
