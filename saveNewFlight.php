<?php

session_start();


include "connect.php";


?>

<div class="content">

    <?php

    if(isset($_POST['submitBtn'])){
        $FromAirport = $_POST['from_Airport'];
        $ToAirport = $_POST['to_Airport'];
        $departureDateTime=$_POST['departure_datetime'];
        $arrivalDateTime=$_POST['arrival_datetime'];
        $numOfSeats = $_POST['number_of_seats'];
        $price = $_POST['price'];
    } else {
        trigger_error("Error: Form Transmission Failure", E_USER_ERROR);
    }

    //MAIN SQL STATEMENT FOR FLIGHT
    $query="INSERT INTO flights (id, origin_id, destination_id, departure_datetime, arrival_datetime, number_of_seats, price) VALUES (NULL,:originId, :destinationId, :departureDateTime, :arrivalDateTime, :number_of_seats, :price)";
    $stmt=$conn->prepare($query);
    $stmt->bindValue(':originId', $FromAirport);
    $stmt->bindValue(':destinationId', $ToAirport);
    $stmt->bindValue(':departureDateTime', $departureDateTime);
    $stmt->bindValue(':arrivalDateTime', $arrivalDateTime);
    $stmt->bindValue(':arrivalDateTime', $arrivalDateTime);
    $stmt->bindValue(':number_of_seats', $numOfSeats);
    $stmt->bindValue(':price', $price);


    if($stmt->execute()){
        $query2="SELECT * FROM flights ORDER BY id DESC LIMIT 1";
        $result = $conn->query($query2);
        $newFlightResult = $result->fetch();
        $newFlightId = $newFlightResult["id"];
        echo "<h1>Successfully added the details for Flight ID: $newFlightId.</h1>";
        echo "<p>Origin ID: {$newFlightResult['origin_id']}</p>";
        echo "<p>Destination ID: {$newFlightResult['origin_id']}</p>";
        echo "<h1>Departure</h1>";
        echo "<p>Date: {$newFlightResult['departure_date']}</p>";
        echo "<p>Time: {$newFlightResult['departure_time']}</p>";
        echo "<h1>Arrival</h1>";
        echo "<p>Date: {$newFlightResult['arrival_date']}</p>";
        echo "<p>Time: {$newFlightResult['arrival_time']}</p><br>";
    }else{
        echo"<p>There was a problem inserting the data.</p>";
    }


    ?>


</div>
</body>
</html>
