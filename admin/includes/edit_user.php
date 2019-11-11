<h1 class="page-header">
    User panel
    <small>Edit any user</small>
        </h1>
<?php

if(isset($_GET['p_id'])){
    
    $the_user_id = $_GET['p_id'];
    

    
                    $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
                    $select_users_by_id = mysqli_query($con, $query);

                    while($row = mysqli_fetch_assoc($select_users_by_id)){
                        $user_id = $row['user_id'];
                        $user_firstname = $row['user_firstname'];
                        $user_lastname = $row['user_lastname'];
                        $user_role = $row['user_role'];
                        $username = $row['username'];
                        $user_email = $row['user_email'];
                        $user_password = $row['user_password'];
                        
                    }
    
    if(isset($_POST['update_user'])){
        
       
   $user_firstname = $_POST['user_firstname'];
   $user_lastname = $_POST['user_lastname'];
   $user_role = $_POST['user_role'];
    
//   $post_image = $_FILES['image']['name'];
//   $post_image_temp = $_FILES['image']['tmp_name'];
    
   $username = $_POST['username'];
    $user_email = $_POST['user_email'];
   $user_password = $_POST['user_password'];
//   $post_date = date('d-m-y');

    


    

//           move_uploaded_file($post_image_temp, "../images/$post_image" );
//        
//        if(empty($post_image)){
//            
//            $query = "SELECT * FROM posts WHERE post_id =  $the_post_id ";
//            $select_image = mysqli_query($con, $query);
//            
//            while($row = mysqli_fetch_assoc($select_image)){
//                
//                $post_image = $row['post_image'];
//            }
//        }
          

        if(!empty($user_password)){
           
           $query_user = "SELECT user_password FROM users WHERE user_id = $user_id";
           $get_query = mysqli_query($con, $query_user);
           confirmQuery($get_query);
           $row = mysqli_fetch_assoc($get_query);

           $db_user_password = $row['user_password'];

     
        if($db_user_password != $user_password){

          $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

        }

  



        
        
        $query = "UPDATE users SET ";
        $query .= "	username = '{$username}', ";
        
        $query .= "user_password = '{$user_password}', ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "	user_email = '{$user_email}', ";
        $query .= "	user_role = '{$user_role}', ";
        $query .= " user_password = '{$hashed_password}' ";
        $query .= "WHERE user_id = {$the_user_id} ";
        
        $update_user = mysqli_query($con, $query);
        
        confirmQuery($update_user);
          
        echo "User Created: "." ". "<a class='text-success' href='users.php'>View Users</a>";
    
    }

      }
  }
  else{

    header("Location: index.php ");
    exit();
  }

?> 
  
  
  
  
  
  <form action="" method="post" enctype="multipart/form-data">
   
   
       <div class="form-group">
           <label for="title">Firstname</label>
           <input  value="<?php echo $user_firstname; ?>" type="text" class="form-control" name="user_firstname">
       </div>
       
       
       
       
       
       <div class="form-group">
           <label for="title">Lastname</label>
           <input  value="<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname">
       </div>
       
       
       
       
       
       
        <div class="form-group">
           <select  value=""  name="user_role" id="">
            
            <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>  
            
               <?php   
               
               if($user_role == 'admin'){
                   
                   echo "<option value='subscriber'>Subscriber</option>";
               }
               else{
                   
                   echo "<option value='admin'>Admin</option>";
               }
               
            
               
               ?>   
           
              
               
               
           </select>
       </div>
       
       
       
       
       
       <div class="form-group">
           <label for="post_status">Username</label>
           <input  value="<?php echo $username; ?>" type="text" class="form-control" name="username">
       </div>
       
       
<!--
       <div class="form-group">
           <label for="post_image">Post Image</label>
           <input type="file" name="image">
       </div>
-->
       
       
       <div class="form-group">
           <label for="post_tags">Email</label>
           <input  value="<?php echo $user_email; ?>" type="email" class="form-control" name="user_email">
       </div>
       
       
       <div class="form-group">
           <label for="post_tags">Password</label>
           <input  value="<?php echo $user_password; ?>" type="password" class="form-control" name="user_password">
       </div>
       
       
       <div class="form-group">
           <input type="submit" class="btn btn-primary" name="update_user" value="Update User">
       </div>
   
    
</form>