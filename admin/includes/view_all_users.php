<h1 class="page-header">
    User panel
    <small>View all users that have created account</small>
        </h1>

        <div class="col">

<input class="form-control" id="myInput" align="center" type="text" placeholder="Search..">
<small>EXAMPLE: user name...</small>
<br>
<br>
</div>


           <table class="table table-bordered table-hover ">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Admin</th>
                    <th>Subscriber</th>
                    <th>Edit</th>
                   
                    
                </tr>
            </thead >
            
            <tbody id="myTable">
               
                   <?php
                        
                    $query = "SELECT * FROM users ";
                    $query .= "ORDER BY user_id DESC ";
                    $select_users = mysqli_query($con, $query);

                    while($row = mysqli_fetch_assoc($select_users)){
                        $user_id = $row['user_id'];
                        $username = $row['username'];
                        $user_password = $row['user_password'];
                        $user_firstname = $row['user_firstname'];
                        $user_lastname = $row['user_lastname'];
                        $user_email = $row['user_email'];
                        $user_image = $row['user_image'];
                        $user_role = $row['user_role'];
                       
                        
                        
                        echo "<tr>";
                        echo "<td>{$user_id}</td>";
                        echo "<td>{$username}</td>";
                        echo "<td>{$user_firstname}</td>";
                        
                        
//                        $query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
//                        $select_admin_categories_edit = mysqli_query($con, $query);
//
//
//                        while($row = mysqli_fetch_assoc($select_admin_categories_edit)){
//
//                        $cat_id = $row['cat_id'];
//                        $cat_title = $row['cat_title'];
//                        
//                        echo "<td>{$cat_title}</td>";
//                        
//                        
//                        }
                        
                        echo "<td>{$user_lastname}</td>";
                        echo "<td>{$user_email}</td>";
                        echo "<td>{$user_role}</td>";
                        
//                        
//                        $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
//                        $select_comment = mysqli_query($con, $query);
//                        while($row = mysqli_fetch_assoc($select_comment)){
//                            
//                            $post_id = $row['post_id'];
//                            $post_title = $row['post_title'];
//                            
//                            echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
//                            
//                        }
//                        
                        
                        
                        
                        
                        
                        
                        echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
                        echo "<td><a href='users.php?change_to_subscriber={$user_id}'>Subscriber</a></td>";
                         echo "<td><a href='users.php?source=edit_user&p_id={$user_id}'>Edit</a></td>";
                        echo "</tr>";
                        echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                        echo "</tr>";
                        
                        
                        
                        
                        
                        
                        
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
        
<?php 

//for user to change to the admin

if(isset($_GET['change_to_admin'])){

    if (isset($_SESSION['user_role'])) {
       
       if ($_SESSION['user_role'] === 'admin' ) {
    
   $the_user_id = mysqli_escape_string($con, $_GET['change_to_admin']);
    
    $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id";
    $admin_user_query = mysqli_query($con, $query);
    header('Location: users.php');
    exit();
   }
  }
}

//for user to change to the subscriber

if(isset($_GET['change_to_subscriber'])){

    if (isset($_SESSION['user_role'])) {
       
       if ($_SESSION['user_role'] === 'admin' ) {
    
   $the_user_id = mysqli_escape_string($con, $_GET['change_to_subscriber']);
    
    $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id ={$the_user_id}";
    $subscribe_user_query = mysqli_query($con, $query);
    header('Location: users.php');
    exit();
   }
  }
}

// delete the comment form the view_comment table
if(isset($_GET['delete'])){

    if (isset($_SESSION['user_role'])) {
       
       if ($_SESSION['user_role'] === 'admin' ) {
    
    $the_user_id = mysqli_escape_string($con, $_GET['delete']);
    
    $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
    $delete_user_query = mysqli_query($con, $query);
    header('Location: users.php');
    exit();
     }

  }

 }



?>