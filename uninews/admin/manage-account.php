<?php include('headfoot/header.php') ?>
        
        <!-- Main content section starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Account</h1>
                <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']); //removing session message_
                    }
                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']); //removing session message_
                    }
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']); //removing session message_
                    }
                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']); //removing session message_
                    }
                    if(isset($_SESSION['password-not-match']))
                    {
                        echo $_SESSION['password-not-match'];
                        unset($_SESSION['password-not-match']); //removing session message_
                    }
                    if(isset($_SESSION['password-change']))
                    {
                        echo $_SESSION['password-change'];
                        unset($_SESSION['password-change']); //removing session message_
                    }
                ?>
                <br></br><br>
                <!-- Button to add new editor -->
                <a href="add-editor.php" class="btn-primary">Add Editor</a>
                <br></br>

                <table class="tbl-full">
                    <tr>
                        <th>Email</th>
                        <th>IPTA</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                    <?php
                        //query to get add editor data from database 
                        $sql = "SELECT * FROM tbl_editor";
                        //query execution
                        $res = mysqli_query($conn,$sql);

                        //check whether the query is executed or not 
                        if($res==TRUE)
                        {
                            //count rows
                            $count = mysqli_num_rows($res);

                            //check the number or rows
                            if($count>0)
                            {
                                //we have data in database
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    //using while loop to get data in database
                                    //and while loop will run as long as data is exist in database

                                    //get individual data
                                    $id=$rows['id'];
                                    $email=$rows['email'];
                                    $university=$rows['university'];

                                    //display values in our table
                                    ?>
                                    <tr>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $university; ?></td>
                                        <td>Active</td>
                                        <td>
                                            <a href="<?php echo SITEURL;?>admin/change-password.php?id=<?php echo $id; ?>" class="btn-secondary">Change Password</a>
                                            <a href="<?php echo SITEURL;?>admin/update-account.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                                            <a href="<?php echo SITEURL;?>admin/delete-account.php?id=<?php echo $id; ?>" class="btn-secondary">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                    
                                }
                            }
                            else
                            {
                                //we do not have data in database. 
                            }
                        }

                    ?>
                    
                </table>
            </div>
        </div>    

        <!-- Main content section end -->

<?php include('headfoot/footer.php') ?>  