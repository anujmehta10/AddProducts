<?php

$siteurl = "http://localhost/training/myphp2/";

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "store";

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>



