<html>
<?php
include 'config.php';
include 'header.php';

$green = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) AS count FROM journal WHERE zone = 'green' and allowed = 1;", $mysql));
$green_zone = $green['count'];
$yellow = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) AS count FROM journal WHERE zone = 'yellow' and allowed = 1;", $mysql));
$yellow_zone = $yellow['count'];
$red = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) AS count FROM journal WHERE zone = 'red' and allowed = 1;", $mysql));
$red_zone = $red['count'];

$red_users = mysql_query("SELECT * FROM journal INNER JOIN users WHERE journal.user_id = users.id AND journal.zone = 'red' and journal.allowed = 1 ORDER BY time DESC", $mysql);
?>
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
<?php while ($row = mysql_fetch_assoc($red_users)): ?>
  <h4>Список:</h4>
  <ol>
<li><?php echo $row['name']; ?></li>
  </ol>
<?php endwhile ?>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>


<div class="container">     
    <div class="span12">      
      <div class="port"></div>
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

