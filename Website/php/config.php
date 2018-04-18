<?PHP
echo "Test";

var $servername = "https://cis.stvincent.edu/pma";
var $username = "reynaj";
var $password = "Db=pwd768";
var $dbname = "reynaj";

$con=mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>