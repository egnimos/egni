<?php include "includes/admin_header.php" ?>


<div id="wrapper">



<!-- Navigation -->

<?php include "includes/admin_navigation.php" ?>





<div id="page-wrapper">

<div class="container-fluid">


<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">
Welcome to admin panel
<small><?php echo $_SESSION['username'] ; ?></small>

    </h1>

<!-- <h1><?php //echo usersOnline(); ?></h1> -->
    

</div>
</div>
<!-- /.row -->


       
                <!-- /.row -->
                
<div class="row">

    <!-----starting of post information---->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary"  style = "box-shadow: 10px 10px 5px grey;">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                    <!---Calling of the "recordCount" function------->
                    <div class='huge'><?php echo $posts_counts= recordCount('posts','post_author'); ?></div>
                 
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
    
    <!-----closing of post information---->



    <!-----starting of comment information---->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green"  style = "box-shadow: 10px 10px 5px grey;">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        
                    <!---Calling of the "recordCount" function------->
                        <div class='huge'><?php echo $comments_counts= recordCount('comments','comment_user_id') ?></div>
             
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
    <!---users panel---->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow"  style = "box-shadow: 10px 10px 5px grey;">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                    <!----calling the "userCount" function--->
                    <div class='huge'><?php echo $users_counts = userCount('users'); ?></div>
                        
              
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
    </div><!---closing of users panel---->
    
    <!---categories panel---->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red"  style = "box-shadow: 10px 10px 5px grey;">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                       
                    <!-----Calling of the "recordCount function"----->
                    <div class='huge'><?php echo $categories_counts= recordCount('categories','cat_user_id') ?></div>

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
    </div><!---closing of categories panel---->

</div>
               
 <?php
 //checkUserRole....is called for user role information......

    $published_counts = checkUserCount('posts','post_status','published','post_author');

    $draft_counts = checkUserCount('posts','post_status','draft','post_author'); 

    $comments_unapproved_counts = checkUserCount('comments','comment_status','unapproved','comment_user_id'); 

    $comments_approved_counts = checkUserCount('comments','comment_status','approved','comment_user_id'); 
    
?>
                                                                                  
<div>       <!----row -->
<div class="row"  style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <!-----user info chart of there activity--->
    
     <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
            
            <?php
            
              $element_text = ['All Posts','Active Posts','Draft Posts', 'Comments', 'Unapprove Comments', 'Approved Comments' ,'Users','Categories' ];
              $element_count = [ $posts_counts, $published_counts ,$draft_counts, $comments_counts, $comments_unapproved_counts , $comments_approved_counts ,$users_counts, $categories_counts];
            
            for($i =0;$i < 8; $i++){
                
                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                
                
                
            }
            
            
            ?>
            
//          ['Post', 1000],
         
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
    
    
       <div id="columnchart_material" style="width:'auto'; height: 500px;"></div>
    
    
</div>
</div>



</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>