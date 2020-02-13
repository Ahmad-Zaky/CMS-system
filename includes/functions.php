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


?>