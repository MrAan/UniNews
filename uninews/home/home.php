<?php 
    include('partial/header.php'); 
?>

<!-- Main content section starts -->
<div class="main-content">
            <div class="wrapper">
                <h1>News</h1>
                
                <div class="container">
                    <form class="text-center" action="<?php echo SITEURL;?>home/search.php" method="POST">
                        <input type="search" name="search" placeholder="Search Universities">
                        <input type="submit" name="submit" value="Search" class="btn-primary">
                    </form>
                </div>

                <div class="card">

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
                                    $news_content=$rows['news_content'];
                                    $news_ipta=$rows['news_ipta'];

                                    //display values in our table
                                    ?>
                                    <div class="card-header"><?php echo $news_title," | ",$news_ipta;  ?></div>
                                    <div class="card-body"><?php echo $news_content; ?></div>

                                    <?php
                                    
                                }
                            }
                            else
                            {
                                //we do not have data in database. 
                            }
                        }

                    ?>
                    
                </div>
            </div>
        </div>    

        <!-- Main content section end -->


<?php 
    include('partial/footer.php'); 
?>