<?php

// Set database 
define("DB_HOST", "localhost");
define("DB_NAME", "EasyCook");
define("DB_USER", "root");
define("DB_PASS", "DB4495");
define("DB_PORT", 3306);


// Set error log
define('LOGFILE','log/error_log.txt');
ini_set("log_errors", TRUE);  
ini_set('error_log', LOGFILE); 

// folder path for images
define("IMAGES",'./images/');

?>