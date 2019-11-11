  <?php include "includes/admin_header.php" ?>

    <div id="wrapper">

    <!-- Navigation -->

    <?php include "includes/admin_navigation.php" ?>





    <div id="page-wrapper">

    <div class="container-fluid">


    <!-- Page Heading -->
    <div class="row">
    <div class="col-lg-12"  style="overflow:auto;">
    
    
    
    
    
  <!-----Add Category----->
   <h1 class="page-header">
    Category panel
    <small>Add your Blog category</small>
        </h1>
        
    <div class="col-xs-6">
       
       <?php insert_categories() ?>
       
       
       
       
       
       
       
        <form action="" method="post">
           <div class="form-group">
               <label for="cat_title">Add Category</label>
               <input type="text" name="cat_title" class="form-control">
           </div>
           <div class="form-group">
               <input class="btn btn-primary" name="submit" type="submit" value= "Add Category">
           </div> 
        </form>
        
        
        <!-------UPDATE AND INCLUDE QUERY---------->
        <?php updateCategories(); ?>        

        
    </div><!-------add Category---->
    
    
    
    
    
    
    
    
    
   <!----------Table------>
   <div class="col-xs-6">
      
    
      
       <table class="table table-bordered table-hover">
           <thead>
               <tr>
                   <th>ID</th>
                   <th>Category</th>
               </tr>
           </thead>
           <tbody>
              
<?php findAllCategories();?>

<?php  deleteCategories(); ?>

<!--
               <tr>
                   <td>1</td>
                   <td>Kotlin</td>
               </tr>
-->
           </tbody>
       </table>
   </div>
   
  
 


 </div>
    </div>
    <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php" ?>