<html>
<?php
include 'config.php';
include 'header.php';

$green_zone = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) AS count FROM journal WHERE zone = 'green' and allowed = 1;", $mysql))['count'];
$yellow_zone = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) AS count FROM journal WHERE zone = 'yellow' and allowed = 1;", $mysql))['count'];
$red_zone = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) AS count FROM journal WHERE zone = 'red' and allowed = 1;", $mysql))['count'];

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

