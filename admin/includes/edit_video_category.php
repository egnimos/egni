<h1 class="page-header">
    Video Category panel
    <small>Add your video category</small>
</h1>

<?php

if (isset($_GET['v_id']) && isset($_GET['user_id'])) {
	
    $the_video_category_id = $_GET['v_id'];
    $u_id = $_GET['user_id'];


    $query = "SELECT * FROM video_categories WHERE category_id = {$the_video_category_id} AND category_user_id = {$u_id} ";
    $select_video_category_query = query($query);
    confirmQuery($select_video_category_query);
    while ($row = mysqli_fetch_assoc($select_video_category_query)) {
    	
      $category_topic = $row['category_topic'];
      $category_image = $row['category_image'];
      $category_intro = $row['category_intro'];

    }





if (isset($_POST['update_video_category'])) {
	
    $category_title = $_POST['category_title'];

    $category_image = $_FILES['category_image']['name'];
    $category_image_temp = $_FILES['category_image']['tmp_name'];

    $category_intro = $_POST['category_intro'];

    move_uploaded_file($category_image_temp, "../images/{$category_image}");

    if (empty($category_image)) {
    	
    	$query = "SELECT category_image FROM video_categories WHERE category_id = {$the_video_category_id} AND category_user_id = {$u_id} ";
    	$select_image_video_category_query = query($query);
    	confirmQuery($select_image_video_category_query);

    	while ($row = mysqli_fetch_assoc($select_image_video_category_query)) {
    		
             $category_image = $row['category_image'];

    	}

      }

      $query = "UPDATE video_categories SET ";
      $query .= "category_topic = '{$category_title}', ";
      $query .= "category_image = '{$category_image}', ";
      $query .= "category_intro = '{$category_intro}' ";
      $query .= "WHERE category_id = {$the_video_category_id} AND category_user_id = {$u_id} ";

      $select_video_category_update_query = query($query);
      confirmQuery($select_video_category_update_query);

      echo "<b class='text-success text-center'>Update Created: <a class='text-primary' href=''>View video category </a> or <a href='video_frame.php?source=video_categories'> Edit more category of video</a></b>";
}
}


?>


 <form action="" method="post" enctype="multipart/form-data">
   
   
       <div class="form-group">
           <label for="category title">Category Title:</label>
           <input type="text" value="<?php echo $category_topic; ?>" class="form-control" name="category_title">
       </div>

       
       <div class="form-group">
           <label for="video_image">Image(image size will be 708 × 472):</label>
           <img width="100" src="../images/<?php echo $category_image; ?>" alt="image">
           <input type="file" name="category_image">
       </div>
       
       
       <div class="form-group">
           <label for="category_intro">Video Category Intro:</label>
           <textarea name="category_intro" id="body" cols="30" rows="10" class="form-control"><?php echo $category_intro; ?></textarea>
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
        
           <input type="submit" class="btn btn-primary" name="update_video_category" value="Update video category">
       </div>
   
    
</form>