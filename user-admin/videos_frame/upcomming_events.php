<?php include "includes/head.php"; ?>

    <!-- Sidebar -->
<?php include "includes/sidebar.php"; ?>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

<?php include "includes/nav.php"; ?>


   <div class="container">
   <video poster="video_images/jsfirst.png" id="player" controls data-plyr-config='var quality = { default: 576, options: [4320, 2880, 2160, 1440, 1080, 720, 576, 480, 360, 240] }'>
    <source src="video_images/jsfirst.mp4" type="video/mp4" />
    <source src="/video_images/" type="video/webm" />

    <!-- Captions are optional -->
    <track kind="captions" label="English captions" src="/path/to/captions.vtt" srclang="en" default />
</video>
</div>

    </div>
    <!-- /#page-content-wrapper -->

<?php include "includes/footer.php"; ?>