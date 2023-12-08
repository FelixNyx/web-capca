<?php
include "koneksi.php";

$data = $_GET['id'];

mysqli_query($koneksi, "delete from capca where id='$data'");

header("location:table.php");
?>