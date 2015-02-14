<!DOCTYPE html>
<html>
<head>
	<!-- META -->
	<title>Pavlov Oleksandr</title>
	<meta charset="UTF-8">
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
                    $("#messages_music").load('music_room/ajaxLoad.php');
                    $("#userArea").submit(function(){
                       $.post('music_room/ajaxPost.php', $('#userArea').serialize(), function(data){
                            $("#messages_music").append('<div>'+data+'</div>');                            
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

<div class="grid">
	<div class="col_12" style="margin-top:40px;">

            <h5 style="color:#999;margin-bottom:40px;" class="center">
                Music Room
            </h5>
            
            <!--Display-->
            <div id="messages_music"></div>        
            <!--Post-->
            <form id="userArea">
                <label>Message</label>
                <input type="text" maxlength="255" name="messages_music" />
                <label>Message</label>
                <input type="submit" value="Post Message" />
            </form>       

            
                
    </div>
</div> <!-- End Grid -->
</body>
</html>