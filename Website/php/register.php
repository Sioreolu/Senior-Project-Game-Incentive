<?php
require_once("config.php");

/*************
Initialization
*************/
$sqlConn = dbConnect();
$fName = $_POST['fname'];
$lName = $_POST['lname'];
$email = strtolower($_POST['email']);
$user = $_POST['usr'];
$pass = md5($_POST['psw']);

/****************************
Check if user field is unique
*****************************/
$qry = 'SELECT userName FROM Users WHERE userName="'.$user.'";';
$exists = CheckExists($sqlConn, $qry);
if ($exists == "1"){
	exit("Need unique Username");
};

/****************************
Check if email field is unique
*****************************/
$qry = 'SELECT email FROM Users WHERE email="'.$email.'";';
$exists = CheckExists($sqlConn, $qry);
if ($exists == "1"){
	exit("Need unique Email");
};

/***************
Insert into DB
****************/
$qry = 'INSERT into Users (userName, pass, email, firstName, lastName) values ("'
				.$user.'","'
				.$pass.'","'
				.$email.'","'
				.$fName.'","'
				.$lName.'");';
mysqli_query($sqlConn, $qry);

/******************
Return to Main Page
*******************/
header('Location: ../index.php');
exit;
?>