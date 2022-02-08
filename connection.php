<?php
$servername = "localhost";
$username = "satan";
$password = "sterling22";

try{

    $conn = new PDO('mysql:host=localhost;dbname=airlinesdb', $username, $password);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

}
catch (PDOException $exception)
{
    echo "Oh no, there was a problem" . $exception->getMessage();
}

?>
