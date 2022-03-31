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
        $returnDateTime=$_POST['return_datetime'];
        $numOfSeats = $_POST['number_of_seats'];
        $price = $_POST['price'];
        $oneWayStatus = $_POST['one_way_status'];
    } else {
        trigger_error("Error: Form Transmission Failure", E_USER_ERROR);
    }

    $test = $returnDateTime;

    echo "$test";

    if(!isset($numOfSeats) || !isset($price)) {
       trigger_error ("ERROR: You did not fill out the required fields.", E_USER_ERROR);
    }

    if ((empty(date_parse($returnDateTime)['year'])) || (empty(date_parse($departureDateTime)['year']))) {
        trigger_error ("ERROR: You must set a departure and return date", E_USER_ERROR);
    }


    /**These lines compare the return date with the current time to see if the return is earlier than the local time

    $dt = new DateTime("now", new DateTimeZone('Europe/London'));

    $dt = $dt->format('Y/d/m H:i');

    if ($returnDateTime < $dt) {
        trigger_error ("ERROR: return date can not be set in the past", E_USER_ERROR);
    } //DOESNT WORK
    **/

    if ($departureDateTime > $returnDateTime) {
        trigger_error ("ERROR: The return date is set before the departure date.", E_USER_ERROR);
    }

    echo "$oneWayStatus";
    if ($oneWayStatus == TRUE) {
      $oneWayStatus = 1;
    } else {
      $oneWayStatus = 0;
    }



        //MAIN SQL STATEMENT FOR FLIGHT
        $query="INSERT INTO flights (id, origin_id, destination_id, departure_datetime, return_datetime, number_of_seats, price, one_way_status) VALUES (NULL,:originId, :destinationId, :departureDateTime, :returnDateTime, :number_of_seats, :price, :one_way_status)";
        $stmt=$conn->prepare($query);
        $stmt->bindValue(':originId', $FromAirport);
        $stmt->bindValue(':destinationId', $ToAirport);
        $stmt->bindValue(':departureDateTime', $departureDateTime);
        $stmt->bindValue(':returnDateTime', $returnDateTime);
        $stmt->bindValue(':number_of_seats', $numOfSeats);
        $stmt->bindValue(':price', $price);
        $stmt->bindValue(':one_way_status', $oneWayStatus);


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
            echo "<h1>Return</h1>";
            echo "<p>Datetime: {$newFlightResult['return_datetime']}</p>";
            echo "<h1>Other Details</h1>";
            echo "<p>Number of Seats: {$newFlightResult['number_of_seats']}</p>";
            echo "<p>Base Price: £{$newFlightResult['price']}</p>";
            echo "<p>One Way: {$newFlightResult['one_way_status']}</p>";
        }else{
            echo"<p>There was a problem inserting the data.</p>";
        }


        ?>


</div>
</body>
</html>
