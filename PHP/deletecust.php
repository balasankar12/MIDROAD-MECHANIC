<?php
    include('connection.php');
    $sql="select * from userlocation where user_id={$_GET['userid']}";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $mechid=$row["mechanic_id"];
    $sql1="delete from userlocation where user_id={$_GET['userid']}";    
    if ($conn->query($sql1)==TRUE ) {
        echo "<script>alert('Rejected');
        window.location.href='usermech.php?mechid=$mechid';
        </script>"; 
    }else{
        echo "Failed";
    }

?>