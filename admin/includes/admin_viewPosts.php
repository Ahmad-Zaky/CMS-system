<!-- Applying the selected option -->

<?php 
    
    // Select options with Apply Bottom
    if(isset($_POST['chkBoxArr']))
    {
        foreach($_POST['chkBoxArr'] as $postValId)
        {
            if(isset($_POST['bulkOption']))
            {
                $bulkOption = $_POST['bulkOption'];
                
                switch($bulkOption)
                {
                    case 'published':
                    case 'draft':
                        $query = "UPDATE posts SET ";
                        $query .= "post_status = '{$bulkOption}' ";
                        $query .= "WHERE post_id = $postValId";

                        $update_post = mysqli_query($connection, $query);
                        query_error($update_post);
                    break;
                    case 'delete':
                        $query = "DELETE FROM posts WHERE post_id = $postValId";
                        
                        $delete_post = mysqli_query($connection, $query);
                        query_error($delete_post);
                        
                }
            }
        }
    }
    
?>


<!-- /.Applying the selected option -->




<!-- Form for bulk option -->
<form action="" method="post">

<!-- posts table -->
<table class="table table-bordered table-hover">
   
    <!-- add some options list -->
       
       <div id="bulkOptionContainer" class="col-sx-4">
           <select name="bulkOption" id="" class="form-control">
               <option value="">Select Options</option>
               <option value="published">Publish</option>
               <option value="draft">Draft</option>
               <option value="delete">Delete</option>
           </select>
        </div>
        <div class="col-sx-4">
           
           <input type="submit" name="submit" class="btn btn-success" value="Apply">
           <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
        </div>
   
    <!-- /.add some options list -->


   
    <thead>
        <tr>
            <th><input type="checkbox" onclick="toggle(this)" id="selectAllBoxes"></th>
               
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Date</th>
            <th>Category</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Status</th>
            <th>Publish</th>
            <th>Draft</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    
<?php 
    // Display all posts
    $query = "SELECT * FROM posts";
    $get_posts = mysqli_query($connection, $query);
    if(!$get_posts)
        did("QUERY FAILED! " . mysqli_error());
    else
    {
        while($row = mysqli_fetch_assoc($get_posts))
        {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_category = $row['post_category_id'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_comments = $row['post_comment_count'];
            $post_status  = $row['post_status'];
            
            // Select the category name
            $query = "SELECT cat_title FROM categories ";
            $query .= "WHERE cat_id = $post_category";
            
            $get_category = mysqli_query($connection, $query);
            query_error($get_category);
            
            $selected_cat = mysqli_fetch_assoc($get_category);
            $post_category = $selected_cat['cat_title'];
            
            
            // The table content
            echo "<tr>";
?>
            <td><input type="checkbox" class="checkBoxes" name="chkBoxArr[]" value="<?php echo $post_id?>" > </td>
<?php
            echo "<td>$post_id</td>";
            echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
            echo "<td>$post_author</td>";
            echo "<td>$post_date</td>";
            echo "<td>$post_category</td>";
            echo "<td><img width='100px' src='../images/$post_image' alt='image'></td>";
            echo "<td>$post_tags</td>";
            echo "<td>$post_comments</td>";
            echo "<td>$post_status</td>";
            echo "<td><a href='posts.php?draft={$post_id}'>Draft</a></td>";
            echo "<td><a href='posts.php?publish={$post_id}'>Publish</a></td>";
            echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
            echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
            echo "</tr>";
        }
    }
        
    // darft one post
    if(isset($_GET['draft']))
    {
        $post_id = $_GET['draft'];
        
        $query = "UPDATE posts SET post_status = 'draft' ";
        $query .= "WHERE post_id = $post_id";
        $update_post_status = mysqli_query($connection, $query);
        query_error($update_post_status);
        header("Location: posts.php");
    }
        
        
    // publish one post
    if(isset($_GET['publish']))
    {
        $post_id = $_GET['publish'];
        
        $query = "UPDATE posts SET post_status = 'published' ";
        $query .= "WHERE post_id = $post_id";
        $update_post_status = mysqli_query($connection, $query);
        query_error($update_post_status);
        header("Location: posts.php");
    }
        
    // delete one post
    if(isset($_GET['delete']))
    {
        $post_id = $_GET['delete'];
        
        $query = "DELETE FROM posts WHERE post_id = {$post_id}";
        $delete_query = mysqli_query($connection, $query);
        query_error($delete_query);
        
        // delete comments associated with this post
        $query = "DLETE FROM comments WHERE comment_post_id = $post_id";
        $delete_Pcomments = mysqli_query($connection, $query);
        query_error($delete_Pcomments);
        
        header("Location: posts.php");
    }
        
?>

    </tbody>
</table>




</form>
<!-- /.posts table -->


<script>

</script>