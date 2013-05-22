<?php
  session_start();
  if($_GET['button']=='Добавить'){
    $query="INSERT INTO operator SET name='".mysql_escape_string($_GET['name'])."', position='".mysql_escape_string($_GET['position'])."', card_id='".$_GET['card_id']."', updated_at='".date("Y-m-d H:i:s")."'";
    mysql_query($query) or die("Err: query");
    header("Location: database.php"); exit;
  }
?>
