<?php ob_start(); ?>
<?php session_start(); ?>
<?php 
if (isset($_POST['logout'])) {
	
}

$_SESSION['username'] = null;
$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;
$_SESSION['user_role'] = null ;

header("Location: ../index.php");
exit();

?>
<?php  session_destroy(); ?>