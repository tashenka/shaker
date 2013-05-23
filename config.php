<?php
  $mysql = mysql_connect('localhost', 'root', 'root');
  mysql_query("SET NAMES utf8");
  $db = mysql_select_db('operator', $mysql);
  //header("Content-Type: text/html; charset=UTF-8");
?>
