<h1 class="page-header">
    User panel
    <small>Create Your own User For egnimos</small>
        </h1>

 <?php

if(isset($_POST['create_user'])){
    
  
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


     
    // $query = "SELECT randsalt FROM users";
    // $select_rand_query = mysqli_query($con, $query);
    // confirmQuery($select_rand_query);

    // $row = mysqli_fetch_assoc($select_rand_query);

    // $salt = $row['randsalt'];
    $user_password =  password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));

    
    
     $query = "INSERT INTO users( username , user_password,user_firstname, user_lastname, user_email ,user_role) ";
    
    $query .= "VALUES('{$username}' , '{$user_password}' , '{$user_firstname}'  , '{$user_lastname}' , '{$user_email}' , '{$user_role}') ";

      $create_users = mysqli_query($con, $query);
    
      confirmQuery($create_users);
    
    echo "User Created: "." ". "<a class='text-success' href='users.php'>View Users</a>";
    
    
    
}

 ?> 

  
  
  
  <form action="" method="post" enctype="multipart/form-data">
   
   
       <div class="form-group">
           <label for="title">Firstname</label>
           <input type="text" class="form-control" name="user_firstname">
       </div>
       
       
       
       
       
       <div class="form-group">
           <label for="title">Lastname</label>
           <input type="text" class="form-control" name="user_lastname">
       </div>
       
       
       
       
       
       
        <div class="form-group">
           <select name="user_role" id="">
            
            <option value="subscriber">Select option</option>     
           <option value="admin">Admin</option>
           <option value="subscriber">Subscriber</option>   
               
               
           </select>
       </div>
       
       
       
       
       
       <div class="form-group">
           <label for="post_status">Username</label>
           <input type="text" class="form-control" name="username">
       </div>
       
       
<!--
       <div class="form-group">
           <label for="post_image">Post Image</label>
           <input type="file" name="image">
       </div>
-->
       
       
       <div class="form-group">
           <label for="post_tags">Email</label>
           <input type="email" class="form-control" name="user_email">
       </div>
       
       
       <div class="form-group">
           <label for="post_tags">Password</label>
           <input type="password" class="form-control" name="user_password">
       </div>
       
       
       <div class="form-group">
           <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
       </div>
   
    
</form>