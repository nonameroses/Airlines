<?php

//session_start();


include "connection_umur.php";


?>


<html>
<body>

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
    $stmt->bindValue(':number_of_seats', $numOfSeats);
    $stmt->bindValue(':price', $price);


    if($stmt->execute()){
        $query2="SELECT * FROM flights ORDER BY id DESC LIMIT 1";
        $result = $conn->query($query2);
        $newFlightResult = $result->fetch();
        $newFlightId = $newFlightResult["id"];

        $query2="SELECT flights.origin_id, airports.name, airports.location FROM flights,airports WHERE flights.origin_id = airports.id;";
        $result = $conn->query($query2);
        $originResult = $result->fetch();

        $query2="SELECT flights.destination_id, airports.name, airports.location FROM flights,airports WHERE flights.destination_id = airports.id;";
        $result = $conn->query($query2);
        $destinationResult = $result->fetch();

        echo "<h1>Successfully added the details for Flight ID: $newFlightId.</h1>";
        echo "<p>Origin: ID-{$newFlightResult['origin_id']}, {$originResult['name']}, {$originResult['location']}</p>";
        echo "<p>Destination: ID-{$newFlightResult['destination_id']}, {$destinationResult['name']}, {$destinationResult['location']}</p>";
        echo "<h1>Departure</h1>";
        echo "<p>Datetime: {$newFlightResult['departure_datetime']}</p>";
        echo "<h1>Arrival</h1>";
        echo "<p>Datetime: {$newFlightResult['arrival_datetime']}</p>";
        echo "<h1>Other Details</h1>";
        echo "<p>Number of Seats: {$newFlightResult['number_of_seats']}</p>";
        echo "<p>Base Price: £{$newFlightResult['price']}</p>";
    }else{
        echo"<p>There was a problem inserting the data.</p>";
    }


    ?>


</div>
</body>
</html>
