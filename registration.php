<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>


<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $user_firstname = escape($_POST['user_firstname']);
    $user_lastname = escape($_POST['user_lastname']);
    $username = escape($_POST['username']);
    $email = escape($_POST['email']);
    $password = escape($_POST['password']);

    $error = [

        'username' => '',
        'email' => '',
        'password' => ''
    ];

    if (strlen($username) < 4) {
        $error['username'] = "Username needs to be longer";
    }
    if ($username == '') {
        $error['username'] = "Username should not be empty";
    }
    if (username_exists($username)) {
        $error['username'] = "Username already exist ..pick another one";
    }
    if ($email == '') {
        $error['email'] = "Username should not be empty";
    }
    if (email_exists($email)) {
        $error['email'] = "email already exist ..<a href='#'>Please Login</a>";
    }
    if ($password == '') {
        $error['password'] = "Enter the password ";
    }

    foreach ($error as $key => $value) {
        if (empty($value)) {

            unset($error[$key]);

        }
    } //foreach loop close...

    if (empty($error)) {
        register_user($user_firstname, $user_lastname, $username, $email, $password);

        // login_user($username, $password);
    }

}

?>


<!-- Navigation -->

<?php include "includes/navigation.php"; ?>


<!-- Page Content -->
<div class="container">

    <section id="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-wrap">
                        <h1>Register</h1>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                            <div align="center" class="bg-success">
                              <p><?php echo empty($error)? "You are Successfully login...<a href='login.php'>Login</a>":' ' ?></p>
                            </div>


                            <div class="form-group">
                                <label for="firstname" class="sr-only">Firstname</label>
                                <input type="text" name="user_firstname" id="firstname" class="form-control" placeholder="Enter Your firstname" required="firstname" autocomplete="on" value="<?php echo isset($user_firstname) ? $user_firstname : '' ?>">
                            </div>


                            <div class="form-group">
                                <label for="lastname" class="sr-only">Lastname</label>
                                <input type="text" name="user_lastname" id="lastname" class="form-control" placeholder="Enter Your lastname" required="lastname" autocomplete="on" value="<?php echo isset($user_lastname) ? $user_lastname : '' ?>">
                            </div>


                            <div class="form-group">
                                <label for="username" class="sr-only">username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" required="username" autocomplete="off" value="<?php echo isset($username) ? $username : '' ?>">
                                <p class="text-danger"><?php echo isset($error['username']) ? $error['username'] : ' ' ?></p>
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" required="email" autocomplete="off" value="<?php echo isset($email) ? $email : '' ?>">
                                <p class="text-danger"><?php echo isset($error['email']) ? $error['email'] : ' ' ?></p>
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Password" required="password">
                                <p class="text-danger"><?php echo isset($error['password']) ? $error['password'] : ' ' ?></p>
                            </div>

                            <input type="submit" name="register" id="btn-login" class="btn-lg btn-block" class="btn btn-dark" value="Register">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>



    <?php include "includes/footer.php"; ?>