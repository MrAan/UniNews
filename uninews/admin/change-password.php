<?php include('headfoot/header.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br></br>
        
        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>New Password: </td>
                    <td>
                        <input type="password" name="new_password" placeholder="New password">
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    //check whether the button is clicked or not
    if(isset($_POST['submit']))
    {
        //echo "button is clicked";
        // get the data from form 
        $id = $_GET['id'];
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']); 

        // check whether the user with current id and password exist 
        $sql = "SELECT * FROM tbl_editor WHERE id=$id";

        //execute query
        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            //check the data is available or not 
            $count=mysqli_num_rows($res);

            if($count==1)
            {
                // user exist 
                //echo "User found";
                if($new_password==$confirm_password)
                {
                    //update the password
                    $sql2 = "UPDATE tbl_editor SET
                    password = '$new_password'
                    WHERE id=$id;
                    ";
                    $res2 = mysqli_query($conn,$sql2);
                    if($res2==true)
                    {
                        //display success
                        $_SESSION['password-change'] = "Password change successfully";
                        header("location:".SITEURL.'admin/manage-account.php');
                    } 
                    else
                    {
                        //error message
                        //password did not match 
                        $_SESSION['password-change'] = "Failed to change password";
                        header("location:".SITEURL.'admin/manage-account.php');
                    }
                }
                else
                {
                    //password did not match 
                    $_SESSION['password-not-match'] = "Passowrd Not Match";
                    header("location:".SITEURL.'admin/manage-account.php');
                }

            }
            else
            {
                //user does not exist 
                $_SESSION['user-not-found'] = "User not found";
                header("location:".SITEURL.'admin/manage-account.php');
            }
        }
        // compare pasword and new pasword 

    }
?>

<?php include('headfoot/footer.php')?>