<?php 
    include('partial/header.php'); 
?>

<div class="main-content">
<section class="search-news">
        <div class="container">
            

            <form class="text-center" action="<?php echo SITEURL;?>home/search.php" method="post">
                <input type="search" name="search" placeholder="Search Universities">
                <input type="submit" name="submit" value="Search" class="btn-primary">
            </form>
            
        </div>
    </section>

    <section class="news">
        <div class="container">
            <h2 class="text-center">Search News</h2>

            <?php 
                
                // get the search keyword
                $search = $_POST['search'];


                //sql query to get news based on keyword
                $sql = "SELECT * FROM tbl_news WHERE news_title LIKE '%$search%' OR news_content LIKE '%$search%'";

                //execute the query
                $res = mysqli_query($conn, $sql);

                //count rows  
                $count = mysqli_num_rows($res);

                //check whether news available or not 
                if($count>0)
                {
                    //news available 
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //get the details 
                        $id = $row['id'];
                        $news_title = $row['news_title'];
                        $news_content = $row['news_content'];
                        $news_ipta = $row['news_ipta'];
                        ?>
                        
                        <div class="card">
                                    <div class="card-header"><?php echo $news_title," | ",$news_ipta;  ?></div>
                                    <div class="card-body"><?php echo $news_content; ?></div>

                        </div>


                        <?php
                    }
                }
                else
                {
                    //food not available 
                    echo "Food not found.";
                }
            
            ?>

        </div>
    </section>
</div>
<?php 
    include('partial/footer.php'); 
?>