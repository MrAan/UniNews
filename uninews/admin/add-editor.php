<?php include('headfoot/header.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Editor</h1>
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
                    <td>Email: </td>
                    <td> 
                        <input type="text" name="email" placeholder="enter email">
                    </td>                    
                </tr>
                <tr>
                    <td>University: </td>
                    <td> 
                        <input type="text" name="university" placeholder="university">   
                    </td>                    
                </tr>
                <tr>
                    <td>Password: </td>
                    <td> 
                        <input type="password" name="password" placeholder="password">   
                    </td>                    
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Add Editor" class="btn-primary">
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
        $email = $_POST['email'];
        $university = $_POST['university'];
        $password = md5($_POST['password']); //password encryption 
    
        //2, sql query to save data into database
        $sql = "INSERT INTO tbl_editor SET
            email='$email',
            university='$university',
            password='$password'
        ";

        
        //EXECUTING QUERY AND SAVING DATA INTO DATABASE
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //CHECK WHETHER THE DATA IS INSERTED OR NOT
        if($res==true)
        {
            //data inserted
            //echo "data inserted";
            //create variable to display message
            $_SESSION['add'] = 'Editor added successfully';
            //redirect page to manage editor
            header("location:".SITEURL.'admin/manage-account.php');
        }
        else
        {
            //data inserted failed
            //echo "failed to inserted data";
            //create variable to display message
            $_SESSION['add'] = 'Failed to add editor';
            //redirect page to add editor
            header("location:".SITEURL.'admin/add-editor.php');
        }

    }
    
?>
<?php include('headfoot/footer.php') ?>  

