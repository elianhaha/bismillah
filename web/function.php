<?php
$conn = mysqli_connect('localhost', 'root', '', 'test');

function register($data)
{

    global $conn;
    $username = strtolower(stripslashes($data['username']));
    $email = $data['email'];
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    //confirmed checking

    $check_username = mysqli_query($conn, "SELECT username FROM register WHERE username = '$username'");
    if (mysqli_fetch_assoc($check_username)) {
        echo "<script>alert('username ada')</script>";
        return false;
    }

    // if ($email != filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     echo "<script>alert('Email mu mismatch')</script>";
    //     return false;
    // }
    if ($password != $password2) {
        echo "<script>alert('Password mismatch')</script>";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);

    //insert new user to database

    if (isset($_POST["admin"])) {
        mysqli_query($conn, "INSERT INTO register VALUES('','$username','$email','$password','admin')");
        return false;
    } else {
        mysqli_query($conn, "INSERT INTO register VALUES('','$username','$email','$password','user')");
        return false;
    }
    header("Location:login.php");

    return 1;
}
