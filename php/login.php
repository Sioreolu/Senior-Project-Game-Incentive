<?php
$servername = "Local DataBase";
$username = "root";
$password = "809b26e0";
$dbname = "game";

$username = $_GET['fname'];
$password = $_GET['fpass'];
$con=mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$qz = "SELECT id FROM users where username='".$userName."' and password='".$pass."'" ; 
$qz = str_replace("\'","",$qz); 
$result = mysqli_query($con,$qz);
while($row = mysqli_fetch_array($result))
  {
  echo $row['id'];
  }
mysqli_close($con);
?>