<?php
     // delete from remaining task
     include 'partials/_dbconnect.php'; 
     $id = $_GET['edit'];
        $sql = "DELETE FROM `tasks` WHERE `tasks`.`sno` = $id";
        $result = mysqli_query($conn,$sql);
        $s1 = date('d');
        header("Location: /ToDoList/index.php");


?>