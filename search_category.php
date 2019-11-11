<?php include("includes/header.php"); ?>

<?php include "includes/db.php" ?>
<?php include("includes/navigation.php") ?>

<div class="container">

    <h2 align="center">Search Your Categories</h2>
    <br><br>
    <!---Search bar----------------------------------------------------------------------------->
    <center>
        <form action="search_category.php" method="post">
            <div class="input-group">
                <input type="text" class="form-control" style="border:1px solid black;border-radius:10px;" name="search_category" placeholder="Enter your keyword" size="50">
                <div class="input-group-btn">
                    <button type="submit" name="submit_search_category" style="border:1px solid black;border-radius:10px;" class="btn btn primary"><i class="glyphicon glyphicon-search">Search</i></button>
                </div>
            </div>
        </form>
    </center>
    <br><br>

    <!----Panel of Categories---------------------------------------------------------------------->

    <div class="row">

        <!-----------RENDERING THE CATEGORIE -------------------------------------------->
        <?php

        // if (isset($_POST['submit'])) {

        //     $search = $_POST['search'];

        //     $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
        //     $query .= "ORDER BY post_id DESC ";
        //     $search_query = mysqli_query($con, $query);

        //     if (!$search_query) {

        //         die("QUERRY FAILED" . mysqli_error($con));
        //     }

        //     $count = mysqli_num_rows($search_query);
        //     if ($count == 0) {

        //         echo "<h3>No result</h3>";
        //     } else {

        if (isset($_POST['submit_search_category'])) {

            $search_category = $_POST['search_category'];
        

        $query = "SELECT cat_id ,cat_title FROM categories WHERE cat_title LIKE '%search_category%' ";
        $select_cat_query = query($query);
        confirmQuery($select_cat_query);

        $count_category = mysqli_num_rows($select_cat_query);

        if ($count_category == 0) {

            echo "<center><h3>No Result</h3></center>";
        }else {
            
        



        while ($row = mysqli_fetch_assoc($select_cat_query)) {
            $cat_title = escape($row['cat_title']);
            $cat_id = escape($row['cat_id']);


            ?>
            <a href="category.php?cat=<?php echo $cat_id ?>">
                <div class="col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4 style="color:#212121;"><?php echo $cat_title ?></h4>
                        </div>
                    </div>
                </div>
            </a>

        <?php } } }?>
        <!-----------/RENDERING THE CATEGORIE -------------------------------------------->



    </div>
    <!---/row CLASS----------->
</div>
<!----/container CLASS-------->



<?php include "includes/footer.php" ?>