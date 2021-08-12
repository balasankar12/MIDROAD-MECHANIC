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
                        <li><a href="deletecust.php?userid='<?php echo $_SESSION['userid'];?>'">BACK</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div>
            <?php
                    include('connection.php');
                    $sql1="SELECT * from userlocation where user_id='{$_SESSION['userid']}'";
                    $result = $conn->query($sql1);
                    if ($result->num_rows > 0) {
                        while($row1 = $result->fetch_assoc()) {
                    // output data of each row
                        if( $row1["acc_rej"]==0){
                            $status="PENDING";
                        }
                        else{
                            $status="APPROVED";
                        }echo '
                        <h1 style="margin-top:200px;color:#4a8bcf"><center>Wait For Approvel</h1>
                ';
            }
        }else{
                    $sql2 = "SELECT * FROM(SELECT confirmedcust.acc_rej,confirmedcust.amount,confirmedcust.vehicletype,user_details.user_id, assuredmechanic.mechanic_id,
                    assuredmechanic.business_id,assuredmechanic.mechanic_name,assuredmechanic.business_name FROM assuredmechanic,confirmedcust,
                    user_details WHERE confirmedcust.user_id=user_details.user_id && confirmedcust.mechanic_id=assuredmechanic.mechanic_id)a 
                    WHERE a.user_id='{$_SESSION['userid']}'";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0) {
                    // output data of each row
                    while($row1 = $result2->fetch_assoc()) {
                        if( $row1["acc_rej"]==0){
                            $status="PENDING";
                        }
                        else{
                            $status="APPROVED";
                        }
                echo '<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
                <h2 class="title">PAYMENT</h2>
                    <div class="wrapper wrapper--w680">
                        <div class="card card-4">
                            <div class="card-body">
                                <form method="POST" action="pay.php">
                                <div class="row row-space">
                                        <div class="col-2">
                                            <label class="label">Mechanic Name</label>
                                            <input class="input--style-4" type="text" name="businessname" value="'. $row1["business_name"].'" readonly> </div>
                                    </div>
                                    <div class="row row-space">
                                        <div class="col-2">
                                            <label class="label">Mechanic Name</label>
                                            <input class="input--style-4" type="text" name="mechname" value="'. $row1["mechanic_name"].'" readonly> </div>
                                    </div>
                                    <div class="row row-space">
                                        <div class="col-2">
                                            <label class="label">Status</label>
                                            <input class="input--style-4 js-datepicker" type="text" name="status" value="'.$status.'" readonly> </div>
                                    </div>
                                    <div class="row row-space">
                                        <div class="col-2">
                                            <label class="label">Amount(*This is just mechanic fee*)</label>
                                            <input class="input--style-4 js-datepicker" type="text" name="amount" value="'. $row1["amount"].'" readonly> </div>
                                    </div>
                                    <input class="input--style-4 js-datepicker" type="text" name="userid" value="'. $row1["user_id"].'" style="display: none;"   readonly></br>
                                    <input class="input--style-4 js-datepicker" type="text" name="mechid" value="'. $row1["mechanic_id"].'" style="display: none;"   readonly></br>
                                    <input class="input--style-4 js-datepicker" type="text" name="businessid" value="'. $row1["business_id"].'" style="display: none;"   readonly></br>
                                    <div class="p-t-15">
                                        <button class="btn btn--radius-2 btn--blue" type="submit" name="pay">PAY</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                        </div>
                        </div>
            ';
            $count=mysqli_num_rows($result2);
        }
    }else{echo '<h1 style="margin-top:200px;color:#4a8bcf"><center>You are Rejected</center></h1>';}
}
        $conn->close();
    ?> 
    </div>
    </body>
    
</html>