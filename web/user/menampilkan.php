<?php

require "kereta.php";
// $berangkat = $_POST['berangkat'];
// $tujuan = $_POST['tujuan'];

// $berangkat = query("SELECT berangkat, COUNT(berangkat) FROM kereta GROUP BY berangkat HAVING COUNT(berangkat) > 1");
// $tujuan = query("SELECT tujuan, COUNT(tujuan) FROM kereta GROUP BY tujuan HAVING COUNT(tujuan) > 1");

// $berangkat = query("SELECT * FROM kereta WHERE berangkat = '$berangkat[berangkat]'");

$kereta = $_POST["berangkat"];
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
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Kereta</th>
            <th scope="col">Berangkat</th>
            <th scope="col">Tujuan</th>
            <th scope="col">Harga</th>
        </tr>
        <?php
        $i = 0;
        foreach ($kereta as $krt) :

        ?>
            <tr>
                <td scope="row"><?= $i++; ?></td>
                <td><?= ucfirst($krt['nama_kereta']); ?></td>
                <td><?= $krt['berangkat']; ?><br>
                    <?= $krt['jam_berangkat']; ?></td>
                <td><?= $krt['tujuan']; ?><br>
                    <?= $krt['jam_tujuan']; ?></td>
                <td>Rp <?= $krt['harga']; ?></td>

            </tr>
        <?php endforeach ?>

    </div>


</body>

</html>