<?php
class Person
{
    private $_userName;
    private $_lastName;
    private $_age;
    private $_sex;
    private $_login;
    private $_password; 
    private $_rPassword;     
    private $register_message;  
    private $path_to_photo; 
    private $path_to_avatar; 
    

    
    public function __construct($UserName, $LastName, $Year, $Sex, $Login, $Password, $R_Password )
    {
        $this->_userName = $UserName;
        $this->_lastName = $LastName;
        $this->_age = $Year;
        $this->_sex = $Sex;
        $this->_login = $Login;
        $this->_password = $Password;
        $this->_rPassword = $R_Password;      
    }
    
    public function construct_user_from_database()
    {
        include_once "database/dbconnect.php";       
    	$result = mysql_query("Select * from NewUser");
    	$num_rows = mysql_num_rows($result);    
        
        for($i=0;$i<$num_rows;$i++)
		{
			$rows = mysql_fetch_array($result, MYSQL_BOTH);
            
                	$this->_userName = $rows["UserName"]; 
                	$this->_lastName = $rows["LastName"];  
                	$this->_age = $rows["YearOfBirth"]; 
                    $this->_sex =  $rows["Sex"]; 
                    $this->_login = $rows["Login"];  
                    $this->_password = $rows["Password"];
                    $this->_rPassword = $rows["Password"];  
        }
    }
    
    public function echo_user_from_database()
    {
        echo "reading data from database<hr/>";
        include_once "database/dbconnect.php";       
    	$result = mysql_query("Select * from NewUser");
    	$num_rows = mysql_num_rows($result);
    	echo  "<hr/>Strings in result".$num_rows."<hr/>";
        
        for($i=0;$i<$num_rows;$i++)
		{
			$rows = mysql_fetch_array($result, MYSQL_BOTH);
            	?>
                	<div>UserName: <? echo $rows["UserName"];  ?> </div>
                	<div>LastName: <? echo $rows["LastName"];  ?> </div>
                	<div>YearOfBirth: <? echo $rows["YearOfBirth"];  ?> </div>
                    <div>Sex: <? echo $rows["Sex"];  ?> </div>
                    <div>Login: <? echo $rows["Login"];  ?> </div>
                    <div>Password: <? echo $rows["Password"];  ?> </div>
                	<hr />
            	<? 
        }
    }   
    
    public function writing_user_to_database()
    {      
        include_once "database/dbconnect.php";       
    	if($_POST)
		{
		echo "<hr/>writing data to database successful";		
			mysql_query("insert into NewUser values(null, '$this->_userName', '$this->_lastName', '$this->_age', '$this->_sex', '$this->_login', '$this->_password')");
		}
    }
    
    public function print_user()
    {
        echo "<pre>Person : ", print_r($this, TRUE), "</pre>";
    }
    
    public function echo_user()
    {
        echo "<hr>";
        echo "Your User Name is ".$_POST["UserName"]." "; 
        echo "<hr>";
        echo "Your Last Name is ".$_POST["LastName"]." "; 
        echo "<hr>";
        echo "Your Year of birth is ".$_POST["Year"]." ";
        echo "<hr>";
        echo "Your Sex is ".$_POST["Sex"]." ";
        echo "<hr>";
        echo "Password is successful";       
    }  
    
    public function setPathToPhoto($path_to_photo)
    {
        $this->$path_to_photo = $path_to_photo;     
    }  
    
    public function getPathToPhoto()
    {
        $path_to_photo = $this->$path_to_photo; 
        return $path_to_photo;     
    }  
    
    public function setPathToAvatar($path_to_avatar)
    {
        $this->$path_to_avatar = $path_to_avatar;     
    }  
    
    public function getPathToAvatar()
    {
        $path_to_avatar = $this->$path_to_avatar; 
        return $path_to_avatar;     
    }  
    
    public function resivePhotoToAvatar($path_to_photo)
    {
         
       
        return $path_to_avatar;   
    }
}
?>