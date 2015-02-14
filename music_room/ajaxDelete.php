<?php    
    include_once 'config.php';

    $id = $_POST['id'];
    if($DB->Query("DELETE FROM messages_music WHERE `id`='$id'"));
    
    //echo $message;
?>