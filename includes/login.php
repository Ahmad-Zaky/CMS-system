<?php include "db.php"; ?>
<?php include "functions.php"; ?>
<?php session_start(); ?>

<?php 

    if(isset($_POST['login']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);
        
        $query = "SELECT * FROM users WHERE username = '{$username}'";
        $select_user = mysqli_query($connection, $query);
        query_error($select_user);
        
        // in case nothing found in DB
        if(mysqli_num_rows($select_user) <= 0)
            header("Location: ../index.php?usr=0");
        
        while($row = mysqli_fetch_assoc($select_user))
        {
            $db_username = $row['username'];
            $db_password = $row['password'];
            $user_firstname  = $row['user_firstname'];
            $user_secondname = $row['user_secondname'];
            $user_role = $row['user_role'];
            
            if($username === $db_username && password_verify($password, $db_password))
            {
                $_SESSION['username'] = $db_username;
                $_SESSION['firstname'] = $user_firstname;
                $_SESSION['secondname'] = $user_secondname;
                $_SESSION['user_role'] = $user_role;
                
                header("Location: ../admin");
                break; // in case we found the user so we will break our loop ?!
            }
            else
                header("Location: ../index.php?usr=0");
        }        
    }

?>