<?PHP
echo "Test";

var $host = "localhost";
var $user = "reynaj";
var $password = "Db=pwd768";
var $dbname = "reynaj";

function dbConnect()
//Make Connection
$conn = new mysqli_connect($host, $user, $password, $dbname);
// Check connection for errors
if ($conn->connect_errno)
  {
  echo "Failed to connect to MySQL: " . $conn->connect_error();
  exit();
  }

?>