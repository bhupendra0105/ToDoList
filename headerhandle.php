<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<head>
  <title>ToDoList</title>
</head>
<body>
<div>
  <?php include 'partials/_header.php'; ?> </div>
<?php include 'partials/_dbconnect.php'; 
 echo '<h3 align="center">'.$_GET['date'].' Sept</h3>'?>
   <?php  
  // submit task in date header
  $passid= $_GET['date'];
  if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin'])== True)
  {
    $UserSno = $_SESSION['sno'];  
  } 
    $method = $_SERVER['REQUEST_METHOD'];
     if($method == 'POST')
     {
      if (empty($_POST['task']))
       {
        $errors = "You must fill in the task";
      }
      else{
      $task = $_POST['task'];
      $sql = "INSERT INTO `tasks` (`sno`, `task`, `day`, `UserSno`) VALUES (NULL, '$task', '$passid', '$UserSno');
      ";
      $result = mysqli_query($conn,$sql);
      }
     }
      ?>     
<?php
    echo'<div class="container my=6">
     <h4>Enter Todays Task</h4>
<form action="  '.$_SERVER['REQUEST_URI'].'" method="post">';
 if(isset($errors))
 {
   echo $errors;
 }
    
  echo '<div class="form-group">
    
    <input type="text" class="form-control" id="task" name="task">
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
 </form><h5 style="text-align:right;"><a href="index.php">See All Remaining task</a></h5>';
?>
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
     // fetch task from database for specified date
     $passid= $_GET['date'];
     if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin'])== True)
      {
        $UserSno = $_SESSION['sno'];  
      } 
     $sql = "SELECT * FROM `tasks` WHERE `day` = $passid AND `UserSno` = $UserSno";
      $result = mysqli_query($conn,$sql);
       $no = 0;
      while($task = mysqli_fetch_assoc($result))
      {
       $no = $no + 1;
       $sno = $task['sno'];
       
       
        echo "<tr>
        <td>".$no."</td>
        <td>".$task['task']."</td>
        <td><a href='HeaderHandleEdit.php?edit=$sno'>Edit</a> <a href='HeaderHandleDelete.php?edit=$sno'>Delete</a></td>
        </tr>";
        
      
    }
    ?>
    </tbody>
    </table>
</div>
</body>
</html>





