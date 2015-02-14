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
    <link rel="stylesheet" type="text/css" href="RoundAvatar.css" media="all" /> 
	
	<!-- Javascript -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/kickstart.js"></script>
</head>
<body> 
 
         <?php
            include_once "header.php";
            if($_SESSION["isLogined"]==yes)
                {                
                            $morning = "Good morning,";
                            $day = "Good afternoon,";
                            $evening = "Good evening,";
                            $night = "Good night,";
                            
                            $minyt = date("i");
                            $chasov = date("H");
                            
                            if($chasov >= 04) {$hello = $morning;}
                            if($chasov >= 10) {$hello = $day;}
                            if($chasov >= 16) {$hello = $evening;}
                            if($chasov >= 22 or $chasov < 04) {$hello = $night;} 
                            
                            $path = $_SESSION["pathToImage"]; 
                            $avatar = $_SESSION["pathToAvatar"];    
                            
                            echo '<div class="avatar">';
                                echo "<img src='$avatar'/>";
                            echo '</div>';                            
                                  
                            echo '<p style="color:#999;">'."time: $chasov:$minyt, $hello ".$_SESSION["UserName"]."<br/>".'</p>';
                         
                }
        ?>
</body>
</html>