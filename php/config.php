<?PHP
function dbConnect(){
	$dbServer = "localhost";
	$dbUsername = "reynaj";
	$dbPassword = "dB=pwd946";
	$dbSchema = "reynaj";
	
	// Create connection
	$conn = new mysqli($dbServer, $dbUsername, $dbPassword, $dbSchema);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	};
	return $conn;
}

function checkExists($DBconn, $query){
	$result = mysqli_query($DBconn, $query);
	$numberRows = mysqli_num_rows($result);
	if (!$result){
		die("Problem executing the query");
	};
	if($numberRows > 0){
		return "1";
	};
	if ($numberRows == 0){
		return "2";
	};
}
?>