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
            <input type="text" id="password" name="password"> <br><br>


            <input type="submit" name="submitBtn" value="Submit">
        </form>

    </div>

    </body>
    </html>
