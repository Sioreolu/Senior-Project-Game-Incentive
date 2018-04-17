<?php


$fName = $_GET['fname'];
$lName = $_GET['lname'];
$email = $_GET['email'];
$user = $_GET['usr'];
$pass = $_GET['pass'];
$passr = $_GET['passr'];

function RegisterUser()
{
    if(!isset($_POST['submitted']))
    {
       return false;
    }
    
    $formvars = array();
    
    if(!$this->ValidateRegistrationSubmission())
    {
        return false;
    }
    
    $this->CollectRegistrationSubmission($formvars);
    
    if(!$this->SaveToDatabase($formvars))
    {
        return false;
    }
    
    if(!$this->SendUserConfirmationEmail($formvars))
    {
        return false;
    }

    $this->SendAdminIntimationEmail($formvars);
    
    return true;
}
function SaveToDatabase(&$formvars)
   {
       if(!$this->DBLogin())
       {
           $this->HandleError("Database login failed!");
           return false;
       }
       if(!$this->Ensuretable())
       {
           return false;
       }
       if(!$this->IsFieldUnique($formvars,'email'))
       {
           $this->HandleError("This email is already registered");
           return false;
       }
       
       if(!$this->IsFieldUnique($formvars,'username'))
       {
           $this->HandleError("This UserName is already used. Please try another username");
           return false;
       }        
       if(!$this->InsertIntoDB($formvars))
       {
           $this->HandleError("Inserting to Database failed!");
           return false;
       }
       return true;
   }
$con=mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$register = 'use reynaj;
insert into users(userName, pass, email, firstName, lastName) VALUES
('usr', 'pass', 'email', 'fname', 'lname');'
    
$qz = "SELECT id FROM users where username='".$userName."' and password='".$pass."'" ; 
$qz = str_replace("\'","",$qz); 
$result = mysqli_query($con,$qz);
while($row = mysqli_fetch_array($result))
  {
  echo $row['id'];
  }
mysqli_close($con);
?>