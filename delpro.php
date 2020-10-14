<?php
    include "config1.php";

    $query = "SELECT * FROM productss";
    $result = mysqli_query($conn,$query);
    if(isset($_GET['id']))
    {
    $pid = $_GET['id'];
    }   
    if($result->num_rows>0)
    {
        while($row=mysqli_fetch_array($result))
        {   
            if(isset($pid))
            {
                if($row['productid'] == $pid)
                {
                    $sql = "DELETE FROM productss WHERE productid = $pid";
                    $result = mysqli_query($conn,$sql);
                    header("Location: mngpro.php");
                }
            }
        }
    }
?>

