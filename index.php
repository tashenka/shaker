<html>
<?php
include 'config.php';
include 'header.php';

$yellow_users = mysql_query("SELECT * FROM journal INNER JOIN users WHERE journal.user_id = users.id AND journal.zone = 'yellow' and journal.allowed = 1 ORDER BY time DESC", $mysql);
$red_users = mysql_query("SELECT * FROM journal INNER JOIN users WHERE journal.user_id = users.id AND journal.zone = 'red' and journal.allowed = 1 ORDER BY time DESC", $mysql);
$access_users = mysql_query("SELECT * FROM journal INNER JOIN users WHERE journal.user_id = users.id and journal.allowed = 0 and time > NOW()-600 ORDER BY time DESC;", $mysql);
$access =  mysql_fetch_assoc(mysql_query("SELECT COUNT(*) AS count FROM journal INNER JOIN users WHERE journal.user_id = users.id and journal.allowed = 0 and time > NOW()-600;", $mysql));
$access_count = $access['count'];
$green = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) AS count FROM journal WHERE zone = 'green' and allowed = 1;", $mysql));
$green_zone = $green['count'];
$yellow = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) AS count FROM journal WHERE zone = 'yellow' and allowed = 1;", $mysql));
$yellow_zone = $yellow['count'];
$red = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) AS count FROM journal WHERE zone = 'red' and allowed = 1;", $mysql));
$red_zone = $red['count'];

$red_users = mysql_query("SELECT * FROM journal INNER JOIN users WHERE journal.user_id = users.id AND journal.zone = 'red' and journal.allowed = 1 ORDER BY time DESC", $mysql);
?>
<?php if ($access_count != '0'): ?>
<script type="text/javascript">
$(function(){
  $("#accessModal").modal({'show':true});
});
</script>
<?php endif; ?>


<?php function showUserForWhile($user){
  echo "<li>" + $user['time'] + " " + $user['name'] + "</li>";
}
?>


    <audio id="player-open" src="audio/door_open.mp3"></audio>
    <audio id="player-close" src="audio/door_close.mp3"></audio>
    <audio id="player-siren" src="audio/siren.mp3"></audio>
    <button onclick="document.getElementById('player-open').play()" class="btn btn-warning">Разблокировать все</button>
    <button onclick="document.getElementById('player-close').play()" class="btn btn-danger">Заблокировать все</button>
    <button type="button" data-toggle="modal" data-target="#sirenModal" onclick="document.getElementById('player-siren').play()" class="btn btn-danger">Включить сигнализацию</button>

<div id="accessModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Уведомления</h3>
  </div>
  <div class="modal-body">
  <p>Человек пытался пройти в зону, к которой у него нет доступа:</p>
  <?php while ($row_a = mysql_fetch_assoc($access_users)): ?>
    <ol>
    <li><?php echo $row_a['time']; ?> <?php echo $row_a['name']; ?> <?php echo $row_a['zone']; ?></li>
    </ol>
  <?php endwhile ?>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
<div id="greenModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Зеленая Зона</h3>
  </div>
  <div class="modal-body">
  <p>Человек в зеленой зоне: <?php echo $green_zone ?></p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
<div id="yellowModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Желтая Зона</h3>
  </div>
  <div class="modal-body">
  <p>Человек в желтой зоне: <?php echo $yellow_zone ?></p>
    <h4>Список:</h4>
  <?php while ($row_y = mysql_fetch_assoc($yellow_users)): ?>
    <ol>
<li><?php echo $row_y['time']; ?> <?php echo $row_y['name']; ?></li>
    </ol>
  <?php endwhile ?>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
<div id="redModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Красная Зона</h3>
  </div>
  <div class="modal-body">
  <p>Человек в красной зоне: <?php echo $red_zone ?></p>
  <h4>Список:</h4>
<?php while ($row = mysql_fetch_assoc($red_users)): ?>
  <ol>
<li><?php echo $row['time']; ?> <?php echo $row['name']; ?></li>
  </ol>
<?php endwhile ?>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>

<div id="sirenModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Аварийный режим</h3>
  </div>
  <div class="modal-body">
    ВНИМАНИЕ, СРОЧНАЯ ЭВАКУАЦИЯ
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>

<div class="container">     
    <div class="span12">      
      <img class="port" src="images/port_hover.jpg" usemap="#map" />
<map name="map">
<!--/зел зона--><area shape="rect" coords="30,150,600,220" href="green-zone.php">
  <area shape="rect" coords="185,220,900,370" href="green-zone.php">
	<area shape="rect" coords="270,370,738,500" href="green-zone.php">
	
<!--/1 желтая зона--><area shape="rect" coords="65,200,110,250" href="yellow-zone.php?area=1">
	<area shape="rect" coords="110,250,200,300" href="yellow-zone.php?area=1">
	<area shape="rect" coords="110,200,200,250" href="red-zone.php?area=2">
	<area shape="rect" coords="65,250,110,300" href="red-zone.php?area=2">
	
<!--/2 желтая зона--><area shape="rect" coords="200,350,300,450" href="yellow-zone.php?area=2">

<!--/3 желтая зона--><area shape="rect" coords="600,150,700,250" href="yellow-zone.php?area=3">-->

<!--/4 желтая зона--><area shape="rect" coords="750,350,810,470" href="yellow-zone.php?area=4">
	<area shape="rect" coords="810,415,870,470" href="yellow-zone.php?area=4">
	<area shape="rect" coords="810,350,870,415" href="red-zone.php?area=3">
	
<!--/1 маленькая красная зона--> <area shape="circle" coords="80,400,20" href="red-zone.php?area=1">-->
</map>
    </div> 

    <div class="row">      
      <div class="span1">      
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#greenModal">Зеленая</button>
      </div> 
      <div class="span1 offset1">      
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#yellowModal">Желтая</button>
      </div> 
      <div class="span1 offset8">      
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#redModal">Красная</button>
      </div> 
    </div> 
</div>
</html>

