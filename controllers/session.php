<?php
session_start();

//file for creating and destorying sessions
function createSession($user_id){
    $_SESSION['Auth']['user_id'] = $user_id; 
}

function destroySession(){
    // remove all session variables
    session_unset(); 
    // destroy the session 
    session_destroy();
}

?>