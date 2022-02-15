<?php
include "connection.php";
session_start();
if(!isset($_SESSION["user"]))
{
    header( "Location: loginForm.php" );
}

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash = password_verify($password, PASSWORD_DEFAULT);
    $query = $conn->prepare("SELECT * FROM users WHERE email = :email AND password =:password");

    $query->bindValue(':email', $email);
    $query->bindValue(':password', $password);
    $query->execute();

    if($row = $query->fetch()){
        $_SESSION["users"] =$email;
        header("Location: index.php");
    }else{
        header("Location: registration.php");
    }


}





?>
