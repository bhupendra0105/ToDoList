<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="http://localhost/ToDoList/index.php">To Do List</a>
  <form class="form-inline">
    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Login</button>
    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">signup</button>
</form>
</nav>


<div >
  <?php
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
      }?>
      </div>

