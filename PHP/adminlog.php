<?php include('adminlogin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<title>Online Mid-road Mechanic</title>
	<link rel="stylesheet" href="css/head.css" />
    <link rel="stylesheet" href="css/table.css" />
</head>

<body>
    <div class="header">
        <div class="row">
            <div class="logo">
                <img src="img/logo.png">
            </div>
            <div >
            <div style="float:right;margin-right: 100px; color:blue;font-size:25px;">
                    <?php echo "WELCOME ".strtoupper($_SESSION['adminname']);?>    
                </div>
                <div class="dnav">
                    <ul class="main-nav">
                        <li><a href="#" onclick="toggleVisibility('home');">Home</a></li>
                        <li><a href="#" onclick="toggleVisibility('custdetails');">Customer Details</a></li>
                        <li><a href="#" onclick="toggleVisibility('business');">Business</a></li>
                        <li><a href="#" onclick="toggleVisibility('approve');">Approve Bussiness</a></li>
                        <li><a href="#" onclick="toggleVisibility('feedback');">Feedback</a></li>
                        <li><a href="index.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="home">
        <div style="float:left;width:40%;font-size: x-large; font-family: 'Eras Bold ITC'; font-weight: 1400; font-style: inherit;  color:dimgray;margin-left:50px;margin-top:70px">
            <p>
                <strong style="color:royalblue;">
                What is Roadside Assistance?
                </strong></br></br>
                Roadside assistance is a vehicular support service offered by MidRoad Mechanic to individuals who experience a vehicular breakdown. The service typically provides benefits such as getting the vehicle fixed on the spot, refueling it, towing the vehicle to the nearest garage or a specific location, extending medical assistance and much more. MidRoad Mechanic offers the best road assistance for cars / four wheelers and two wheelers in India.
            </p>
        </div>
        <div style="float:right;width:40%;margin-right:100px;">
            <img src="img/carmechimg.jpg">
        </div>
    </div>
    <div id="custdetails" style="display: none;">
						
                    <?php
                include('connection.php');
                $sql = "select user_id,name,password,mail_id,number from user_details";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                echo '<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." title="Type in a name">
                <table class="customers" id="myTable">
                <tr >
                    <th >ID</th>
                    <th >User Name</th>
                    <th >Password</th>
                    <th >E-mail</th>
                    <th >Number</th>
                </tr>';
                while($row = $result->fetch_assoc()) {
                echo '
                        <tr >
                            <td >'. $row["user_id"].'</td>
                            <td >'. $row["name"].'</td>
                            <td >'. $row["password"].'</td>
                            <td >'. $row["mail_id"].'</td>
                            <td >'. $row["number"].'</td>
                        </tr>';
                }
                } else { echo '<h1 style="margin-top:100px;"><center>No USERS Found</center></h1>'; }
                $conn->close();
            ?>
        </table>
    </div>
    <div id="business" style="display: none;" >
						
                    <?php
                include('connection.php');
                $sql1 = "select * from assuredmechanic ";
                $result1 = $conn->query($sql1);
                if ($result1->num_rows > 0) {
                // output data of each row
                echo '
                <table class="customers" id="myTable" style="margin-top:100px">
                <tr>
                    <th >Business ID</th>
                    <th >Business Name</th>
                    <th >Mechanic ID</th>
                    <th >Mechanic Name</th>
                    <th >Services</th>
                    <th >Available</th>
                    <th >Number</th>
                    <th >City</th>
                    <th >Latitude</th>
                    <th >Longitude</th>
                    <th >Experience</th>
                    <th >REMOVE</th>
                </tr>';
                while($row1 = $result1->fetch_assoc()) {
                echo '
                        <tr>
                            <td >'. $row1["mechanic_id"].'</td>
                            <td >'. $row1["business_name"].'</td>
                            <td >'. $row1["business_id"].'</td>
                            <td >'. $row1["mechanic_name"].'</td>
                            <td >'. $row1["services"].'</td>
                            <td >'. $row1["available"].'</td>
                            <td >'. $row1["number"].'</td>
                            <td >'. $row1["city"].'</td>
                            <td >'. $row1["latitude"].'</td>
                            <td >'. $row1["longitude"].'</td>
                            <td >'. $row1["experience"].'</td>';
                echo "<td><form action='deletemech.php?id=".$row1['mechanic_id']."' method='POST'>    
                            <input type='submit' name='submit' value='DELETE'/></form></td></tr>";
                }
                } else { echo '<h1 style="margin-top:100px;"><center>No Mechanics Found</center></h1>'; }
                $conn->close();
            ?>
            </table>
    </div>
    <div id="approve" style="display: none;" >
						
                    <?php
                include('connection.php');
                $sql = "select * from mechanic";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                echo '
                <table class="customers" id="myTable" style="margin-top:100px">
                <tr>
                    <th >Business ID</th>
                    <th >Business Name</th>
                    <th >Mechanic ID</th>
                    <th >Mechanic Name</th>
                    <th >Services</th>
                    <th >Available</th>
                    <th >Number</th>
                    <th >City</th>
                    <th >Latitude</th>
                    <th >Longitude</th>
                    <th >Experience</th>
                    <th >Status</th>
                </tr>';
                while($row = $result->fetch_assoc()) {
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
                            <td >'. $row["experience"].'</th>';
                echo "<td><form action='approve.php?id=".$row['mechanic_id']."' method='POST'>   
                            <input type='radio' id='approve' name='approval' value=1>
                            <label for='approve'>Approve</label><br>
                            <input type='radio' id='reject' name='approval' value=0>
                            <label for='reject'>Reject</label><br>   
                            <input type='submit' name='submit' /></form></td></tr>";
                }
                } else { echo '<h1 style="margin-top:100px;"><center>No Mechanics Found</center></h1>'; }
                $conn->close();
            ?>
            </table>
    </div>
    <div id="feedback" style="display: none;">
						
                        <?php
                    include('connection.php');
                    $sql = "select * from feedback";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                    echo '
                    <table class="customers" id="myTable" style="margin-top:100px">
                    <tr >
                        <th >BusinessID</th>
                        <th >User Name</th>
                        <th >Message</th>
                        <th >E-mail</th>
                    </tr>';
                    while($row = $result->fetch_assoc()) {
                    echo '
                            <tr >
                                <td >'. $row["business_id"].'</td>
                                <td >'. $row["name"].'</td>
                                <td >'. $row["message"].'</td>
                                <td >'. $row["mail_id"].'</td>
                            </tr>';
                    }
                    } else { echo '<h1 style="margin-top:100px;"><center>No USERS Found</center></h1>'; }
                    $conn->close();
                ?>
            </table>
        </div>

   
    <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
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


        
    <script type="text/javascript">
        var divs = ["home", "custdetails", "business", "approve","feedback"];
        var visibleDivId = null;
        function toggleVisibility(divId) {
            if (visibleDivId === divId) {
                //visibleDivId = null;
            } else {
                visibleDivId = divId;
            }
            hideNonVisibleDivs();
        }
        function hideNonVisibleDivs() {
            var i, divId, div;
            for (i = 0; i < divs.length; i++) {
                divId = divs[i];
                div = document.getElementById(divId);
                if (visibleDivId === divId) {
                    div.style.display = "block";
                } else {
                div.style.display = "none";
                }
            }
        }
    </script>
    </body>
</html>