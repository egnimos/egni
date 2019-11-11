   <?php include "includes/db.php" ?>
<?php

if(isset($_POST['submit'])){

   $error = '';
   $comment_name = '';
   $comment_email = '';
   $comment_content = '';

   if(empty($_POST['comment_name'])){

   	$error = "<p class='text-danger'>Name is required.</p>";

   }else{

   	$comment_name = $_POST['comment_name'];

   }

   if(empty($_POST['comment_email'])){

     $error = "<p class='text-danger'>Email is required.</p>";

   }else{

       $comment_email = $_POST['comment_email'];

   }
   if (empty($_POST['comment_content'])) {
   	
      $error = "<p class='text-danger'>please comment is required.</p>";

   }else{

      $comment_content = $_POST['comment_content'];

   }
   if ($error == '') {
   	
       $query = "INSERT INTO comments (parent_comment_id, comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
                
              $query .= "VALUES ($parent_comment_id, $the_post_id, '{$comment_name}', '{$comment_email}', '{$comment_content}', 'unapproved', now()) ";
                
                   $create_comment_query = mysqli_query($con, $query);
                   
                   confirmQuery($create_comment_query);
                   
                   $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                   $query .= "WHERE post_id = $the_post_id ";
                    $update_comment_count = mysqli_query($con, $query);
         
         $error = '<label class="text_success">Comment is added</label>';
   }
   $data = array('error' => $error);
   echo json_encode($data);

	   }