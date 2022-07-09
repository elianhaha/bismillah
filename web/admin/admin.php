<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:../login.php");
    exit;
}

require "kereta.php";
$username = $_SESSION['username'];
$kereta = query("SELECT * FROM kereta");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | <?php echo ucfirst($username) ?></title>

</head>

<body>
    <?php include('navbar.php') ?>
    <div id="container" class="container">
        <h1>Admin <?php echo ucfirst($username) ?></h1>

        <a href="tambahkereta.php" class="btn btn-primary"><i class="bi bi-plus"></i>Tambah Kereta</a>
        <form action="" method="GET">
            <input type="text" name="keyword" placeholder="Search...." id="keyword">
            <button class="btn btn-primary" type="submit" id="tombol-cari" name="search">Search</button>
        </form>
        <table class="table table-hover table-striped table-bordered mt-3">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kereta</th>
                <th scope="col">Berangkat</th>
                <th scope="col">Tujuan</th>
                <th scope="col">Harga</th>
                <th scope="col">Aksi</th>
            </tr>
            <?php
            $i = 1;
            foreach ($kereta as $kt) : ?>
                <tr>
                    <td scope="row"><?= $i++; ?></td>
                    <td><?= ucfirst($kt['nama_kereta']); ?></td>
                    <td><?= $kt['berangkat']; ?><br>
                        <?= $kt['jam_berangkat']; ?></td>
                    <td><?= $kt['tujuan']; ?><br>
                        <?= $kt['jam_tujuan']; ?></td>
                    <td>Rp <?= $kt['harga']; ?></td>
                    <td>

                        <a class="btn badge bg-danger" href="delete-kereta.php?id=<?= $kt['id'] ?>" onclick="return confirm('Anda yakin mau menghapus')">Delete</a>
                        <a class="btn badge bg-success" href="edit-kereta.php?id=<?= $kt['id'] ?>">Edit</a>

                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>


    <script src="script.js"></script>
</body>

</html>