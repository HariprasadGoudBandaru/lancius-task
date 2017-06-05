<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/lancius-task/controllers/auth.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lancius-task/controllers/db.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lancius-task/controllers/common.php');

if(isset($_POST['product_id'])){
    $user_id = $_SESSION['Auth']['user_id'];
    $product_id = $_POST['product_id'];
    saveProduct($connection,$user_id,$product_id);
}else{
    //do nothing
}
?>