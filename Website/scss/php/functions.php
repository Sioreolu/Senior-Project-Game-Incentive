<?PHP

require_once("class.phpmailer.php");
require_once("formvalidator.php");
require_once("config.php");

class gameSite
{
    var $admin_email;
    var $DB_host
    
    var $user;
    var $pass;
    var $database;
    var $tablename;
    
    var $connection
    var $error_msg;
    
    /*------------
    --Operations--
    ------------*/
    function Connect($host,$dbUser,$dbPass,$db,$tble)
    {
        $this->connection = mysql_connect($this->$host,$this->dbUser,$this->dbPass);
        
        if(!$this->connection)
        {
            $this->dbError("Database Login failed! Please make sure that the DB login credentials provided are correct");
            return false;
        }
        if(!mysql_select_db($this->database, $this->connection))
        {
            $this->dbError('Failed to select database: '.$this->database.' Please make sure that the database name provided is correct');
            return false;
        }
        if(!mysql_query("SET NAMES 'UTF8'",$this->connection))
        {
            $this->dbError('Error setting utf8 encoding');
            return false;
        }
        return true;
    }
    
    function Register()
    {
        if(!$this->ValidateRegistration())
        {
            return false;
        }
        $formvars = array();
        $formvars['fname'] = $this->Sanitize($_POST['fname']);
        $formvars['lname'] = $this->Sanitize($_POST['lname']);
        $formvars['email'] = $this->Sanitize($_POST['email']);
        $formvars['user'] = $this->Sanitize($_POST['user']);
        $formvars['pass'] = $this->Sanitize($_POST['pass']);
        
        if(!$this->Connect())
        {
            $this->Error("Database Login failed!");
            return false;
        }
        if(!$this->Ensuretable())
        {
            return false;
        }
        if(!$this->IsFieldUnique($formvars,'email'))
        {
            $this->Error("This email is already registered");
            return false;
        }
        if(!$this->IsFieldUnique($formvars,'username'))
        {
            $this->Error("This UserName is already used. Please try another username");
            return false;
        }        
        if(!$this->InsertIntoDB($formvars))
        {
            $this->HandleError("Inserting to Database failed!");
            return false;
        }
    }
        

/*----------
----Form----
-Validation-
----------*/
    function ValidateRegistration()
    {
        $validator = new FormValidator();
        $validator->addValidation("name","req","Please fill in Name");
        $validator->addValidation("email","email","The input for Email should be a valid email value");
        $validator->addValidation("email","req","Please fill in Email");
        $validator->addValidation("username","req","Please fill in UserName");
        $validator->addValidation("password","req","Please fill in Password");

        
        if(!$validator->ValidateForm())
        {
            $error='';
            $error_hash = $validator->GetErrors();
            foreach($error_hash as $inpname => $inp_err)
            {
                $error .= $inpname.':'.$inp_err."\n";
            }
            $this->HandleError($error);
            return false;
        }        
        return true;
    }
    
/*-----------
--Background-
--Functions--
-----------*/
    //Sanitize Text
    function Sanitize($str,$remove_nl=true)
    {
        $str = $this->StripSlashes($str);

        if($remove_nl)
        {
            $injections = array('/(\n+)/i',
                '/(\r+)/i',
                '/(\t+)/i',
                '/(%0A+)/i',
                '/(%0D+)/i',
                '/(%08+)/i',
                '/(%09+)/i'
                );
            $str = preg_replace($injections,'',$str);
        }

        return $str;
    }   
    
    //Sanitize for SQL
    function SanitizeForSQL($str)
    {
        if( function_exists( "mysql_real_escape_string" ) )
        {
              $ret_str = mysql_real_escape_string( $str );
        }
        else
        {
              $ret_str = addslashes( $str );
        }
        return $ret_str;
    }
    
    //Not sure what this does, but was told to use this
    function Ensuretable()
    {
        $result = mysql_query("SHOW COLUMNS FROM $this->tablename");   
        if(!$result || mysql_num_rows($result) <= 0)
        {
            return $this->CreateTable();
        }
        return true;
    }
    
    //Checks if fields are unique
    function IsFieldUnique($formvars,$fieldname)
    {
        $field_val = $this->SanitizeForSQL($formvars[$fieldname]);
        $qry = "select ' . $fieldname . ' from' $this->tablename where $fieldname='".$field_val."'";
        $result = mysql_query($qry,$this->connection);   
        if($result && mysql_num_rows($result) > 0)
        {
            return false;
        }
        return true;
    }
    
    //Inserts into Database
    function InsertIntoDB(&$formvars)
    {   
        $insert_query = 'insert into '.$this->tablename.'(fname, lname, email, user, pass, ) values (
                "' . $this->SanitizeForSQL($formvars['fname']) . '",
                "' . $this->SanitizeForSQL($formvars['lname']) . '",
                "' . $this->SanitizeForSQL($formvars['email']) . '",
                "' . $this->SanitizeForSQL($formvars['user']) . '",
                "' . md5($formvars['pass']) . '",
                )';      
        if(!mysql_query( $insert_query ,$this->connection))
        {
            $this->dbError("Error inserting data to the table\nquery:$insert_query");
            return false;
        }        
        return true;
    }
    
    function Error($err)
    {
        $this->error_message .= $err."\r\n";
    }
    function dbError($err)
    {
        $this->Error($err."\r\n mysqlerror:".mysql_error());
    }
}