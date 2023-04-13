<?php
session_start();
require './connection.php';

if (!isset($_SESSION['admin']) || trim($_SESSION['admin']) == '') {
    // header('location: index.php');
} else {
    $sessionid = $_SESSION['id'];
    $sessionadmin = $_SESSION['admin'];
    $sql = "SELECT * FROM logintbl WHERE Email_Add = '$sessionadmin' AND AccountID = $sessionid";
    $query = $con->query($sql);
    $user = $query->fetch_assoc();
}

?>