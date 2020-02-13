<?php include "includes/admin_header.php"; ?>



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

    if(isset($_GET['source']))
    {
        $source = $_GET['source'];
    
    }
    else
        $source = "";
    
    switch($source)
    {
//        case "add_post":
//            include "includes/admin_addPost.php";
//        break;
//        case "edit_post":
//            include "includes/admin_editPost.php";
//        break;
        default:
            include "includes/admin_viewComments.php";
        break;
    }

?>
                                                                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include "includes/admin_footer.php"?>