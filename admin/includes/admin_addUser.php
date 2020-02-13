<?php 

    if(isset($_POST['add_user']))
    {    
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user_firstname = $_POST['user_firstname'];
        $user_secondname = $_POST['user_secondname'];
        $user_email = $_POST['user_email'];
        
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        
        $user_role = $_POST['user_role'];
        $user_registerdate = $_POST['user_registerdate'];
        
        move_uploaded_file($user_image_tmp, "../images/$user_image");
        
        // escpae string chars
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);
        $user_image = mysqli_real_escape_string($connection, $user_image);
        
        // add default if none is added
        if(!$user_image)
            $user_image = "usr.jpg"; // default image
        
        // SQL Query
        $query = "INSERT INTO users (username, password, user_firstname, user_secondname, user_email, user_image, user_role, user_register_date) ";
        
        $query .= "VALUES ('{$username}', '{$password}', '{$user_firstname}', '{$user_secondname}', '{$user_email}', '{$user_image}', '{$user_role}', '{$user_registerdate}')";
        
        $add_user_query = mysqli_query($connection, $query);
        
        query_error($add_user_query); 
        
        // confirmation message for Admin
        echo "<p class='bg-success'>Successfuly created! " . "<a href='users.php'>View users to see the new user</a></p >";
    }
?>

<form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
    <label for="post_title">  First Name </label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    
    
    <div class="form-group">
    <label for="post_author"> Second Name  </label>
        <input type="text" class="form-control" name="user_secondname">
    </div>
    
    
    <div class="form-group">
    <label for="post_author"> Email  </label>
        <input type="email" class="form-control" name="user_email">
    </div>
    
    
    
    
    <div class="form-group">
    <label for="post_image">  Image  </label>
        <input type="file" name="user_image">
    </div>
    
    <hr>
    
    <div class="form-group">
        <select name="user_role" id="">
        
            <option value='subscriber'>Select role</option>
            <option value='subscriber'>Subscriber</option>
            <option value='admin'>Admin</option>
    
        </select>
    </div>

    
    <div class="form-group">
    <label for="post_tags"> Username </label>
        <input type="text" class="form-control" name="username">
    </div>
    
    
    <div class="form-group">

       <label for="post_tags"> Password </label>
        <input type="password" class="form-control" name="password">
    </div>
    
    <div class="form-group">

      
       <label for="post_tags">  Register Date </label>
        <input type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>" name="user_registerdate" readonly>
    </div>

    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="add_user" value="Add New User">
    </div>
    
</form>