<?php
session_start();
include "connection.php";
include "ifSessionHeader.php";
  /*
$email = trim($_POST['email']);
$country = trim($_POST['country']);
$address = trim($_POST['address']);
$post_code = trim($_POST['post_code']);
$phone_number = trim($_POST['phone_number']);
     */






if(isset($_POST['edit'])) {
    $id = $_SESSION['id'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $post_code = $_POST['post_code'];
    $phone_number = $_POST['phone_number'];


    $select = "SELECT * FROM users WHERE id='$id'";


    $sql = mysqli_query($conn, $select);


    $row = mysqli_fetch_assoc($sql);
    $res = $row['id'];

    $res = $row['id'];
    if ($res === $id) {
        $update = "UPDATE users SET email='$email', country=' $country', address='$address', 
        post_code = '$post_code', phone_number = '$phone_number' where id='$id'";

        $sql2 = mysqli_query($conn, $update);


    }

    if($sql2)
    {
        /*Successful*/
        echo "success";
        echo "<script type='text/javascript'>alert('Successful - Record Updated!'); window.location.href = 'user_profile.php';</script>";
        header('location: index.php');
        die();
    }
    else
    {
        /*sorry your profile is not update*/
        echo "not ";
        header('location: userSettings.php');
    }
}





?>

<html>
<body>
<div>
    <h1>Edit your account</h1>


    <fieldset>
        <legend>Account Details</legend>


        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" id ="email" class="form-control

            <span class="invalid-feedback"></span>
        </div>



        <div class="form-group">
            <label for="country">Country: </label>
            <input type="text" id="country" name="country" class="form-control

            <span class="invalid-feedback"></span>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" class="form-control

            <span class="invalid-feedback"></span>
        </div>

        <div class="form-group">
            <label for="post_code">Post Code: </label>
            <input type="text" id="post_code" name="post_code" class="form-control

            <span class="invalid-feedback"></span>
        </div>

        <div class="form-group">
            <label for="phone_number">Phone Number: </label>
            <input type="text" id="phone_number" name="phone_number" class="form-control

            <span class="invalid-feedback"></span>

        </div>

        <input type="submit" class="btn btn-primary" value="Update" id="edit" name = "edit">
    </fieldset>
</div>
</body>
</html>


