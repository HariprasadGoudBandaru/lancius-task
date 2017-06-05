<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/lancius-task/controllers/db.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lancius-task/controllers/common.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lancius-task/controllers/session.php');

if(isset($_POST)){
    $email = $_POST['email'];
    $password = md5($_POST['password']); //hash the password

    //check the user is present or not

    $user_id  = checkUser($connection,$email,$password);
    if($user_id == 0){
         header("location:/lancius-task/index.php");
         exit();
    }
    createSession($user_id);
    // redirect to dashboard
    header("location:/lancius-task/dashboard.php");
}
?>