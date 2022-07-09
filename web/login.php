<?php
session_start();
if (isset($_SESSION["login"])) {
    if ($_SESSION["usertype"] == "admin") {
        header("Location:./admin/admin.php");
        exit;
    } else {
        header("Location:./user/index.php");
        exit;
    }
}

require 'function.php';
$err = "";
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM register WHERE email = '$email'");
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {

            if ($row['usertype'] == "admin") {
                $_SESSION["login"] = true;
                $username = $row['username'];
                $_SESSION['username'] = $username;
                header("Location:./admin/admin.php");
                exit;
            } else {
                $_SESSION["login"] = true;
                $username = $row['username'];
                $_SESSION['username'] = $username;
                header("Location:./user/index.php");
                exit;
            }
        } else {
            $err = "Wrong email and password";
        }
    } else {
        $err = "Wrong email and password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        p {
            color: red;
        }
    </style>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <h1>Login</h1>
        <form class="mt-3" method="POST" action="">
            <p><?php echo $err ?></p>
            <div class="mb-3 col-md-5">
                <label class="form-label">Email address</label>
                <input type="text" class="form-control" name="email">

            </div>
            <div class="mb-3 col-md-5">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>

            <button type="submit" name="login" class="btn btn-primary">Submit</button>
        </form>
        <a href="register.php">Register</a>
        <br><br>
        <a href="index.php"> &laquo; Back</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>