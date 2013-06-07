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

<table border="1" width="100%">
<tr>
<td width="50%">
<div class="container">     
    <div class="span12">      
      <img class="port" src="images/port_hover.jpg" usemap="#map" />
<map id="map" name="map"><area shape="rect" alt="" title="" coords="38,147,58,461" href="green-zone.php" target="" /><area shape="rect" alt="" title="" coords="67,147,612,200" href="green-zone.php" target="" /><area shape="rect" alt="" title="" coords="84,273,212,460" href="green-zone.php" target="" /><area shape="rect" alt="" title="" coords="191,202,613,271" href="green-zone.php" target="" /><area shape="rect" alt="" title="" coords="685,145,919,208" href="green-zone.php" target="" /><area shape="rect" alt="" title="" coords="66,398,81,461" href="green-zone.php" target="" /><area shape="rect" alt="" title="" coords="615,210,922,272" href="" target="" /><area shape="rect" alt="" title="" coords="213,274,921,345" href="green-zone.php" target="" /><area shape="rect" alt="" title="" coords="214,400,749,459" href="green-zone.php" target="" /><area shape="rect" alt="" title="" coords="270,348,749,399" href="green-zone.php" target="" /><area shape="rect" alt="" title="" coords="752,433,922,460" href="green-zone.php" target="" /><area shape="rect" alt="" title="" coords="859,349,921,430" href="green-zone.php" target="" /><area shape="rect" alt="" title="" coords="123,202,134,270" href="yellow-zone.php?area=1" target="" /><area shape="rect" alt="" title="" coords="68,202,96,271" href="yellow-zone.php?area=1" target="" /><area shape="rect" alt="" title="" coords="162,203,190,269" href="yellow-zone.php?area=1" target="" /><area shape="rect" alt="" title="" coords="98,202,116,238" href="yellow-zone.php?area=1" target="" /><area shape="rect" alt="" title="" coords="98,241,118,273" href="red_zone.php.php?area=2" target="" /><area shape="rect" alt="" title="" coords="136,203,156,215" href="yellow-zone.php?area=1" target="" /><area shape="rect" alt="" title="" coords="136,242,155,270" href="yellow-zone.php?area=1" target="" /><area shape="rect" alt="" title="" coords="60,361,81,391" href="red_zone.php?area=1" target="" /><area shape="rect" alt="" title="" coords="67,273,80,359" href="green-zone.php" target="" /><area shape="rect" alt="" title="" coords="136,215,159,240" href="red_zone.php?area=3" target="" /><area shape="rect" alt="" title="" coords="215,349,269,399" href="yellow-zone.php?area=2" target="" /><area shape="rect" alt="" title="" coords="617,150,682,206" href="yellow-zone.php?area=3" target="" /><area shape="rect" alt="" title="" coords="753,348,803,430" href="yellow-zone.php?area=4" target="" /><area shape="rect" alt="" title="" coords="805,392,855,432" href="yellow-zone.php?area=4" target="" /><area shape="rect" alt="" title="" coords="836,347,855,390" href="yellow-zone.php?area=4" target="" /><area shape="rect" alt="" title="" coords="807,348,834,389" href="red-zone.php.area=4" target="" /><!-- Created by Online Image Map Editor (http://www.maschek.hu/imagemap/index) --></map>
    </div> 


</td>

<td>
		<table border ="2">
			<tr>
			<td>
			<div class="row">      
			 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#greenModal">Зеленая зона</button>
			<!--  <div class="span1">       
			  </div>-->
		<br><br>	  
			<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#yellowModal">Желтая зона</button>
			  <!--<div class="span1 offset1">       
			  </div> -->
		<br><br>
		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#redModal">Красная зона</button>
		<br><br>
		<!--      <div class="span1 offset8">      
			  </div> 
			</div> 
		</div>-->
			</td>
			<td><br><br><br></td>
			<td>
		<button onclick="$.ajax({url: 'enable-unblock.php',context: document.body});document.getElementById('player-open').play()" class="btn btn-warning">Разблокировать все</button>
		<br><br><button onclick="$.ajax({url: 'enable-block.php',context: document.body});document.getElementById('player-close').play()" class="btn btn-danger">Заблокировать все</button>
		<br><br><button type="button" data-toggle="modal" data-target="#sirenModal" onclick="document.getElementById('player-siren').play();$.ajax({url: 'enable-siren.php',context: document.body})" class="btn btn-danger">Включить сигнализацию</button>
			</td>
			</tr>
		</table>
	</td>
</tr>
</table>
</html>

