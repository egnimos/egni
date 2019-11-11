<?php

function confirmQuery($result){
    
    global $con;

    if(!$result){

    die("QUERY FAILED".mysqli_error($con));

    }
    }

    function query($query){

        global $con;

        return mysqli_query($con, $query);
    }

    //redirect function

    function redirect($location)
    {
        return header("Location:" . $location);
    }

    //escape strings for securing the information...

    function escape($string){
        global $con;
        return mysqli_real_escape_string($con, trim($string));
    }


    function isloggedIn(){

        if (isset($_SESSION['user_role'])) {

            return true;
            # code...
        }

        return false;
    }

    //function is_admin...

    function is_admin(){
        
        if(isloggedIn()){

            if ($_SESSION['user_role'] == 'admin') {
                return true;
            }else {
                return false;
            }
        }
    }

    function loggedInUserId(){

        if (isloggedIn()) {

            $result = query("SELECT * FROM users WHERE username='" . $_SESSION['username'] . "'");
            $user = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result) >= 1) {
                
                return $user['user_id'];
            }
            
        }

        return false;
    }

    function userLikedPost($post_id = ''){

        $result = query("SELECT * FROM likes WHERE user_id=" .loggedInUserId(). " AND post_id={$post_id}");
        confirmQuery($result);
        return mysqli_num_rows($result) >= 1 ? true : false;

    }

    function getPostLikes($post_id = ''){

        $result =query("SELECT * FROM likes WHERE post_id={$post_id}");
        confirmQuery($result);
        echo mysqli_num_rows($result);
    }

    function users_online(){
    
    if(isset($_GET['onlineusers'])) {

    global $con;

    if(!$con) {

        session_start();

        include("../includes/db.php");

        $session = session_id();
        $time = time();
        $time_out_in_seconds = 05;
        $time_out = $time - $time_out_in_seconds;

        $query = "SELECT * FROM users_online WHERE session = '$session'";
        $send_query = mysqli_query($con, $query);
        $count = mysqli_num_rows($send_query);

            if($count == NULL) {

            mysqli_query($con, "INSERT INTO users_online(session, time) VALUES('$session','$time')");


            } else {

            mysqli_query($con, "UPDATE users_online SET time = '$time' WHERE session = '$session'");


            }

        $users_online_query =  mysqli_query($con, "SELECT * FROM users_online WHERE time > '$time_out'");
        echo $count_user = mysqli_num_rows($users_online_query);
   }

 }

}

users_online();


function insert_categories(){
    
    global $con;


    if(isset($_POST['submit'])){

    $cat_title = $_POST['cat_title'];

    if($cat_title == "" || empty($cat_title)){

    echo "<b class='text-danger'>This field Should not be empty</b>";
    }
    else{

    if (isset($_SESSION['user_id'])) {
        
        $user_id = $_SESSION['user_id'];
    

    $query = "INSERT INTO categories(cat_title, cat_user_id)";
    $query .= "VALUE ('{$cat_title}', $user_id)";

    $create_query = mysqli_query($con, $query);
    if(!$create_query){

    die("QUERY FAILED".mysqli_error($con));

    }
    }

    }
    }
    }


function findAllCategories(){
    
    global $con;
    

    if (isset($_SESSION['user_id'])) {
        
        $user_id = $_SESSION['user_id'];

    $query = "SELECT * FROM categories WHERE cat_user_id = $user_id ";
    $select_admin_categories = mysqli_query($con, $query);


    while($row = mysqli_fetch_assoc($select_admin_categories)){

    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];

    echo "<tr>";
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
    echo "<td><a href ='categories.php?delete={$cat_id}'>Delete</a></td>";
    echo "<td><a href ='categories.php?edit={$cat_id}'>Edit</a></td>";
    echo "</tr>";
    }
    }
    }


function deleteCategories(){
    
    global $con;

    if(isset($_GET['delete'])){

    $the_cat_id = $_GET['delete'];
    $query="DELETE FROM categories WHERE cat_id = {$the_cat_id}";
    $delete_query = mysqli_query($con, $query);
    header("Location: categories.php");
    }
    }

function updateCategories(){

    global $con;

    if(isset($_GET['edit'])){

    $cat_id = $_GET['edit'];

    include "includes/update_categories.php";



    }
    }

    //record of the activity by the admin of posts, users, categories, comments
    function recordCount($table,$user_id){
        if(isset($_SESSION['user_id'])){
            $the_user_id = $_SESSION['user_id'];
            $query = "SELECT * FROM ".$table." WHERE ".$user_id." = $the_user_id" ;
            $select_posts = query($query);
            confirmQuery($select_posts);
            return mysqli_num_rows($select_posts);
        }
    }
    //check the user activity
    function userCount($table){
        $query = "SELECT * FROM ".$table;
        $select_posts = query($query);
        confirmQuery($select_posts);
        return mysqli_num_rows($select_posts);

    }
    //check the user role in the admin dsahboard...
    function checkUserCount($table,$status,$role,$user_id){
        if(isset($_SESSION['user_id'])){
        $the_user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM ".$table." WHERE ".$status." = '$role' AND ".$user_id." = $the_user_id";
        //as role variable is a string...so we use quotes..
        $select_published_query = query($query);
        confirmQuery( $select_published_query);
        return mysqli_num_rows($select_published_query); 
        }
}           

    //checking the given user is admin or not "Only Admin Can Enter..."

    function isUser($role){

        if(isset($_SESSION[$role])) {

        if ($_SESSION[$role] !== 'admin') {

            return true;
        }
    }
}

    //Duplicate username function....

    function username_exists($username){
        $query = "SELECT username FROM users WHERE username = '$username'";
        $result = query($query);
        confirmQuery($result);

        if (mysqli_num_rows($result) > 0) {
            return true;
        }else {
            return false;
        }
    }

    //duplicate email function...


    function email_exists($user_email){
        $query = "SELECT user_email FROM users WHERE user_email = '$user_email'";
        $result = query($query);
        confirmQuery($result);

        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //register_user Function....

    function register_user($user_firstname, $user_lastname, $username, $email, $password){
       
                $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

                $query_insert_registration = "INSERT INTO users(user_firstname, user_lastname, username, user_email, user_password, user_role) ";
                $query_insert_registration .= "VALUES('{$user_firstname}' , '{$user_lastname}' , '{$username}' , '{$email}' , '{$password}' , 'subscriber') ";


                $select_update_query = query($query_insert_registration);
                confirmQuery($select_update_query);
    }

    //login user function.....

    function login_user($username, $password){

        $username = escape($username);
        $password = escape($password);

        $query = "SELECT * FROM users WHERE username = '{$username}'";
        $select_user_query = query($query);
        confirmQuery($select_user_query);

        while ($row = mysqli_fetch_assoc($select_user_query)) {

            $db_id = $row['user_id'];
            $db_username = $row['username'];
            $db_user_password = $row['user_password'];
            $db_user_firstname = $row['user_firstname'];
            $db_user_lastname = $row['user_lastname'];
            $db_user_email = $row['user_email'];
            $db_user_role = $row['user_role'];
        }

        $password = crypt($password, $db_user_password);

        if ($username === $db_username && $password === $db_user_password) {

            $_SESSION['user_id'] = $db_id;
            $_SESSION['username'] = $db_username;
            $_SESSION['firstname'] = $db_user_firstname;
            $_SESSION['lastname'] = $db_user_lastname;
            $_SESSION['user_email'] = $db_user_email;
            $_SESSION['user_role'] = $db_user_role;

            if ($db_user_role === admin) {

                redirect("../admin");
                exit();
            } else {

                redirect("../user-admin");
                exit();
            }
        } else {

            redirect("../not_found.php");
            exit();
        }
    }


?>