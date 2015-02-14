<?php

    include_once 'config.php';
    $message = $_POST['messages_music'];
    $DB->Query("INSERT INTO messages_music(message) VALUES('$message')");
    echo $message;
    
?>