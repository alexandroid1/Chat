<?php
    
    // A Config array should be setup from a config file with these parameters:
    $config = array();
    $config['host'] = 'localhost';
    $config['user'] = 'root';
    $config['pass'] = '';
    $config['table'] = 'messages_games';
    
    include_once 'mysqli.class.php';
    // Then simply connect to your DB this way:
    $DB = new DB($config);
    
?>