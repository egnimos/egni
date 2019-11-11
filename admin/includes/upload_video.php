<h1 class="page-header">
    Upload video panel
    <small>Upload your Video</small>
        </h1>


<?php

if (isset($_POST['upload_video'])) {
  
   $topic = $_POST['topic'];
   $category = $_POST['category'];
   $user = $_POST['user'];   
   $author = $_POST['author'];
   $status = $_POST['status'];

   $image = $_FILES['image']['name'];
   $image_temp = $_FILES['image']['tmp_name'];

   $video_tags = $_POST['video_tags'];
   $video_intro = $_POST['video_intro'];
   $video_link = $_POST['video_link'];
   $video_date = date('d-m-y');

    move_uploaded_file($image_temp, "../images/$image" );


    $query = "INSERT INTO video_tuts(video_category_id,video_user_id, video_topic,video_author,video_intro,video_image,video_date,video_tags,video_status,video_link) ";

    $query .= "VALUES({$category},{$user},'{$topic}','{$author}','{$video_intro}','{$image}',now(),'{$video_tags}','{$status}','{$video_link}' ) ";

    $select_video_query = query($query);
    confirmQuery($select_video_query);

    echo "<p class='bg-success'>Video Created: <a href='#'>View Post </a></p>";


}

?>

     <form action="" method="post" enctype="multipart/form-data">
   
   
       <div class="form-group">
           <label for="topic">Topic:</label>
           <input type="text" class="form-control" name="topic">
       </div>
       
       
        <div class="form-group">
          <label for="Category">Category(choose the right category):</label>
           <select name="category" id="">
               
               <?php


               if (isset($_SESSION['user_id'])) {

                $user_id = $_SESSION['user_id'];
               
                 $query = "SELECT * FROM video_categories WHERE category_user_id = {$user_id}";
                $select_video_categories_list = query($query);
                   
                   confirmQuery($select_video_categories_list);


                while($row = mysqli_fetch_assoc($select_video_categories_list)){

                $category_id = $row['category_id'];
                $category_topic = $row['category_topic'];
                    
                echo "<option value='{$category_id}'>{$category_topic}</option>";
                    
                
                }
              }
                    
             ?>   
               
               
           </select>
       </div>

        <div class="form-group">
          <label for="User">User:</label>
           <select name="user" id="">
               
               <?php
               
              if (isset($_SESSION['user_id'])) {
                    
                     $the_user_id = $_SESSION['user_id'];     

               
                   
                 $query = "SELECT * FROM users WHERE user_role = 'admin' AND user_id = {$the_user_id} ";
                $select_users_query = mysqli_query($con, $query);
                   
                   confirmQuery($select_users_query);


                while($row = mysqli_fetch_assoc($select_users_query)){

                $user_id = $row['user_id'];
                $username = $row['username'];
                    
                echo "<option value='{$user_id}'>{$username}</option>";
                    
                
                }
              }
                    
             ?>   
               
               
           </select>
       </div>
       

      



       <div class="form-group">
           <label for="author">Author(Owner of the Video):</label>
           <input type="text" class="form-control" name="author">
       </div>
       
       
       <div class="form-group">
        <label for="video_status">Status:</label>
            <select name="status" id="">
             
              
              
            
                  
                <option value='draft'>Draft</option>
              
                  
                  <option value='published'>Published</option>
              
              
              
          </select>
          
       </div>
       
       
       <div class="form-group">
           <label for="video_image">Image(coustom thumbnail of the video size will be '708x472'):</label>
           <input type="file" name="image">
       </div>
       
       
       <div class="form-group">
           <label for="tags">Tags(so that we can search the related items):</label>
           <input type="text" class="form-control" name="video_tags">
       </div>
       
       
       <div class="form-group">
           <label for="video_intro">Video Intro(It should be small not to large):</label>
           <textarea name="video_intro" id="body" cols="30" rows="10" class="form-control"></textarea>
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
           <label for="video_link">Video link(this is use to connect the video):</label>
           <input type="text" name="video_link" class="form-control" id="body1">
       </div>
       
       
       <div class="form-group">
        
           <input type="submit" class="btn btn-primary" name="upload_video" value="Upload video">
       </div>
   
    
</form>