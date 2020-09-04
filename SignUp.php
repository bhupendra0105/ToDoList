<html>
<title>Sign Up</title>
<?php
  include 'partials/_dbconnect.php';

  echo '<a href="index.php">login</a>';
     

  $method = $_SERVER['REQUEST_METHOD'];
  if($method == 'POST')
  {
      $username = $_POST['username'];
      $useremail = $_POST['useremail'];
      $password = $_POST['password'];
      $cpassword = $_POST['cpassword'];

      $sql1 = "SELECT * FROM `users` WHERE username='$username'";
     $result1 = mysqli_query($conn,$sql1);
     $row1 = mysqli_fetch_assoc($result1);
     if($row1 > 1)
     {
         echo "Username is already Exists! try another name";
     }
     else{
      if ($password = $cpassword)
      {
       $hash = password_hash($password,PASSWORD_DEFAULT);
      $sql = "INSERT INTO `users` (`sno`, `username`, `email`, `password`) 
               VALUES (NULL, '$username', '$useremail', '$hash');";
      $result = mysqli_query($conn,$sql);
      if($result)
      {
          echo 'now You can <a href="index.php">login</a>';
      }
      }
      else {
          echo "password do not match";
           }
        }
      
  }

?>
<body>
    <h1>SignUp</h1>
    <form action="SignUp.php" method="post">
    
    <div><label>User Name</label> <input type="text" name= "username"></div>
    <div><label>User Email</label> <input type="email" name= "useremail"></div>
    <div><label>User Password</label> <input type="password" name= "password"></div>
    <div><label>ReEnter Password</label> <input type="password" name= "cpassword"></div>
    <div><button type="submit" >Submit</button></div>


    </form>
</body>

</html>