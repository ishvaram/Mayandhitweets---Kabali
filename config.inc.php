<?php
$db_username = 'YOUR_USERNAME';
$db_password = 'YOUR_PASSWORD';
$db_name = 'YOUR_DB_NAME';
$db_host = 'localhost';
$item_per_page = 10;

$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);
//Output any connection error
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}