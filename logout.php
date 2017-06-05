<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/lancius-task/controllers/session.php');
destroySession();
header('location:/lancius-task/index.php');
?>