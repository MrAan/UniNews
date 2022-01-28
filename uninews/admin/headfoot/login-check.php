<?php 
    // Authorization - Access Control 
    // to check whether user has logged in or not 
    if(!isset($_SESSION['user'])) // if user is not set  
    {
        // user is not logged in 
        // redirect user to login page with message 
        $_SESSION['no-login-message'] = "<div class='text-center'>Please log in to acces Admin Dashboard </div>";
        // redirect to login page
        header("location:".SITEURL.'admin/admin-login.php');
    }
?>