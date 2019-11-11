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

        $query = "SELECT cat_id ,cat_title FROM categories GROUP BY cat_title";
        $select_cat_query = query($query);
        confirmQuery($select_cat_query);
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

        <?php } ?>
        <!-----------/RENDERING THE CATEGORIE -------------------------------------------->



    </div>
    <!---/row CLASS----------->
</div>
<!----/container CLASS-------->



<?php include "includes/footer.php" ?>