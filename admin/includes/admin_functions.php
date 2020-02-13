<?php

    function query_error($qResult)
    {
        global $connection;

        if(!$qResult)
            die("QUERY FAILED! " . mysqli_error($connection));
    }

    function query_error_ret($qResult)
    {
        global $connection;

        if(!$qResult)
        {
            die("QUERY FAILED! " . mysqli_error($connection));
            return false;
        }
        return true;
    }   

    function insert_category()
    {
        global $connection;
        
        if(isset($_POST['submit']))
        {
            $cat_title = $_POST['cat_title'];
            $cat_title = mysqli_real_escape_string($connection, $cat_title);

            if($cat_title == "" || empty($cat_title)) //if(!$cat_title)
                echo "<strong>Please fill Category field first</storng>";
            else
            {
                $query = "INSERT INTO categories(cat_title) ";
                $query .= "VALUES('{$cat_title}')";

                $create_cat = mysqli_query($connection, $query);
                if(!$create_cat)
                    die("QUERY FAILED!" . mysqli_error($connection));
            }
        }
    }

    function select_categories()
    {
        global $connection;

        $query = "SELECT * FROM categories";
        $AllCats = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($AllCats))
        {
            $CID = $row['cat_id'];
            $CTitle = $row['cat_title'];
            
            echo "<tr>";
            echo "<td>{$CID}</td>";
            echo "<td>{$CTitle}</td>";
            echo "<td><a href='categories.php?delete={$CID}'>Delete</a></td>";
            echo "<td><a href='categories.php?edit={$CID}'>Edit</a></td>";
            
            echo "</tr>";
        }
    }

    function delete_category()
    {
        global $connection;
        
        if(isset($_GET['delete']))
        {
            $cat_id = $_GET['delete'];
            
            $query = "DELETE FROM categories ";
            $query .= "WHERE cat_id = {$cat_id}";
            
            $delete_query = mysqli_query($connection, $query);
            if(!$delete_query)
                die("QUERY FAILED! " . mysqli_error($connection));
            else
                header("Location: categories.php");
        }
    }

    
?> 