<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>
<?php include "includes/navigation.php" ?>



<div class="container">

    <div class="row">

        <!---SEARCH------------------------------------------------------------------------------>
        <div class="col-md-8">

            <div class="well" style="background-color:#e0f2f1; border-radius:15%;box-shadow: 10px 10px 5px grey;">

                <div align="center">
                    <img width="80" src="images/egnicad.png" style="box-shadow: 10px 10px 5px grey;" class="img-responsive img-circle" alt="icon">
                </div><br>

                <form action="search.php" method="post">
                    <div class="input-group">

                        <input type="text" class="form-control" id="navBarSearchForm" name="search" placeholder="Enter you keyword related to search......">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search" style="color: brown;"></span>
                            </button>
                        </span>

                    </div>
                </form>
            </div><br><br><br>
            <!----/SEARCH---------------------------------------------------------------------------->

            <!------RENDERING THE POSTS BASED ON CATEGORY FROM TABLE (Blog snippets )---------------->
            <?php

            if (isset($_GET['cat'])) {
                $post_category_id = escape($_GET['cat']);
            }


            $published = 'published';

            $query = "SELECT * FROM posts ";
            $query .= "WHERE post_category_id = {$post_category_id} AND post_status = 'published' ";

            $select_post = query($query);
            confirmQuery($select_post);



            while ($row = mysqli_fetch_assoc($select_post)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = substr($row['post_content'], 0, 200);
                $post_status = $row['post_status'];
                $post_tags = $row['post_tags'];

                if ($post_status == $published) {


                    ?>


                    <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                    </h1>

                    <!-- First Blog Post -->
                    <h2>
                        <a href="post.php?p_tags=<?php echo $post_tags; ?>&p_title=<?php echo $post_title; ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image ?> " alt="">
                    <hr>
                    <p><?php echo $post_content; ?>
                        <a type="button" class="btn btn-outline-success" href="post.php?p_tags=<?php echo $post_tags; ?>&p_title=<?php echo $post_title; ?>&p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a></p>






            <?php



            }
            }


            ?>
            <!---/RENDERING THE POSTS BASED ON CATEGORY FROM TABLE (Blog snippets )-------------------------->
               

                

            </div>
            <!---/col-md-8----------------------------------------------------------------------------------->

          

        </div>
        <!-- /row ------------------------------------------------------------------------------------------->

        <hr>

        <?php include "includes/footer.php" ?>