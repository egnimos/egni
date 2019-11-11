<?php include "includes/header.php" ?>

<!-- Navigation -->

<?php include "includes/db.php" ?>
<?php include "includes/navigation.php" ?>


<?php

if (isset($_POST['liked'])) {

    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id'];

    //1-SELECT THE POST

    $query = "SELECT * FROM posts WHERE post_id=$post_id";
    $postResult = mysqli_query($con, $query);
    confirmQuery($postResult);
    $post = mysqli_fetch_assoc($postResult);
    $likes = $post['likes'];

    //2-Update post with INCREMENTING likes

    mysqli_query($con, "UPDATE posts SET likes=$likes+1 WHERE post_id=$post_id");

    //3-CREATE LIKES FOR POST

    mysqli_query($con, "INSERT INTO likes(user_id, post_id) VALUES($user_id, $post_id)");
    exit();
}


if (isset($_POST['unliked'])) {



    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id'];

    //1-SELECT THE POST

    $query = "SELECT * FROM posts WHERE post_id=$post_id";
    $postResult = mysqli_query($con, $query);
    confirmQuery($postResult);
    $post = mysqli_fetch_assoc($postResult);
    $likes = $post['likes'];

    //DELETE LIKES

    mysqli_query($con, "DELETE FROM likes WHERE post_id=$post_id AND user_id=$user_id");

    //2-Update post with DECREMENTING  likes

    mysqli_query($con, "UPDATE posts SET likes=$likes-1 WHERE post_id=$post_id");

    // //3-CREATE LIKES FOR POST

    // mysqli_query($con, "INSERT INTO likes(user_id, post_id) VALUES($user_id, $post_id)");
    // exit(); 


}




?>

<!-- Page Content -->
<div class="container-fluid">

    <div class="">

        <!-- Blog Entries Column --------------------------------------------------------------------------------------------------->
        <div class="col-lg-12">

            <?php
            // this query is used to conect the index with post to show the complete detail of blog through post page by truncting the post content in the index page....

            if (isset($_GET['p_id'])) {

                $the_post_id = escape($_GET['p_id']);


                $query = "SELECT * FROM posts  WHERE post_id = $the_post_id ";
                $select_post = mysqli_query($con, $query);

                while ($row = mysqli_fetch_assoc($select_post)) {
                    $post_category_id = $row['post_category_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];


                    ?>

                    <?php

                            $query = "SELECT cat_title FROM categories WHERE cat_id = {$post_category_id}";
                            $select_category_query = mysqli_query($con, $query);
                            $row = mysqli_fetch_assoc($select_category_query);
                            $cat_title = $row['cat_title'];

                            echo "<h1 class='page-header text-warning'>
                     {$cat_title}
                    <small>Topic</small>
                </h1>";

                            ?>

                    <!-- First Blog Post -->
                    <h2>
                        <a href="#"><?php echo $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        <?php

                $query = "SELECT user_firstname, user_lastname FROM users WHERE user_id = {$post_author}";
                $select_user = query($query);
                confirmQuery($select_user);
                $row = mysqli_fetch_array($select_user);

                $firstName = escape($row['user_firstname']);
                $lastName = escape($row['user_lastname']);

                        ?>
                        by <a href="index.php"><?php echo $firstName; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?>


                        <!-------VOTE or UNVOTE the posts-------------------------------------------------------------------------->

                        <?php if (isloggedIn()) { ?>

                            <div class="row">
                                <p class="pull-right"><a style="font-size: 20px;" class="<?php echo userLikedPost($the_post_id) ? 'unlike' : 'like'; ?>" href=""><span class="<?php echo userLikedPost($the_post_id) ? 'glyphicon glyphicon-triangle-bottom' : 'glyphicon glyphicon-triangle-top'; ?>" data-toggle="tooltip" data-placement="top" title="<?php echo userLikedPost($the_post_id) ? 'Want to disvote' : 'Want to vote this post'; ?>"></span><?php echo userLikedPost($the_post_id) ? ' Disvote' : ' Vote'; ?></a></p>
                            </div>

                        <?php } else { ?>

                            <div class="row">
                                <p class="pull-right" style="font-size: 20px;">You need to<a href="/egni2/index.php"> Login</a> to like this post.</p>
                            </div>


                        <?php } ?>



                        <div class="row">
                            <p class="pull-right text-warning" style="font-size: 16px;">Vote: <?php echo getPostLikes($the_post_id); ?></p>
                        </div>


                        <div class="clearfix"></div>

                        <!------------ CODE OVER FOR VOTE AND DISVOTE------------------------------------------------------------------>


                    </p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image ?> " alt="">
                    <hr>
                    <p><?php echo $post_content; ?></p>


                <?php    } ?>

                <hr>


                <!---------------------------CODE FOR RELATED TOPICS---------------------------------->




                <hr>

            <?php } ?>







            <!-- Blog Comments -->




            <?php





            //this query used to take the information from the comment input and stor in the database...

            if (isset($_SESSION['user_id'])) {


                $comment_user_id = $_SESSION['user_id'];


                if (isset($_POST['comment_content'])) {

                    $the_post_id = $_GET['p_id'];

                    $comment_author = $_POST['comment_author'];
                    $comment_email = $_POST['comment_email'];
                    $comment_content = $_POST['comment_content'];


                    if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {

                        $query = "INSERT INTO comments (comment_post_id, comment_user_id,comment_author, comment_email, comment_content, comment_status, comment_date) ";

                        $query .= "VALUES ($the_post_id, $comment_user_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now()) ";

                        $create_comment_query = mysqli_query($con, $query);

                        confirmQuery($create_comment_query);

                        $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                        $query .= "WHERE post_id = $the_post_id ";
                        $update_comment_count = mysqli_query($con, $query);

                        $msg = "<div class='bg-danger'><b class='text-success'>Your response has been sent to the bloger , the comment will be shown after the approval by the egnimos...if you wnat to send some query related to some thing send the message in the contact section.</b></div>";

                        echo $msg;
                    } else {

                        echo   "<script>alert('Comment Feilds cannot be empty')</script>";
                    }
                }
            }

            ?>

            <?php

            if (isset($_SESSION['username'])) {

                // if($_SESSION['user_role'] === 'admin' && $_SESSION['user_role'] === 'subscriber' ){





                // Comments Form 
                echo  "<div class='well' style='background-color:#f1f1f1;'>
            
                    <h4>Leave your response:</h4>
                    <form role='form' method='post' action=''>
                       
                       
                        <div class='form-group'>
                           <label for='Author' >Your Name</label>
                            <input type='text' class='form-control' name='comment_author'>
                        </div>
                        
                        <div class='form-group'>
                          <label for='email'>email</label>
                           <input type='email' class='form-control' name='comment_email'>
                        </div>
                        
                        <div class='form-group'>
                           <label for='your comment'>Your Comment</label>
                            <textarea class='form-control' rows='3' name='comment_content' id='editor'></textarea>
                        
                        </div>
                        
                        
                        <button type='submit' class='btn btn-info' name='create_comment'>Submit</button>
                    </form>
                </div>

                <hr>";

                // }

            } else {


                echo "<h2 ><a href='index.php' class='text-warning'>To Comment this post you have to login</a></h2>";
            } ?>

            <!-- Posted Comments -->

            <?php
            //query to display the comment on the index page through post.php page...

            $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
            $query .= "AND comment_status = 'approved' ";
            $query .= "ORDER BY comment_id DESC ";
            $select_comment_query = mysqli_query($con, $query);

            confirmQuery($select_comment_query);
            while ($row = mysqli_fetch_assoc($select_comment_query)) {

                $comment_id = $row['comment_id'];
                $comment_post_id = $row['comment_post_id'];
                $comment_author = $row['comment_author'];
                $comment_date = $row['comment_date'];
                $comment_content = $row['comment_content'];

                ?>

                <!-- Comment -->

                <div class="well" style="background-color: #b0bec5;">

                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>

                        <p style="color:#212121 "> <?php echo $comment_content; ?> </p>



                        <!--  <b><a class="text-warning pull-right" href="comment-reply.php?edit=<?php echo $comment_id; ?>">edit</a></b> -->

                    </div>



                </div>
                <!-- <a href="reply.php?reply_comment=reply.php&pid=<?php echo $the_post_id; ?>&p_comment_id= <?php echo  $comment_post_id; ?>">reply</a> -->


                <hr>





            <?php  } ?>








        </div>








        <!-- Blog Sidebar Widgets Column -->
      

    </div>
    <!-- /.row -->

    <hr>





    <?php include "includes/footer.php" ?>


    <script>
        $(document).ready(function() {

            $("[data-toggle='tooltip']").tooltip();

            var post_id = <?php echo $the_post_id; ?>

            var user_id = <?php echo loggedInUserId(); ?>

            $('.like').click(function() {

                $.ajax({

                    url: "/egni2/post.php?p_id=<?php echo $the_post_id; ?>",
                    type: 'post',
                    data: {
                        'liked': 1,
                        'post_id': post_id,
                        'user_id': user_id
                    }
                });

            });



            $('.unlike').click(function() {

                $.ajax({

                    url: "/egni2/post.php?p_id=<?php echo $the_post_id; ?>",
                    type: 'post',
                    data: {
                        'unliked': 1,
                        'post_id': post_id,
                        'user_id': user_id
                    }
                });

            });






        });
    </script>