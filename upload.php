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
           // Проверяем загружен ли файл
           if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
           {
            
             // Если файл загружен успешно, перемещаем его
             // из временной директории в конечную
             move_uploaded_file($_FILES["filename"]["tmp_name"], "upload/images/".$_FILES["filename"]["name"]);
             $path="upload/images/".$_FILES["filename"]["name"];
             //вывод фото в полном размере
             echo "<p class='center' style='color:#999;'>Loaded image</p><p class='center' style='color:#999;'><img src='$path' /></p>"; 
             echo('<h2 class="center"><a class="button" href="index.php">Go to the Main page</a></br>');  
             
             /*----------------begin resize avatar  -----------------------*/      
                                                 
             if(preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)|(gif)|(GIF)|(png)|(PNG)$/',$_FILES['filename']['name']))//проверка формата исходного изображения
             {   
                           
                   $filename = $_FILES['filename']['name'];
                   $source = $_FILES['filename']['tmp_name'];   
                   $target = "upload/images/".$filename;
                   move_uploaded_file($source, $target);
                    
                   if(preg_match('/[.](GIF)|(gif)$/', $filename)) {
                   $im = imagecreatefromgif($target) ; //если оригинал был в формате gif, то создаем изображение в этом же формате. Необходимо для последующего сжатия
                   }
                   if(preg_match('/[.](PNG)|(png)$/', $filename)) {
                   $im = imagecreatefrompng($target) ;//если оригинал был в формате png, то создаем изображение в этом же формате. Необходимо для последующего сжатия
                   }                   
                   if(preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)$/', $filename)) {
                      $im = imagecreatefromjpeg($target); //если оригинал был в формате jpg, то создаем изображение в этом же формате. Необходимо для последующего сжатия
                   }                                                             
                        $w = 72;  // ширина картинки
                        $h = 72; //высота картинки                      
                        $w_src = imagesx($im); //вычисляем ширину
                        $h_src = imagesy($im); //вычисляем высоту изображения                
                         // создаём пустую квадратную картинку                        
                        $dest = imagecreatetruecolor($w,$h);                
                         // вырезаем квадратную серединку по x, если фото горизонтальное 
                        if ($w_src>$h_src) 
                        imagecopyresampled($dest, $im, 0, 0,
                                          round((max($w_src,$h_src)-min($w_src,$h_src))/2),
                                          0, $w, $h, min($w_src,$h_src), min($w_src,$h_src)); 
                        // вырезаем квадратную верхушку по y, 
                         // если фото вертикальное (хотя можно тоже серединку) 
                         if ($w_src<$h_src) 
                         imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $h,
                                          min($w_src,$h_src), min($w_src,$h_src));                 
                         // квадратная картинка масштабируется без вырезок 
                         if ($w_src==$h_src) 
                         imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $h, $w_src, $w_src); 
                         $date=time(); //вычисляем время в настоящий момент.
                         
                         $AvatarName=$date;
                         if ($_SESSION["isLogined"] == "yes")
                         {
                            $AvatarName=$_SESSION["UserName"]; 
                         }  
                         
                         imagejpeg($dest, "upload/avatars/".$AvatarName.".jpg");//сохраняем изображение формата jpg в нужную папку, именем будет текущее время. Сделано, чтобы у аватаров не было одинаковых имен.
                        
                        //почему именно jpg? Он занимает очень мало места + уничтожается анимирование gif изображения, которое отвлекает пользователя. Не очень приятно читать его комментарий, когда краем глаза замечаешь какое-то движение.
                        
                        $avatar = "upload/avatars/".$AvatarName.".jpg";//заносим в переменную путь до аватара.
                        
                }
             
             /*------------------- End of resize avatar--------------------------------*/
             
             // заносим путь к картинке в сессию
             $_SESSION["pathToImage"]="SomePath";    	
             $_SESSION["pathToImage"] = $path;    
             
             // заносим путь к аватару в сессию
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