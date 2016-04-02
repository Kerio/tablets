<?php
    include 'Controller.php';
    $username;
    $password;
    $username = trim($_POST['usr']);
    $password = trim($_POST['pwd']);
    connect($username, $password);
?>