<?php
include "ifSessionHeader.php";
if(!isset($_SESSION)){
    session_start();
}
?>

<div class="container text-center">
    <br> <br>
    <h2 class="thin">To contact us please use information bellow  </h2>

    <div class="row">
        Telephone number (07693849284) <br>
        Email (Contact@PenguinAirlines.co.uk) <br>
        Address (45 arctic street SD8 2AB)<br>
        Send a message feature (name, email, message )
        <br>
        <?php if( isset( $_SESSION['first_name'])) {

            echo $_SESSION['first_name'];
        }
         ?>

    </div> <!-- /row  -->
</div>





<?php
include("footer.php");

?>
