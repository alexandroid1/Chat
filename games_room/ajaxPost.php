<?php

    include_once 'config.php';
    $message = $_POST['messages_games'];
    $DB->Query("INSERT INTO messages_games(message) VALUES('$message')");
    echo $message;
    
?>