<?php include('headfoot/header.php') ?>
 
<div class="main-content">
    <div class="wrapper">
        <h1>Update Account</h1>

        <?php 
            // get id of selected admin 
            $id = $_GET['id'];
            // create sql query to get the detail 
            $sql = "SELECT * FROM tbl_editor WHERE id=$id";
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

                    $email=$row['email'];
                    $university=$row['university'];
                }
                else
                {
                    // redirect to manage account page 
                    header('location'.SITEURL.'admin/manage-account.php');
                }

            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="text" name="email" placeholder="<?php echo $email; ?>">
                    </td>
                </tr>
                <tr>
                    <td>University: </td>
                    <td>
                        <input type="text" name="university" placeholder="<?php echo $university; ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-primary">
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
        $email=$_POST['email'];
        $university=$_POST['university'];

        //create sql query to update 
        $sql = "UPDATE tbl_editor SET
        email='$email',
        university='$university'
        WHERE 
        id='$id'
        ";
        
        // execute query 
        $res = mysqli_query($conn, $sql);

        // check sql query executed or not 
        if($res==true)
        {
            // updated 
            $_SESSION['update']="Editor updated successfully";
            // redirect to manage editor page 
            header("location:".SITEURL.'admin/manage-account.php');
        } 
        else{
            // not updated
            $_SESSION['update']="Failed to update editor";
            // redirect to manage editor page 
            header('location:'.SITEURL.'admin/manage-account.php');
        }
    }
?>
<?php include('headfoot/footer.php') ?>   