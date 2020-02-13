    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                   
<?php 
        // categories as nav links
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
                <ul class="nav navbar-nav navbar-right top-nav">

                    
<?php 

    // Edit Profile link
    if(isset($_SESSION['user_role']))
    {
        $user_role = $_SESSION['user_role'];
        if($user_role == 'subscriber')
           echo "<li><a href='profile.php'>My Profile</a></li>";
        
    }
?>

                    
<?php 

    // Edit Post link
    if(isset($_SESSION['user_role']))
    {
        $user_role = $_SESSION['user_role'];
        if(isset($_GET['p_id']) && $user_role == 'admin')
        {
            $post_id = $_GET['p_id'];
            echo "<li><a href='admin/posts.php?source=edit_post&p_id=$post_id'>Edit Post</a></li>";
        }
    }
?>

                    <!-- Admin -->            
                    <li>
                        <a href="admin">Admin</a>
                    </li>
                    <!-- /.Admin -->
                    
                    
                   
                   
                   <!-- Admin -->            
                    <li>
                        <a href="registration.php">Register</a>
                    </li>
                    <!-- /.Admin -->
                   
                   
                    <!-- Logout -->
                    <li>
                        <a href="includes/logout.php">Logout</a>
                    </li>
                    <!-- /.Logout -->
                  
                    
                    
<!--
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>