<h1 class="page-header">
    Comment panel
    <small>Check the comments you get for blog</small>
        </h1>


<div class="col">

<input class="form-control" id="myInput" align="center" type="text" placeholder="Search..">
<small>Enter your keyword....</small>
<br>
<br>
</div>


           <table class="table table-bordered table-hover ">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Author</th>
                    <th>Comment</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>In Response to</th>
                    <th>Date</th>
                    <th>Approve</th>
                    <th>Unapprove</th>
                    
                </tr>
            </thead >
            
            <tbody id="myTable">
               
                   <?php

                    if (isset($_SESSION['user_id'])) {
                        

                    $user_id = $_SESSION['user_id'];
                        
                    $query = "SELECT * FROM comments WHERE comment_user_id = $user_id ";
                    $query .= "ORDER BY comment_id DESC ";
                    $select_comments = mysqli_query($con, $query);

                    while($row = mysqli_fetch_assoc($select_comments)){
                        $comment_id = $row['comment_id'];
                        $comment_post_id = $row['comment_post_id'];
                        $comment_author = $row['comment_author'];
                        $comment_email = $row['comment_email'];
                        $comment_content = $row['comment_content'];
                        $comment_status = $row['comment_status'];
                        $comment_date = $row['comment_date'];
                       
                        
                        
                        echo "<tr>";
                        echo "<td>{$comment_id}</td>";
                        echo "<td>{$comment_author}</td>";
                        echo "<td>{$comment_content}</td>";
                        
                        
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
                        
                        
                        echo "<td>{$comment_email}</td>";
                        echo "<td>{$comment_status}</td>";
                        
                        
                        $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                        $select_comment = mysqli_query($con, $query);
                        while($row = mysqli_fetch_assoc($select_comment)){
                            
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            
                            echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
                            
                        }
                        
                        
                        
                        
                        
                        
                        echo "<td>{$comment_date}</td>";
                        echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
                        echo "<td><a href='comments.php?unapprove=$comment_id'>Unaprrove</a></td>";
                        echo "</tr>";
                        echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
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
        
<?php 
//for approve section for the comment

if(isset($_GET['approve'])){
    
   $the_comment_id = $_GET['approve'];
    
    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id";
    $approve_comment_query = mysqli_query($con, $query);
    header('Location: comments.php');
}

//for unapprove the comment

if(isset($_GET['unapprove'])){
    
   $the_comment_id = $_GET['unapprove'];
    
    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id";
    $unapprove_comment_query = mysqli_query($con, $query);
    header('Location: comments.php');
}

// delete the comment form the view_comment table
if(isset($_GET['delete'])){
    
   $the_comment_id = $_GET['delete'];
    
    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
    $delete_comment_query = mysqli_query($con, $query);
    header('Location: comments.php');
}



?>