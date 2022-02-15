<?php
session_start();






if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
include "connection.php";
$email = $password = "";
$email_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST['email']))){
        $email_err = "Please enter username";
    }else{
        $email = trim($_POST['email']);
    }

    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    if(empty($username_err) && empty($password_err)){
        //$sql = "SELECT * FROM users WHERE email = :email AND password =:password";
        $sql = "SELECT * FROM users WHERE username =:username AND password = :password";

        if($stmt = $conn->prepare($sql)){
            $param_email = trim($_POST['email']);
            $stmt->bindParam(':email', $param_email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hashed_password);



        }
        if($stmt->execute()){
            if($stmt->rowCount() == 1){
                if($row = $stmt->fetch()){
                    $id = $row['id'];
                    $email = $row['email'];
                    $hashed_password = $row['password'];

                    if(password_verify($password, $hashed_password)){
                            session_start();

                        $_SESSION["loggedin"] = true;
                         $_SESSION["id"] = $id;
                        $_SESSION['email'] = $email;
                        header("Location: index.php");
                    }else{
                        $login_err = "Invalid username or password";
                    }
                }
            }else{
                $login_err = "Invalid username or password";
            }
        }else{
            echo "Oops! Something went wrong. Please try again later.";
        }
        unset($stmt);

    }
    unset($conn);



}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif;  box-sizing: border-box; }
        text {
            height: 3%;
            width: 50%;

            margin: 0 auto;

        }

        .wrapper{ width: 400px; padding: 10px; align="center"; text-align: center; margin: 0 auto;}
        span{display: flex; justify-content: center}
    </style>
</head>
<body>
<div class="wrapper">
    <h2>Sign Up</h2>
    <p>Please fill this form to create an account.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <div class="form-group">
            <input type="text" name="email" id ="email" class="form-control
            <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>"
                   value="<?php echo $email; ?>">

        </div>
        <div class="form-group">
            <label for = "password">Password</label>
            <input type="password" name="password" id = "password" class="form-control
            <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
            <span class="invalid-feedback"><?php echo $password_err; ?></span>


        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Login" id="Login">
            <input type="reset" class="btn btn-secondary ml-2" value="Reset">
        </div>
        <p>Don't have an account? <a href="registrationForm.php">Register here</a>.</p>
    </form>
</div>
</body>
</html>