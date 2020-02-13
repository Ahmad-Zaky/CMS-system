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
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                  
                
<?php 
                
    // Getting the count of our CMS data
    $query_posts = "SELECT * FROM posts";
    $query_comments = "SELECT * FROM comments";
    $query_users = "SELECT * FROM users";
    $query_categories = "SELECT * FROM categories";
                
    // select more data count for The chart purpose
    $query_pos_drft = "SELECT * FROM posts WHERE post_status = 'draft'";
    $query_comm_unapp = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
    $query_usr_sub = "SELECT * FROM users WHERE user_role = 'subscriber'";

                
                
                
    $posts_query = mysqli_query($connection, $query_posts);
    $comments_query = mysqli_query($connection, $query_comments);
    $users_query = mysqli_query($connection, $query_users);
    $categories_query = mysqli_query($connection, $query_categories);
                
    // getting more data for The chart
    $posts_drafted = mysqli_query($connection, $query_pos_drft);
    $comments_unapproved = mysqli_query($connection, $query_comm_unapp);
    $users_subscriber = mysqli_query($connection, $query_usr_sub);

                
                
                
  
    query_error($posts_query);
    query_error($comments_query);
    query_error($users_query);
    query_error($categories_query);
                

    // checking queries for more data for The chart purpose
    query_error($posts_drafted);
    query_error($comments_unapproved);
    query_error($users_subscriber);

    
                
                
                
    $num_posts = mysqli_num_rows($posts_query);
    $num_comments = mysqli_num_rows($comments_query);
    $num_users = mysqli_num_rows($users_query);
    $num_categories = mysqli_num_rows($categories_query);
                
                
    // getting count more data for The chart
    $num_posts_drft = mysqli_num_rows($posts_drafted);
    $num_comm_unapp = mysqli_num_rows($comments_unapproved);
    $num_usr_sub = mysqli_num_rows($users_subscriber);


?>
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                  <div class='huge'>
                      <?php echo $num_posts; ?>
                  </div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <div class='huge'>
                        <?php echo $num_comments; ?>

                     </div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class='huge'>                      
                        <?php echo $num_users; ?>
                    </div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='huge'>
                          <?php echo $num_categories; ?>
                        </div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
                <div class="row">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                      google.charts.load('current', {'packages':['bar']});
                      google.charts.setOnLoadCallback(drawChart);

                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['Data', 'Count'],
                            
<?php 
    
    // add the colomns of chart dynamicaly
    $CMS_data = ['Posts','Draft posts', 'Comments', 'Pending comments', 'Users', 'Subscribe users', 'Categories'];
    $CMS_data_count = [$num_posts, $num_posts_drft, $num_comments, $num_comm_unapp, $num_users, $num_usr_sub, $num_categories];
                            
    for($i = 0; $i < 7; $i++)
        echo "['{$CMS_data[$i]}'" . ", " . "{$CMS_data_count[$i]}],";
                            
?>
                                                   
                        ]);

                        var options = {
                          chart: {
                            title: '',
                            subtitle: '',
                          }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                      }
                    </script>
                    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>

                </div>
           
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include "includes/admin_footer.php"; ?>