<?php
    include_once "header.php";    
?>

<?php

    include_once 'config.php';
    $message = $_POST['messages'];
    
    $minyt = date("i");
    $chasov = date("H");
    
    $str = $_SESSION["UserName"]." said at $chasov:$minyt : ".$message;
    $DB->Query("INSERT INTO messages(message) VALUES('$str')");
    echo $message;
    
?>