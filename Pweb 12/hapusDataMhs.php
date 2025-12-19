<?php
require "koneksi.php";

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM mhs WHERE id='$id'");

header("Location: tampilDataMhs.php");
