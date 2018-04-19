<?php


echo "Test 1";
require_once("php/config.php");

dbConnect();

$fName = $_POST['fname'];
$lName = $_POST['lname'];
$email = $_POST['email'];
$user = $_POST['usr'];
$pass = $_POST['pass'];
$passr = $_POST['passr'];
?>