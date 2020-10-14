<?php
session_start();
include "config.php";
$siteurl = "http://localhost/training/myphp2/index.php";
$sitename = "php task2";
/**$products= array("product-101","product-102","product-103","product-104","product-105");
$price= array("150","120","90","80","150");
$image=array("images/football.png","images/tennis.png","images/basketball.png","images/table-tennis.png", "images/soccer.png");

$products = array(
    "product-101" => array(
        "name"=> "Product 1",
        "img"=> "images/football.png",
        "price"=> 150,
    ),
    "product-102" => array(
        "name"=> "Product 2",
        "img"=> "images/tennis.png",
        "price"=> 120,
    ),
    "product-103" => array(
        "name"=> "Product 3",
        "img"=> "images/basketball.png",
        "price"=> 90,
    ),
    "product-104" => array(
        "name"=> "Product 4",
        "img"=> "images/table-tennis.png",
        "price"=> 80,
    ),
    "product-105" => array(
        "name"=> "Product 5",
        "img"=> "images/soccer.png",
        "price"=> 150,
    ),
);**/
if(!isset($_SESSION["total"]))
{
    $_SESSION["total"]=0;
    for($i=0;$i<count($products);$i++)
    {
        $_SESSION["qty"][$i]=0;
        $_SESSION["price"][$i]=0;
    }
}
if( isset($_GET['reset']))
{
    if($_GET["reset"] =='true')
    {
        unset($_SESSION["qty"]);
        unset($_SESSION["price"]);
        unset($_SESSION["total"]);
        unset($_SESSION["cart"]);
    }
}
if(isset($_GET["add"]))
{
    $i=$_GET["add"];
    $qty=$_SESSION["qty"][$i]+1;
    $_SESSION["price"][$i]=$price[$i]*$qty;
    $_SESSION["cart"][$i]=$i;
    $_SESSION["qty"][$i]=$qty;
}
if(isset($_GET["delete"]))
{
    $i=$_GET["delete"];
    $qty=$_SESSION["qty"][$i];
    $qty--;
    $_SESSION["qty"][$i]=$qty;
    if($qty==0)
    {
        $_SESSION["price"][$i]=0;
        unset($_SESSION["cart"][$i]);
    }
    else
    {
        $_SESSION["price"][$i]=$price[$i]*$qty;
    }
}
?>

<h2>List of all products</h2>

<?php
if( isset($_SESSION["cart"]))
{
    ?>
    <h2>cart</h2>
    </table>
    <tr>
        
        <th>products</th>
        <td width="10px">&nbsp;</td>
        <th>qty</th>
        <td width="10px">&nbsp;</td>
        <th>price</th>
        <td width="10px">&nbsp;</td>
        <th>action</th>
    </tr>
    <?php
    $total=0;
    foreach($_SESSION["cart"] as $i)
    {
        ?>
        <tr>
            <br>
            <td><?php echo($products[$_SESSION["cart"][$i]]); ?></td>
            <td width="10px">&nbsp;</td>
            <td><?php echo($_SESSION["qty"][$i]); ?></td>
            <td width="10px">&nbsp;</td>
            <td><?php echo($_SESSION["price"][$i]); ?></td>
            <td width="10px">&nbsp;</td>
            <td><a href="?delete=<?php echo($i); ?>">Delete</a></td>
        </tr>
            <?php
            $total = $total + $_SESSION["price"][$i];
    }
    $_SESSION["total"]=$total;
    ?>
    <tr>
    <td colspan="7"><br>Total :<?php echo($total); ?></td>
    </tr>
    </table>
    <?php
}
?>
<table>
    <tr>
        <th>image</th>
        <td width="10px">&nbsp;</td>
        <th>product</th>
        <td width="10px">&nbsp;</td>
        <th>price</th>
        <td width="10px">&nbsp;</td>
        <th>action</th>
    </tr>
</table>
<?php
for($i=0;$i<count($products); $i++)
{
    ?>
    <tr>
        <td><img src='<?php echo($image[$i]); ?>'></td>
        <td><?php echo($products[$i]); ?></td>
        <td width="10px">&nbsp;</td>
        <td><?php echo($price[$i]); ?></td>
        <td width="10px">&nbsp;</td>
        <td><a href="?add=<?php echo($i); ?>">Add to cart</a></td>
        <br>
    </tr>
    <?php
}
?>
<tr>
    <td colspan="5"></td>
</tr>
<tr>
    <td colspan="5"><a href="?reset=true">Reset cart</a></td>
</tr>
</table>