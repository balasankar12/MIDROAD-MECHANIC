<?php include('userlogin.php') ?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script
      src="https://maps.googleapis.com/maps/api/js?callback=initMap"
      defer
    ></script>
    <title>Online Mid-road Mechanic</title>
    <link rel="stylesheet" href="css/head.css" />
    <link rel="stylesheet" href="css/profile.css" /> 
    <link rel="stylesheet" href="css/map.css" />

    </head>
    <body>
    <div class="header">
        <div class="row" >
            <div class="logo">
                <img src="img/logo.png">
            </div>
            <div >
                <div class="dnav">
                    <ul class="main-nav">
                        <li class="welcome" style="margin-right: 400px;"><?php echo "WELCOME ".strtoupper($_SESSION['username']);?></li>
                        <li><a href="userlog.php">BACK</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div  class="bg-gra-02" style="height:100vh">
    <div style="margin-left:100px">
        <h1 style="margin-left:-100px;color:white;">Verify Your Current Location</h1>
</br></br>
<div id="button-layer">
	<button id="btnAction" onClick="locate()">Current Location</button>
</div>
<div id="map-layer"></div>
<form action='userloctomech.php' method='POST'>
<label class="label">Latitude</label>
<input class="input--style-4 js-datepicker" id="lat" type="text" name="latitude"  readonly>
<label class="label">Longitude</label>
<input class="input--style-4 js-datepicker" id="lng" type="text" name="longitude"  readonly></br>
<label class="label">Vechicle</label>
<input class="input--style-4 js-datepicker" id="vehicle" type="text" name="vehicle" required autocomplete="off" /></br>
<input class="input--style-4 js-datepicker" type="text" name="userid" value="<?php echo $_SESSION['userid'];?>" style="display: none;"   readonly></br>
<input class="input--style-4 js-datepicker" type="text" name="mechid"  value="<?php echo $_GET['mechid'];?>" style="display: none;"  readonly></br>
<input type='submit'  name='submit' value='NEXT' class='butt'/>
</form>
</div></div>
    </body>
    <script type="text/javascript">
    var map;
    function initMap() {
        var mapLayer = document.getElementById("map-layer");
        var centerCoordinates = new google.maps.LatLng(37.6, -95.665);
        var defaultOptions = { center: centerCoordinates, zoom: 15 }
        map = new google.maps.Map(mapLayer, defaultOptions);
    }
    
    function locate(){
        document.getElementById("btnAction").disabled = true;
        document.getElementById("btnAction").innerHTML = "Processing...";
        if ("geolocation" in navigator){
            navigator.geolocation.getCurrentPosition(function(position){ 
                var currentLatitude = position.coords.latitude;
                var currentLongitude = position.coords.longitude;
                document.getElementById("lat").value = currentLatitude;
                document.getElementById("lng").value = currentLongitude ;
                var infoWindowHTML = "Latitude: " + currentLatitude + "<br>Longitude: " + currentLongitude;
                var infoWindow = new google.maps.InfoWindow({map: map, content: infoWindowHTML});
                var currentLocation = { lat: currentLatitude, lng: currentLongitude };
                infoWindow.setPosition(currentLocation);
                document.getElementById("btnAction").style.display = 'none';
            });
        }
    }
    </script>
    
</html>



