<?php
   
    if(isset($_GET['p_id']))
    {
        // select post by id
        $post_id = $_GET['p_id'];
        
        $query = "SELECT * FROM posts WHERE post_id = {$post_id}";
        $get_post = mysqli_query($connection, $query);
        if(!$get_post)
            die("QUERY FAILED! " . mysqli_error($connecion));
        else
        {
            
            $row = mysqli_fetch_assoc($get_post);

            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_category = $row['post_category_id'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
            $post_comments = $row['post_comment_count'];
            $post_status  = $row['post_status'];            
        }
    }
    
    // update selected post
    if(isset($_POST['edit_post']))
    {
        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_date = $_POST['post_date'];
        $post_category = $_POST['post_category'];
        $post_image = $_FILES['post_image']['name'];
        $post_image_tmp = $_FILES['post_image']['tmp_name'];
        
        $post_content = $_POST['post_content'];
        $post_tags = $_POST['post_tags'];
        $post_status = $_POST['post_status'];
        
        move_uploaded_file($post_image_tmp, "../images/$post_image");
        
        // escpae string 
        $post_title = mysqli_real_escape_string($connection, $post_title);
//        $post_author = mysqli_real_escape_string($connection, $post_author);
//        $post_image = mysqli_real_escape_string($connection, $post_image);
//        $post_content = mysqli_real_escape_string($connection, $post_content);
//        $post_tags = mysqli_real_escape_string($connection, $post_tags);
        
        //get image if lost
        if(empty($post_image))
        {
            $query = "SELECT post_image FROM posts WHERE post_id = $post_id";
            
            $select_image = mysqli_query($connection, $query);
            query_error($select_image);
            $field_image = mysqli_fetch_assoc($select_image);
            $post_image = $field_image['post_image'];
        }
        
        $query = "UPDATE posts SET ";
        $query .= "post_category_id ={$post_category}, ";
        $query .= "post_title ='{$post_title}', ";
        $query .= "post_author ='{$post_author}', ";
        $query .= "post_image ='{$post_image}', ";
        $query .= "post_content = '{$post_content}', ";
        $query .= "post_tags = '{$post_tags}', ";
        $query .= "post_status = '{$post_status}' ";
        $query .= "WHERE post_id = {$post_id} ";
        
        $update_query = mysqli_query($connection, $query);
        query_error($update_query);
        
        // confirmation message for Admin
        echo "<p class='bg-success'>Successfuly updated! " . "<a href='../post.php?p_id=$post_id'>View post</a></p>";
        
    }
?>
  <form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
    <label for="post_title">  Post Title </label>
        <input value="<?php echo htmlentities($post_title); ?>" type="text" class="form-control" name="post_title">
    </div>
        
    
    <div class="form-group">
    <label for="post_author"> Post Author  </label>
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="post_author">
    </div>
    
    
    <div class="form-group">
    <label for="post_date"> Post Date  </label>
        <input value="<?php echo $post_date; ?>" type="text" class="form-control" name="post_date">
    </div>
    
    <div class="form-group">
        <select name="post_category" id="">
            
<?php 

    $query = "SELECT * FROM categories";
    $get_cats = mysqli_query($connection, $query);
    query_error($get_cats);
    
    while($row = mysqli_fetch_assoc($get_cats))
    {
        if($post_category == $row['cat_id'])
        {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            echo "<option value='{$cat_id}'>{$cat_title}</option>";
            break;
        }
    }
    
    $get_cats = mysqli_query($connection, $query);
    query_error($get_cats);
            
    while($row = mysqli_fetch_assoc($get_cats))
    {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        if($post_category == $row['cat_id'])
            continue;
        echo "<option value='{$cat_id}'>{$cat_title}</option>";
    }
        
            
?>
        </select>
    </div>
    
    
    <div class="form-group">
        <img width="100" src="../images/<?php echo $post_image;?>" alt="image">
        <input type="file" name="post_image">
    </div>
    
    
    <div class="form-group">
    <label for="post_content"> Post Content  </label>
        <textarea class="form-control" name="post_content" id="editor" cols="30" rows="10">
<?php echo $post_content; ?>
        </textarea>
    </div>

    <div class="form-group">
    <label for="post_tags">  Post Tags </label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
    </div>
    
    <div class="form-group">
        <label for="post_category"> Post Category </label><br>
        <select name="post_status" id="">
            
<?php 

    $query = "SELECT * FROM posts WHERE post_id = $post_id";
    $get_post = mysqli_query($connection, $query);
    query_error($get_post);
    $row = mysqli_fetch_assoc($get_post);
    $post_state = $row['post_status'];
    
    if($post_state == 'draft'){
        
        echo "<option value='draft'>Draft</option>";
        echo "<option value='published'>Published</option>";
    }else
    {
        echo "<option value='published'>Published</option>";
        echo "<option value='draft'>Draft</option>";        
    }
      
?>
        </select>
      </div>
    
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_post" value="Save Changes">
    </div>
    
</form>