<h1 class="page-header">
    Video Info panel
    <small>Edit your Video Info</small>
        </h1>

        <?php

        if (isset($_GET['v_id'])) {
        	
            $the_video_id = $_GET['v_id'];

        }

        $query = "SELECT * FROM video_tuts WHERE video_id = $the_video_id ";
        $select_video_info_edit_query = query($query);
        confirmQuery($select_video_info_edit_query);
        while ($row = mysqli_fetch_assoc($select_video_info_edit_query)) {

        	$video_category_id = $row['video_category_id'];
        	$video_user_id = $row['video_user_id'];
        	$video_topic = $row['video_topic'];
        	$video_author = $row['video_author'];
        	$video_intro = $row['video_intro'];
        	$video_image = $row['video_image'];
        	$video_date = $row['video_date'];
        	$video_year = $row['video_year'];
        	$video_tags = $row['video_tags'];
        	$video_status = $row['video_status'];
        	$video_link = $row['video_link'];

        }


        if (isset($_POST['update_video'])) {//topic category user  author status image video_tags video_intro video_link

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
        	$video_year = date('y');

        	move_uploaded_file($image_temp, "../images/$image");
        	if (empty($image)) {

        		$query = "SELECT video_image FROM video_tuts WHERE video_id = $the_video_id ";
        		$select_update_video_info_query = query($query);
        		confirmQuery($select_update_video_info_query);
        		while ($row = mysqli_fetch_assoc($select_update_video_info_query)) {
        			
                    $image = $row['video_image'];

        		}

        	}

        	$query = "UPDATE video_tuts SET ";
        	$query .= "video_topic = '{$topic}', ";
        	$query .= "video_category_id = '{$category}', ";
        	$query .= "video_user_id = '{$user}', ";
        	$query .= "video_author = '{$author}', ";
        	$query .= "video_status = '{$status}', ";
        	$query .= "video_image = '{$image}', ";
        	$query .= "video_tags = '{$video_tags}', ";
        	$query .= "video_intro = '{$video_intro}', ";
        	$query .= "video_link = '{$video_link}', ";
        	$query .= "video_date = now(), ";
        	$query .= "video_year = now() ";
        	$query .= "WHERE video_id = {$the_video_id} ";

        	$select_update_query = query($query);
        	confirmQuery($select_update_query);

        	echo "<b class='text-success text-center'>Update Created: <a class='text-primary' href=''>View video Info </a> or <a href='video_frame.php'> Edit more Post</a></b>";
        	
             

        }

        ?>




<form action="" method="post" enctype="multipart/form-data">
   
   
       <div class="form-group">
           <label for="topic">Topic:</label>
           <input type="text" class="form-control" value="<?php echo $video_topic  ?>" name="topic">
       </div>
       
       
        <div class="form-group">
          <label for="Category">Category(choose the right category):</label>
           <select name="category" id="">
               
               <?php


               if (isset($_SESSION['user_id'])) {

                $user_id = $_SESSION['user_id'];
                	
                if ($user_id === $video_user_id) {
               
                 $query = "SELECT * FROM video_categories WHERE category_user_id = {$user_id}";
                $select_video_categories_list = query($query);
                   
                   confirmQuery($select_video_categories_list);


                while($row = mysqli_fetch_assoc($select_video_categories_list)){

                $category_id = $row['category_id'];
                $category_topic = $row['category_topic'];
                    
                echo "<option value='{$category_id}'>{$category_topic}</option>";
                    
                
                }
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

                     if ($user_id === $video_user_id) {     

               
                   
                 $query = "SELECT * FROM users WHERE user_role = 'admin' AND user_id = {$the_user_id} ";
                $select_users_query = mysqli_query($con, $query);
                   
                   confirmQuery($select_users_query);


                while($row = mysqli_fetch_assoc($select_users_query)){

                $user_id = $row['user_id'];
                $username = $row['username'];
                    
                echo "<option value='{$user_id}'>{$username}</option>";
                    
                
                }
              }
          }
                    
             ?>   
               
               
           </select>
       </div>
       

      



       <div class="form-group">
           <label for="author">Author(Owner of the Video):</label>
           <input type="text" class="form-control" value="<?php echo $video_author; ?>" name="author">
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
           <img width='100' src="../images/<?php echo $video_image; ?>">
           <input type="file" name="image">
       </div>
       
       
       <div class="form-group">
           <label for="tags">Tags(so that we can search the related items):</label>
           <input type="text" class="form-control" value="<?php echo $video_tags; ?>" name="video_tags">
       </div>
       
       
       <div class="form-group">
           <label for="video_intro">Video Intro(It should be small not to large):</label>
           <textarea name="video_intro" id="body" cols="30" rows="10" class="form-control"><?php echo $video_intro; ?></textarea>
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
           <input type="text" value="<?php echo $video_link; ?>" name="video_link" class="form-control" id="body1">
       </div>
       
       
       <div class="form-group">
        
           <input type="submit" class="btn btn-primary" name="update_video" value="Update video_info">
       </div>
   
    
</form>