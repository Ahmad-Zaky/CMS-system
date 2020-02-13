<form action="" method="post">
    <div class="form-group">
    <label for="cat_title">Edit Category</label>

                                    
    <?php
    
        $query = "SELECT * FROM categories WHERE cat_id=$cat_id";
        $get_cat = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($get_cat);
        $cat_title = $row['cat_title'];
    ?>
    
    <input class="form-control" type="text" name="cat_title" value="<?php echo $cat_title; ?>">
                                        
    
    </div>
   
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update" value="Edit Category">
    </div>
</form>


<?php 
// UPDATE Category
if(isset($_POST['update']))
{
    $cat_title = $_POST['cat_title'];
    
    $cat_title = mysqli_real_escape_string($connection, $cat_title);
    
    if($cat_title == "" || empty($cat_title))
        die("There is no category title to update!");
    else
    {
        $query = "UPDATE categories SET cat_title='{$cat_title}' ";
        $query .= "WHERE cat_id={$cat_id}";
        $update_query = mysqli_query($connection, $query);
        if(!$update_query)
            die("FAILED QUERY! " . mysqli_error());
    }
}

?>