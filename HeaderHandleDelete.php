<?php
    // delete taskin date header and pass to same date header location
     include 'partials/_dbconnect.php'; 
     $id = $_GET['edit'];
     $sql = "SELECT * FROM `tasks` WHERE sno = $id";
        $result1 = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result1);
        $day  = $row['day'];

 $sql = "DELETE FROM `tasks` WHERE `tasks`.`sno` = $id";
 $result = mysqli_query($conn,$sql);
 header("Location: /ToDoList/headerhandle.php?date=$day");


?>