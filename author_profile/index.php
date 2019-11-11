<?php ob_start();  ?>
<?php session_start(); ?>
<?php include "../includes/db.php" ?>

<!DOCTYPE HTML>
<!--
	Miniport by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)


-->
<html>
	<head><?php

     if(isset($_GET['p_id'])){
        
        $the_post_id = $_GET['p_id'];
        $the_post_author = $_GET['author'];
    

      

		echo "<title>{$the_post_author}</title>";

      }
	?>	
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.scrolly.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
	</head>
	<body>

		<!-- Nav -->
			<nav id="nav">
				<ul class="container">
					<li><a href="../index.php">Home</a></li>
					<li><a href="#portfolio">Blog</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
			</nav>

             
                  <?php
    // this query is used to conect the index with post to show the complete detail of blog through post page by truncting the post content in the index page....
    
     

                        
                      
                        
                   
                    
                ?>





		<!-- Home -->
			<div class="wrapper style1 first">
				<article class="container" id="top">
					<div class="row">
						<div class="4u">
							<span class="image fit"><img src="images/pic00.jpg" alt="" /></span>
						</div>
						<div class="8u">
							<header>

							
                                <?php


								echo "<h1>Hi. I'm <strong>{$the_post_author}</strong>.</h1>";

                                 ?>

							</header>

							<?php
                             
                             if(isset($_GET['username'])){

                             	if (isset($_GET['user_role']) === admin) {
                             		# code...
                             	  $query = "SELECT username FROM users WHERE username = '{$the_post_author}'";
                             	  $select_user = mysqli_query($con, $query);

                             	  

                                echo "<p> '{$the_post_author}' </p>"; 

                             }
                         }

                         ?>

							
							
						</div>
					</div>
				</article>
			</div>


		<!-- Portfolio -->
		     <!-- Page Content -->
    
			<div class="wrapper style3">
				<article id="portfolio">
					<header>
						<h2>Here’s some stuff I made recently.</h2>
						<p>Proin odio consequat  sapien vestibulum consequat lorem dolore feugiat lorem ipsum dolore.</p>
					</header>

                     

                     <div class="container-fluid">


                    <div class="col-md-8">
                
                <?php
                $query = "SELECT * FROM posts WHERE post_author = '{$the_post_author}' ";
                $select_post = mysqli_query($con, $query);
                
                while($row = mysqli_fetch_assoc($select_post))
                {
                  $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'],0,100);
                    $post_status = $row['post_status'];
                    $post_tags = $row['post_tags'];
                    
                    if($post_status == 'published'){
              ?>
                
                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_tags=<?php echo $post_tags; ?>&p_title=<?php echo $post_title; ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="#"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <center><div class="4u">
                <img class=" image fit" src="../images/<?php echo $post_image ?> " width = "500" height="300" alt="">
            </div></center>
                <hr>
                <p><?php echo $post_content; ?>
                <a type="button" class="btn btn-outline-success" href="post.php?p_tags=<?php echo $post_tags; ?>&p_title=<?php echo $post_title; ?>&p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a></p>
                
                
                
     
                
            <?php  }  } ?>

               
               
          
               </div>

              

             

           </div>











					
				</article>
			</div>

		<!-- Contact -->
			<div class="wrapper style4">
				<article id="contact" class="container 75%">
					<header>
						<h2>Have me make stuff for you.</h2>
						<p>Ornare nulla proin odio consequat sapien vestibulum ipsum sed lorem.</p>
					</header>
					<div>
						<div class="row">
							<div class="12u">
								<form method="post" action="#">
									<div>
										<div class="row">
											<div class="6u">
												<input type="text" name="name" id="name" placeholder="Name" />
											</div>
											<div class="6u">
												<input type="text" name="email" id="email" placeholder="Email" />
											</div>
										</div>
										<div class="row">
											<div class="12u">
												<input type="text" name="subject" id="subject" placeholder="Subject" />
											</div>
										</div>
										<div class="row">
											<div class="12u">
												<textarea name="message" id="message" placeholder="Message"></textarea>
											</div>
										</div>
										<div class="row 200%">
											<div class="12u">
												<ul class="actions">
													<li><input type="submit" value="Send Message" /></li>
													<li><input type="reset" value="Clear Form" class="alt" /></li>
												</ul>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="row">
							<div class="12u">
								<hr />
								<h3>Find me on ...</h3>
								<ul class="social">
									<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
									<li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
									<li><a href="#" class="icon fa-tumblr"><span class="label">Tumblr</span></a></li>
									<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
									<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
									<!--
									<li><a href="#" class="icon fa-rss"><span>RSS</span></a></li>
									<li><a href="#" class="icon fa-instagram"><span>Instagram</span></a></li>
									<li><a href="#" class="icon fa-foursquare"><span>Foursquare</span></a></li>
									<li><a href="#" class="icon fa-skype"><span>Skype</span></a></li>
									<li><a href="#" class="icon fa-soundcloud"><span>Soundcloud</span></a></li>
									<li><a href="#" class="icon fa-youtube"><span>YouTube</span></a></li>
									<li><a href="#" class="icon fa-blogger"><span>Blogger</span></a></li>
									<li><a href="#" class="icon fa-flickr"><span>Flickr</span></a></li>
									<li><a href="#" class="icon fa-vimeo"><span>Vimeo</span></a></li>
									-->
								</ul>
								<hr />
							</div>
						</div>
					</div>
					<footer>
						<ul id="copyright">
							<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</footer>
				</article>
			</div>

	</body>
</html>