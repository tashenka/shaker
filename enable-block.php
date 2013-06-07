<?php
include 'config.php';
$query2 = "INSERT INTO journal (time, message) VALUES (NOW(), 'block');";
mysql_query($query2, $mysql) or die(mysql_error());;

echo 'OK';
?>
