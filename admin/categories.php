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
                        
                        <div class="col-xs-6">
                          
<!-- Insert one Category Query -->
<?php insert_category(); ?>
<!-- /.Insert one Category Query -->
                                 
                            <!-- Add Category Form -->
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>
                            <!-- /.Add Category Form -->

                        
<!-- Edit Category Form -->                        
<?php
    // Select the edited field 
    // if condition stays here to hide that form 
    // before click edit link
    if(isset($_GET['edit']))
    {
        $cat_id = $_GET['edit'];
        include "includes/admin_update_cat.php";
    }

?>
<!-- /.Edit Category Form -->                        


                        </div>
                        
                        
                        <!-- Right table -->
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                    <tbody>
<?php 
        // Select All Categories Query
        select_categories();
        
        // Delete one field Query
        delete_category();       
?>
                                    
                                </tbody>
                            </table>
                        </div>
                        <!-- /.Right table -->
                        
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