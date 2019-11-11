<?php include "includes/header.php" ?>

    <!-- Navigation -->
    
    <?php include "includes/db.php" ?>
    <?php include "includes/navigation.php" ?>
    
    

    <!-- Page Content -->
    <div class="container-fluid">
       <div class="row">
         
        <div class="col-md-8">



        <?php


          if(isset($_GET['edit'])){

            $the_comment_id = $_GET['edit'];
          }

             
             $query = "SELECT * FROM comments WHERE comment_id = $the_comment_id ";
             $select_comment_query = mysqli_query($con, $query);
             confirmQuery($select_comment_query);
             while ($row = mysqli_fetch_assoc($select_comment_query)) {

              $comment_id = $row['comment_id'];
              $comment_author = $row['comment_author'];
              $comment_email = $row['comment_email'];
              $comment_content = $row['comment_content'];

               
             }

             if (isset($_POST['update_comment'])) {
               
               $comment_author = $_POST['comment_author'];
               $comment_email = $_POST['comment_email'];
               $comment_content = $_POST['comment_content'];

               $query = "UPDATE comments SET ";
               $query .= "comment_author = '{$comment_author}', ";
               $query .= "comment_email = '{$comment_email}', ";
               $query .= "comment_content = '{$comment_content}'";

               $update_comments = mysqli_query($con, $query);
               confirmQuery($update_comments);

               echo "<b class='text-success' style='font-size:20px;'>Your comment is being updated.</b>";

             }








          
        ?>
            
                    <div class='well'>
            
                    <h4>Leave a Comment:</h4>
                    <form role='form' method='post' action=''>
                       
                       
                        <div class='form-group'>
                           <label for='Author'>Author</label>
                            <input type='text' class='form-control' name='comment_author' value='<?php echo $comment_author; ?>'>
                        </div>
                        
                        <div class='form-group'>
                          <label for='email'>email</label>
                           <input type='email' class='form-control' name='comment_email' value='<?php echo $comment_email; ?>'>
                        </div>
                        
                        <div class='form-group'>
                           <label for='your comment'>Your Comment</label>
                            <textarea class='form-control' rows='3' name='comment_content'><?php echo $comment_content; ?></textarea>
                        
                        </div>
                        
                        
                        <button type='submit' class='btn btn-success' name='update_comment'>Update</button>
                    </form>
                </div>

                <hr>


      </div>
      

   
        

            <!-- Blog Sidebar Widgets Column -->
          <?php include "includes/sidebar.php" ?>

        </div>
            </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php" ?>
