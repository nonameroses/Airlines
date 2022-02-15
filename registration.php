<?php
session_start();
include("connection.php");



if(isset($_POST['submitBtn'])){
        unset($_SESSION['errorMessage']);
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];


        $Year = $_POST['Year'];
        $Month = $_POST['Month'];
        $Date = $_POST['Date'];
        $date = $Year.'-'.$Month.'-'.$Date;

       // $genders = $_POST['genders'];
//$stmt->bindValue(':genders', $genders);
    }else {
        trigger_error("Error: Form Transmission Failure", E_USER_ERROR);
    }

  /*  if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['first_name']) || empty($_POST['last_name'] )
    || empty($_POST['Date'])){
        $_SESSION['errorMessage'] = true;
        header("Location: registrationForm.php");
        exit();
    } else { */

        $sql = "INSERT INTO users (email, password, first_name, last_name, date_of_birth) VALUES(:email, :password, :first_name, :last_name, :date_of_birth)";
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $hash);
        $stmt->bindValue(':first_name', $first_name);
        $stmt->bindValue(':last_name', $last_name);
        $stmt->bindValue(':date_of_birth', $date);






if($stmt->execute()){
    header("Location: loginForm.php");
    echo "Registration Successful!";
}
?>

