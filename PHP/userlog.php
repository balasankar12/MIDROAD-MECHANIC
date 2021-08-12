<?php include('userlogin.php') ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<title>Online Mid-road Mechanic</title>
    <link rel="stylesheet" href="css/head.css" /> 
    <link rel="stylesheet" href="css/table.css" /> 
    <link rel="stylesheet" href="css/profile.css" /> 

</head>

<body>
    <div class="header">
        <div class="row" >
            <div class="logo">
                <img src="img/logo.png">
            </div>
            <div >
            <div style="float:right;margin-right: 100px; color:blue;font-size:25px;">
                    <?php echo "WELCOME ".strtoupper($_SESSION['username']);?>    
                </div>
                <div class="dnav">
                    <ul class="main-nav">
                        <li><a href="#" onclick="toggleVisibility('home');">HOME</a></li>
                        <li><a href="#" onclick="toggleVisibility('userprofile');">PROFILE</a></li>
                        <li><a href="#" onclick="toggleVisibility('findmech');">FIND MECHANIC</a></li>
                        <li><a href="index.php">LOGOUT</a></li>
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
    <div id="userprofile" style="display: none;" >
        <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
            <h2 class="title">YOUR PROFILE</h2>
            <div class="wrapper wrapper--w680">
                <div class="card card-4">
                    <div class="card-body">
                        <form method="POST">
                            <div class="row row-space">
                                <div class="col-2">
                                    <label class="label">Name</label>
                                    <input class="input--style-4" type="text" name="name" value="<?php echo $_SESSION['username'];?>" readonly>        
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <label class="label">E-Mail</label>
                                    <input class="input--style-4 js-datepicker" type="text" name="mail" value="<?php echo $_SESSION['mailid'];?>" readonly>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <label class="label">Number</label>
                                    <input class="input--style-4 js-datepicker" type="text" name="number" value="<?php echo $_SESSION['num'];?>" readonly>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <label class="label">Password</label>
                                    <input class="input--style-4 js-datepicker" type="text" name="password" value="<?php echo $_SESSION['pwd'];?>" readonly>
                                </div>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="findmech" style="display: none;" >
    
						
                    <?php
                include('connection.php');
                $sql1 = "select * from assuredmechanic ";
                $result1 = $conn->query($sql1);
                if ($result1->num_rows > 0) {
                // output data of each row
                
                echo '<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." title="Type in a name">
                <table class="customers" id="myTable">
                <tr >
                    <th >Business Name</th>
                    <th >Mechanic Name</th>
                    <th >Services</th>
                    <th >Available</th>
                    <th >Number</th>
                    <th >City</th>
                    <th >Experience</th>
                    <th style="width:200px">SELECT</th>
                </tr>';
                while($row1 = $result1->fetch_assoc()) {
                echo '
                        <tr>
                            <td >'. $row1["business_name"].'</td>
                            <td >'. $row1["mechanic_name"].'</td>
                            <td >'. $row1["services"].'</td>
                            <td >'. $row1["available"].'</td>
                            <td >'. $row1["number"].'</td>
                            <td >'. $row1["city"].'</td>
                            <td >'. $row1["experience"].'</td>';
                echo "<td style='width:200px'><form action='usermech.php?mechid=".$row1['mechanic_id']."' method='POST'>    
                            <input type='submit'  name='submit' value='SELECT' class='button' style='width:200px'/></form></td></tr>";
                }
                } else { echo ' <h1 style="margin-top:100px;"><center>No Mechanics Found</center></h1>'; }
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
    td = tr[i].getElementsByTagName("td")[5];
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
    <script src="js/userprofile.js"></script>
</body>
</html>