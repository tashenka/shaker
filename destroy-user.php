<?php
include 'config.php';

$id = mysql_escape_string($_GET["id"]);


$query = "DELETE FROM users where id = $id;";

$result = mysql_query($query, $mysql) or die(mysql_error());;

header('Location: database.php');
?>
