<?php include "includes/header.php"; ?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>
    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

               
               
<!--
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
-->
               
<?php 
        
        if(isset($_GET['c_id']))
        {
            $cat_id = $_GET['c_id'];
            $cat_title = $_GET['c_title'];
        
            $query = "SELECT * FROM posts WHERE post_category_id=$cat_id";
            $Allposts = mysqli_query($connection, $query);
            $count = mysqli_num_rows($Allposts);
            if(!$count)
                echo "<h2>NO {$cat_title} Posts is FOUND!</h2>";
            else
            {
                echo "<h3>Nr. of {$cat_title} Posts Found:{$count} </h3>";
                echo "<hr>";
            
            
                while($row = mysqli_fetch_assoc($Allposts))
                {
                    $post_id = $row['post_id'];
                    $PTitle = $row['post_title'];
                    $PAuthor = $row['post_author'];
                    $PDate = $row['post_date'];
                    $PImage = $row['post_image'];
                    $PContent = substr($row['post_content'], 0, 100);

?>

                <!-- One Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $PTitle ?></a>
                </h2>
                <p class="lead">
                    by <a href="#"><?php echo $PAuthor ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $PDate ?></p>
                <hr>
                <img width="500" class="img-responsive" src="images/<?php echo $PImage; ?>" alt="">
                
                <hr>
                
                <p><?php echo $PContent ?></p>
                <hr>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

<?php           }
            } 
        }
?>
               
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"?>            

        </div>
        <!-- /.row -->

        <hr>

        <?php include "includes/footer.php"?>