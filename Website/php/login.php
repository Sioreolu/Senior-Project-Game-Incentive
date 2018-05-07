<?php
session_start();
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
		$_SESSION['username'] = $_POST['usr']; // store username
		$_SESSION['password'] = md5($_POST['psw']); // store password
		$_SESSION['logged']=true; //Session log is set to true
		$scoreqry = 'SELECT score FROM Scores INNER JOIN Users ON Scores.userID = Users.userID WHERE userName="'.$user.'" ORDER BY score desc LIMIT 1;';
		$result = mysqli_query($sqlConn, $scoreqry);
		if(mysqli_num_rows($result) > 0) 
			{
				$row = mysqli_fetch_assoc($result);
				$_SESSION['pscore'] = $row['score'];
			};
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
header('Location: ../index.php');
exit;
?>