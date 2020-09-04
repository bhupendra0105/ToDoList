<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<head>
   <title>ToDoList</title>
</head>
<body>

<div><?php include 'partials/_header.php'; ?> </div>
<?php include 'partials/_dbconnect.php'; 
   $s1 = date('d');
   
   if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin'])== True)
   {
    echo"<div><h3 style='text-align:center;'>All Remaining task</h3>
    <h5 style='text-align:right;'><a href='headerhandle.php?date=$s1'>See Todays Task</a></h5></div>";?>
    <div class="container my=6">
    <div class="container  my-4">
    <table class="table" id="myTable">
    <thead>
      <tr>
      <th scope="col">S.No</th>
      <th scope="col">Task</th>
      <th scope="col">Actions</th>
     </tr>
      </thead>
      <tbody>

      <?php
      // fetch all remaining task from databse and make it serial no.
     
      $sql = "SELECT * FROM `tasks`";
      $result = mysqli_query($conn,$sql);
       $no = 0;
      while($task = mysqli_fetch_assoc($result))
      {
       $no = $no + 1;
       $sno = $task['sno'];
        echo "<tr>
        <td>".$no."</td>
        <td>".$task['task']."</td>
        <td><a href='indexEdit.php?edit=$sno'>Edit</a> <a href='indexdelete.php?edit=$sno'>Delete</a></td>
        </tr>";
      }
    }
    else
    {
      echo '<br>';
      echo "First! You Have to Login";
      echo '<br>';
    }
    ?>
    
</tbody>
    </table>
</div>
</body>
</html>
