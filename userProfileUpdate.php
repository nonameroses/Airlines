<?php
session_start();
include "connection.php";
// Report all PHP errors
error_reporting(E_ALL);

if(isset($_POST['update'])){



  //  $userNewName  =    $_POST['updateUserName'];
    $userNewEmail =    $_POST['userEmail'];

    if( !empty($userNewEmail)){

                    $loggedInUser = $_SESSION['email'];

                    $sql = "UPDATE users SET email ='$userNewEmail' WHERE email = '$loggedInUser'";

                    $results = mysqli_query($conn,$sql);

                    header('Location: updateUser.php?success=userUpdated');


    }else{
                header('Location:../pages/userProfile.php?error=invalidFileSize');
    }
    exit;

}else{
        header('Location: updateUser.php?error=emptyNameAndEmail');
        exit;
    }


?>