<?php   
    include_once "header.php";    
?>
<?php
    unset($_SESSION["isLogined"]);
    
    // Destroy the session variables
    session_destroy();   

?>
<?php   
    include_once "menu.htm"; 
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
          
            <h2 class="center" style="color:#999;">You logout from site.</h2>
            <h2 class="center"><a class="button" href="index.php">Go to the Main page</a><a class="button" href="Registration_Page.php">Go to the Registration</a></h2>
       </div>
    </div> <!-- End Grid --> 

</body>
</html>