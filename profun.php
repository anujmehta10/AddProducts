<?php 
include 'config.php';
print '<link href="style.css" type="text/css" rel="stylesheet">';


function getproduct($x)
{
	global $products;
	foreach ($products as $key1 => $value1)
	{
		if($x == $value1['id'])
		{
			return $value1;
		}
			
	}
}

?>
