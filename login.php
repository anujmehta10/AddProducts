<?php
include('config1.php');
?>

<?php
session_start();
$errors = array();

if (isset($_POST['submit']))
{
    $username = isset($_POST['username'])?$_POST['username']:'';
    $password = isset($_POST['password'])?$_POST['password']:'';
    $role= isset($_POST['role'])?$_POST['role']:'';
   
    if (sizeof($errors)==0) 
    {

		$sql = "SELECT * FROM users WHERE 
        `username`='".$username."' AND `password`='".$password."'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) 
        {
        
        while($row = $result->fetch_assoc()) 
        {
            $_SESSION['userdata']=array("username"=>$row['username'],"user id"=>$row['userid']);
            //header("Location: index2.php");
        }

        } 
        else 
        {
         $errors[] = array('input'=>'form','msg'=>'Invalid login details');
        }
        if($_POST['role'] == 'admin')
        {
            header("Location: Admin/admin.php");
        }

        if($_POST['role'] == 'customer')
        {
            header("Location: products.php");
        }
        if (count($errors)!=0 ) 
        {
            foreach ($errors as $error)
            {
                echo $error['msg']."<br>";
            }
        }
         $conn->close();
    }
}
?>

<html>

<head>
  <title> PHP</title>
</head>

<body>    
    
    <h1>Login</h1>
    <form id="loginForm" action ="login.php" method = "POST" enctype="multipart/form-data">
         <label for="username">Username <input type="text" name="username" required></label><br>
         <label for="password">Password <input type="password" name="password" required></label><br>
         <label for="role">Role <input type="role" name="role" required></label><br>
         <p><input type="submit" name="submit" value="Submit"></p>
         <a href='signup.php'>Sign Up</a>

    </form>

</body>
</html>