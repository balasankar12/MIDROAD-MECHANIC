<?php
include('connection.php');

$sql1="INSERT INTO userlocation (latitude, longitude,user_id,mechanic_id,vehicletype) 
VALUES ('".$_POST["latitude"]."','".$_POST["longitude"]."','".$_POST["userid"]."','".$_POST["mechid"]."','".$_POST["vehicle"]."')";

if ($conn->query($sql1)==TRUE){
    echo "<script>
    window.location.href='payment.php';
    </script>"; 
}else{
    echo "<script>alert('give valid information');
    window.location.href='usermech.php';
    </script>"; 
}
?>