<?php
    if (isset($_POST['accept'])) { 
        include('connection.php');
        $sql1="INSERT INTO confirmedcust (latitude, longitude,user_id,mechanic_id,vehicletype, acc_rej,amount) 
        VALUES ('".$_POST["lat"]."','".$_POST["lon"]."','".$_POST["userid"]."','".$_POST["mechid"]."','".$_POST["vehicle"]."',1,'".$_POST["amount"]."')"; ;
        $sql2="delete from userlocation where mechanic_id={$_POST["mechid"]}";
        if ($conn->query($sql1)==TRUE && $conn->query($sql2)==TRUE) {
            echo "<script>alert('Approved');
            window.location.href='mechlog.php';
            </script>"; 
        }else{
            echo "Failed";
        }
    }elseif (isset($_POST['reject']))
    {
        include('connection.php');
        $sql2="delete from userlocation where mechanic_id={$_POST["mechid"]}";
        if ($conn->query($sql2)==TRUE){
            echo "<script>alert('Rejected');
            window.location.href='mechlog.php';
            </script>"; 
        }else{
            echo "Failed";
        }
    }
    else{
        echo "Failed";
    }
?>