<?php
include('connection.php');

$sql1="INSERT INTO business (name, mail_id, number, password, city, location, idproof) 
VALUES ('".$_POST["mname"]."','".$_POST["memail"]."','".$_POST["mnumber"]."','".$_POST["mpassword"]."','".$_POST["mcity"]."','".$_POST["mlocation"]."','".$_POST["midproof"]."')";

if ($conn->query($sql1)==TRUE){
    echo "<script>alert('Registration Successful');
    window.location.href='index.php';
    </script>"; 
}else{
    echo "Registration Failed";
}
?>