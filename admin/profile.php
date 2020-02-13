<?php include "includes/admin_header.php"; ?>

<?php 
                        
        echo $_SESSION['username'];

?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Admin
                            <small>Author</small>
                        </h1>
                        
                       <?php
    if(isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
        
        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $get_user = mysqli_query($connection, $query);
        if(!$get_user)
            die("QUERY FAILED! " . mysqli_error($connection));
        else
        {
            
            $row = mysqli_fetch_assoc($get_user);
            
            $user_id = $row['user_id'];
            $username = $row['username'];
            $password = $row['password'];
            $user_firstname = $row['user_firstname'];
            $user_secondname = $row['user_secondname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
            $user_registerdate = $row['user_register_date'];
        }
    }
    
    // update selected user
    if(isset($_POST['edit_user']))
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
      
        //get image if lost
        if(empty($user_image))
        {
            $query = "SELECT user_image FROM users WHERE user_id = {$user_id}";
            
            $select_image = mysqli_query($connection, $query);
            query_error($select_image);
            $field_image = mysqli_fetch_assoc($select_image);
            $user_image = $field_image['user_image'];
        }
        
        $query = "UPDATE users SET ";
        $query .= "username ='{$username}', ";
        $query .= "password ='{$password}', ";
        $query .= "user_firstname ='{$user_firstname}', ";
        $query .= "user_secondname = '{$user_secondname}', ";
        $query .= "user_email ='{$user_email}', ";
        $query .= "user_image = '{$user_image}', ";
        $query .= "user_role = '{$user_role}', ";
        $query .= "user_register_date = '{$user_registerdate}' ";
        $query .= "WHERE username = '{$username}' ";
        
        $update_query = mysqli_query($connection, $query);
        query_error($update_query);
        
        
    }
?>
  <form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
    <label for="username">  Username </label>
        <input value="<?php echo $username; ?>" type="text" class="form-control" name="username">
    </div>
        
    
    <div class="form-group">
    <label for="password"> Password  </label>
        <input value="<?php echo $password; ?>" type="text" class="form-control" name="password">
    </div>
    
    
    <div class="form-group">
    <label for="user_firstname"> Firstname  </label>
        <input value="<?php echo $user_firstname; ?>" type="text" class="form-control" name="user_firstname">
    </div>
    
    <div class="form-group">
    <label for="user_secondname"> Secondname  </label>
        <input value="<?php echo $user_secondname; ?>" type="text" class="form-control" name="user_secondname">
    </div>
    
    <div class="form-group">
    <label for="user_email"> Email </label>
        <input value="<?php echo $user_email; ?>" type="text" class="form-control" name="user_email">
    </div>
    
    <div class="form-group">
        <img width="100" src="../images/<?php echo $user_image;?>" alt="image">
        <input type="file" name="user_image">
    </div>
    
    
    <div class="form-group">
        <select name="user_role" id="">
            
<?php 

    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $get_users = mysqli_query($connection, $query);
    query_error($get_users);
    while($row = mysqli_fetch_assoc($get_users))
    {
        $user_role = $row['user_role'];
        
        if($user_role === 'admin'){
            
            echo "<option value='admin'>Admin</option>";
            echo "<option value='subscriber'>Subscriber</option>";
        }
        else{
            
            echo "<option value='subscriber'>Subscriber</option>";
            echo "<option value='admin'>Admin</option>";
        }
    }
        
            
?>
        </select>
    </div>
       
    
    
    <div class="form-group">
        <label for="">   Register Date </label>
        <input  value="<?php echo $user_registerdate; ?>" type="text" class="form-control" name="user_registerdate" readonly>
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_user" value="Update Profile">
    </div>
    
</form>
                        
                                                                     
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include "includes/admin_footer.php"; ?>