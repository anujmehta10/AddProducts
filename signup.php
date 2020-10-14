<?php
 include "config1.php" ;
 $message = '';
 $errors = array();
 if(isset($_POST['submit']))
 {
     $username = isset($_POST['username'])?$_POST['username']:'';
     $password = isset($_POST['password'])?$_POST['password']:'';
     $repassword = isset($_POST['repassword'])?$_POST['repassword']:'';
     $email = isset($_POST['email'])?$_POST['email']:'';
     $role = isset($_POST['role'])?$_POST['role']:'';

     if($password != $repassword)
     {
         $errors[] = array('input'=>'password','msg'=>'password does not match');
     }

     if($password == $repassword )
     {
        $sql="INSERT INTO users(`username`, `password`, `email`, `role`) VALUES('".$username."','".$password."','".$email."','".$role."')";

     }
     
     if(sizeof($errors)==0)
     {
         
    
     
     if ($conn->query($sql) === true) 
     {
       echo "New record created successfully";
       header("Location: login.php");
       
     } 
     else 
     {
         $errors = array('input'=>'form','msg'=>$conn->error);
       
     }
     
     $conn->close();
     }
 }
?>

<html>

<head>

  <title> PHP</title>
  <link rel="stylesheet" href="style2.css">

</head>

<body>    
    <div id='meassage'>
        <?php echo $message; ?>
    </div>

    <div id="errors">
          <?php if(sizeof($errors)>0) : ?>
            <ul>
                 <?php foreach ($errors as $error) : ?>
                        <li><?php echo $error['msg'];?></li>
                 <?php endforeach ;?>
            </ul>
          <?php endif;?>
    </div>
    <h1>Register</h1>
    <form id="signupForm" action ="signup.php" method = "POST">

         <label for="username">Username <input type="text" name="username" required></label><br>
         <label for="password">Password <input type="password" name="password" required></label><br>
         <label for="repassword">Re-Password <input type="password" name="repassword" required></label><br>
         <label for="email">Email <input type="email" name="email" required></label><br>
         <label for="role">Role <input type="role" name="role" required></label><br>
         <p><input type="submit" name="submit" value="Submit"></p>
         <a href='login.php'>Login</a>
    </form>

</body>
</html>