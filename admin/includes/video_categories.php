<h1 class="page-header">
    Video Category panel
    <small>Add your video category</small>
</h1>


<div class="col">

<input class="form-control" id="myInput" align="center" type="text" placeholder="Search..">
<small>EXAMPLE: php,java,kotlin,react......</small>
<br>
<br>
</div>



<table class="table table-bordered table-hover">
	
  <thead>
  	
    <tr>
    	<th>Id</th>
    	<th>Category title</th>
    	<th>Image</th>
    	<th>Category Intro</th>
    	<th>Delete</th>
    	<th>Edit</th>
    </tr>

  </thead>

  <tbody>
  	
<?php
$query = "SELECT * FROM video_categories ";
$select_category_query = query($query);
confirmQuery($select_category_query);

while ($row = mysqli_fetch_assoc($select_category_query)) {
	
   $category_id = $row['category_id'];
   $category_user_id = $row['category_user_id'];
   $category_topic = $row['category_topic'];
   $category_image = $row['category_image'];
   $category_intro = $row['category_intro'];

echo "<tr>";
echo "<td>{$category_id}</td>";
echo "<td>{$category_topic}</td>";
echo "<td><img width='100' src='../images/{$category_image}' alt='image'></td>";
echo "<td>{$category_intro}</td>";
echo "<td><a href='video_frame.php?source=video_categories&delete={$category_id}'>Delete</a></td>";
//edit the given category link....
echo "<td><a href='video_frame.php?source=edit_video_category_info&user_id={$category_user_id}&v_id={$category_id}'>Edit</a></td>";
echo "</tr>";


}


?>


  </tbody>

</table>

<?php 

if (isset($_GET['delete'])) {
	
    if (isset($_SESSION['user_role'])) {
    	
    	if ($_SESSION['user_role'] === 'admin') {

    		$the_category_id = $_GET['delete'];
    		
            $query = "DELETE FROM video_categories WHERE category_id = $the_category_id";
            $select_delete_category_query = query($query);
            confirmQuery($select_delete_category_query);
            header('Location: video_frame.php?source=video_categories');
            exit();
           

    	}
    }

}






?>
