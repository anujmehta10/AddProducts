<?php

include "config1.php";
include "delpro.php";


$sql = mysqli_query($conn,"SELECT * FROM productss");
echo '<h2> List of all the products </h2>
       <table id="table" border="1">
       <tr>
       <th>Product Id</th>
       <th>Product Name</th>
       <th>Product Price</th>
       <th>Product Quantity</th>
       <th>Action</th>
       </tr>';
     
foreach($sql as $row)
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