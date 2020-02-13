<div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <!-- Search form -->
                    <form action="search.php" method="post">
                        <div class="input-group">
                            <input name="search" type="text" class="form-control">
                            <span class="input-group-btn">
                                <button name="submit" class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        </div>
                        <!-- /.input-group -->
                    </form>
                        <!-- / search form -->
                </div>
                
<?php 
    // Login validation 
    $user_status = "";
    $username = "";
    if(isset($_GET['usr']))
    {
        $user_status = $_GET['usr']; 
        if (!$user_status) 
            $user_status = "<h5 class='text-center'>username or password are wrong</h5>";
    }
            // say Hallo to user
            if(isset($_SESSION['username']))
                $username = " Hallo " . $_SESSION['username'];
?>
    

    
                
                <!-- Login -->
                <div class="well">
                    <h4>Login<?php echo $username; ?> </h4>
                    <!-- Search form -->
                    <form action="includes/login.php" method="post">
                       <div class="form-group">
                            <?php echo $user_status ?>
                            <input name="username" type="text" class="form-control" placeholder="Enter username">
                       </div>
                       <div class="input-group">
                           <input name="password" type="password" class="form-control" placeholder="Enter password">
                            <span class="input-group-btn">
                                <button name="login" class="btn btn-primary" type="submit">Login</button>
                            </span>
                       </div>
                        <!-- /.input-group -->
                    </form>
                        <!-- / search form -->
                </div>

                <!-- Blog Categories Well -->
                
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                                   
<?php 

                    
        $query = "SELECT * FROM categories";
        $AllCats = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($AllCats))
        {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            echo "<li><a href='categories.php?c_id=$cat_id&c_title=$cat_title'>{$cat_title}</a></li>";
        }
                    
?>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <?php include "widget.php"; ?>

            </div>