
<!-- posts table -->
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>User Name</th>
            <th>First Name</th>
            <th>Second Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Register Date</th>
            <th>Admin</th>
            <th>Subscriber</th>
            <th>Edit</th>
            <th>Delete</th>
            
        </tr>
    </thead>
    <tbody>
    
<?php 
    // Display all comments
    $query = "SELECT * FROM users";

    $get_users = mysqli_query($connection, $query);
    if(!$get_users)
        die("QUERY FAILED! " . mysqli_error());
    else
    {
        while($row = mysqli_fetch_assoc($get_users))
        {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_firstname = $row['user_firstname'];
            $user_secondname = $row['user_secondname'];
            $user_email = $row['user_email'];
            $user_image  = $row['user_image'];
            $user_role  = $row['user_role'];
            $user_registerdate  = $row['user_register_date'];
            
            echo "<tr>";
            
            echo "<td>$user_id</td>";
            echo "<td><img width='100' src='../images/$user_image' alt='image'></td>";
            echo "<td>$username</td>";
            echo "<td>$user_firstname</td>";
            echo "<td>$user_secondname</td>";
            echo "<td>$user_email</td>";
            echo "<td>$user_role</td>";
            echo "<td>$user_registerdate</td>";
            echo "<td><a href='users.php?admin={$user_id}'>Admin</a></td>";
            echo "<td><a href='users.php?subscriber={$user_id}'>Subscriber</a></td>";
            echo "<td><a href='users.php?source=edit_user&u_id={$user_id}'>Edit</a></td>";
            echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
            
            echo "</tr>";
        }
    }
    
    // admin one user
    if(isset($_GET['admin']))
    {
        $user_id = $_GET['admin'];
        
        $query = "UPDATE users SET user_role = 'admin' ";
        $query .= "WHERE user_id = $user_id";
        $update_user_role = mysqli_query($connection, $query);
        query_error($update_user_role);
        header("Location: users.php");
    }
    
    // subscribe one user
    if(isset($_GET['subscriber']))
    {
        $user_id = $_GET['subscriber'];
        
        $query = "UPDATE users SET user_role = 'subscriber' ";
        $query .= "WHERE user_id = $user_id";
        $update_user_role = mysqli_query($connection, $query);
        query_error($update_user_role);
        header("Location: users.php");
    }
            
    // delete one comment
    if(isset($_GET['delete']))
    {
        $user_id = $_GET['delete'];
        
        $query = "DELETE FROM users WHERE user_id = {$user_id}";
        $delete_query = mysqli_query($connection, $query);
        query_error($delete_query);
        header("Location: users.php");       
    }
        
?>

    </tbody>
</table>
<!-- /.posts table -->