<?php
 session_start();
 $errors = array();
    if (isset($_POST['loginmech'])) { 
        include('connection.php');
        $mailid=mysqli_real_escape_string($conn,$_POST['memail']);
        $password=mysqli_real_escape_string($conn,$_POST['mpassword']);
        $sql1="select * from business where mail_id='$mailid' and password='$password'";
        $result=mysqli_query($conn,$sql1);
        $row=mysqli_fetch_assoc($result);
        $count=mysqli_num_rows($result);

        if($count==1){
            $_SESSION['businessid']=$row['business_id'];
            $_SESSION['businessname']=$row['name'];
            $_SESSION['businessnum']=$row['number'];    
            $_SESSION['businessmailid']=$mailid;
            $_SESSION['businesspwd']=$password;
            $_SESSION['city']=$row['city'];
            $_SESSION['location']=$row['location'];
            $_SESSION['idproof']=$row['idproof'];
            header("location: mechlog.php");
        }
        else{
            header('Location: index.php?mechlogin=false');
        }
    }

?>