<?php
include('connection.php');

$sql1="INSERT INTO feedback (name, mail_id, message, user_id, mechanic_id, business_id) 
VALUES ('".$_POST["name"]."','".$_POST["email"]."','".$_POST["message"]."','".$_POST["userid"]."','".$_POST["mechid"]."','".$_POST["businessid"]."')";
if ($conn->query($sql1)==TRUE){
    echo "<script>alert('Feedback send Successfully');
    window.location.href='userlog.php';
    </script>"; 
}else{
    echo "Registration Failed";
}
?>