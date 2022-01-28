<?php
    // editor access control 
    // check whether editor has logged in or not 
    if(!isset($_SESSION['user']))
    {
        // user is not logged in 
        // redirect user to login page with message 
        $_SESSION['no-session-message'] ="<div class='text-center'>Please log in to acces Editor Dashboard </div>";
        // redirect to editor login page
        header("location:".SITEURL.'editor/editor-dashboard.php');
    }
?>