<?PHP
function dbConnect(){
	$dbServer = "localhost";
	$dbUsername = "reynaj";
	$dbPassword = "dB=pwd946";
	$dbSchema = "reynaj";
	
	// Create connection
	$conn = new mysqli($$dbServer, $dbUsername, $dbPassword, $dbSchema);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	else {
		echo("Connection Successful ");
	}

}
?>