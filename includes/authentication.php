<?php
session_start();
include('connection.php');

if (isset($_POST['login'])) {
    $username = $_POST['user'];
    $password = $_POST['password'];

    $sql = "SELECT *from logintbl where Username = '$username' ";
    $query = $con->query($sql);

    if ($query->num_rows < 1) {
        $_SESSION['error'] = "Cannot find account with the User ID ${username}";
    } else {
        $row = $query->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin'] = $row['id'];
            $_SESSION['category'] = $row['category'];
        } else {
            $_SESSION['error'] = 'Incorrect password';
        }
    }

} else {
    $_SESSION['error'] = 'Input admin credentials first';
}

header('location: login.php');

if (isset($_POST['logout'])) {
    session_destroy();

    header('location:login.php');
}
?>