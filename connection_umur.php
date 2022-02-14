<?php

try{

    $conn = new PDO('sftp://selene.hud.ac.uk;dbname=airportdb', 'u2065667', 'US28nov01us');
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

}
catch (PDOException $exception)
{
    echo "Oh no, there was a problem" . $exception->getMessage();
}

?>
