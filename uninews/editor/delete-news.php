<?php 
    //include constant.php to  
    include('../config/constant.php');
    // get the id of editor to be deleted
    $id = $_GET['id'];
    // create sql query to delete editor
    $sql = "DELETE FROM tbl_news WHERE id=$id";
    // executre query
    $res = mysqli_query($conn, $sql);
    // check whether the query executed successfully or not 
    if($res==TRUE)
    {
        //query executed successfullly and editor deleted
        //echo "Editor deleted";
        //create session variable to display message 
        $_SESSION['delete'] = 'News deleted successfully';
        //redirect to manage editor page
        header('location:'.SITEURL.'editor/manage-news.php');
    }
    else{
        //display message 
        //echo "failed to delete editor";
        $_SESSION['delete'] = 'Failed to delete news. Try again';
        //redirect to manage editor page
        header('location:'.SITEURL.'editor/manage-news.php');
    }

    // redirect to manage-admin page with message or error 

?>