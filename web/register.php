<?php
require "function.php";

$nameErr = $emailErr = $passErr = $passErr2 = "";

if (isset($_POST['register'])) {

    //validation
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //username validation
        if (empty($_POST["username"])) {
            $nameErr = "Nama harus diisi";
        } elseif (strlen($_POST["username"]) < 5) {
            $nameErr = "Nama harus lebih dari 5";
        } elseif (filter_var($_POST["username"], FILTER_VALIDATE_EMAIL)) {
            $nameErr = "Bukan email";
        }

        // email validation
        if (empty($_POST["email"])) {
            $emailErr = "Email harus diisi";
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Email harus sesuai ";
        }

        //password validation
        if (empty($_POST["password"])) {
            $passErr = "Password harus diisi";
        }

        //confrim password validation
        if (empty($_POST["password2"])) {
            $passErr2 = "Wajib konfirmasi password";
        } elseif (!empty($_POST["password2"])) {
            if ($_POST["password2"] !== $_POST["password"]) {
                $passErr2 = "Tidak cocok";
            }
        } else {

            if (register($_POST) > 0) {

                header("Location:login.php");
            } else {
                echo mysqli_error($conn);
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        span {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container mt-1">
        <h1>Registration</h1>
        <form class="mt-3" method="POST" action="">
            <div class="mb-3 col-md-5">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" name="username">
                <span class="error"><?php echo $nameErr ?></span>
            </div>
            <div class="mb-3 col-md-5">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="text" class="form-control" name="email">
                <span class="error"><?php echo $emailErr ?></span>
            </div>
            <div class="mb-3 col-md-5">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
                <span class="error"><?php echo $passErr ?></span>
            </div>
            <div class="mb-3 col-md-5">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password2">
                <span class="error"><?php echo $passErr2 ?></span>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" name="admin">
                <label class="form-check-label">
                    admin
                </label>
            </div>
            <button type="submit" name="register" class="btn btn-primary mt-2">Submit</button>
        </form>
        <a href="login.php">Login</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>