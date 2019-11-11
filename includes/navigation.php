        <div class="container">
            <nav class="navbar navbar-inverse navbar-fixed-top rounded" role="navigation">


                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="./index.php">EGNIMOS</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->


                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">






                        <?php

                        if (isset($_SESSION['username'])) {

                            if ($_SESSION['user_role'] === 'admin') {

                                echo "<li><a href='admin'>ADMIN</a></li>";
                            } else {

                                echo "<li><a href='user-admin'>ADMIN</a></li>";
                            }
                        }


                        if (!isset($_SESSION['username'])) {

                            echo "<li><a href='./registration.php'>Registration</a></li> ";
                        }


                        ?>







                        <li>
                            <a href="category(exp).php">Category</a>
                        </li>

                        <li>
                            <a href="contact.php">Contact Us</a>
                        </li>

                        <!-- <li>
                            <a href="#">Login</a>
                        </li> -->




                    </ul>
                </div>
                <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
        </nav>