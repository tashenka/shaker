<?php
include 'config.php';

$id = mysql_escape_string($_GET["id"]);


$query = "update users set deleted = 1 where id = $id;";

$result = mysql_query($query, $mysql) or die(mysql_error());;

$query2 = "INSERT INTO journal (user_id, time, message) VALUES ($id, NOW(), 'deluser');";
mysql_query($query2, $mysql) or die(mysql_error());;

header('Location: database.php');
?>
