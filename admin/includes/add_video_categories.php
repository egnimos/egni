<h1 class="page-header">
    Video Category panel
    <small>Add your video category</small>
</h1>

<?php

if (isset($_SESSION['user_id'])) {
  
   $user_id = $_SESSION['user_id'];

if (isset($_POST['upload_video_category'])) {

  $category_title = $_POST['category_title'];

  $category_image = $_FILES['category_image']['name'];
  $category_image_temp = $_FILES['category_image']['tmp_name'];
  $fileType = $_FILES['category_image']['type'];
  $fileSize = $_FILES['category_image']['size'];
  $fileErrorMsg = $_FILES['category_image']['error'];

  $category_intro = $_POST['category_intro'];

  if (!$category_image_temp) {
    echo "Error: Please browse for a file";
    exit();
  }

  if (move_uploaded_file($category_image_temp, "../images/$category_image" )) {
     echo "$category_image upload is complete";
  }else{
    echo "upload file function Failed";
  }

  

  $query = "INSERT INTO video_categories(category_user_id,category_topic,category_image,category_intro) ";

  $query .= "VALUES({$user_id},'{$category_title}','{$category_image}','{$category_intro}' ) ";

  $select_video_category_query = query($query);
  confirmQuery($select_video_category_query);

  echo "<p class='bg-success'>Video Category Created: <a href='#'>Thanku</a></p>";


}
}

?>

 <form action="" method="post" enctype="multipart/form-data">
   
   
       <div class="form-group">
           <label for="category title">Category Title:</label>
           <input type="text" class="form-control" name="category_title">
       </div>

       
       <div class="form-group">
           <label for="video_image">Image(image size will be 708 × 472):</label>
           <input type="file" name="category_image"><br>
       </div>
       
       
       <div class="form-group">
           <label for="category_intro">Video Category Intro:</label>
           <textarea name="category_intro" id="body" cols="30" rows="10" class="form-control"></textarea>
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
        
           <input type="submit"   class="btn btn-primary" name="upload_video_category" value="Upload video category">
       </div>
   
    
</form>