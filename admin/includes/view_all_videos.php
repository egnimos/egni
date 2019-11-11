<h1 class="page-header">
    Videos tuts panel
    <small>View All your Videos</small>
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
			
           <th scope="col"><input id="selectAllBoxes" type="checkbox"></th>
           <th scope="col">Id</th>
           <th scope="col">Category</th>
           <th scope="col">Topic</th>
           <th scope="col">Author</th>
           <th scope="col">Publisher(of video)</th>
           <th scope="col">Intro</th>
           <th scope="col">Video image</th>
           <th scope="col">Date</th>
           <th scope="col">Likes</th>
           <th scope="col">Status</th>
           <th scope="col">Links</th>
           <th scope="col">Delete</th>
           <th scope="col">Edit</th>

		</tr>
    </thead>

    <tbody id="myTable">
    	

<?php 

$query = "SELECT * FROM video_tuts ";
$query .= "ORDER BY video_id DESC";
$select_video_query = query($query);
confirmQuery($select_video_query);
while ($row = mysqli_fetch_assoc($select_video_query)) {
	
	$video_id = $row['video_id'];
	$video_category_id = $row['video_category_id'];
	$video_topic = $row['video_topic'];
	$video_author = $row['video_author'];
  $video_publisher = $row['video_user_id'];
	$video_intro = $row['video_intro'];
	$video_image = $row['video_image'];
	$video_date = $row['video_date'];
	$video_likes = $row['likes'];
	$video_status = $row['video_status'];
	$video_link = $row['video_link'];


    echo "<tr>";


?>


<td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='<?php echo $video_id; ?>'></td>



<?php


    echo "<td>{$video_id}</td>";

    //extracting the category name by category id.....

    $query = "SELECT * FROM video_categories WHERE category_id = {$video_category_id} ";
    $select_category_query = query($query);
    confirmQuery($select_category_query);
    while ($row = mysqli_fetch_assoc($select_category_query)) {
      
        $category_topic = $row['category_topic'];
        
        echo "<td>{$category_topic}</td>";

    }

    echo "<td>{$video_topic}</td>";
    echo "<td>{$video_author}</td>";

    //extracting the publisher name or the username who publish the video by using video_publisher variable..

    $query = "SELECT * FROM users WHERE user_id = $video_publisher ";
    $select_publisher_query = query($query);
    confirmQuery($select_publisher_query);
    while ($row = mysqli_fetch_assoc($select_publisher_query)) {
      
        $user_id = $row['user_id'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];

        echo "<td>{$user_firstname} {$user_lastname}</td>";

    }


    echo "<td>{$video_intro}</td>";
    echo "<td><img width='100' src='../images/{$video_image}' alt='image'></td>";
    echo "<td>{$video_date}</td>";
    echo "<td>{$video_likes}</td>";
    echo "<td>{$video_status}</td>";
    echo "<td>{$video_link}</td>";
    echo "<td><a href='video_frame.php?delete={$video_id}'>Delete</a></td>";

    echo "<td><a href='video_frame.php?source=edit_video_info&v_id={$video_id}'>Edit</a></td>";
    echo "</tr>";




}
?>




    </tbody>







</table>

<?php

if (isset($_GET['delete'])) {

if (isset($_SESSION['user_role'])) {
  
   if($_SESSION['user_role'] === 'admin'){

    $the_user_delete = $_GET['delete'];

    $query = "DELETE FROM video_tuts WHERE video_id = $the_user_delete ";

    $select_video_delete_query = query($query);

    confirmQuery($select_video_delete_query);
    header('Location: video_frame.php');
    exit();


   }
 }

}

?>