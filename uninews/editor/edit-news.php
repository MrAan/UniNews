<?php include('partial-editor/editor-header.php') ?>
 
<div class="main-content">
    <div class="wrapper">
        <h1>Edit News</h1>

        <?php 
            // get id of selected admin 
            $id = $_GET['id'];
            // create sql query to get the detail 
            $sql = "SELECT * FROM tbl_news WHERE id=$id";
            // execute the query 
            $res = mysqli_query($conn,$sql);
            // check whether the query is executed or not
            if($res==true){
                //check whether the data is available or not
                $count = mysqli_num_rows($res);
                //check whether we have editor data or not 
                if($count==1)
                {
                    // get the details 
                    //echo "admin available";
                    $row=mysqli_fetch_assoc($res);

                    $news_title=$row['news_title'];
                    $news_ipta=$row['news_ipta'];
                    $news_content=$row['news_content'];
                }
                else
                {
                    // redirect to manage account page 
                    header('location'.SITEURL.'editor/manage-news.php');
                }

            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="text" name="news_title" placeholder="<?php echo $news_title; ?>">
                    </td>
                </tr>
                <tr>
                    <td>University: </td>
                    <td>
                        <input type="text" name="news_ipta" placeholder="<?php echo $news_ipta; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Content: </td>
                    <td>
                        <textarea rows="25" cols="150" name="news_content" placeholder="<?php echo $news_content; ?>"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Update News" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
    if(isset($_POST['submit']))
    {
        //echo 'button clicked';
        // get all the values from form to update 
        $id=$_POST['id'];
        $news_title=$_POST['news_title'];
        $news_ipta=$_POST['news_ipta'];
        $news_content=$_POST['news_content'];

        //create sql query to update 
        $sql = "UPDATE tbl_news SET
        news_title='$news_title',
        news_ipta='$news_ipta',
        news_content='$news_content'
        WHERE 
        id='$id'
        ";
        
        // execute query 
        $res = mysqli_query($conn, $sql);

        // check sql query executed or not 
        if($res==true)
        {
            // updated 
            $_SESSION['update']="News updated successfully";
            // redirect to manage editor page 
            header("location:".SITEURL.'editor/manage-news.php');
        } 
        else{
            // not updated
            $_SESSION['update']="Failed to update news";
            // redirect to manage editor page 
            header('location:'.SITEURL.'editor/manage-news.php');
        }
    }
?>

<?php include('partial-editor/editor-footer.php') ?>   