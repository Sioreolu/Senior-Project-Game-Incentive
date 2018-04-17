<?PHP
require_once("/functions.php");

$gamesite = new gameSite();

//Site Name
$gamesite->SetWebsiteName('cis.stvincent.edu/reynaj');

//Email Address Notification
$gamesite->SetAdminEmail('user11@user11.com');

//Database login
$gamesite->InitDB('localhost','reynaj','redB=pwd946','reynaj','game');

/* Not sure?
//For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
$gamesite->SetRandomKey('qSRcVS6DrTzrPvr');
*/
?>