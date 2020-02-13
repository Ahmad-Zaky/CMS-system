 <?php  include "includes/header.php"; ?>
    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">

    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
<?php 
    
    // declared and initialize out of scope to be visible in the html content
    $password_validation = "";
    $regis_validation = "";
    $user_validation = "";
    $check1 = $check2 = $check3 = true;


    // Insert Registeration infos.
    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        
        // check user name if already exist
        $query = "SELECT * FROM users WHERE username = '{$username}'";
        $get_user = mysqli_query($connection, $query);
        
        if(mysqli_num_rows($get_user) > 0){
            $user_validation = "<h4 style='color: #f00' class='text-center'>username already exist, Plz try another username.</h4>";
            $check1 = false;
        }
        
        // check 2 password fields if match
        if($password !== $confirm_password){
            $password_validation = "<h4 style='color: #f00' class='text-center'>password does NOT MATCH!, Plz try again.</h4>";
            $check2 = false;
        }
        
        // check if empty
        if(!$username || !$email || !$password){
            $regis_validation = "<h4 style='color: #f00' class='text-center'>one or more fields are still empty!</h4>";
            $check3 = false;
        }
        
        // Apply the regist submission
        if($check1 && $check2 && $check3)
        {
            // encrypt our password first before any insertion
            $options = [
                'mermory_cost' => 1<<17,
                'time_cost' => 4,
                'threads' => 2
            ];
            
            $password = password_hash($password, PASSWORD_ARGON2I, $options);
            
            // Insert query
            $query = "INSERT INTO users (username, password, user_email, user_register_date) ";
            $query .= "VALUES('{$username}', '{$password}', '{$email}', now())";
            
            $regis_query = mysqli_query($connection, $query);
            query_error($regis_query);
            
            // confirmation message for Admin
            echo "<p class='bg-success'>Successfuly registered! </p>";
        }
    }


       
    if($user_validation) echo $user_validation;
    else
    {
        if($regis_validation) echo $regis_validation;
        if($regis_validation && $password_validation) echo "<h4 style='color: #f00' class='text-center'> AND </h4>";
        if($password_validation) echo $password_validation;
    }
?>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                        
                        <div class="form-group">
                            <label for="confirm_password" class="sr-only">Confirm Password</label>
                            <input type="password" name="confirm_password" id="key" class="form-control" placeholder="Confirm Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
