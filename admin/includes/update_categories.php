        
        <form action="" method="post">
           <div class="form-group">
               <label for="cat_title">Edit Category</label>
               
               
               <?php
               
               if(isset($_GET['edit'])){
                   
                   $cat_id = $_GET['edit'];
                   
                 $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
                $select_admin_categories_edit = mysqli_query($con, $query);


                while($row = mysqli_fetch_assoc($select_admin_categories_edit)){

                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title']; 
                    
                    
             ?>       
                    
                    
                    
                    
               <input value= "<?php if(isset($cat_title)){echo $cat_title;} ?>"type="text" name="cat_title" class="form-control">     
                    
                   
               
        <?php }}?>
               
               
               <!----update---->
                
           <?php 
               
               
              if(isset($_POST['update_category'])){
    
                $the_cat_title = $_POST['cat_title'];
                $query="UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id}";
                $update_query = mysqli_query($con, $query); 
                  
                  if(!$update_query){
                      
                      die("QUERY FAILED".mysqli_error($con));
                  }

              }
               
               
               
               ?>    
               
        
               
               
               
               
               
               
           </div>
           <div class="form-group">
               <input class="btn btn-primary" name="update_category" type="submit" value= "Update Category">
           </div> 
        </form>