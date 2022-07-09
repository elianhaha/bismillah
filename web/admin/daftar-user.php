<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:../login.php");
    exit;
}
require "user.php";
$user = query("SELECT * FROM register");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User</title>
</head>

<body>
    <?php include('navbar.php') ?>

    <div class="container" id="container">
        <h1>Admin </h1>
        <a href="tambahkereta.php" class="btn btn-primary">Tambah User</a>
        <form action="" method="GET">
            <input type="text" name="keyword" placeholder="Search...." id="keyword">
            <input type="submit" class="btn btn-success " value="cari" name="cari" />
        </form>
        <table class="table table-hover table-striped table-bordered mt-3">

            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Type</th>
                <th scope="col">Status</th>
            </tr>
            <?php
            $i = 1;
            foreach ($user as $u) : ?>
                <tr>
                    <td scope="row"><?= $i++; ?></td>
                    <td><?= $u['username']; ?></td>
                    <td><?= $u['email']; ?></td>
                    <td><?= $u['usertype']; ?></td>
                    <td>

                        <a class="btn badge bg-danger" href="delete-user.php?id=<?= $u['id'] ?>">Delete</a>
                        <a class="btn badge bg-success" href="edit-user.php?id=<?= $u['id'] ?>">Edit</a>

                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <script src="daftar-user.js"></script>
</body>

</html>