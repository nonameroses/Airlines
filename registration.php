<?php
session_start();
include("connection.php");
include "header.php";

$email = $password = $first_name = $last_name = $post_code = $address = $country = $phone_number = "";
$email_err = $password_err = $first_name_err = $last_name_err = $post_code_err = $address_err = $country_err = $phone_number_err = "";


//Validating Password







if($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST['email']))) {
        $email_err = "Please enter Email";
    } else {
        if(filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)){
            $email = trim($_POST['email']);
        }else{
            $email_err = "Please enter a VALID Email";
        }



    }

    $uppercase = preg_match('@[A-Z]@', trim($_POST["password"]));
    $lowercase = preg_match('@[a-z]@', trim($_POST["password"]));
    $number    = preg_match('@[0-9]@', trim($_POST["password"]));

    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        if(!$uppercase || !$lowercase || !$number  || strlen(trim($_POST["password"])) < 8) {
            $password_err = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number.';
        }else{
            $password = trim($_POST["password"]);
        }

    }

    if (empty(trim($_POST["first_name"]))) {
        $first_name_err = "Please enter your first name.";
    } else {
        $first_name = trim($_POST["first_name"]);
    }

    if (empty(trim($_POST["last_name"]))) {
        $last_name_err = "Please enter your last name.";
    } else {
        $last_name = trim($_POST["last_name"]);
    }
    if (empty(trim($_POST["address"]))) {
        $address_err = "Please enter your address.";
    } else {
        $address = trim($_POST["address"]);
    }
    if (empty(trim($_POST["post_code"]))) {
        $post_code_err = "Please enter your post code.";
    } else {
        $post_code = trim($_POST["post_code"]);
    }

    if (empty(trim($_POST["country"]))) {
        $country_err = "Please enter your country.";
    } else {
        $country = trim($_POST["country"]);
    }



    if (empty(trim($_POST["phone_number"]))) {
        $phone_number_err = "Please enter your phone number.";
    } else {
        $phone_number = trim($_POST["phone_number"]);
    }




    if (empty($username_err) && empty($password_err) && empty($first_name_err) && empty($last_name_err)
        && empty($country_err) && empty($address_err)  && empty($phone_number_err) && empty($post_code_err)) {

        if (isset($_POST['submitBtn'])) {
            unset($_SESSION['errorMessage']);
            $email = $_POST['email'];

            $password = trim($_POST['password']);
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];

            $country = $_POST['country'];
            $address = $_POST['country'];
            $post_code = $_POST['post_code'];
            $phone_number = $_POST['phone_number'];


            $Year = $_POST['Year'];
            $Month = $_POST['Month'];
            $Date = $_POST['Date'];
            $date = $Year . '-' . $Month . '-' . $Date;

            // $genders = $_POST['genders'];
//$stmt->bindValue(':genders', $genders);
        } else {
            trigger_error("Error: Form Transmission Failure", E_USER_ERROR);
        }


        $sql = "INSERT INTO users (email, password, first_name, last_name, country, address, post_code, phone_number,date_of_birth) 
VALUES(:email, :password, :first_name, :last_name,:country,:address, :post_code,:phone_number ,:date_of_birth)";
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $hash);


        $stmt->bindValue(':first_name', $first_name);
        $stmt->bindValue(':last_name', $last_name);
        $stmt->bindValue(':country', $country);
        $stmt->bindValue(':address', $address);
        $stmt->bindValue(':post_code', $post_code);
        $stmt->bindValue(':phone_number', $phone_number);
        $stmt->bindValue(':date_of_birth', $date);


        if ($stmt->execute()) {
            header("Location: loginForm.php");

            echo "Registration Successful!";

        }
    }else{
        echo " dx";
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>

    <style>
        body{ font: 14px sans-serif;  box-sizing: border-box; }
        text {
            height: 3%;
            width: 50%;

            margin: 0 auto;

        }

        .wrapper{ width: 400px; padding: 10px; align="center"; text-align: center; margin: 0 auto;}
        span{display: flex; justify-content: center}
        .invalid-feedback{color: red}
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

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <br><br>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" id ="email" class="form-control
           <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>">
            <span class="invalid-feedback"><?php echo $email_err; ?></span>
        </div>

        <div class="form-group">
            <label for = "password">Password</label>
            <input type="password" name="password" id = "password" class="form-control
            <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
            <span class="invalid-feedback"><?php echo $password_err; ?></span>

        </div>

        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" class="form-control
            <?php echo (!empty($first_name_err)) ? 'is-invalid' : ''; ?>">
            <span class="invalid-feedback"><?php echo $first_name_err; ?></span>
        </div>

        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name"class="form-control
            <?php echo (!empty($last_name_err)) ? 'is-invalid' : ''; ?>">
            <span class="invalid-feedback"><?php echo $last_name_err; ?></span>
        </div>

        <div class="form-group">
            <label for="country">Country: </label>
            <input type="text" id="country" name="country" class="form-control
            <?php echo (!empty($country_err)) ? 'is-invalid' : ''; ?>">
            <span class="invalid-feedback"><?php echo $country_err; ?></span>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" class="form-control
              <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>">
            <span class="invalid-feedback"><?php echo $address_err; ?></span>
        </div>

        <div class="form-group">
            <label for="post_code">Post Code: </label>
            <input type="text" id="post_code" name="post_code" class="form-control
            <?php echo (!empty($post_code_err)) ? 'is-invalid' : ''; ?>">
            <span class="invalid-feedback"><?php echo $post_code_err; ?></span>
        </div>

        <div class="form-group">
            <label for="phone_number">Phone Number: </label>
            <input type="text" id="phone_number" name="phone_number" class="form-control
            <?php echo (!empty($phone_number_err)) ? 'is-invalid' : ''; ?>">
            <span class="invalid-feedback"><?php echo $phone_number_err; ?></span>

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
            </select> <br>
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
<?php
include ("footer.php");
?>
