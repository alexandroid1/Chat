<?php   
    include_once "header.php";  
    include_once "menu.htm"; 
     if ($_SESSION["isLogined"] == "yes")
     {
        include_once "welcome.php";  
     }  
?>

<?php
    if(isset($_POST['UserName']))     
    {                    
        $_SESSION["UserName"] = $_POST['UserName'];      
        $_SESSION["isLogined"] = "yes";
    }   
?>

<?php
       include_once "database/dbconnect.php"; 
?>

<?php
    function __autoload($class_name)
        {
        include_once 'inc/class.' . $class_name . '.inc.php';
        }
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
    <script type="text/javascript" src="js/verify.notify.js"></script>
 
  
</head>
<body>

<div class="grid">
	   <div class="col_12" style="margin-top:40px;">
       
            <?php
            
            /*
                $UserName = $_POST['UserName'];  
                $LastName = " "; 
                $Year = " "; 
                $Sex = " "; 
                $Login = $_POST['UserName']; 
                $Password = $_POST['Password']; 
                $R_Password = $_POST['Password'];
                              
                __autoload('Person');
                // Create a Person
                $person1 = new Person($UserName, $LastName, $Year, $Sex, $Login, $Password, $R_Password);
                //создаем пользователя из БД
                $person1->construct_user_from_database();               
                $person1->print_user();
                echo "<hr>";
              
             */
                  
                
                function clean_string($string) 
                {             
                  $bad = array(" ","\r\n","\r","\n","№","?","*","%");             
                  return str_replace($bad,"",$string);     
                }     
            
                $UserLogin = $_POST['UserName']; 
                $Password = $_POST['Password']; 
                //echo($Password.'<hr/>');
                
                $UserLogin = clean_string($UserLogin);
                $Password = clean_string($Password);
                               
                // Вытаскиваем из БД запись, у которой логин равняеться введенному                
                $query = mysql_query("SELECT Password FROM NewUser WHERE Login='".mysql_real_escape_string($UserLogin)."'");
                $data = mysql_fetch_assoc($query);
                
                // проверка пароля по БД
                if(trim($data['Password']) === trim(md5(md5($Password))))   
                {
                    echo('<h2 class="center" style="color:#999;">You logined successfully.</h2>');
                    echo('<h2 class="center"><a class="button" href="index.php">Go to the Main page</a><a class="button" href="contact_us.php">contact me</a></h2></br>');
                                
                    //upload an image         
                    echo('<h4 class="center" style="color:#999;">Load your photo</h4>');           
                    echo('<form action="upload.php" method="post" enctype="multipart/form-data">');
                    echo('<p class="center" style="color:#999;"><input type="file" name="filename"/></p>'); 
                    echo('<p class="center" style="color:#999;"><input type="submit" value="Load"/></p>');
                    echo('</form>');
                }
                else // если не нашли в БД - ищем по файлам
                
                {                
                
                    // trying to read from file
                    if (file_exists('reg/'.$UserLogin.".txt"))
                    {
                        /*reading file to array*/   
                        $file_array = file('reg/'.$UserLogin.".txt"); 
                        for ($i=0; $i<count($file_array); $i++)
                        {      
                            clean_string($file_array[$i]);                            
                        };         
                        //var_dump($file_array);
                        // проверка пароля
                        if (trim($file_array[12])==trim(md5(md5($Password))))
                            {
                                echo('<h2 class="center" style="color:#999;">You logined successfully.</h2>');
                                echo('<h2 class="center"><a class="button" href="index.php">Go to the Main page</a><a class="button" href="contact_us.php">contact me</a></h2></br>');
                                
                                //upload an image         
                                echo('<h4 class="center" style="color:#999;">Load your photo</h4>');           
                                echo('<form action="upload.php" method="post" enctype="multipart/form-data">');
                                echo('<p class="center" style="color:#999;"><input type="file" name="filename"/></p>'); 
                                echo('<p class="center" style="color:#999;"><input type="submit" value="Load"/></p>');
                                echo('</form>');
                                   
                            }
                            else
                            {
                                echo('<h5 class="center" style="color:#999;">Password is not valid.</h5>');
                                echo('<h5 class="center"><a class="button" href="login.php">Go back</a></h5>');
                            }                                                
                    }
                    else
                    {
                        echo('<h5 class="center" style="color:#999;">Login is not valid.</h5>');
                        echo('<h5 class="center"><a class="button" href="login.php">Go back</a></h5>');
                    } 
                    
                } // End of if($data['Password'] === md5(md5($Password)))     
                
       
            ?>
          
            
            
       </div>
    </div> <!-- End Grid --> 

</body>
</html>