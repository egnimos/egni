  <?php include "includes/admin_header.php" ?>

    <div id="wrapper">

    <!-- Navigation -->

    <?php include "includes/admin_navigation.php" ?>





    <div id="page-wrapper">

    <div class="container-fluid">


    <!-- Page Heading -->
    <div class="row">
    <div class="col-lg-12"  style="overflow:auto;">
    
    
    
        
       
    <?php 
        
    if(isset($_GET['source'])){
        
        $source = $_GET['source'];
        
    }else{
        
        $source='';
    }
switch($source){
        
    case 'upload_video':
    include "includes/upload_video.php";
    break;
        
    
    case 'edit_video_info':
    include "includes/edit_video.php";
    break;
        
    
    case 'video_categories':
    include "includes/video_categories.php";
    break;

    case 'add_video_categories':
    include "includes/add_video_categories.php";
    break;

    case 'edit_video_category_info':
    include "includes/edit_video_category.php";
    break;
        
    default:
    include "includes/view_all_videos.php";
    break;    
}
        
 

        
        
    ?> 
       
        </div>
        
       
 </div>
    </div>
    <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php" ?>