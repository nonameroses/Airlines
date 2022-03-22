<?php
session_start();
include "connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "SELECT id, email, password, first_name, last_name FROM users WHERE email = :email";

}




?>

<html>
<body>
<div>
    <h1>Edit your account</h1>
    <h2>What would you like to change?</h2>

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


    </fieldset>
</div>
</body>
</html>


