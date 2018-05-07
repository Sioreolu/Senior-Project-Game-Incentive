<?php
require_once("config.php");
$sqlConn = dbConnect();
$newscore = $_COOKIE["score"];
$date = time();

$qry = "Select userID FROM Users Where Users.userName='".$_SESSION['username']."';";
$result = mysqli_query($sqlConn, $qry);
if(mysqli_num_rows($result) > 0) 
	{
		$row = mysqli_fetch_assoc($result);
		$USuserID = $row['userID'];
	};
$qry="INSERT INTO Scores(`scoreID`, `userID`, `score`, `scoreDate`, `tempUser`) 
VALUES (NULL, '".$USuserID."', '".$newscore."', '".$date."', NULL);";
mysqli_query($sqlConn, $qry);
?>