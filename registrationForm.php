<?php
session_start();

include "connection.php";

$smt = $conn->prepare("SELECT * FROM genders");
$smt->execute();
$data = $smt->fetchAll();



?>

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
        <h2 align="center">Registration Form</h2>
        <p align ="center">Please continue with the registration form</p> <br><br><br>

        <?php
        if(isset($_SESSION['errorMessage'])){
            echo "<span class = 'error' style = 'color:red;' > Please do not leave blank fields ! </span>";
        }
        ?>

        <form action="registration.php" method="post" align="center">
            <br><br>

            <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" "> <br><br>
            <span class="invalid-feedback"></span>
            </div>

            <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password"> <br><br>
            </div>

            <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name"> <br><br>
            </div>

            <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name"> <br><br>
            </div>

            <div class="form-group">
             <label>Date of Birth:</label>
            <select name="Year">
                <option value="">Select year</option>
                <?php for ($i = 1980; $i < date('Y'); $i++) : ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
            <select name="Month">
                <option value="">Select month</option>
                <?php for ($i = 1; $i <= 12; $i++) : ?>
                    <option value="<?php echo ($i < 10) ? '0'.$i : $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
            <select name="Date">
                <option value="">Select date</option>
                <?php for ($i = 1; $i <= 31; $i++) : ?>
                    <option value="<?php echo ($i < 10) ? '0'.$i : $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select> <br></br>
            </div>

            <div class="form-group">
            <label for ="genders">Select your Gender</label>
            <select name="genders">
                <optgroup label="genderset">
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="3">Hermaphrodite</option>
                    <option value="4">Not Sure!!!</option>
                </optgroup>
            </select>
            </div>

            <div class="form-group">
            <input type="submit" class ="btn btn-primary" name="submitBtn" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="loginForm.php">Login here</a>.</p>
        </form>

    </div>

    </body>
    </html>
