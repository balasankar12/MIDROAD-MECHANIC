<?php
$servername="localhost";
$username="root";
$password="";
$DB="midroad_mechanic";

$conn=new mysqli($servername,$username,$password,$DB);

if ($conn->connect_error) {
    die("CONNECTION failed: ".$conn->connect_error);
}
?>