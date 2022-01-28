<?php 
    // include contstant.php for SITEURL
    include('../config/constant.php');
    // destroy the session 
    session_destroy();
    //redirect to login page
    header("location:".SITEURL.'admin/admin-login.php');
?>