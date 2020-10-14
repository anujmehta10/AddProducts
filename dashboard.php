<?php

include "config1.php";

$sql = mysqli_query($conn,"SELECT * FROM users");
echo '<h2> List of all the users </h2>
       <table border ="1px;">
       <tr>
       <th>Id</th>
       <th>User Name</th>
       <th>Password</th>
       <th>Email</th>
       <th>Role</th>
       <th>Action</th>
       </tr>';

    
 while($row = mysqli_fetch_array($sql)) 
{
    echo "<tr>
          <td>{$row['userid']}</td>
          <td>{$row['username']}</td>
          <td>{$row['password']}</td>
          <td>{$row['email']}</td>
          <td>{$row['role']}</td>
          <td>
          <a href='edituser.php?id=".$row['userid']."'>Edit</a>
          <a href='deluser.php?id=".$row['userid']."'>Delete</a>
          </td>

          </tr>";

}

echo '</table>';


$sql1 = mysqli_query($conn,"SELECT * FROM productss");
echo '<h2> List of all the products </h2>
       <table border = "1px">
       <tr>
       <th>Product Id</th>
       <th>Product Name</th>
       <th>Product Price</th>
       <th>Product Quantity</th>
       <th>Action</th>
       </tr>';

    
foreach($sql1 as $row)
{
    echo "<tr>
          <td>{$row['productid']}</td>
          <td>{$row['productname']}</td>
          <td>{$row['productprice']}</td>
          <td>{$row['productquantity']}</td>
          <td>
          <a href='editpro.php?id=".$row['productid']."'>Edit</a>
          <a href='delpro.php?id=".$row['productid']."'>Delete</a>
          </td>
          </tr>";

}

echo '</table>';



?>

<html>
   <head></head>

   <body>
      <a href='login.php'>Login</a>
   </body>

</html>
