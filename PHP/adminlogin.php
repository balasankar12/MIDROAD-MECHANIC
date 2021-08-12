<?php
 session_start();
 $errors = array();
    if (isset($_POST['loginadmin'])) { 
        include('connection.php');
        $name=mysqli_real_escape_string($conn,$_POST['adminname']);
        $password=mysqli_real_escape_string($conn,$_POST['adminpassword']);
        $sql1="select admin_name,admin_password from admin where admin_name='$name' and admin_password='$password'";

        $result=mysqli_query($conn,$sql1);
        $row=mysqli_fetch_assoc($result);
        $count=mysqli_num_rows($result);

        if($count==1){
            $_SESSION['adminname']=$row['admin_name'];
            $_SESSION['pwd']=$password;
            header("location: adminlog.php");
        }
        else{
            header('Location: index.php?userlogin=false');
        }
    }
?>