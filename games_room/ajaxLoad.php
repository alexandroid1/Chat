<?php
    include_once "header.php";    
?>

<script src="jquery-1.11.2.min.js"> </script>
            <script>
                $(document).ready(function(){                    
                      $(".delete").click(function(){
                       var item = $(this).parent(); 
                       var id = $(this).attr('rel');                      
                       $.post('games_room/ajaxDelete.php', {'id': id}, function(){
                           $(item).hide();
                       });
                       
                    });                    
                });
            </script>


<?php    
    include_once 'config.php';

    // Run a Query:
    $DB->Query('SELECT * FROM messages_games');
    // Get an array of items:
    $data = $DB->Get();
    
    foreach ($data as $key => $value)
    {
        echo '<div class="grid flex" >' . '<i style="color:#999; font-size: 14pt">' . $value['message'] .'</i>'. ' | ' . '<a href="#" class="delete" rel="'.$value['id'].'">Delete</a></div>';
    }
    
?>