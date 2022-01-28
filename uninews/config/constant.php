<?php 
    //start session
    session_start();


    //create constant to install non repeating values
    define('SITEURL', 'http://localhost:8012/uninews/');
    define('LOCALHOST', 'localhost');
    define('DB_EMAIL', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'uninews');

    $conn = mysqli_connect(LOCALHOST, DB_EMAIL, DB_PASSWORD) or die(mysqli_error()); //database connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //selecting database

?>