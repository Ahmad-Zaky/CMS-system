<?php include "includes/header.php"; ?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>
    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

               
               
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
               
<?php 
        // get the post selecte from Home page
        if(isset($_GET['p_id']))
        {
            $post_id = $_GET['p_id']; 
        
            $query = "SELECT * FROM posts WHERE post_id=$post_id";
            $get_post = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($get_post);
            
            $PTitle = $row['post_title'];
            $PAuthor = $row['post_author'];
            $PDate = $row['post_date'];
            $PImage = $row['post_image'];
            $PContent = $row['post_content'];

?>

                <!-- One Blog Post -->
                <h2>
                    <a href="#"><?php echo $PTitle ?></a>
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

<?php       
        

            // increment post comments count by 1
            if(isset($_POST['comment']))
            {
                $post_comment_count = $row['post_comment_count'];

                $query = "UPDATE posts SET post_comment_count = $post_comment_count + 1 ";
                $query .= "WHERE post_id = $post_id";
                $set_post_comments = mysqli_query($connection, $query);
                query_error($set_post_comments);
            }
        }
?>
              
                <!-- Blog Comments -->
              
<?php 

    $comment_validation = "";
    if(isset($_POST['comment']))
    {
        $comment_post_id = $_GET['p_id'];
        
        $comment_author = $_POST['comment_author'];
        $comment_email = $_POST['comment_email'];
        $comment_content = $_POST['comment_content'];
        
        if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content))
        {
            $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_date) ";

            $query .= "VALUES ({$comment_post_id}, '{$comment_author}', '{$comment_email}', '{$comment_content}', now())";

            $insert_comment = mysqli_query($connection, $query);
            query_error($insert_comment);
        }
        else
            $comment_validation = "<h4 style='color: #f00' class='text-center'>one or more fields are emptye!</h4>";
    }
                
                
?>
                
            
               

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <!-- validation message -->
                    <?php echo $comment_validation; ?>
                    <!-- /.validation message -->                    
                    <form action="" method="post" role="form">
                       <div class="form-group">
                          <label for="comment_author" >Author</label>
                           <input type="text" class="form-control" name="comment_author">
                       </div>
                       <div class="form-group">
                           <label for="comment_email" >Email</label>

                           <input type="email" class="form-control" name="comment_email">
                        </div>
                        <div class="form-group">
                            <label for="comment" >Your Comment</label>
                            <textarea class="form-control" name="comment_content" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="comment">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
<?php
    // Display the comment     
    if(isset($_GET['p_id']))
    {
        $comment_post_id = $_GET['p_id'];
        $query = "SELECT * FROM comments ";
        $query .= "WHERE comment_post_id = {$comment_post_id} AND comment_status = 'approved' ";
        $query .= "ORDER BY comment_id DESC ";
        
        $get_comments = mysqli_query($connection, $query);
        query_error($get_comments);
        
        while($row = mysqli_fetch_assoc($get_comments))
        {
            $comment_author = $row['comment_author'];
            $comment_content = $row['comment_content'];
            $comment_date = $row['comment_date'];
?>
       
               <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>
       
<?php    
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