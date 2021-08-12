<?php
include('connection.php');

$sql1="INSERT INTO mechanic (business_name , business_id,mechanic_name, services, available, number, city, latitude, longitude, experience) 
VALUES ('".$_POST["businessname"]."','".$_POST["mechid"]."','".$_POST["mechname"]."','".$_POST["services"]."','".$_POST["available"]."','".$_POST["number"]."','".$_POST["mechcity"]."','".$_POST["latitude"]."','".$_POST["longitude"]."','".$_POST["experience"]."')";

if ($conn->query($sql1)==TRUE){
    echo "<script>alert('Successful Wait for Confirmation');
    window.location.href='mechlog.php';
    </script>"; 
}else{
    echo "Registration Failed " . $sql1 . "<br>" . $conn->error;
}
?>