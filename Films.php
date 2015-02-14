<?php   
    include_once "header.php";    
?>

<!DOCTYPE html>
<html>
<head>
	<!-- META -->
	<title>HTML KickStart Elements</title>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="Pavlov Oleksandr" />
	
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/kickstart.css" media="all" />
	<link rel="stylesheet" type="text/css" href="style.css" media="all" /> 
	
	<!-- Javascript -->
	
	<script type="text/javascript" src="js/kickstart.js"></script>
    
    <script src="jquery-1.11.2.min.js"> </script>
    
    <script>
                $(document).ready(function(){                  
                    $("#messages").load('films_room/ajaxLoad.php');
                    $("#userArea").submit(function(){
                       $.post('films_room/ajaxPost.php', $('#userArea').serialize(), function(data){
                            $("#messages").append('<div>'+data+'</div>');                            
                       }); 
                       return false;
                    });                  
                   
                });
    </script>
    
</head>
<body>

<?php   
    include_once "menu.htm";    
?>

<?php   
    include_once "menu.htm"; 
     if ($_SESSION["isLogined"] == "yes")
     {
        include_once "welcome.php";  
     }
?>

<div class="grid">
	<div class="col_12" style="margin-top:40px;">
        
            <h5 style="color:#999;margin-bottom:40px;" class="center">
                Films Room
            </h5>
            
            <!--Display-->
            <div id="messages"></div>        
            <!--Post-->
            <form id="userArea">
                <label>Message</label>
                <input type="text" maxlength="255" name="messages" />
                <label>Message</label>
                <input type="submit" value="Post Message" />
            </form>       
           
	</div>
</div> <!-- End Grid -->
</body>
</html>