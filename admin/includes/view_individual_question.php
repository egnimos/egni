<h1 class="page-header">
Question panel
 <small>View your updated Questions</small>
        </h1>
<?php

if (isset($_GET['question_id'])) {
	
    $the_id_question = $_GET['question_id'];




$query = "SELECT * FROM questions WHERE question_id = {$the_id_question} ";
// $query .= "ORDER BY question_id DESC ";
$select_question_query= query($query);
confirmQuery($select_question_query);

while ($row=mysqli_fetch_assoc($select_question_query)) {
    
    $question_id = $row['question_id'];
    $question_category = $row['question_category'];
    $question_source = $row['question_source'];
    $question = $row['question'];
    $answer = $row['answer'];
    $image = $row['image'];
    $question_date = $row['question_date'];





?>

<div class="well" style = "box-shadow: 10px 10px 5px grey;">

  <h3 class="text-success"><?php echo $question_category; ?></h3>
  <h5 class="text-primary"><b class="text-dark">Source: </b><?php echo $question_source; ?></h5>

  <p class="text-warning"><b class="text-dark">Uploaded at: </b><?php echo $question_date; ?></p>
  <hr size="4px">
  <p><?php echo $question; ?></p>


  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#<?php echo $question_id;?>">Answer::</button>
  <div id="<?php echo $question_id;?>" class="collapse" style="overflow: auto;">
    <p><?php echo $answer; ?></p>

    <?php

    if ($image == NULL) {
       
       echo " ";

     }else{

    echo "<img class='img-responsive' src='../images/{$image}'>";

  }

     ?>

  </div>

  
  </div>


<?php }} ?>