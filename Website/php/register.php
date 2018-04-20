<?php
require_once("config.php");

dbConnect();

$fName = $_POST['fname'];
$lName = $_POST['lname'];
$email = strtolower($_POST['email']);
$user = $_POST['usr'];
$pass = md5($_POST['psw']);
$passr = md5($_POST['psw-repeat']);

$newuser = array($user, $pass, $email, $fName, $lName);

//Debug Output - Remove

print_r(array_values($newuser));
//

//Check if user field is unique
$qry = 'SELECT userName FROM Users WHERE userName="'.$user."'";
print_r($qry);
$result = mysql_query($qry); 
if($result && mysql_num_rows($result) > 0)
{
	exit("Need unique Username");
}
else{
};
Check if email field is unique
$qry = 'SELECT email FROM Users WHERE email="'.$email.'"';
print_r($qry);
$result = mysql_query($qry);
print_r($result); 
if($result && mysql_num_rows($result) > 0)
{
	exit("Need unique Email");
}
else{
};
?>