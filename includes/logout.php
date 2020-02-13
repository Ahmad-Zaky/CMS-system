<?php include "db.php"; ?>
<?php include "functions.php"; ?>
<?php session_start(); ?>

<?php 

    $_SESSION['username'] = NULL;
    $_SESSION['firstname'] = NULL;
    $_SESSION['secondname'] = NULL;
    $_SESSION['user_role'] = NULL;

    header("Location: ../index.php");


?>