
<!-- posts table -->
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Email</th>
            <th>In reponce to</th>
            <th>Comments</th>
            <th>Date</th>
            <th>Status</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    
<?php 
    // Display all comments
    $query = "SELECT * FROM comments ";
    $query .= "ORDER BY comment_id DESC";

    $get_posts = mysqli_query($connection, $query);
    if(!$get_posts)
        did("QUERY FAILED! " . mysqli_error());
    else
    {
        while($row = mysqli_fetch_assoc($get_posts))
        {
            $comment_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_author = $row['comment_author'];
            $comment_email = $row['comment_email'];
            $comment_content = $row['comment_content'];
            $comment_date = $row['comment_date'];
            $comment_status  = $row['comment_status'];
            
            // Select the category name
            $query = "SELECT post_title FROM posts ";
            $query .= "WHERE post_id = $comment_post_id ";
            
            $get_post = mysqli_query($connection, $query);
            query_error($get_post);
            
            $selected_psot = mysqli_fetch_assoc($get_post);
            $comment_post = $selected_psot['post_title'];
            
            echo "<tr>";
            
            echo "<td>$comment_id</td>";
            echo "<td>$comment_author</td>";
            echo "<td>$comment_email</td>";
            echo "<td><a href='../post.php?p_id=$comment_post_id''>$comment_post</a></td>";
            echo "<td>$comment_content</td>";
            echo "<td>$comment_date</td>";
            echo "<td>$comment_status</td>";
            echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
            echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
            echo "<td><a href='comments.php?p_id={$comment_post_id}&delete={$comment_id}'>Delete</a></td>";
            
            echo "</tr>";
        }
    }
    
        
    // approve one comment
    if(isset($_GET['approve']))
    {
        $comment_id = $_GET['approve'];
        
        $query = "UPDATE comments SET comment_status = 'approved' ";
        $query .= "WHERE comment_id = $comment_id";
        $update_comm_status = mysqli_query($connection, $query);
        query_error($update_comm_status);
        header("Location: comments.php");
    }
    
    // unapprove one comment
    if(isset($_GET['unapprove']))
    {
        $comment_id = $_GET['unapprove'];
        
        $query = "UPDATE comments SET comment_status = 'unapproved' ";
        $query .= "WHERE comment_id = $comment_id";
        $update_comm_status = mysqli_query($connection, $query);
        query_error($update_comm_status);
        header("Location: comments.php");
    }
        
        
        
    // delete one comment
    if(isset($_GET['delete']) && isset($_GET['p_id']))
    {
        $comment_id = $_GET['delete'];
        
        $query = "DELETE FROM comments WHERE comment_id = {$comment_id}";
        $delete_query = mysqli_query($connection, $query);
        query_error($delete_query);
        header("Location: comments.php");
        
        
        
        // Decrement post comment count
        $post_id = $_GET['p_id'];
        
        $query = "SELECT * FROM posts WHERE post_id = {$post_id}";
        $select_query = mysqli_query($connection, $query);
        query_error($select_query);
        
        $row = mysqli_fetch_assoc($select_query);
        $post_comment_count = $row['post_comment_count'];
        
        $query = "UPDATE posts SET post_comment_count = $post_comment_count - 1 ";
        $query .= "WHERE post_id = $post_id";
        $set_post_comments = mysqli_query($connection, $query);
        query_error($set_post_comments);        
    }
        
?>

</tbodoy>
</table>
<!-- /.posts table -->