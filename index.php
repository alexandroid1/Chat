<?php   
    include_once "header.php";    
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/kickstart.js"></script> <!-- KICKSTART -->



<link rel="stylesheet" href="css/kickstart.css" media="all" /> <!-- KICKSTART -->

<html>
    <head> 
        <title> Chat  </title>
    </head>
<body>

<?php   
    include_once "menu.htm"; 
     if ($_SESSION["isLogined"] == "yes")
     {
        include_once "welcome.php";  
     }
?>

<?php
if(isset($_GET["cat"]))
{
	switch($_GET["cat"])
	{
		case "Chat":
			include_once "Chat.php";	
			break;
		case "Films":
			include_once "Films.php";
			break;
        case "Music":
			include_once "Music.php";
			break;
        case "Games":
			include_once "Games.php";
			break;
        case "Contacts":
			include_once "Contacts.php";
			break;
        case "Profile":
			include_once "Profile.php";
			break;
        case "Registration_Page":
			include_once "Registration_Page.php";
			break;
        case "login":
			include_once "login.php";
			break;
        case "Logout":            
            unset($_SESSION["isLogined"]);
            include_once "Logout.php";  
			break;
        case "contact_us":
			include_once "contact_us.php";
			break;
		default:
			include_once "404.htm";
			break;		
	}
}
else
{
	include_once "Chat.php";
}

?>




</body>
</html>