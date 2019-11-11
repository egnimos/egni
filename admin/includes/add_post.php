 <h1 class="page-header">
    Blog panel
    <small>Add your blog</small>
        </h1>
<?php

if(isset($_POST['create_post'])){
    
   $post_title = $_POST['title'];
   $post_category_id = $_POST['post_category'];
   $post_user = $_POST['post_user'];
   $post_status = $_POST['post_status'];
    
   $post_image = $_FILES['image']['name'];
   $post_image_temp = $_FILES['image']['tmp_name'];
    
   $post_tags = $_POST['post_tags'];
   $post_content = $_POST['post_content'];
   $post_date = date('d-m-y');
   $post_year = date('y');

    
           move_uploaded_file($post_image_temp, "../images/$post_image" );

    
    
     $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_year,post_image,post_content,post_tags,post_status) ";
    
    $query .= "VALUES({$post_category_id} , '{$post_title}' , {$post_user} , now(), now() , '{$post_image}' , '{$post_content}' , '{$post_tags}' , '{$post_status}' ) ";

      $create_post = mysqli_query($con, $query);
    
      confirmQuery($create_post);
    
      $the_post_id = mysqli_insert_id($con);
    
       echo "<p class='bg-success'>Post Created: <a href='../post.php?p_id={$the_post_id}'>View Post </a></p>";
}

 ?> 

  
  
  
  <form action="" method="post" enctype="multipart/form-data">
   
   
       <div class="form-group">
           <label for="title">Title</label>
           <input type="text" class="form-control" name="title">
       </div>
       
       
        <div class="form-group">
          <label for="Category">Category</label>
           <select name="post_category" id="">
               
               <?php
               
              if (isset($_SESSION['user_id'])) {
                   
                   $user_id = $_SESSION['user_id'];
                  
                   
                $query = "SELECT * FROM categories WHERE cat_user_id = $user_id";
                $select_categories_list = mysqli_query($con, $query);
                   
                   confirmQuery($select_categories_list);


                while($row = mysqli_fetch_assoc($select_categories_list)){

                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                    
                echo "<option value='{$cat_id}'>{$cat_title}</option>";
                    
                
                }
              }
                    
             ?>   
               
               
           </select>
       </div>
       

       <div class="form-group">
          <label for="User">Users</label>
           <select name="post_user" id="">
               
               <?php
               
                 if (isset($_SESSION['user_id'])) {
                    
                     $the_user_id = $_SESSION['user_id'];     

               
                   
                 $query = "SELECT * FROM users WHERE user_role = 'admin' AND user_id = {$the_user_id} ";
                $select_users_list = mysqli_query($con, $query);
                   
                   confirmQuery($select_users_list);


                while($row = mysqli_fetch_assoc($select_users_list)){

                $user_id = $row['user_id'];
                $username = $row['username'];
                    
                echo "<option value='{$user_id}'>{$username}</option>";
                    
                
                }
              }
                    
             ?>   
               
               
           </select>
       </div>



       <!-- <div class="form-group">
           <label for="title">Author</label>
           <input type="text" class="form-control" name="author">
       </div> -->
       
       
       <div class="form-group">
        <label for="post_status">Status</label>
            <select name="post_status" id="">
             
              
              
            
                  
                <option value='draft'>Draft</option>
              
                  
                  <option value='published'>Published</option>
              
              
              
          </select>
          
       </div>
       
       
       <div class="form-group">
           <label for="post_image">Image</label>
           <input type="file" name="image">
       </div>
       
       
       <div class="form-group">
           <label for="post_tags">Tags</label>
           <input type="text" class="form-control" name="post_tags">
       </div>
       
       
       <div class="form-group">
           <label for="post_content">Content</label>
           <textarea name="post_content" id="body" cols="30" rows="10" class="form-control"></textarea>
            <script>

            
         ClassicEditor
          .create( document.querySelector( '#body' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );
                   
                </script>
       </div>
       
       
       <div class="form-group">
        
           <input type="submit" class="btn btn-primary" name="create_post" value="Publish_post">
       </div>
   
    
</form>



