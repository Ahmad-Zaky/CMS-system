<?php 

    if(isset($_POST['add_post'])){
        
        $post_category_id = $_POST['post_category'];
        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_date = date('d-m-y');
        
        $post_image = $_FILES['post_image']['name'];
        $post_image_tmp = $_FILES['post_image']['tmp_name'];
        
        $post_content = $_POST['post_content'];
        $post_tags = $_POST['post_tags'];
        $post_comment = 0;
        $post_status = $_POST['post_status'];
        
        move_uploaded_file($post_image_tmp, "../images/$post_image");
        
        // SQL Query
        $query = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";
        
        $query .= "VALUES ({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_comment}', '{$post_status}')";
        
        $add_post_query = mysqli_query($connection, $query);
        
        // select the last inserted post
//        if(query_error_ret($add_post_query))
//        {
//            $query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 1";
//            
//            $last_post = mysqli_query($connection, $query);
//            query_error($last_post);
//            
//            $row = mysqli_fetch_assoc($last_post);
//            $new_post_id = $row['post_id'];
//            
//        }
        
        $new_post_id = mysqli_insert_id($connection);
        
        
        // confirmation message for Admin
        echo "<p class='bg-success'>Successfuly created! " . "<a href='../post.php?p_id=$new_post_id'>View the new post</a> or <a href='psots.php'> veiw All posts</a></p>";

    }
?>

<form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
    <label for="post_title">  Post Title </label>
        <input type="text" class="form-control" name="post_title">
    </div>
    
    
    <div class="form-group">
    <label for="post_author"> Post Author  </label>
        <input type="text" class="form-control" name="post_author">
    </div>
    
    <div class="form-group">
        <label for="post_category"> Post Category </label><br>
        <select name="post_category" id="">
            
<?php 

    $query = "SELECT * FROM categories";
    $get_cats = mysqli_query($connection, $query);
    query_error($get_cats);
    while($row = mysqli_fetch_assoc($get_cats))
    {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        
        echo "<option value='{$cat_id}'>{$cat_title}</option>";
    }
        
            
?>
        </select>
    </div>
    
    
    <div class="form-group">
    <label for="post_image"> Post Image  </label>
        <input type="file" name="post_image">
    </div>
    
    
    <div class="form-group">
    <label for="post_content"> Post Content  </label>
        <textarea class="form-control" name="post_content" id="editor" cols="30" rows="10"></textarea>
    </div>

    
    <div class="form-group">
    <label for="post_tags">  Post Tags </label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    
    <div class="form-group">
        <label for="post_status"> Post State </label><br>
        <select name="post_status" id="">
           <option value='draft'>Draft</option>
           <option value='published'>Publish</option>
        </select>
    </div>
    
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="add_post" value="Publish">
    </div>
    
</form>