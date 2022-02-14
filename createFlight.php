<?php
session_start();

include "connection.php";

$query = $conn->prepare("SELECT * FROM airports");
$query->execute();
$airports = $query->fetchAll();

?>

<html>

<body>

    <div class="content">

        <h1>Add New Flight</h1>

        <p>Fill in the fields below and click "Add Flight" to add a new flight</p> <br><br><br>

        <form action="saveFlight.php" method="post" align="center">


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

            <label for="pilot_id">Pilot ID:</label>
            <input type="number" id="pilot_id" name="pilot_id"> <br><br>

            <label for="attendant_id">Attendant ID:</label>
            <input type="number" id="attendant_id" name="attendant_id"> <br><br>

            <label for="departure_datetime">Departure Date:</label>
            <input type="datetime" id="departure_datetime" name="departure_datetime"> <br><br>

            <label for="arrival_datetime">Arrival Time:</label>
            <input type="datetime" id="arrival_datetime" name="arrival_datetime"> <br><br>

            <label for="number_of_seats">Attendant ID:</label>
            <input type="number" id="number_of_seats" name="number_of_seats"> <br><br>

            <label for="price">Attendant ID:</label>
            <input type="number" id="price" name="price"> <br><br>

            <input type="submit" name="submitBtn" value="Add Flight">
        </form>

    </div>

</body>

</html>
