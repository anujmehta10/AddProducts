<?php 
    session_start();
    include "config1.php";
    $errors = array();

    $query = "SELECT * FROM users";
    $result = mysqli_query($conn,$query);
        
    if($result->num_rows>0)
    {
        while($row=mysqli_fetch_array($result))
        {
            if($row['userid'] == $_GET['id'])
            {
                $_SESSION['x'] = array('userid'=>$row['userid'],'username'=>$row['username'], 'role'=>$row['role'],  'password'=>$row['password'], 'email'=>$row['email']);
            }
        }
    }

    if(isset($_POST['edituser']))
    {   

        $username = isset($_POST['username'])?$_POST['username']:'';
        $password = isset($_POST['password'])?$_POST['password']:'';
        $repassword = isset($_POST['repassword'])?$_POST['repassword']:'';
        $email = isset($_POST['email'])?$_POST['email']:'';
        $role = isset($_POST['role'])?$_POST['role']:'';


        if($password != $repassword)
        {
            $errors[] = array('input' => 'password', 'msg' => 'password does not match');
        }



        $sql = "SELECT * FROM users ";
        
        $result= mysqli_query($conn,$sql);
        if($result->num_rows > 0)
		{
			while($row=$result->fetch_assoc())
			{
                $_SESSION['y']=array('username'=>$row['username'],'email'=>$row['email']);
                
				if($_SESSION['y']['username'] == $username)
				{
					$errors[]=array('input'=>'user','msg'=>"Enter another username");
				}
				if($_SESSION['y']['email'] == $email)
				{
					$errors[]=array('input'=>'email','msg'=>"Enter another email");
				}
            }
            

            
        }
        
        
            $x = $_SESSION['x']['userid'];
            $update = "UPDATE users set `username` = '$username', `password` = '$password', `email` = '$email' WHERE userid = $x";
            //echo "hhh";
            if($conn ->query($update) === true)
            {
                echo "Updated";
               
            }
            else
            {
                $errors[] = array('input' => 'form' , 'msg' => $conn->errors);
            }  
            $conn->close();
        

    }

?>

<html>
<head>
    <title>
        Update
    </title>
</head>
<body>
   <div id="wrapper">
        <div id="update">
        <div><?php if(isset($message)) { echo $message; } ?></div>

        <?php 
        $x = $_SESSION['x']['userid'];
        echo"<div id='update'>
        <h1>UPDATE</h1>
        <form method='POST' action='edituser.php?id=".$x."'>

         <label for='userid'>
         Userid
         <input type='text' name='userid' value=".$_SESSION['x']['userid']." readonly required>
         </label>
         <br>

         <label for='username'>
         Username 
         <input type='text' name='username' value=".$_SESSION['x']['username']." required>
         </label>
         <br>

         <label for='password'>
         Password 
         <input type='password' name='password' value=".$_SESSION['x']['password']." required>
         </label>
         <br>

         <label for='repassword'>
         Re-Password 
         <input type='password' name='repassword' required>
         </label>
         <br>

         <label for='email'>
         Email 
         <input type='email' name='email' value=".$_SESSION['x']['email']." required>
         </label>
         <br>

         <label for='role'>
         Role 
         <input type='role name='role' value=".$_SESSION['x']['role']." required>
         </label>
         <br>

         <p>
         <input type='submit' name='edituser' value='EDIT USER'>
         </p>
         
         </form>
         </div>";
        ?>

        </div>
    </div>
</body>
</html>