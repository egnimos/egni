<?php include "includes/head.php"; ?>

    <!-- Sidebar -->
<?php include "includes/sidebar.php"; ?>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
 <div id="page-content-wrapper">

<?php include "includes/nav.php"; ?>



  <div class="container-fluid">

   <div align="center">
  	<h2>Videos Tuts</h2>
  	<p  class="lead">In this section all the resources are available for you to learn as these are uploaded.<br> So if you like any of these resources Like the section which are provided below<br>it will help other users to check all the filter resources which are best to use to....
    <br><b class="text-danger">Want to get the coupons for udemy courses click the link here<a href="#"> Click here</a></b></p>
      </div>


	<div class="col">

 <input class="form-control" id="myInput" align="center" type="text" placeholder="Search..">
 <small>EXAMPLE: php,java,kotlin,react......</small>
 <br>
 <br>
</div>




  <div class="row" id="myTable">

<!-----------php code for retriving the video infor from datbase-------->
<?php

$query = "SELECT * FROM video_tuts ";
$query .= "ORDER BY video_id DESC ";
$select_video_info = query($query);
confirmQuery($select_video_info);
while ($row = mysqli_fetch_assoc($select_video_info)) {

  $video_topic = $row['video_topic'];
  $video_author = $row['video_author'];
  $video_intro = $row['video_intro'];
  $video_image = $row['video_image'];
  $video_date = $row['video_date'];
  $video_link = $row['video_link'];
  
  





?>

<div class="col-md-4">
        <div class="card mb-2"  style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
          <!----------image section--->
          <img width = 800 height =250 class="card-img-top"
            src="../../images/<?php echo $video_image; ?>"
            alt="Card image cap"  style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">


          <div class="card-body">
            <h4 class="card-title"><?php echo $video_topic; ?></h4><h5 class="text-danger">By- <?php echo $video_author; ?></h5>
            <p class="card-text"><?php echo $video_intro; ?></p>

           <!-----video btn  attached with link of the source------>

            <a href="<?php echo $video_link; ?>" class=" btn btn-floating btn-action btn-secondary button"><i class="fas fa-chevron-right pl-1"></i></a>
          </div>
           <div class="card-footer text-center bg-secondary" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
			<ul class="list-unstyled list-inline font-small">
			<li class="list-inline-item  text-white"><i class="far fa-calendar-alt"></i> <?php echo $video_date; ?></li>
			<li class="list-inline-item text-white"><i class="fas fa-share-alt"></i> share</li>
			<li class="list-inline-item text-white"><i class="far fa-thumbs-down"></i> 5</li>
			<li class="list-inline-item text-white"><i class="far fa-thumbs-up"></i> 5</li>
			</ul>
          </div>

           </div>
        </div>


    <?php }?>




      </div>

     </div>
 </div>





 </div>
    <!-- /#page-content-wrapper -->

<?php include "includes/footer.php"; ?>