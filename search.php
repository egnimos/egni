<?php include "includes/header.php" ?>

    <!-- Navigation -->
    
    <?php include "includes/db.php" ?>
    <?php include "includes/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

               <div class="well" style="background-color:#e0f2f1; border-radius:15%;box-shadow: 10px 10px 5px grey;">

                <div align="center">
                    <img width="80" src="images/egnicad.png" style="box-shadow: 10px 10px 5px grey;" class="img-responsive img-circle" alt="icon">
                </div><br>
                
                    <form action="search.php" method="post">
                    <div class="input-group">
                       
                        <input type="text" class="form-control" id="navBarSearchForm" name="search"   placeholder="Enter you keyword related to search......">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search" style="color: brown;"></span>
                        </button>
                        </span>
                        
                    </div>
                    </form>
                </div><br><br><br>
                
                <?php
    
     
      
      if(isset($_POST['submit'])){
          
         $search = $_POST['search'];
          
          $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
           $query .= "ORDER BY post_id DESC "; 
          $search_query = mysqli_query($con, $query);
          
          if(!$search_query){
              
              die("QUERRY FAILED" . mysqli_error($con));
          }
          
          $count = mysqli_num_rows($search_query);
          if($count == 0){
              
              echo "<h3>No result</h3>";
          }else{
              
            
                
                while($row = mysqli_fetch_assoc($search_query))
                {
                     $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_user = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'],0,200);
                    $post_status = $row['post_status'];
                    $post_tags = $row['post_tags'];
                    
                    if($post_status == 'published'){
                        
                      
                    ?>
                
                
                

                <!-- First Blog Post -->
               <h2>
                    <a href="post.php?p_tags=<?php echo $post_tags; ?>&p_title=<?php echo $post_title; ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_profile?author=<?php echo $post_user; ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_user; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?> " alt="">
                <hr>
                <p><?php echo $post_content; ?>
                <a type="button" class="btn btn-outline-success" href="post.php?p_tags=<?php echo $post_tags; ?>&p_title=<?php echo $post_title; ?>&p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a></p>
                
                
                
                
                
                
            <?php    }}if($post_status == 'draft'){
                echo "No result";
            }

               
          }
          
      }
          
   ?>           

                

            </div>

            <!-- Blog Sidebar Widgets Column -->
          <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php" ?>
