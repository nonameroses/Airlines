

<?php

try{

    $conn = new PDO('mysql:host=selene.hud.ac.uk;dbname=u2065667', 'u2065667', 'US28nov01us');
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

}
catch (PDOException $exception)
{
    echo "Oh no, there was a problem" . $exception->getMessage();
}

?>

