<?php
session_start();
if(isset($_SESSION['Auth']['user_id'])){
    //continue
}else{
    echo "<h1 color='red'> No Session </h1>";
    exit();
}
?>