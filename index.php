<?php include "includes/header.php"; ?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>
    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

               
<?php 

                    
        $query = "SELECT * FROM posts WHERE post_status = 'published' ORDER BY post_id DESC";
        $Allposts = mysqli_query($connection, $query);
        
        if(mysqli_num_rows($Allposts) == 0)
            echo "<h1 class='text-center'>SORRY, No posts published yet!</h1>";
        else
        {
            while($row = mysqli_fetch_assoc($Allposts))
            {
                $post_ID = $row['post_id'];
                $PTitle = $row['post_title'];
                $PAuthor = $row['post_author'];
                $PDate = $row['post_date'];
                $PImage = $row['post_image'];
                $PContent = substr($row['post_content'],0 , 100);
?>

                <!-- One Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_ID ?>"><?php echo $PTitle ?></a>
                </h2>
                <p class="lead">
                    by <a href="#"><?php echo $PAuthor ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $PDate ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_ID ?>">
                <img width="500" class="img-responsive" src="images/<?php echo $PImage; ?>" alt="">
                </a>
                <hr>
                <p><?php echo $PContent ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_ID ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

<?php       } 
        }
?>
               

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>            

        </div>
        <!-- /.row -->

        <hr>

        <?php include "includes/footer.php"; ?>