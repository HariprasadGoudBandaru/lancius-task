<?php
$host = 'localhost';
$mysql_username = 'root';
$mysql_password = '';
$db_name = 'lancius';

$connection = new mysqli($host,$mysql_username,$mysql_password,$db_name);

if ($connection -> connect_error) {
    die("Connection Failed : " .$connection->connect_error);
    exit;
}
?>