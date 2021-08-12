<?php
 session_start();

 include('connection.php');
 
 $sql1="INSERT INTO payment (Name, user_id, mechanic_id,business_id,amount) 
 VALUES ('".$_POST["name"]."','".$_POST["userid"]."','".$_POST["mechid"]."','".$_POST["businessid"]."','".$_POST["amount"]."')";
 $sql2="DELETE FROM confirmedcust WHERE user_id={$_POST['userid']}";
  if ($conn->query($sql1)==TRUE&&$conn->query($sql2)==TRUE){
    
     echo "<script>alert('payment Successful');
     </script>"; 
 }else{
     echo "Registration Failed";
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V12</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>

	<div class="bg-contact100" style="background-image: url('img/bg-01.jpg');">
		<div class="container-contact100">
			<div class="wrap-contact100">
				<div class="contact100-pic js-tilt" data-tilt>
					<img src="img/img-01.png" alt="IMG">
				</div>

				<form class="contact100-form validate-form" action="feedbacksend.php" method="POST">
					<span class="contact100-form-title">
						Get in touch
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Name is required">
						<input class="input100" type="text" name="name"  placeholder="Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Message is required">
						<textarea class="input100" name="message" placeholder="Message"></textarea>
						<span class="focus-input100"></span>
					</div>
                    <input class="input--style-4 js-datepicker" type="text" name="userid" value="<?php echo $_POST['userid']?>" style="display: none;"   readonly></br>
   <input class="input--style-4 js-datepicker" type="text" name="mechid" value="<?php echo $_POST['mechid']?>" style="display: none;"   readonly></br>
   <input class="input--style-4 js-datepicker" type="text" name="businessid" value="<?php echo $_POST['businessid']?>" style="display: none;"   readonly></br>
   
					<div class="container-contact100-form-btn">
						<button class="contact100-form-btn" type="submit" name="feedback">
							Send
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
