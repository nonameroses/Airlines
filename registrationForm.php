<?php
session_start();

include "connection.php";

?>

<html>
<body>


    <div class="content">

        <h1 align="center">Registration Form</h1>

        <p align ="center">Please continue with the registration form</p> <br><br><br>

        <form action="registrationPage.php" method="post" align="center">

            <br><br>

            <label for="email">Email</label>
            <input type="text" id="email" name="email"> <br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password"> <br><br>

            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name"> <br><br>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name"> <br><br>

            <label for="date_of_birth">Date of birth:</label>
            <input type="text" id="date_of_birth" name="date_of_birth"> <br><br>

            <label for ="genders">Select your Gender</label>
            <select name ="genders" id="genders">
                <?php foreach($data as $row): ?>
                <option><?=$row["genders"]?></option>
                <?php endforeach;?>
            </select>


            <input type="submit" name="submitBtn" value="Submit">
        </form>

    </div>

    </body>
    </html>
