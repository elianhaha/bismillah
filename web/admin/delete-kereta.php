<?php
require "kereta.php";

$id = $_GET['id'];
if (delete($id) > 0) {
    echo "<script>alert(Data berhasil dihapus)</script>";
    header("Location:admin.php");
}
