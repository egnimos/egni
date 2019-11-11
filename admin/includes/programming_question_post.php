<h1 class="page-header">
    Question panel
    <small>Add your Question</small>
        </h1>
<?php 

if (isset($_POST['create_question'])) {

   $category = $_POST['category'];
   $source = $_POST['source'];
   $hint = $_POST['hint'];
   $question = $_POST['question'];
   $answer = $_POST['answer'];

   $image = $_FILES['image']['name'];
   $image_temp = $_FILES['image']['tmp_name'];

   move_uploaded_file($image_temp, "../images/$image" );


   $query = "INSERT INTO questions(question_category, question_source, question_hint, question, answer, image, question_date) ";

   $query .= "VALUES('{$category}', '{$source}', '{$hint}', '{$question}', '{$answer}', '{$image}', now() ) ";

   $upload_query = query($query);
   confirmQuery($upload_query);

   echo "<p class='bg-success'>Question is being uploaded you can check it on view question section</p>";


  
}




?>

<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="category">Category:</label>
    <input type="text" class="form-control" name="category" id="category" placeholder="Category of question">
  </div>

  <div class="form-group">
    <label for="source">Source:</label>
    <input type="text" class="form-control" name="source" id="source" placeholder="Enter the source of Question!!">
  </div>

  <div class="form-group">
    <label for="hint">Hint:</label>
    <textarea class="form-control"  name="hint" id="body1" rows="3"></textarea>
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
    <textarea class="form-control" name="question" id="body2" rows="3"></textarea>
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
    <textarea class="form-control" name="answer" id="body3" rows="3" name="answer"></textarea>
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
    <label for="image">UPLOAD the Image of the answer..</label>
    <input type="file" name="image">
  </div>

  <div class="form-group">
        
           <input type="submit" class="btn btn-primary" name="create_question" value="upload_question">
       </div>
  
</form>

