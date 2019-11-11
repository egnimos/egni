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
        
    case 'add_question':
    include "includes/programming_question_post.php";
    break;
        
    
    case 'edit_question':
    include "includes/edit_question.php";
    break;
        
    
    case 'individual_question':
    include "includes/view_individual_question.php";
    break;
        
    default:
    include "includes/view_all_questions.php";
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