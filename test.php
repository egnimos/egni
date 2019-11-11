<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>

<?php

if (userLikedPost(11)) {
	
	echo "user liked it";
}else
{
	echo "user did not liked it";
}


?>

