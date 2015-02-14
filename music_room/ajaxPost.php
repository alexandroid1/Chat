<?php

    include_once 'config.php';
    $message = $_POST['messages'];
    $DB->Query("INSERT INTO messages(message) VALUES('$message')");
    echo $message;
    
?>