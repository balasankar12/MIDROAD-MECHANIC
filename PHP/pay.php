
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<title>Online Mid-road Mechanic</title>
	<link rel="stylesheet" href="css/pay.css" /> </head>

<body>
<div class="payment-title">
   <h1>Payment Information</h1>
 </div>
 <form action="feedback.php" method="POST">
 <div class="form-container">
   <div class="field-container">
     <label for="name">Name</label>
     <input id="name" maxlength="20" type="text" name="name">
   </div>
   <div class="field-container">
     <label for="cardnumber">Card Number</label>
     <input id="cardnumber" type="text" pattern="[0-9]*" inputmode="numeric">
   </div>
   <div class="field-container">
     <label for="expirationdate">Expiration (mm/yy)</label>
     <input id="expirationdate" type="text" pattern="[0-9]*" inputmode="numeric">
   </div>
   <div class="field-container">
     <label for="securitycode">Security Code</label>
     <input id="securitycode" type="text" pattern="[0-9]*" inputmode="numeric">
   </div>
   <div class="field-container">
     <label for="amount">Amount</label>
     <input id="amount" type="text" name="amount" value="<?php echo $_POST['amount']?>" readonly>
   </div>
   <input class="input--style-4 js-datepicker" type="text" name="userid" value="<?php echo $_POST['userid']?>" style="display: none;"   readonly></br>
   <input class="input--style-4 js-datepicker" type="text" name="mechid" value="<?php echo $_POST['mechid']?>" style="display: none;"   readonly></br>
   <input class="input--style-4 js-datepicker" type="text" name="businessid" value="<?php echo $_POST['businessid']?>" style="display: none;"   readonly></br>
   <div class="p-t-15">
		<button class="btn btn--radius-2 btn--blue" type="submit" name="pay">Pay   <?php echo $_POST['amount']?></button>
	</div>
 </div>
</form>
</body>

</html>