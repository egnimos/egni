<h1 class="page-header">
    Question panel
    <small>View all your posted Questions</small>
        </h1>


<div class="col">

<input class="form-control" id="myInput" align="center" type="text" placeholder="Search..">
<small>EXAMPLE: Enter you question.....</small>
<br>
<br>
</div>



        <table class="table table-bordered table-hover">
	<thead>

		<tr>
			<th>Id</th>
			<th>Category</th>
			<th>Source</th>
			<th>Hint</th>
			<th>Question</th>
			<th>Answer Image</th>
			<th>Edit</th>
			<th>Delete</th>
			<th>View Question</th>
		</tr>	
		
	</thead>

	<tbody id="myTable">


<?php

$query = "SELECT * FROM questions ";
$query .= "ORDER BY question_id DESC ";
$question_upload_query = query($query);
confirmQuery($question_upload_query);

while ($row = mysqli_fetch_assoc($question_upload_query)) {
	
	$question_id = $row['question_id'];
	$question_category = $row['question_category'];
	$question_source = $row['question_source'];
	$question_hint = $row['question_hint'];
	$question = $row['question'];
	$image = $row['image'];






echo"<tr>";
echo"<td>{$question_id}</td>";
echo"<td>{$question_category}</td>";
echo"<td>{$question_source}</td>";
echo"<td>{$question_hint}</td>";
echo"<td>{$question}</td>";

?>

<?php

if ($image == NULL) {  //for null image "if the image is not posted then we have to show you a different image (no_image_available.jpg).....

	echo"<td><img width='150' class='img-responsive' src='../images/no_image_available.jpg'></td>";

	
}else{


     echo"<td><img width='100' class='img-responsive' src='../images/{$image}'></td>";
 
 }
?>

<?php 
echo"<td><a href='questions.php?source=edit_question&q_id={$question_id}'>Edit</a></td>";
echo"<td><a href='questions.php?delete={$question_id}'>Delete</a></td>";
echo"<td><a href=''>View</a></td>";
echo"</tr>";

}

?>



	</tbody>
</table>

<?php

if (isset($_GET['delete'])) {
	
	if (isset($_SESSION['user_role'])) {
		
		if ($_SESSION['user_role'] === 'admin') {
			
		$the_delete_question = $_GET['delete'];

		$query = "DELETE FROM questions WHERE question_id={$the_delete_question}";
		$delete_question = query($query);
		confirmQuery($delete_question);
		header("Location: questions.php");
		exit();

		}
	}
}

?>