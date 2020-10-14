<?php

include "config1.php";
include "deluser.php";

$sql = mysqli_query($conn,"SELECT * FROM users");
echo '<h2> List of all the users </h2>
       <table id="table" border="1">
       <tr>
       <th>Id</th>
       <th>User Name</th>
       <th>Password</th>
       <th>Email</th>
       <th>Role</th>
       <th>Action</th>
       </tr>';

    
foreach($sql as $row)
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
?>