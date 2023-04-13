<?php
session_start();
include('connection.php');

if (isset($_POST['login'])) {
    $email = $_POST['user'];
    $password = $_POST['pass'];

    $sql = "SELECT * from logintbl where Email_Add = '$email' ";
    $query = $con->query($sql);

    if ($query->num_rows < 1) {
        $_SESSION['error'] = "Cannot find account with the User ID ${email}";
    } else {
        $row = $query->fetch_assoc();
        if ($password ==  $row['Password']) {
            $_SESSION['admin'] = $row['Email_Add'];
            $_SESSION['id'] = $row['AccountID'];
        } else {
            $_SESSION['error'] = 'Incorrect password';
        }
    }

} else {
    $_SESSION['error'] = 'Input admin credentials first';
}

header('location: login-form.php');

if (isset($_POST['logout'])) {
    session_destroy();

    header('location:login-form.php');
}
?>