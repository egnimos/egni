
           <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Egnimos Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

                <!-- <li><a href="#">USERS ONLINE: <?php //echo usersOnline(); ?></a></li> -->
                <li><a href="">Users Online: <span class="usersonline"></span></a></li>

               <li><a href="../index.php">HOME</a></li>
                
                
                
                
                
                
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                    
                    
                    
                    
                    
                    
                    <?php 
                        if(isset($_SESSION['username'])){
                            
                            
                             echo $_SESSION['username'];
                            
                            
                        }
                        
                        
                        
                        ?> 
                    
                    
                    
                    
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="./profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                       
                        <li class="divider"></li>
                        <?php

                        if (isset($_SESSION['username'])) {
                            # code...
                       
                         echo "<li>
                            <a href='../includes/logout.php'><i class='fa fa-fw fa-power-off'></i> LogOut</a>
                        </li>";
                        
                            }else{
                                  
                                  header("Location:/egni2/index.php");
                                  exit();

                            }
                        ?>

                        
                    </ul>
                </li>
            </ul>





            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" style="overflow:auto;">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dashboard"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dashboard" class="collapse">
                            <li>
                                <a href="./posts.php">View All Posts </a>
                            </li>
                            <li>
                                <a href="posts.php?source=add_post">Add Posts</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="./categories.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
                    </li>
                    
                    <li>
                        <a href="./comments.php"><i class="fa fa-fw fa-wrench"></i> Comments</a>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="users.php">View all Users</a>
                            </li>
                            <li>
                                <a href="users.php?source=add_user">Add User</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#question"><i class="fa fa-fw fa-arrows-v"></i> Questions <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="question" class="collapse">
                            <li>
                                <a href="questions.php">View all questions</a>
                            </li>
                            <li>
                                <a href="questions.php?source=add_question">Upload question</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#videos"><i class="fa fa-fw fa-arrows-v"></i> egni videos <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="videos" class="collapse">
                            <li>
                                <a href="video_frame.php">View all video tuts</a>
                            </li>
                            <li>
                                <a href="video_frame.php?source=upload_video">Upload videos</a>
                            </li>
                            <li>
                                <a href="video_frame.php?source=video_categories">video categories</a>
                            </li>
                            <li>
                                <a href="video_frame.php?source=add_video_categories">Add video categories</a>
                            </li>

                        </ul>
                    </li>
                    
                    <li class="">
                        <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#widget"><i class="fa fa-fw fa-arrows-v"></i> Widget <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="widget" class="collapse">
                            <li>
                                <a href="video_frame.php">View all widgets</a>
                            </li>
                            <li>
                                <a href="video_frame.php?source=upload_video">Add new widget</a>
                            </li>
                            <li>
                                <a href="video_frame.php?source=video_categories">Widget category</a>
                            </li>
                            <li>
                                <a href="video_frame.php?source=add_video_categories">Add widget categories</a>
                            </li>

                        </ul>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>