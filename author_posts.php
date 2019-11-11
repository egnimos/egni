<?php include "includes/header.php" ?>

    <!-- Navigation -->
    
    <?php include "includes/db.php" ?>
    <?php include "includes/navigation.php" ?>
    
    

    <!-- Page Content -->
    <div class="container-fluid">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
                <?php
    // this query is used to conect the index with post to show the complete detail of blog through post page by truncting the post content in the index page....
    
    //  if(isset($_GET['p_id'])){
        
    //     $the_post_id = $_GET['p_id'];
    // }

                $query = "SELECT * FROM posts ";
                $select_post = mysqli_query($con, $query);
                
                while($row = mysqli_fetch_assoc($select_post))
                {
                  $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'],0,100);
                    $post_status = $row['post_status'];
                    $post_tags = $row['post_tags'];
                    
                    if($post_status == 'published'){
                        
                      
                        
                   
                    
                ?>
                
                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_tags=<?php echo $post_tags; ?>&p_title=<?php echo $post_title; ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="#"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?> " alt="">
                <hr>
                <p><?php echo $post_content; ?>
                <a type="button" class="btn btn-outline-success" href="post.php?p_tags=<?php echo $post_tags; ?>&p_title=<?php echo $post_title; ?>&p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a></p>
                
                
                
                
                
                <hr>
              
                <hr>
                
            <?php  }  } ?>

               
               
          
               </div>
             </div>  
                
            <!-- Blog Sidebar Widgets Column -->
    

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php" ?>
















