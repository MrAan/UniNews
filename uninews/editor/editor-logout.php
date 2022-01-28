<?php 
    // include constant for siteurl
    include('../config/constant.php');
    // destroy session 
    session_destroy();
    // redirect to login page
    header("location:".SITEURL.'editor/editor-login.php'); 

?>