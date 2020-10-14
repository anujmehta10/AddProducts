<?php
    include "config1.php";

    $query = "SELECT * FROM users";
    $result = mysqli_query($conn,$query);
    if(isset($_GET['id']))
    {
    $uid = $_GET['id'];
    }
        
    if($result->num_rows>0)
    {
        while($row=mysqli_fetch_array($result))
        {   
            if(isset($uid))
            {

                //echo "deleted";
               if($row['userid'] == $uid)
               {

            
                  $sql = "DELETE FROM users WHERE userid = $uid";
                  $result = mysqli_query($conn,$sql);
                  header("Location: mnguser.php");
               }
            }   
        }
    }
?>