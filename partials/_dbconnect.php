<?php
     $servername = "localhost";
     $username = "root";
    $password = "";
    $database = "tasks";

    $conn = mysqli_connect($servername,$username,$password,$database);

    if(!$conn)
    {
       die("sorry server not connect". mysqli_connect_error());
    }
    if($conn)
    {
        //echo "we are connected";
    }


?>
