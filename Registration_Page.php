<?php   
    include_once "header.php";  
    include_once "menu.htm"; 
     if ($_SESSION["isLogined"] == "yes")
     {
        include_once "welcome.php";  
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
	   <div class="col_12" style="margin-top:20px;">
    
            <?php
                if(isset($_POST['submit']))
                {
                
                }
            ?>
             
            <form method="POST" action="Confirm_Registration.php">
            
                <h2 style="color:#999;">Registration</h2>
        
                <p> Enter name: 
            	   <input type="text" name="UserName" data-validate="required" placeholder="|UserName" required="" />
                </p>  
                       
               	<p> Enter last name: 
            	   <input type="text" name="LastName" data-validate="required" placeholder="|LastName" required="" />
                </p>                          	
                
               <p> Year of birth: 
                
                <select size="1" data-validate="required" name="Year" >
                            <?php
                                for ($i=1920;$i<2010;$i++)
                                   echo "<option>$i<option>";
                            ?>
                        </select>
                </p>            	
                
                <p> Sex: 
                
                <select size="1" data-validate="required" name="Sex" >
                            <?php
                                
                                   echo "<option>Male<option>";
                                   echo "<option>Female<option>";
                                   echo "<option>Don't know<option>";
                                   
                            ?>
                        </select>
                </p>            
                
                <p> Enter login: 
            	   <input type="text" data-validate="required" name="Login" placeholder="|Login" required="" />
                           
                </p>
              	
                
                <p> Enter password: 
            	   <input type="password" data-validate="required" name="Password" placeholder="|Password" required="" />
                
                </p>
                	
                
                <p> Repeat password: 
            	<input type="password" data-validate="required" name="R_Password" placeholder="|Repeat Password" required=""  />
                
                </p> 
                                
                                
            	<input type="submit" value="Register" />
            
            </form>           
            </div>
        </div> <!-- End Grid -->
    </body>

</html>

	