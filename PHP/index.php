<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<title>Online Mid-road Mechanic</title>
	<link rel="stylesheet" href="css/style.css" /> 
</head>

<body>
	<div class="form">
		<ul class="tab-group">
			<li class="tab active"><a href="#user">USER</a></li>
			<li class="tab mech"><a href="#mechanic">BUSINESS</a></li>
			<li class="tab admin"><a href="#admin">ADMIN</a></li>
		</ul>
		<div class="tab-content">
			<div id="user">
                <form action="userlogin.php" method="post" class="userlogin">
                    <h1>Welcome Back!</h1>
					<div class="field-wrap">
						<label> Email Address<span class="req">*</span> </label>
						<input type="email" name="uemail" required autocomplete="off" /> </div>
					<div class="field-wrap">
						<label> Password<span class="req">*</span> </label>
						<input type="password" name="upassword" required autocomplete="off" /> </div>
                    <p class="forgot"><a href="#">Forgot Password?</a></p>
					<p class="usermessage">Not registered? <a href="#">Sign In</a></p>
					<?php
                		if(isset($_GET['userlogin'])){
                    		if ('false' == $_GET['userlogin']) {
                        	echo '<span style="color:red">Login failed!</span>';
                    		}
                		}
                	?>

					<button type="submit" class="button button-block" name="loginuser">Log In</button>
                </form>
                <form id="register-form" action="userregister.php" method="post" class="userlogin">
                    <h1>Sign Up</h1>
					<div class="field-wrap">
						<label> Your Name<span class="req">*</span> </label>
						<input type="text" name="uname" required autocomplete="off" /> </div>
					<div class="field-wrap">
						<label> Email Address<span class="req">*</span> </label>
						<input type="email" name="uemail" required autocomplete="off" /> </div>
					<div class="field-wrap">
                        <label> Number<span class="req">*</span> </label>
                        <input type="number" name="unumber" required autocomplete="off" /> </div>
					<div class="top-row">
						<div class="field-wrap">
							<label> Set A Password<span class="req">*</span> </label>
							<input type="password" name="upassword" id="upassword" required autocomplete="off" /> </div>
						<div class="field-wrap">
							<label> Confirm Password<span class="req">*</span> </label>
							<input type="password" id="uconfirmpassword" name="uconfirmpassword" onkeyup='ucheck();' required autocomplete="off" /> </div>
					</div><center><span id='umessage'></span></center>
					<button type="submit" class="button button-block" id="uButton"/>Get Started</button>
                    <p class="usermessage">Already registered? <a href="#">Log In</a></p>
                </form>
			</div>
			<div id="mechanic">
                <form action="mechaniclogin.php" method="post" class="meclogin">
                    <h1>Welcome Back!</h1>
					<div class="field-wrap">
						<label> Email Address<span class="req">*</span> </label>
						<input type="email" name="memail" required autocomplete="off" /> </div>
					<div class="field-wrap">
						<label> Password<span class="req">*</span> </label>
						<input type="password" name="mpassword" required autocomplete="off" /> </div>
                    <p class="forgot"><a href="#">Forgot Password?</a></p>
                    <p class="mecmessage">Not registered? <a href="#">Sign In</a></p>
					<?php
                		if(isset($_GET['mechlogin'])){
                    		if ('false' == $_GET['mechlogin']) {
							echo '<span style="color:red">Login failed!</span>';
                    		}
                		}
                	?>
					<script type="text/javascript">
					  var mechfail = function(e){
						e.preventDefault();
    					if ('false' == <? echo $_GET['mechlogin'] ?>) {
      					$('mech').parent().addClass('active');
      					$('mech').parent().siblings().removeClass('active');

      					target = $('mech').attr('href');

      					$('.tab-content > div').not(target).hide();

      					$(target).fadeIn(600);
   					}
 					 
					</script>
					<button class="button button-block" name="loginmech" />Log In</button>
                </form>
                <form id="register-form" action="mechanicregister.php" method="post" class="meclogin">
                    <h1>Sign Up</h1>
					<div class="field-wrap">
						<label>Business Name<span class="req">*</span> </label>
						<input type="text" name="mname" required autocomplete="off" /> </div>
					<div class="field-wrap">
						<label> Email Address<span class="req">*</span> </label>
                        <input type="email" name="memail" required autocomplete="off" /> </div>
                    <div class="field-wrap">
                        <label> Number<span class="req">*</span> </label>
                        <input type="number" name="mnumber" required autocomplete="off" /> </div>
						<div class="top-row">
							<div class="field-wrap">
								<label> Set A Password<span class="req">*</span> </label>
								<input type="password" name="mpassword" id="mpassword" required autocomplete="off" /> </div>
							<div class="field-wrap">
								<label> Confirm Password<span class="req">*</span> </label>
								<input type="password" id="mconfirmpassword" name="mconfirmpassword" onkeyup='mcheck();' required autocomplete="off" /> </div>
						</div><center><span id='mmessage'></span></center>
                    <div class="field-wrap">
                        <label> City<span class="req">*</span> </label>
                        <input type="text" name="mcity" required autocomplete="off" /> </div>
                    <div class="field-wrap">
                        <label> Location/Landmark<span class="req">*</span> </label>
						<input type="text" name="mlocation" required autocomplete="off" /> </div>
					<div class="field-wrap">
						<label> ID proof (Aadhar No/Voter ID/Licence)<span class="req">*</span> </label>
						<input type="number" name="midproof" required autocomplete="off" /> </div>	
					<button type="submit" class="button button-block" />Get Started</button>
                    <p class="mecmessage">Already registered? <a href="#">Log In</a></p>
                </form>
			</div>
			<div id="admin">
				<h1>Welcome Back!</h1>
				<form action="adminlogin.php" method="post">
					<div class="field-wrap">
						<label> Name <span class="req">*</span> </label>
						<input type="text" name="adminname" required autocomplete="off" /> </div>
					<div class="field-wrap">
						<label> Password<span class="req">*</span> </label>
						<input type="password" name="adminpassword" required autocomplete="off" /> </div>
						<?php
                		if(isset($_GET['adminlogin'])){
                    		if ('false' == $_GET['adminlogin']) {
                        	echo '<span style="color:red">Login failed!</span>';
                    		}
                		}
                	?>
					<button class="button button-block" name="loginadmin" />Log In</button>
				</form>
			</div>
		</div>
		<!-- tab-content -->
	</div>
	<!-- /form -->
	<script src="js/login.js"></script>
</body>

</html>