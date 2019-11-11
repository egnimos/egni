<?php session_start(); ?>
<?php include "db.php"; ?>
<?php include "../admin/function.php"; ?>



<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    login_user($_POST['username'],  $_POST['password']);
}
