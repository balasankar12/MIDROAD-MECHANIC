<?php
 $errors = array();
    if (isset($_POST['submit'])) { 
        include('connection.php');
        if($_POST['approval']==1){
        $sql1="insert into assuredmechanic select * from mechanic where mechanic_id={$_GET['id']}";
        $sql2="delete from mechanic where mechanic_id={$_GET['id']}";
        $sql3="update assuredmechanic set status=1 where mechanic_id={$_GET['id']}";
        if ($conn->query($sql1)==TRUE && $conn->query($sql2)==TRUE && $conn->query($sql3)==TRUE){
            echo "<script>alert('Approved');
            window.location.href='adminlog.php';
            </script>"; 
        }else{
            echo "Failed";
        }
        }
    else{
            $sql1="delete from mechanic where mechanic_id={$_GET['id']}";
        if ($conn->query($sql1)==TRUE){
            echo "<script>alert('Rejected');
            window.location.href='adminlog.php';
            </script>"; 
        }else{
            echo "Failed....";
        }
        }
    }
        
?>
