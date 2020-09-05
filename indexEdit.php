<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Edit task</title>
</head>
<body> </body>
      
      <div><?php include 'partials/_header.php'; ?> </div>
      <br>
      <?php echo'<h4>To Do List Edit</h4>';?>
      
<?php
    
    include 'partials/_dbconnect.php'; 
     
    // Edit  task from reamaining task
        $id = $_GET['edit'];
        $sql = "SELECT * FROM `tasks` WHERE sno = $id";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result))
        {
        $tasktask = $row['task'];
        $day  = $row['day'];

       // echo "$tasktask;
       
       }
       $method = $_SERVER['REQUEST_METHOD'];
       $EditResult = false;
       if($method == 'POST')
       {
           if(empty($_POST['taskEdit']))
           {
              echo "New task cannot be empty";
           }
           else{
        $taskEdit = $_POST['taskEdit'];
        $sql = "UPDATE `tasks` SET `task` = '$taskEdit', `day` = '$day' WHERE `tasks`.`sno` = $id";
        $EditResult = mysqli_query($conn,$sql);
        if($EditResult)
        {
            header("Location: /ToDoList/index.php");
        }
      }
    }
   
   ?>
   
   <?php echo '<div>
    <form action="'.$_SERVER['REQUEST_URI'].'"    method="post">';
     if(isset($errors))
     {
         echo $errors;
     }
    echo'<div class="form-group">
         <label>old Task</label>
        <input type="text" class="form-control" placeholder='.$tasktask.'>
        <label>New Task</label>
        <input type="text" class="form-control" id="taskEdit" name="taskEdit">
        </div>
    <button type="submit" class="btn btn-primary">Update</button>
    </form>
    </div>
    </html>' ;
    ?>
