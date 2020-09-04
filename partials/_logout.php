<?php
     session_start();
      session_destroy();
     //echo "you are logout";
      header("location: /Todolist/index.php");
      //exit;

?>