<?php include('../config/constant.php')?>

<html>
    <head>
        <title>Login - Uninews</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <div class="login">
            <h1 class="text-center">Admin Login</h1>
            <br><br>
            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>

            <!-- Login Form starts here -->
            <form method="POST" class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="Enter username"> <br><br>  
            Password: <br>
            <input type="text" name="password" placeholder="Enter password"> <br><br>  
            <input type="submit" name="submit" value="login" class="btn-primary">
            <br><br>
            </form>               
            <!-- Login Form ends here -->
            
            <p class="text-center"> Created by - <a href="">Azhan Hannan</a></a> </p>
        </div>
    </body>
</html>

<?php
    // check whether submit button is clicked or not
    if(isset($_POST['submit']))
    {
        // process for login
        // get data from login form
        $username=$_POST['username'];
        $password=$_POST['password'];

        // sql to check whether the email and password exist or not 
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
        
        //execute sql query
        $res = mysqli_query($conn,$sql); 

        // count rows to check whether the user exist or not 
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            // user available and login success
            $_SESSION['login']= "Login Successful";
            $_SESSION['user']= $username;
            // redirect to dashboard admin dashboard
            header("location:".SITEURL.'admin/index.php');
        }
        else{
            // user not available 
            // login failed
            $_SESSION['login']= "<div class='text-center'>Username and Password did not match</div>";
            // redirect to login page
            header("location:".SITEURL.'admin/admin-login.php');
        }
    }
?>