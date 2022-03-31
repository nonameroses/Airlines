<?php include "ifSessionHeader.php";
 ?>

 <br><br><br><br>
<div class = "container" style="background-color:white;">

<h2>Credit & Debit Cards </h2>
<p style="color:gray"> Transaction fees may apply</p>

 <form action="paymentConfirmation.php" method="post">
     <br><br>

     <div class="form-group">
         <label for="name">Cardholder Name:</label>
         <input type="text" name="name" id ="name" class="form-control" placeholder="John Doe">
     </div>

     <div class="form-group">
         <label for="cardNumber">Card Number:</label>
         <input type="number" name="cardNumber" id ="cardNum" class="form-control" placeholder="XXXXXXXXXXXXXXXX">
     </div>

     <div class="form-group">
         <label for = "CVC">CVC</label>
         <input type="password" name="CVC" id = "CVC" class="form-control" placeholder="3 Digits" maxlength="3">

     </div> <br>



     <div class="form-group" style="text-align: center;">
         <input type="submit" class ="btn btn-primary" name="submitBtn" value="Pay Now">
         <input type="reset" class="btn btn-secondary ml-2" value="Reset">
     </div>
 </form><br><br>

</div>

<div class = "container" style="text-align: center; background-color:white;">

  <img src="assets/images/visa-mastercard-maestro.png" alt="Accepted Payment Methods" align="middle">

</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php include "footer.php";
?>
