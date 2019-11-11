<?php ob_start(); ?>
<?php session_start();  ?>
<?php include "../includes/db.php"; ?>
<?php include "./function.php"; ?>

<?php
//only admin can acsses this module....OR ADMIN PANEL..
if (isUser('user_role')) {
    header("Location: ../index.php");
    exit();
}


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      
      
      
   <!-- <script src="jquery-3.4.1.min.js"></script>-->

   
<!--        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>-->

        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    
      
      <script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>

      
      <script src="js/jquery.js"></script>
      
</head>

<body>