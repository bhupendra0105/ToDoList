<?php
      include 'partials/_dbconnect.php';
      
      $method = $_SERVER['REQUEST_METHOD'];
      if($method == 'POST')
      {
        $username=$_POST['username'];
        $password=$_POST['password'];
        
        $sql = "SELECT * FROM `users` WHERE username='$username'";
        $result = mysqli_query($conn,$sql);
        $Num = mysqli_num_rows($result);
        if($Num == 1)
        {
        $row = mysqli_fetch_assoc($result);
        $sno = $row['sno'];
        $email = $row['email'];
        $pass = $row['password'];
          if(password_verify($password,$pass))
           {
             
             session_start();
             $_SESSION['username'] = $username;
             $_SESSION['sno'] = $sno;
             $_SESSION['email'] = $email;
             $_SESSION['loggedin'] = true;

             header("location: /ToDoList/index.php");
            }
            else
            {
             echo "password do not Match";
            }
       }
       else
       {
          echo "useralready exist";
       }
      }

?>
<html>
<title>Login</title>
<body>
<h1>Login</h1>
<form action="Login.php" method="post">
<div><label>Username</label><input type="text" name="username"></div>
<div><label>Password</label><input type="password" name="password"></div>
<div><button type="submit">Submit</button></div>
</form>

</body>
</html>