<h1 class="page-header">
    Question panel
    <small>Edit Your Questions</small>
        </h1>
<?php

if (isset($_GET['q_id'])) {

  $the_question_id = $_GET['q_id'];



 $query = "SELECT * FROM questions WHERE question_id = {$the_question_id}";
 $select_question_query = query($query);
 confirmQuery($select_question_query);
 while ($row = mysqli_fetch_assoc($select_question_query)) {
   
   $question_category = $row['question_category'];
   $question_source = $row['question_source'];
   $question_hint = $row['question_hint'];
   $question = $row['question'];
   $answer = $row['answer'];
   $image = $row['image'];

 }


 if (isset($_POST['update_question'])) {

   $category = $_POST['category'];
   $source = $_POST['source'];
   $hint = $_POST['hint'];
   $question = $_POST['question'];
   $answer = $_POST['answer'];
   //taking the image file from the admin user
   $image = $_FILES['image']['name'];
   $image_temp = $_FILES['image']['tmp_name'];
   //update the date...
   $date = date('d-m-y'); //$post_date = date('d-m-y');

   move_uploaded_file($image_temp, "../images/{$image}");

   if (empty($image)) {
     
      $query = "SELECT * FROM questions WHERE question_id = {$the_question_id}";
      $select_query = query($query);
      confirmQuery($select_query);

      while ($row = mysqli_fetch_assoc($select_query)) {
        
         $image = $row['image'];

      }

   }

   $query = "UPDATE questions SET ";
   $query .= "question_category = '{$category}', ";
   $query .= "question_source = '{$source}', ";
   $query .= "question_hint = '{$hint}', ";
   $query .= "question = '{$question}', ";
   $query .= "answer = '{$answer}', ";
   $query .= "image = '{$image}' ";
   $query .= "WHERE question_id = {$the_question_id} ";

   $select_update_query = query($query);
   confirmQuery($select_update_query);

   echo "<b class='text-success text-center'>Update Created: <a class='text-primary' href='questions.php?source=individual_question&question_id={$the_question_id}'>View updated question </a> or <a href='questions.php'> Edit more Post</a></b>";



 }

}

?>

<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="category">Category:</label>
    <input type="text" value="<?php echo $question_category; ?>" class="form-control" name="category" id="category" placeholder="Category of question">
  </div>

  <div class="form-group">
    <label for="source">Source:</label>
    <input type="text" value="<?php echo $question_source; ?>" class="form-control" name="source" id="source" placeholder="Enter the source of Question!!">
  </div>

  <div class="form-group">
    <label for="hint">Hint:</label>
    <textarea class="form-control"  name="hint" id="body1" rows="3"><?php echo $question_hint; ?></textarea>
     <script>
        ClassicEditor
          .create( document.querySelector( '#body1' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );
    </script>
  </div>


  <div class="form-group">
    <label for="question">Question:</label>
    <textarea class="form-control" name="question" id="body2" rows="3"><?php echo $question; ?></textarea>
     <script>
        ClassicEditor
          .create( document.querySelector( '#body2' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );
    </script>  
  </div>


  <div class="form-group">
    <label for="answer">Answer:</label>
    <textarea class="form-control" name="answer" id="body3" rows="3" name="answer">
      <?php echo $answer; ?>
    </textarea>
     <script>
        ClassicEditor
          .create( document.querySelector( '#body3' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );
    </script>
    </div>

   

  <div class="form-group">
    <label for="image">UPDATE the Image of the answer..</label>
    <img width="100" src="../images/<?php echo $image; ?>" alt=" ">
    <input type="file" name="image">
  </div>

  <div class="form-group">
        
           <input type="submit" class="btn btn-primary" name="update_question" value="update_question">
       </div>
  
</form>

