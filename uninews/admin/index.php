<?php include('headfoot/header.php') ?>
        
        <!-- Main content section starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Dashboard</h1><br>
                <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                ?>
                
                <h2>
                    Welcome to Admin Dashboard! <br><br> 
                    Admin will manage editor registration, promotion news and handle feedback from users. 
                </h2>
            </div>
        </div>   
        <!-- Main content section end -->

<?php include('headfoot/footer.php') ?>        