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

        <?php
           if($_FILES["filename"]["size"] > 1024*3*1024)
           {
             echo ("File size exceeds three megabytes");
             exit;
           }
           // ��������� �������� �� ����
           if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
           {
            
             // ���� ���� �������� �������, ���������� ���
             // �� ��������� ���������� � ��������
             move_uploaded_file($_FILES["filename"]["tmp_name"], "upload/images/".$_FILES["filename"]["name"]);
             $path="upload/images/".$_FILES["filename"]["name"];
             //����� ���� � ������ �������
             echo "<p class='center' style='color:#999;'>Loaded image</p><p class='center' style='color:#999;'><img src='$path' /></p>"; 
             echo('<h2 class="center"><a class="button" href="index.php">Go to the Main page</a></br>');  
             
             /*----------------begin resize avatar  -----------------------*/      
                                                 
             if(preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)|(gif)|(GIF)|(png)|(PNG)$/',$_FILES['filename']['name']))//�������� ������� ��������� �����������
             {   
                           
                   $filename = $_FILES['filename']['name'];
                   $source = $_FILES['filename']['tmp_name'];   
                   $target = "upload/images/".$filename;
                   move_uploaded_file($source, $target);
                    
                   if(preg_match('/[.](GIF)|(gif)$/', $filename)) {
                   $im = imagecreatefromgif($target) ; //���� �������� ��� � ������� gif, �� ������� ����������� � ���� �� �������. ���������� ��� ������������ ������
                   }
                   if(preg_match('/[.](PNG)|(png)$/', $filename)) {
                   $im = imagecreatefrompng($target) ;//���� �������� ��� � ������� png, �� ������� ����������� � ���� �� �������. ���������� ��� ������������ ������
                   }                   
                   if(preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)$/', $filename)) {
                      $im = imagecreatefromjpeg($target); //���� �������� ��� � ������� jpg, �� ������� ����������� � ���� �� �������. ���������� ��� ������������ ������
                   }                                                             
                        $w = 72;  // ������ ��������
                        $h = 72; //������ ��������                      
                        $w_src = imagesx($im); //��������� ������
                        $h_src = imagesy($im); //��������� ������ �����������                
                         // ������ ������ ���������� ��������                        
                        $dest = imagecreatetruecolor($w,$h);                
                         // �������� ���������� ��������� �� x, ���� ���� �������������� 
                        if ($w_src>$h_src) 
                        imagecopyresampled($dest, $im, 0, 0,
                                          round((max($w_src,$h_src)-min($w_src,$h_src))/2),
                                          0, $w, $h, min($w_src,$h_src), min($w_src,$h_src)); 
                        // �������� ���������� �������� �� y, 
                         // ���� ���� ������������ (���� ����� ���� ���������) 
                         if ($w_src<$h_src) 
                         imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $h,
                                          min($w_src,$h_src), min($w_src,$h_src));                 
                         // ���������� �������� �������������� ��� ������� 
                         if ($w_src==$h_src) 
                         imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $h, $w_src, $w_src); 
                         $date=time(); //��������� ����� � ��������� ������.
                         
                         $AvatarName=$date;
                         if ($_SESSION["isLogined"] == "yes")
                         {
                            $AvatarName=$_SESSION["UserName"]; 
                         }  
                         
                         imagejpeg($dest, "upload/avatars/".$AvatarName.".jpg");//��������� ����������� ������� jpg � ������ �����, ������ ����� ������� �����. �������, ����� � �������� �� ���� ���������� ����.
                        
                        //������ ������ jpg? �� �������� ����� ���� ����� + ������������ ������������ gif �����������, ������� ��������� ������������. �� ����� ������� ������ ��� �����������, ����� ����� ����� ��������� �����-�� ��������.
                        
                        $avatar = "upload/avatars/".$AvatarName.".jpg";//������� � ���������� ���� �� �������.
                        
                }
             
             /*------------------- End of resize avatar--------------------------------*/
             
             // ������� ���� � �������� � ������
             $_SESSION["pathToImage"]="SomePath";    	
             $_SESSION["pathToImage"] = $path;    
             
             // ������� ���� � ������� � ������
             $_SESSION["pathToAvatar"]="SomePath";    	
             $_SESSION["pathToAvatar"] = $avatar;   	
               
           } else {
              echo("file loading error  ");
           }
        ?>
        
                    
       </div>
    </div> <!-- End Grid --> 
    
</body>
</html>