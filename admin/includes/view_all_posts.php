<h1 class="page-header">
    Blog panel
    <small>View All your Post</small>
        </h1>


        <div class="col">

<input class="form-control" id="myInput" align="center" type="text" placeholder="Search..">
<small>EXAMPLE: php,java,kotlin,react......</small>
<br>
<br>
</div>

        <?php
  
if(isset($_POST['checkBoxArray'])){
    
    foreach($_POST['checkBoxArray'] as $postValueId){
        
        $bulk_options = $_POST['bulk_options'];
        
    
        
        switch($bulk_options){
                
            case 'published':
                
                $query = "UPDATE posts SET post_status= '{$bulk_options}' WHERE post_id= '{$postValueId}' ";
                $update_published_post = mysqli_query($con, $query);
                confirmQuery($update_published_post);
                break;
                
            case 'draft':
                
                $query = "UPDATE posts SET post_status= '{$bulk_options}' WHERE post_id= '{$postValueId}' ";
                $update_draft_post = mysqli_query($con, $query);
                break;
                
            case 'delete':
                
                $query = "DELETE FROM posts WHERE post_id= '{$postValueId}' ";
                $delete_post = mysqli_query($con, $query);
                break;
        }
    }
}


?>
          
          
          <form action="" method="post">
           <table class="table table-bordered table-hover ">
           
           
           
           <div id="bulkOptionContainer" class="col-xs-4" style="padding:0px;">
              
               <select name="bulk_options" id="" class="form-control">
                   <option value="">Select Option</option>
                   <option value="published">Publish</option>
                   <option value="draft">Draft</option>
                   <option value="delete">Delete</option>
               </select>
               
           </div>
           
           <div class="col-xs-4">
           
           <input type="submit" class="btn btn-success"  name="submit" value="Apply">
           <a href="posts.php?source=add_post" class="btn btn-primary">Add new</a>
           
           </div>
               
                
           
           
           
           
           
            <thead>
                <tr>
                    <th scope="col"><input id="selectAllBoxes" type="checkbox"></th>
                    <th scope="col">Id</th>
                    <th scope="col">Author</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Status</th>
                    <th scope="col">Image</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Comments</th>
                    <th scope="col">Date</th>
                    <th scope="col">View</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Edit</th>
                    
                </tr>
            </thead ><!-- 
                                                                        SELECT colors.color, shapes.shape FROM
                                                                        colors JOIN shapes ON
                                                                        colors.id = shapes.color_id; -->
            <tbody id="myTable">
               
                   <?php

                   if (isset($_SESSION['user_id'])) {

                       $user_id = $_SESSION['user_id'];
                    
                   
                        
                    $query = "SELECT * FROM posts WHERE post_author= $user_id ";
                    $query .= "ORDER BY posts.post_id DESC ";
                    $select_posts = mysqli_query($con, $query);

                    while($row = mysqli_fetch_assoc($select_posts)){
                        $post_id = $row['post_id'];
                        $post_user = $row['post_author'];
                        $post_title = $row['post_title'];
                        $post_user_id = $row['post_user_id'];
                        $post_category_id = $row['post_category_id'];
                        $post_status = $row['post_status'];
                        $post_image = $row['post_image'];
                        $post_tags = $row['post_tags'];
                        $post_comment_count = $row['post_comment_count'];
                        $post_date = $row['post_date'];
                        
                        
                        echo "<tr>";
                        ?>
                        
                        
                        
                         <td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>
                        
                        
                        
                        
                        <?php
                        
                        
                        
                        
                        
                        
                       
                        echo "<td>{$post_id}</td>";

                        $query = "SELECT * FROM users WHERE user_id = $post_user ";
                        $select_user_query = mysqli_query($con,$query);
                        while ($row = mysqli_fetch_assoc($select_user_query)) {

                            $user_id = $row['user_id'];
                            $user_firstname = $row['user_firstname'];
                            $user_lastname = $row['user_lastname'];
                       
                          echo "<td>{$user_firstname} {$user_lastname} </td>";

                         }


                        echo "<td>{$post_title}</td>";
                        
                        
                        $query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
                        $select_admin_categories_edit = mysqli_query($con, $query);


                        while($row = mysqli_fetch_assoc($select_admin_categories_edit)){

                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        
                        echo "<td>{$cat_title}</td>";
                        
                        
                        }
                        
                        
                        echo "<td>{$post_status}</td>";
                        echo "<td><img width='100' src='../images/{$post_image}' alt='image'></td>";
                        echo "<td>{$post_tags}</td>";
                        echo "<td>{$post_comment_count}</td>";
                        echo "<td>{$post_date}</td>";
                        echo "<td><a class='btn btn-primary' href='../post.php?p_id={$post_id}'>View post</a></td>";
                        ?>
                        <form action="" method="post">

                        <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
                        <?php

                        echo "<td><button type='submit' name='delete' class='btn btn-danger' onClick=\"javascript: return confirm('Are you sure you want to delete this post'); \">Delete</button></td>";

                        ?>
                        </form>

                        <?php
                        echo "<td><a class='btn btn-primary' href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                        echo "</tr>";
                        
                        
                        
                        
                        
                        
                        
                    }
                }
                
    
    
                   ?>
                   
                   
                   
                   
                   
                   
                   
                   
<!--
                    <td>10</td>
                    <td>Niteesh dubey</td>
                    <td>Bootstrap Framework</td>
                    <td>Bootstrap</td>
                    <td>status</td>
                    <td>image</td>
                    <td>tags</td>
                    <td>hey you</td>
                    <td>12-2-2010</td>
-->
                
            </tbody>
        </table>
    </form>
        
<?php 

if(isset($_POST['delete'])){

    if (isset($_SESSION['user_role'])) {
       
       if ($_SESSION['user_role'] === 'admin' ) {
    
   $the_post_id = mysqli_escape_string($con, $_POST['post_id']);
    
    $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
    $delete_post_query = mysqli_query($con, $query);
    header('Location: posts.php');
    exit();
   }
  }
}



?>