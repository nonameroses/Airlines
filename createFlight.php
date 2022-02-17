<?php

//session_start();

include "connection_umur.php";

$query = $conn->prepare("SELECT * FROM airports");
$query->execute();
$airports = $query->fetchAll();

?>

<html>

<body>

    <div class="content">

        <h1>Add New Flight</h1>

        <p>Fill in the fields below and click "Add Flight" to add a new flight</p> <br><br><br>

        <form action="saveNewFlight.php" method="post" align="center">


            <label for="from_Airport">Origin of Flight: </label>
            <select name="from_Airport">

                <?php foreach($airports as $airport): ?>

                    <option value="<?= $airport['id'];?>"><?= $airport['name'];?>, <?= $airport['location'];?></option>

                <?php endforeach; ?>

                ?>

            </select>
            <br><br>

            <label for="to_Airport">Destination of Flight: </label>
            <select name="to_Airport">


                <?php foreach($airports as $airport): ?>

                    <option value="<?= $airport['id'];?>"><?= $airport['name'];?>, <?= $airport['location'];?></option>

                <?php endforeach; ?>

                ?>

            </select>
            <br><br>

            <label for="departure_datetime">Departure Date:</label>
            <input type="datetime-local" id="departure_datetime" name="departure_datetime"> <br><br>

            <label for="arrival_datetime">Arrival Time:</label>
            <input type="datetime-local" id="arrival_datetime" name="arrival_datetime"> <br><br>

            <label for="number_of_seats">Number of Seats:</label>
            <input type="number" id="number_of_seats" name="number_of_seats"> <br><br>

            <label for="price">Base Price:</label>
            <input type="number" id="price" name="price" placeholder="Enter a number (£)" min="0" step=".01"> <br><br>

            <input type="submit" name="submitBtn" value="Add Flight">
        </form>

    </div>

</body>

</html>
