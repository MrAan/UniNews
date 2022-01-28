<?php include('partial-editor/editor-header.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add News</h1>
        <br><br>
        <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']); //removing session message_
                    }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td> 
                        <input type="text" name="news_title" placeholder="news title">
                    </td>                    
                </tr>
                <tr>
                    <td>University: </td>
                    <td> 
                        <input type="text" name="news_ipta" placeholder="enter university">   
                    </td>                    
                </tr>
                <tr>
                    <td>Content: </td>
                    <td> 
                    <textarea rows="25" cols="150" name="news_content" placeholder="enter your news"></textarea>
                    </td>                    
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Add News" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php 
    //process value from form and save it in database
    //check whether the submit button is read or not
    
    if(isset($_POST['submit']))
    {
        //button clicked 
        //echo "button clicked";

        //get the data from form 
        $news_title = $_POST['news_title'];
        $news_ipta = $_POST['news_ipta'];
        $news_content = ($_POST['news_content']);  
    
        //2, sql query to save data into database
        $sql = "INSERT INTO tbl_news SET
            news_title='$news_title',
            news_ipta='$news_ipta',
            news_content='$news_content'
        ";

        
        //EXECUTING QUERY AND SAVING DATA INTO DATABASE
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //CHECK WHETHER THE DATA IS INSERTED OR NOT
        if($res==true)
        {
            //data inserted
            //echo "data inserted";
            //create variable to display message
            $_SESSION['add'] = 'News added successfully';
            //redirect page to manage editor
            header("location:".SITEURL.'editor/manage-news.php');
        }
        else
        {
            //data inserted failed
            //echo "failed to inserted data";
            //create variable to display message
            $_SESSION['add'] = 'Failed to add editor';
            //redirect page to add editor
            header("location:".SITEURL.'editor/add-news.php');
        }

    }
    
?>
<?php include('partial-editor/editor-footer.php') ?>     

