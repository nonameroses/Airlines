<?php
session_start();
include("connection.php");

if(isset($_POST['submitBtn'])){
$email = $_POST['email'];
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$date_of_birth = $_POST['date_of_birth'];

}else {
    trigger_error("Error: Form Transmission Failure", E_USER_ERROR);
}


$sql = "INSERT INTO users (email, password, first_name, last_name, date_of_birth) VALUES(:email, :password, :first_name, :last_name, :date_of_birth)";
$stmt = $conn->prepare($sql);

$stmt->bindValue(':email', $email);
$stmt->bindValue(':password', $password);
$stmt->bindValue(':first_name', $first_name);
$stmt->bindValue(':last_name', $last_name);
$stmt->bindValue(':date_of_birth', $date_of_birth);

if($stmt->execute()){

}
?>

