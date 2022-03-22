<?php
session_start();
error_reporting(E_ALL);

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
include "connection.php";
$email = $password = "";
$email_err = $password_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST['email']))) {
        $email_err = "Please enter Email";
    } else {
        $email = trim($_POST['email']);
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    if (empty($username_err) && empty($password_err)) {
        $sql = "SELECT id, email, password, first_name, last_name FROM users WHERE email = :email";

        if($stmt = $conn->prepare($sql)){
            $param_email = $_POST['email'];
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);


            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $email = $row["email"];
                        $password = $_POST["password"];
                        $hashed_password = $row["password"];

                        $first_name = $row["first_name"];
                        $last_name = $row["last_name"];

                        if(password_verify($password, $row['password'])){
                            session_start();
                            session_regenerate_id(true);

                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;
                            //$_SESSION["password"] =$password;
                            $_SESSION["first_name"] = $first_name;
                            $_SESSION["last_name"] = $last_name;

                            $login_err = "validddd username or password";
                            header("Location: index.php");


                        }



                    }
                }   $login_err = "Invalid username or password.";

            }

        }
        unset($stmt);
    }}
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

    <?php
    if(!empty($login_err)){
        echo '<div class="alert alert-danger">' . $login_err . '</div>';
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <div class="form-group">
            <label> Email </label>
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
            <input type="submit" class="btn btn-primary" value="login" id="login" name = "login">
            <input type="reset" class="btn btn-secondary ml-2" value="Reset">
        </div>
        <p>Don't have an account? <a href="registration.php">Register here</a>.</p>
    </form>
</div>
</body>
</html>


