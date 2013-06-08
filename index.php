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
    <!--
  <button onclick="$.ajax({url: 'enable-unblock.php',context: document.body});document.getElementById('player-open').play()" class="btn btn-warning">Разблокировать все</button>
    <button onclick="$.ajax({url: 'enable-block.php',context: document.body});document.getElementById('player-close').play()" class="btn btn-danger">Заблокировать все</button>
    <button type="button" data-toggle="modal" data-target="#sirenModal" onclick="document.getElementById('player-siren').play();$.ajax({url: 'enable-siren.php',context: document.body})" class="btn btn-danger">Включить сигнализацию</button>
	-->
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
<table border="0" width="100%"> 
<tr>
	<td width="50%" rowspan="2">   
		<div class="span12">      
		  <img class="port" src="images/port_hover.jpg" usemap="#map" />
			<map id="map" name="map"><area shape="rect" alt="" title="" coords="38,147,58,461" href="green-zone.php" target="" />

				<area shape="rect" alt="" title="" coords="30,150,600,220" href="green-zone.php" target="" />
				<area shape="rect" alt="" title="" coords="185,220,900,370" href="green-zone.php" target="" />
				<area shape="rect" alt="" title="" coords="80,300,170,500" href="green-zone.php" target="" />
				<area shape="rect" alt="" title="" coords="270,370,738,500" href="green-zone.php" target="" />
				
				<area shape="rect" alt="" title="" coords="50,220,120,260" href="yellow-zone.php?area=1" target="" />
				<area shape="rect" alt="" title="" coords="120,260,185,300" href="yellow-zone.php?area=2" target="" />
				<area shape="rect" alt="" title="" coords="185,185,200,300" href="yellow-zone.php?area=2" target="" />
				<area shape="rect" alt="" title="" coords="220,350,280,420" href="yellow-zone.php?area=1" target="" />
				<area shape="rect" alt="" title="" coords="600,170,720,220" href="yellow-zone.php?area=3" target="" />
				<area shape="rect" alt="" title="" coords="738,365,800,470" href="yellow-zone.php?area=3" target="" />
				<area shape="rect" alt="" title="" coords="800,418,860,470" href="yellow-zone.php?area=3" target="" />
				
				<area shape="rect" alt="" title="" coords="50,390,80,420" href="red-zone.php?area=4" />
				<area shape="rect" alt="" title="" coords="800,365,860,418" href="red-zone.php?area=3" target="" />
				<area shape="rect" alt="" title="" coords="120,220,185,260" href="red-zone.php?area=2" target="" />
				<area shape="rect" alt="" title="" coords="50,260,120,300" href="red-zone.php?area=1" target="" />
			</map>
		</div> 
	</td>

	<td>
				           
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#greenModal" style=" width:100%; height: 75px">Зеленая зона</button>
				<br><br>
					<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#yellowModal" style=" width:100%; height: 75px">Желтая зона</button>
				<br><br>
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#redModal" style=" width:100%; height: 75px">Красная зона</button>
	</div>
	</td>
</tr>
<tr>
	<td>
			<br><br><button onclick="$.ajax({url: 'enable-unblock.php',context: document.body});document.getElementById('player-open').play()" style=" width:100%; height: 75px">Разблокировать все</button>
			<br><br><button onclick="$.ajax({url: 'enable-block.php',context: document.body});document.getElementById('player-close').play()" style=" width:100%; height: 75px">Заблокировать все</button>
			<br><br><button type="button" data-toggle="modal" data-target="#sirenModal" onclick="document.getElementById('player-siren').play();$.ajax({url: 'enable-siren.php',context: document.body})" style=" width:100%; height: 75px">Включить сигнализацию</button>
	</td>

</tr>
</table>
</html>

