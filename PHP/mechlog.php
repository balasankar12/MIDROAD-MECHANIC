<?php include('mechaniclogin.php') ?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
		<title>Online Mid-road Mechanic</title>
		<link rel="stylesheet" href="css/head.css" />
		<link rel="stylesheet" href="css/table.css" />
		<link rel="stylesheet" href="css/profile.css" />
		<style type="text/css">
		#map {
			width: 200px;
			height: 200px;
		}
		#userloc{
			width: 200px;
			height: 200px;
		}
		</style>
	</head>

	<body>
		<div class="header">
			<div class="row">
				<div class="logo"> <img src="img/logo.png"> </div>
				<div>
					<div style="float:right;margin-right: 100px; color:blue;font-size:25px;">
						<?php echo "WELCOME".strtoupper($_SESSION['businessname']);?>
					</div>
					<div class="dnav">
						<ul class="main-nav">
							<li><a href="#" onclick="toggleVisibility('home');">Home</a></li>
							<li><a href="#" onclick="toggleVisibility('mechprofile');">Profile</a></li>
							<li>
								<div class="dropdown"> <a href="" class="dropbtn">Business </a>
									<div class="dropdown-content"> <a href="#" onclick="toggleVisibility('business');">New</a> <a href="#" onclick="toggleVisibility('business_profile');">Profile</a><a href="#" onclick="toggleVisibility('acceptuser');">Accept Cust</a> </div>
								</div>
							</li>
							<li><a href="#" onclick="toggleVisibility('feedback');">Feedback</a></li>
							<li><a href="index.php">Logout</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="home">
			<div style="float:left;width:40%;font-size: x-large; font-family: 'Eras Bold ITC'; font-weight: 1400; font-style: inherit;  color:dimgray;margin-left:50px;margin-top:70px">
				<p> <strong style="color:royalblue;">
                What is Roadside Assistance?
                </strong></br>
					</br> Roadside assistance is a vehicular support service offered by MidRoad Mechanic to individuals who experience a vehicular breakdown. The service typically provides benefits such as getting the vehicle fixed on the spot, refueling it, towing the vehicle to the nearest garage or a specific location, extending medical assistance and much more. MidRoad Mechanic offers the best road assistance for cars / four wheelers and two wheelers in India. </p>
			</div>
			<div style="float:right;width:40%;margin-right:100px;"> <img src="img/carmechimg.jpg"> </div>
		</div>
		<div id="mechprofile" style="display: none;">
			<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
				<h2 class="title">BUSINESS PROFILE</h2>
				<div class="wrapper wrapper--w680">
					<div class="card card-4">
						<div class="card-body">
							<form method="POST">
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Business Name</label>
										<input class="input--style-4" type="text" name="name" value="<?php echo $_SESSION['businessname'];?>" readonly> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">E-Mail</label>
										<input class="input--style-4 js-datepicker" type="text" name="mail" value="<?php echo $_SESSION['businessmailid'];?>" readonly> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Number</label>
										<input class="input--style-4 js-datepicker" type="text" name="number" value="<?php echo $_SESSION['businessnum'];?>" readonly> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Password</label>
										<input class="input--style-4 js-datepicker" type="text" name="password" value="<?php echo $_SESSION['businesspwd'];?>" readonly> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">City</label>
										<input class="input--style-4 js-datepicker" type="text" name="city" value="<?php echo $_SESSION['city'];?>" readonly> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Location</label>
										<input class="input--style-4 js-datepicker" type="text" name="location" value="<?php echo $_SESSION['location'];?>" readonly> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">ID-Proof</label>
										<input class="input--style-4 js-datepicker" type="text" name="idproof" value="<?php echo $_SESSION['idproof'];?>" readonly> </div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="business" style="display: none;">
			<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
			<h2 class="title">MECH PROFILE</h2>
				<div class="wrapper wrapper--w680">
					<div class="card card-4">
						<div class="card-body">
							<form method="POST" action="new_business.php">
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Business Name</label>
										<input class="input--style-4" type="text" name="businessname" value="<?php echo $_SESSION['businessname'];?>" readonly> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Business Id</label>
										<input class="input--style-4 js-datepicker" type="text" name="mechid" value="<?php echo $_SESSION['businessid'];?>" readonly> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Mechanic Name</label>
										<input class="input--style-4 js-datepicker" type="text" name="mechname"> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">services</label>
										<input class="input--style-4 js-datepicker" type="text" name="services"> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Available</label>
										<input class="input--style-4 js-datepicker" type="text" name="available"> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Number</label>
										<input class="input--style-4 js-datepicker" type="number" name="number"> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">City</label>
										<input class="input--style-4 js-datepicker" type="text" name="mechcity" value="<?php echo $_SESSION['city'];?>" readonly> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Location:</label>
										<div id="map"></div>
										<label class="label">Latitude</label>
										<input class="input--style-4 js-datepicker" id="lat" type="text" name="latitude">
										<label class="label">Longitude</label>
										<input class="input--style-4 js-datepicker" id="lng" type="text" name="longitude"> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Experience</label>
										<input class="input--style-4 js-datepicker" type="text" name="experience"> </div>
								</div>
								<div class="p-t-15">
									<button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="business_profile" style="display: none;">
			
				<?php
                include('connection.php');
                $sql = "select * from mechanic where business_id = '{$_SESSION['businessid']}'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
				// output data of each row
				echo '<table class="customers">
				<tr>
					<th>Mechanic ID</th>
					<th>Business Name</th>
					<th>Business ID</th>
					<th>Mechanic Name</th>
					<th>Services</th>
					<th>Available</th>
					<th>Number</th>
					<th>City</th>
					<th>Latitude</th>
					<th>Longitude</th>
					<th>Experience</th>
					<th>Status</th>
				</tr>';
                while($row = $result->fetch_assoc()) {
                    if( $row["status"]==0){
                        $status="PENDING";
                    }
                    else{
                        $status="APPROVED";
                    }
                echo '
                        <tr>
                            <td >'. $row["mechanic_id"].'</td>
                            <td >'. $row["business_name"].'</td>
                            <td >'. $row["business_id"].'</td>
                            <td >'. $row["mechanic_name"].'</td>
                            <td >'. $row["services"].'</td>
                            <td >'. $row["available"].'</td>
                            <td >'. $row["number"].'</td>
                            <td >'. $row["city"].'</th>
                            <td >'. $row["latitude"].'</th>
                            <td >'. $row["longitude"].'</th>
                            <td >'. $row["experience"].'</th>
                            <td >'. $status.'</th>
                        </tr>';
                }
                echo '</table>';
                } else { $sql1 = "select * from assuredmechanic where business_id = '{$_SESSION['businessid']}'";
                $result1 = $conn->query($sql1);
                if ($result1->num_rows > 0) {
				// output data of each row
				echo '<table class="customers">
				<tr>
					<th>Mechanic ID</th>
					<th>Business Name</th>
					<th>Business ID</th>
					<th>Mechanic Name</th>
					<th>Services</th>
					<th>Available</th>
					<th>Number</th>
					<th>City</th>
					<th>Latitude</th>
					<th>Longitude</th>
					<th>Experience</th>
					<th>Status</th>
				</tr>';
                while($row = $result1->fetch_assoc()) {
                    if( $row["status"]==0){
                        $status="PENDING";
                    }
                    else{
                        $status="APPROVED";
                    }
                echo '
                        <tr>
                            <td >'. $row["mechanic_id"].'</td>
                            <td >'. $row["business_name"].'</td>
                            <td >'. $row["business_id"].'</td>
                            <td >'. $row["mechanic_name"].'</td>
                            <td >'. $row["services"].'</td>
                            <td >'. $row["available"].'</td>
                            <td >'. $row["number"].'</td>
                            <td >'. $row["city"].'</th>
                            <td >'. $row["latitude"].'</th>
                            <td >'. $row["longitude"].'</th>
                            <td >'. $row["experience"].'</th>
                            <td >'. $status.'</th>
                        </tr>';
                }
                echo '</table>';
            }
				else{echo '<h1 style="margin-top:200px;color:#4a8bcf"><center>No Mechanics Found</center></h1>';
					echo '</table>'; }
        }
                $conn->close();
            ?>
	</div>
	<div id="acceptuser" style="display: none;">
		<?php
                include('connection.php');
                $sql2 = "SELECT * FROM(SELECT user_details.user_id,user_details.name,user_details.mail_id, 
				user_details.number, userlocation.latitude, userlocation.longitude, userlocation.vehicletype,
				assuredmechanic.mechanic_id,assuredmechanic.business_id FROM userlocation,user_details,assuredmechanic
				WHERE userlocation.user_id=user_details.user_id && 
				userlocation.mechanic_id=assuredmechanic.mechanic_id)a WHERE a.business_id = '{$_SESSION['businessid']}'";
                $result2 = $conn->query($sql2);
                if ($result2->num_rows > 0) {
                // output data of each row
                while($row1 = $result2->fetch_assoc()) {
			echo '<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
			
			<h2 class="title">Detail of Customer</h2>
				<div class="wrapper wrapper--w680">
					<div class="card card-4">
						<div class="card-body">
							<form method="POST" action="custaccept.php">
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Customer Name</label>
										<input class="input--style-4" type="text" name="cname" value="'. $row1["name"].'" readonly> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">E-Mail</label>
										<input class="input--style-4 js-datepicker" type="text" name="cmail" value="'. $row1["mail_id"].'" readonly> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Number</label>
										<input class="input--style-4 js-datepicker" type="text" name="cnumber" value="'. $row1["number"].'" readonly> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Location</label>
										<div id="userloc"></div>
								</div>
								
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Latitude</label>
										<input class="input--style-4 js-datepicker" type="text" name="lat" value="'. $row1["latitude"].'" readonly> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Longitude</label>
										<input class="input--style-4 js-datepicker" type="text" name="lon" value="'. $row1["longitude"].'" readonly> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Vehicle</label>
										<input class="input--style-4 js-datepicker" type="text" name="vehicle" value="'. $row1["vehicletype"].'" readonly> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Amount</label>
										<input class="input--style-4 js-datepicker" type="text" name="amount" > </div>
								</div>
								<input class="input--style-4 js-datepicker" type="text" name="userid" value="'. $row1["user_id"].'" style="display: none;"   readonly></br>
								<input class="input--style-4 js-datepicker" type="text" name="mechid" value="'. $row1["mechanic_id"].'" style="display: none;"   readonly></br>
								<input class="input--style-4 js-datepicker" type="text" name="businessid" value="'. $row1["business_id"].'" style="display: none;"   readonly></br>
								<div class="p-t-15">
									<button class="btn btn--radius-2 btn--blue" type="submit" name="accept">Accept</button>
									<button class="btn btn--radius-2 btn--blue" type="submit" name="reject">Reject</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				
			</div>
		<script type="text/javascript" language="javascript">
		var locations = [['. $row1["latitude"].','. $row1["longitude"].']];

		var marker, i;
		
		for (i = 0; i < locations.length; i++) {
		  var map = new google.maps.Map(document.getElementById("userloc"), {
			zoom: 10,
			center: new google.maps.LatLng(locations[i][0], locations[i][1]),
			mapTypeId: google.maps.MapTypeId.ROADMAP
		  });
		
		  var infowindow = new google.maps.InfoWindow();
		  marker = new google.maps.Marker({
			position: new google.maps.LatLng(locations[i][0], locations[i][1]),
			map: map
		  });
		
		  google.maps.event.addListener(
			marker,
			"click",
			(function (marker, i) {
			  return function () {
				infowindow.setContent(locations[i][0]);
				infowindow.open(map, marker);
			  };
			})(marker, i)
		  );
		}
		
    </script>';
	}
}else{echo '<h1 style="margin-top:200px;color:#4a8bcf"><center>NO CUSTOMER REQUESTED</center></h1>';}
	$conn->close();
?> 

</div>

<div id="feedback" style="display: none;">
							
<?php
                include('connection.php');
                $sql4 = "select * from feedback where business_id='{$_SESSION['businessid']}'";
                $result4 = $conn->query($sql4);
                if ($result4->num_rows > 0) {
                // output data of each row
                echo '<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." title="Type in a name">
                <table class="customers" id="myTable">
				<tr >
					<th >Mechanic ID</th>
                    <th >User Name</th>
                    <th >Message</th>
                </tr>';
                while($row4 = $result4->fetch_assoc()) {
                echo '
                        <tr >
                            <td >'. $row4["mechanic_id"].'</td>
                            <td >'. $row4["name"].'</td>
                            <td >'. $row4["message"].'</td>
                        </tr>';
                }
                } else { echo '<h1 style="margin-top:100px;"><center>No USERS Found</center></h1>'; }
                $conn->close();
            ?>
        </table>
</div>
		<script src="js/mechprofile.js"></script>
		<script type="text/javascript">
		//Set up some of our variables.
		var map; //Will contain map object.
		var marker = false; ////Has the user plotted their location marker? 
		//Function called to initialize / create the map.
		//This is called when the page has loaded.
		function initMap() {
			//The center location of our map.
			var centerOfMap = new google.maps.LatLng(11.212525159167132, 78.72796201915371);
			//Map options.
			var options = {
				center: centerOfMap, //Set center.
				zoom: 7 //The zoom value.
			};
			//Create the map object.
			map = new google.maps.Map(document.getElementById('map'), options);
			//Listen for any clicks on the map.
			google.maps.event.addListener(map, 'click', function(event) {
				//Get the location that the user clicked.
				var clickedLocation = event.latLng;
				//If the marker hasn't been added.
				if(marker === false) {
					//Create the marker.
					marker = new google.maps.Marker({
						position: clickedLocation,
						map: map,
						draggable: true //make it draggable
					});
					//Listen for drag events!
					google.maps.event.addListener(marker, 'dragend', function(event) {
						markerLocation();
					});
				} else {
					//Marker has already been added, so just change its location.
					marker.setPosition(clickedLocation);
				}
				//Get the marker's location.
				markerLocation();
			});
		}
		//This function will get the marker's current location and then add the lat/long
		//values to our textfields so that we can save the location.
		function markerLocation() {
			//Get location.
			var currentLocation = marker.getPosition();
			//Add lat and lng values to a field that we can save.
			document.getElementById('lat').value = currentLocation.lat(); //latitude
			document.getElementById('lng').value = currentLocation.lng(); //longitude
		}
		//Load the map when the page has finished loading.
		google.maps.event.addDomListener(window, 'load', initMap);
		</script>
		<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
	</body>

	</html>