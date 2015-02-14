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
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="" />
	
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/kickstart.css" media="all" />
	<link rel="stylesheet" type="text/css" href="style.css" media="all" /> 
	    
	<!-- Javascript -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/kickstart.js"></script>
    <script type="text/javascript" src="js/verify.notify.js"></script>
</head>
<body>



 <?php   
        include_once "menu.htm";    
    ?> 

<div class="grid">
	<div class="col_12" style="margin-top:20px;">       
    
        <h2 style="color:#999;">Contact Me</h2>
        
        <form name="contactform" method="post" action="send_form_email.php">
                  
            <p>       
                <label for="first_name">First Name *</label>        
                <input  type="text" name="first_name" data-validate="required" placeholder="|First Name" required="" maxlength="50" size="30"/>
            </p>
                  
            <p>    
               <label for="last_name">Last Name *</label>              
               <input  type="text" name="last_name" data-validate="required" placeholder="|Last Name" required="" maxlength="50" size="30"/>
            </p>
             
            <p>   
              <label for="email">Email Address *</label>                  
              <input  type="text" name="email" data-validate="required,email" placeholder="|Email Address" required="" maxlength="80" size="30"/>
            </p>
            
            <p>          
              <label for="telephone">Telephone Number</label>     
              <input  type="text" name="telephone"  placeholder="|Telephone Number" maxlength="30" size="30"/>
            </p>
                
            <p> 
              <label for="comments">Comments *</label>     
            </p>
            
            <p>
                <textarea  name="comments" placeholder="|Comments" required="" maxlength="1000" cols="25" rows="6"></textarea>
            </p>
             
            <p>       
              <input type="submit" value="Submit"/>  
            </p>
          
         
        </form>
 	</div>
</div> <!-- End Grid -->
</body>
</html>