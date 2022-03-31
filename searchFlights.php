<?php
include "ifSessionHeader.php";
include "connection.php";

$query = $conn->prepare("SELECT * FROM flight");
$query->execute();
$airports = $query->fetchAll();


?>

<img src="assets/images/beachtrim.jpg" width="100%" height="300" alt="beach image">
 <br><br>

<div class = "container" style="background-color:white;">

<h2><strong>Search for Flights</strong></h2>
<p style="color:gray">Use the following fields to search for flights</p>


 <form action="payment.php" method="post">
    <br>
    <label for="from_Airport">*From:</label>
    <select name="from_Airport" style="width: 40%; height: 35px; padding: 5px 35px 5px 5px; font-size: 18px; border: 2px solid #ccc;">
         <?php foreach($airports as $airport): ?>

             <option value="<?= $airport['id'];?>"><?= $airport['name'];?>, <?= $airport['location'];?></option>

         <?php endforeach; ?>
    </select>

    <label for="to_Airport">&ensp;&ensp;&ensp;&ensp; *Destination:</label>
    <select name="to_Airport" style="width: 40%; height: 35px; padding: 5px 35px 5px 5px; font-size: 18px; border: 2px solid #ccc;">

        <?php foreach($airports as $airport): ?>

            <option value="<?= $airport['id'];?>"><?= $airport['name'];?>, <?= $airport['location'];?></option>

        <?php endforeach; ?>

    </select> <br><br>

    <label for="departure_date" style="text-align:right;">Sort Results By:</label>
    <label class="col-xs-3" for="return_date">*Departure Date:</label>
    <label class="col-xs-4" for="sort_results">Return Date</label> <br>

    <input class="col-xs-3" type="date" id="departure_date" name="departure_date" style="height: 35px; padding: 5px 35px 5px 5px; font-size: 18px; border: 2px solid #ccc;">

    <input class="col-xs-4" type="date" id="return_date" name="return_date" style="height: 35px; padding: 5px 35px 5px 5px; font-size: 18px; border: 2px solid #ccc;">

    <select class="col-xs-5"  name="sort_results" style="width: 40%; height: 35px; padding: 5px 35px 5px 5px; font-size: 18px; border: 2px solid #ccc;">

        <option value="0">Don't sort results</option>
        <option value="1">Date (closest)</option>
        <option value="2">Date (furthest)</option>
        <option value="3">Price (low to high)</option>
        <option value="1">Price (high to low)</option>

    </select> <br><br><br>

     <div class="form-group" style="text-align: center;">
         <input type="submit" class ="btn btn-primary" name="submitBtn" value="Search Now">
         <input type="reset" class="btn btn-secondary ml-2" value="Reset">
         <input type="submit" class="btn btn-secondary ml-2" href="payment.php" value="Search for one way flights instead">
     </div>

 </form><br><br>

</div>
</div>

<?php

include "footer.php";

?>
