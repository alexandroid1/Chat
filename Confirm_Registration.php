<?php   
    include_once "header.php"; 
    include_once "menu.htm"; 
     if ($_SESSION["isLogined"] == "yes")
     {
        include_once "welcome.php";  
     }
?>

<?php
    function __autoload($class_name)
        {
        include_once 'inc/class.' . $class_name . '.inc.php';
        }
?>

<?php
       include_once "database/dbconnect.php"; 
?>

<!DOCTYPE html>
<html>
<head>
	<!-- META -->
	<title>Pavlov Oleksandr</title>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="Pavlov Oleksandr" />
	
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/kickstart.css" media="all" />
	<link rel="stylesheet" type="text/css" href="style.css" media="all" /> 
	
	<!-- Javascript -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/kickstart.js"></script>

</head>
<body>   

    
    <div class="grid">
	   <div class="col_12" style="margin-top:10px;">

    
 <?php
    
    if(isset($_POST['UserName'])) {
             
          
        function died($error) {
     
            // your error code can go here
            echo "<hr>";
            echo "We are very sorry, but there were error(s) found with the form you registered. ";
            echo "<hr>";
            echo "These errors appear below.";
            echo "<hr>";
            echo $error."";            
            echo "Please go back and fix these errors.";
            echo "<hr>";            
            ?>               
                <a class="button" href="Registration_Page.php">Go back</a>
            <?php
            
            die();
     
        }          
     
        // validation expected data exists
     
        if(!isset($_POST['UserName']) || 
            !isset($_POST['LastName']) || 
            !isset($_POST['Year']) || 
            !isset($_POST['Sex']) || 
            !isset($_POST['Login']) || 
            !isset($_POST['Password']) ||             
            !isset($_POST['R_Password'])) 
            {     
                died('We are sorry, but there appears to be a problem with the form you submitted.'); 
            }
            
        // validation expected data      
          
        $UserName = $_POST['UserName'];  
        $LastName = $_POST['LastName']; 
        $Year = $_POST['Year']; 
        $Sex = $_POST['Sex']; 
        $Login = $_POST['Login']; 
        $Password = $_POST['Password']; 
        $R_Password = $_POST['R_Password'];         
              
        $error_message = "";    
        $string_exp = "/^[A-Za-z .'-]+$/";
         
          if(!ctype_alpha($_POST["UserName"])) { 
            $error_message .= 'Invalid user name '.(string)($_POST["UserName"]).'<hr/>';
              } else {    
                if(!preg_match($string_exp,$UserName)) { 
                    $error_message .= 'The User Name you entered does not appear to be valid.<hr/>';
              }
            }
          
            if(!ctype_alpha($_POST["LastName"])) { 
            $error_message .= 'Invalid Last Name '.(string)($_POST["LastName"]).'<hr/>';
              } else {    
                if(!preg_match($string_exp,$LastName)) { 
                    $error_message .= 'The Last Name you entered does not appear to be valid.<hr/>';
              }
            }
          
            if(!ctype_digit($_POST["Year"])) { 
                $error_message .= 'Invalid user Year of birth '.(string)($_POST["Year"]).'<hr/>';
            }
            
            if(!ctype_alpha($_POST["Sex"])) { 
            $error_message .= 'Invalid user Sex '.(string)($_POST["Sex"]).'<hr/>';
              } else {    
                if(!preg_match($string_exp,$Sex)) { 
                    $error_message .= 'The User Sex you entered does not appear to be valid.<hr/>';
              }
            }       
            
            // проверка сущесвует ли уже пользователь с таким-же логином в файлах
            if (file_exists('reg/'.$Login.".txt"))
                {
                   $error_message .= 'The User Login you entered already exist in file. Please go back and reanter Login.<hr/>';
                }     
                
            // проверка пользователя с таким именем в БД
             $query = mysql_query("SELECT COUNT(ID) FROM NewUser WHERE Login='".mysql_real_escape_string($Login)."'");
             // создаем ассоциативный массив  
             if(mysql_result($query, 0) > 0)          
                {
                    $error_message .= 'The User Login you entered already exist in Data Base. Please go back and reanter Login.<hr/>';
                }          
                    
                      
            if(!preg_match($string_exp,$Login))
            {  
                $error_message .= 'The User Login you entered does not appear to be validLogin can only consist of letters of the alphabet and numbers.<hr/>';
        
            } else if(strlen($Login) < 3 or strlen($Login) > 30)
            {     
                $error_message .= 'Login must be at least 3 characters and no more than 30.<hr/>';
                        
            }else if (!ctype_alnum($_POST["Login"])) 
            {
                $error_message .= 'Invalid user Login '.(string)($_POST["Login"]).'<hr/>';
            }  
                        
            if (! ($Password==$R_Password)) {               
                $error_message .= 'Reenter password, please. <hr/>';
            }           
     
        // Errors
     
      if(strlen($error_message) > 0) {
        died($error_message);
      }
     
        $register_message = "Form details below.\r\n";
     
             
        function clean_string($string) 
        {
     
          $bad = array(" ","+","_","!","№","?","*","%");
     
          return str_replace($bad,"",$string);     
        }   
        
        $Password = clean_string($Password);
        $R_Password = clean_string($R_Password);
        
        // Убираем лишние пробелы и делаем двойное шифрование      
        $Password = md5(md5(trim($Password)));
        $R_Password = md5(md5(trim($R_Password)));
           
                   
        $register_message .= "Your User Name is : "."\r\n".clean_string($UserName)."\r\n";
        $register_message .= "Your Last Name is : "."\r\n".clean_string($LastName)."\r\n";
        $register_message .= "Your Year of birth is : "."\r\n".clean_string($Year)."\r\n";
        $register_message .= "Your Sex is : "."\r\n".clean_string($Sex)."\r\n";
        $register_message .= "Your Login is : "."\r\n".clean_string($Login)."\r\n";
        $register_message .= "Your Password is : "."\r\n".$Password."\r\n";
        
        __autoload('Person');
        // Create a Person
        $person1 = new Person($UserName, $LastName, $Year, $Sex, $Login, $Password, $R_Password);
        // output a person info
        $person1->echo_user(); 
        $person1->writing_user_to_database();
        // проверка чтения
        //  $person1->echo_user_from_database();
                     
  
        //echo "<hr>";
        //echo($register_message);
        
        // create txt file         
        $fh = fopen('reg/'.$Login.".txt", 'w') or die("Creation file error");
        $text = $register_message;
        fwrite($fh, $text) or die("Write file Error");
        fclose($fh);
        echo "<hr>";
        echo "File $Login.txt created ";
     
    ?>    
       
    <hr/>  
    Thank you for registering!
    <hr/> 
          
     
    <?php
     
    }
     
 ?>
    
    </div>
</div> <!-- End Grid -->  

</body>
</html>