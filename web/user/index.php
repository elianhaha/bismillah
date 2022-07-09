<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:../login.php");
    exit;
}
// require "../function.php";
require "kereta.php";
$username = $_SESSION['username'];
$kereta = query("SELECT * FROM kereta");
// $berangkat = query("SELECT berangkat, COUNT(berangkat) FROM kereta GROUP BY berangkat HAVING COUNT(berangkat) > 1");
// $tujuan = query("SELECT tujuan, COUNT(tujuan) FROM kereta GROUP BY tujuan HAVING COUNT(tujuan) > 1");
// $tujuan = query("SELECT * FROM kereta");
if (isset($_POST["submit"])) {
    $berangkat = query("SELECT * FROM kereta WHERE berangkat = " . $_POST["berangkat"]);
    $tujuan = query("SELECT * FROM kereta WHERE tujuan = " . $_POST["tujuan"]);
}
$berangkat = query("SELECT * FROM kereta");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User | <?php echo ucfirst($username) ?></title>
</head>

<body>


    <?php include("navbar.php") ?>
    <div class="container">

        <h1>Welcome <?php echo ucfirst($username) ?></h1>
        <form action="menampilkan.php" method="POST">
            <div class="row">
                <div class="col-md-2">
                    <label for="berangkat">Berangkat</label>
                    <input type="text" class="form-control" placeholder="Berangkat" aria-label="berangkat" name="berangkat">
                </div>
                <div class="col-md-2">
                    <label for="tujuan">Tujuan</label>
                    <input type="text" class="form-control" placeholder="Tujuan" aria-label="tujuan" name="tujuan">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>


</body>

</html>