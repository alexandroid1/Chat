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
	   <div class="col_12" style="margin-top:40px;">
       
            <div class="container mlogin">
                <div id="login">
                <h1 style="color:#999;">Login</h1>
                    <form action="Confirm_Login.php" id="loginform" method="post" name="loginform">
                        <p>
                            <label for="user_login">User name<br/>
                                <input class="input"  id="UserName" name="UserName" size="20" type="text" placeholder="|UserName" required="" value=""/>
                            </label>
                        </p>
                        <p>
                            <label for="user_pass">Password<br/>
                                <input class="input"  id="Password" name="Password" size="20" type="password" placeholder="|Password" required="" value=""/>
                            </label>
                         </p> 
                       	<p class="submit"><input class="button" name="login" type= "submit" value="Log In"/></p>
                       	<p class="regtext">Not a member?  <a href="Registration_Page.php">Registration!</a></p>
                    </form>
                 </div>
            </div>
            
       </div>
    </div> <!-- End Grid --> 

</body>
</html>