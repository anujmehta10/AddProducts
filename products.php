<?php 
	 
	include 'header.php'; 
	include 'config.php'; 
	include 'profun.php'; 
	include 'config1.php'; 
	$errors = array();
?>

<?php
        
		if(isset($_GET['id']))
		{
	
			if ($_GET['action']=='addtocart')
			{

				    $id = $_GET['id'];
					$newproduct = getproduct($id); 
					
					$id1= $newproduct['id'];
					$name1 = $newproduct['name'];
					$price1 = $newproduct['price'];
					$quantity1 = $newproduct['quantity'];

					$sql="INSERT INTO productss(`productid`,`productname`, `productprice`, `productquantity`) 
					VALUES('".$id1."','".$name1."','".$price1."','".$quantity1."')";
					
					if ($conn->query($sql) === true) 
					{
						echo "Added Succesfully.";
					}
					else
					{
						echo "Not Added";
					}	
			}

		}
?>
<html>
	<body>
	
		<div id="products">
		   <?php foreach ($products as $key => $value) { ?>
			
			   <form action="products.php" method="POST">
				    <div class="product">
					  <img src="images/<?php print $value['image'];?>">
					  <h3 class="title"><a href="#"><?php print $value['name'];?></a></h3>
					  <span>$<?php print $value['price'];?></span>
					  <a class="add-to-cart" id="add" name="add" href="products.php ?id=<?php print $value['id']; ?>&action=addtocart">Add To Cart</a>
				    </div>
			    </form>
            <?php } ?>
		   </div>
	
	 <?php include 'footer.php'; ?>
	 
    </body>
</html>


	
