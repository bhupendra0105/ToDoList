<?php
session_start();
if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin'])==true)
{
  echo'<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="http://localhost/ToDoList/index.php">To Do List</a>Welcome'.$_SESSION['username'].'
  <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><a href= "partials/_logout.php">Logout</a></button>
</nav>';
  echo "<div >";
   //date header 
     $s1 = date('Y-m-d');
      $s2 = array($s1);
      for($i=0; $i<28;$i++)
      {
        $dateD = date('d', strtotime("+".$i."days"));
        //$dates[]= $date;
        $dateM = date('M');
        $datesD[]= $dateD;
        $datesM[]= $dateM;
        echo "<a style='text-align:center;' href='headerhandle.php?date=$datesD[$i]'>$datesD[$i]$dateM</a>
        ";
      }
     echo "</div>";
    }

else
{
  echo'<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="http://localhost/ToDoList/index.php">To Do List</a><br>
  <form class="form-inline">
  <br><button class="btn btn-outline-light my-2 my-sm-0" type="submit"><a href ="login.php">Login</button>
    <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><a href ="SignUp.php">Signup</a></button>
</form>
</nav>';
}
     ?>

