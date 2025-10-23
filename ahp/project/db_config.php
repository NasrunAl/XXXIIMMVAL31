<?php
// db_config.php - edit credentials as needed
$db_host = 'localhost';
$db_name = 'ahp_from_sheet';
$db_user = 'root';
$db_pass = '';

// create connection and DB if missing
$mysqli = new mysqli($db_host, $db_user, $db_pass);
if ($mysqli->connect_error) { die("Connection failed: " . $mysqli->connect_error); }
$mysqli->query("CREATE DATABASE IF NOT EXISTS `".$db_name."` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;");
$mysqli->select_db($db_name);
$mysqli->close();
?>