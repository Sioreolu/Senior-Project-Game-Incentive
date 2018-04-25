<?php

header("Location:login.php?location=" . urlencode($_SERVER['REQUEST_URI']));
require_once("config.php");

/*************
Initialization
*************/
$sqlConn = dbConnect();
$user = $_POST['usr'];
$pass = md5($_POST['psw']);
$exists = "";

$qry = 'SELECT userName FROM Users WHERE userName="'.$user.'";';
$exists = CheckExists($sqlConn, $qry);
if ($exists == "1"){
	$qry = 'SELECT userName, pass FROM Users WHERE userName="'.$user.'" AND pass="'.$pass.'";';
	$exists = CheckExists($sqlConn, $qry);
	if ($exists == "1"){
		print_R("Log in Successful");
		
		$_SESSION['username'] = $_POST['usr']; // store username
		$_SESSION['password'] = md5($_POST['psw']); // store password
		$_SESSION['logged']="1"; //Session log is set to true
	}
	else{
		print_R("Password does not match");
	}
}
else{
	print_R("Account does not exists");
};
/******************
Return to Main Page
*******************/
//header('Location: ../index.html');
//exit;
?>