<?php include "includes/head.php"; ?>

    <!-- Sidebar -->
<?php include "includes/sidebar.php"; ?>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

<?php include "includes/nav.php"; ?>






<!-- Card -->
<div class="container-fluid">

  <br>
 <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>


  <div class="row" id="myTable">

    <?php

    $query = "SELECT * FROM video_categories ";
    $query .= "ORDER BY category_id DESC";
    $select_show_categories_query = query($query);
    confirmQuery($select_show_categories_query);
    while ($row = mysqli_fetch_assoc($select_show_categories_query)) {

      $category_id = $row['category_id'];
      $category_user_id = $row['category_user_id'];
      $category_topic = $row['category_topic'];
      $category_image = $row['category_image'];
      $category_intro = $row['category_intro'];
      
  

    ?>
      <div class="col-md-4">
        <div class="card mb-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
          <img width = 800 height =200 class="card-img-top"
            src="../../images/<?php echo $category_image; ?>"
            alt="Card image cap" >
          <div class="card-body">
            <h4 class="card-title"><a href="#"><?php echo $category_topic; ?></a></h4>
            <p class="card-text"><?php echo $category_intro; ?></p>
            <a href="#" class="btn btn-danger text-white">click!!</a>
          </div>
        </div>
      </div>

  <?php }?>




</div>
</div>
<!-- Card -->

  </div>
    <!-- /#page-content-wrapper -->

<?php include "includes/footer.php"; ?>