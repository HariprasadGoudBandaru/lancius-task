<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/lancius-task/controllers/db.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lancius-task/controllers/common.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lancius-task/controllers/session.php');

if(isset($_POST)){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); //hash the password

    //save the data to Db and create session for user
    $user_id  = saveUser($connection,$first_name,$last_name,$email,$password);

    if($user_id == 0){
         header("location:/lancius-task/index.php");
         exit();
    }
    
    createSession($user_id);

    // redirect to dashboard
    header("location:/lancius-task/dashboard.php");
}
?>