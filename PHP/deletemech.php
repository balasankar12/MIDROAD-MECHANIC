<?php
 $errors = array();
    if (isset($_POST['submit'])) { 
        include('connection.php');

        $sql1="delete from assuredmechanic where mechanic_id={$_GET['id']}";
        if ($conn->query($sql1)==TRUE){
            echo "<script>alert('DELETED');
            window.location.href='adminlog.php';
            </script>"; 
        }else{
            echo "Failed";
        }
    }   
?>