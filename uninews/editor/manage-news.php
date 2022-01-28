<?php include('partial-editor/editor-header.php') ?>
        
<!-- Main content section starts -->
<div class="main-content">
            <div class="wrapper">
                <h1>Manage News</h1>
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
                ?>
                <br></br><br>
                <!-- Button to add new news -->
                <a href="add-news.php" class="btn-primary">Add News</a>
                <br></br>

                <table class="tbl-full">
                    <tr>
                        <th>Title</th>
                        <th>IPTA</th>
                        <th>Action</th>
                    </tr>

                    <?php
                        //query to get add news data from database 
                        $sql = "SELECT * FROM tbl_news";
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
                                    $news_title=$rows['news_title'];
                                    $news_ipta=$rows['news_ipta'];

                                    //display values in our table
                                    ?>
                                    <tr>
                                        <td><?php echo $news_title; ?></td>
                                        <td><?php echo $news_ipta; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL;?>editor/edit-news.php?id=<?php echo $id; ?>" class="btn-secondary">Edit</a>
                                            <a href="<?php echo SITEURL;?>editor/delete-news.php?id=<?php echo $id; ?>" class="btn-secondary">Delete</a>
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

<?php include('partial-editor/editor-footer.php') ?>       