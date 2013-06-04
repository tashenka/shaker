<?php
include 'config.php';

$name = mysql_escape_string($_POST["name"]);
$position = mysql_escape_string($_POST["position"]);
$card_id = mysql_escape_string($_POST["card_id"]);
$zone_green = $_POST["zone_green"]? 1 : 0;
$zone_yellow = ($_POST["zone_yellow"] && $zone_green)? 1 : 0;
$zone_red = ($_POST["zone_red"] && $zone_yellow)? 1 : 0;
$temprary = $_POST["temprary"]? 1 : 0;
$password = $_POST["password"];



$query = "INSERT INTO users (name, position, card_id, zone_green, zone_yellow, zone_red, temprary) VALUES ('$name','$position', '$card_id', $zone_green, $zone_yellow, $zone_red, $temprary);";



if($password == 'password'){
$result = mysql_query($query, $mysql) or die(mysql_error());;
header('Location: database.php');
}
else{
header('Location: database.php?notice_error=Неправильный+пароль');
}

?>
