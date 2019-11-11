  <?php include "includes/user_header.php"; ?>

        <!-- Navigation -->
        
        <?php include "includes/user_navigation.php"; ?>




        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Questions 
                            <small>For all Programing language</small>
                       </h1>
       
    <?php 
        
    if(isset($_GET['source'])){
        
        $source = $_GET['source'];
        
    }else{
        
        $source='';
    }
switch($source){
        
    case 'add_user':
    include "includes/add_user.php";
    break;
        
    
    case 'edit_user':
    include "includes/edit_user.php";
    break;
        
    
    case '200':
    echo "nice 34";
    break;
        
    default:
    include "includes/user_programming.php";
    break;    
}
        
 

        
        
    ?> 
       
                 
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/user_footer.php"; ?>