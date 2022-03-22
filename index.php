<?php
session_start();
include("connection.php");


echo 'Hi, ' . $_SESSION['first_name']. ' ' . $_SESSION['last_name'];



?>


<!DOCTYPE html>

<html>

<head>

    <title>Welcome to Penguin Airlines!</title>

</head>

<body>

<form action="index.php" method="post">

    <h2 align="center">Welcome to Penguin Airlines!</h2>





    <a href ="userSettings.php">User Settings</a>
    <a href="logout.php">Logout</a>

</form>

</body>

</html>