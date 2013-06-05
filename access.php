<html>
<?php
include 'header.php';
include 'config.php';
$id = mysql_escape_string($_GET['id']);
$zone = mysql_escape_string($_GET['zone']);
$query = mysql_query("SELECT * FROM users WHERE id = $id", $mysql);
$users = mysql_query("SELECT * FROM users WHERE id != $id", $mysql);
$user = mysql_fetch_assoc($query);
$array = array();

$a_granted = $user["zone_$zone"];
$access_granted = ($a_granted == '1')? 'true' : 'false';

$datetime = date("Y-m-d H:i:s");

$q = "insert into journal (user_id, zone, allowed, time) values ($id, '$zone', $a_granted, NOW());";
$result = mysql_query($q, $mysql) or die(mysql_error());


function braces($n)
{
    return("'$n'");
}
?>

  <script type="text/javascript">
  $(function(){
    var access_granted = <?php echo $access_granted ?>;
    var i = 0;                     //  set your counter to 1
    <?php while ($row = mysql_fetch_assoc($users)): ?>
<?php $array[]=$row['name']; ?>
    <?php endwhile ?>
    var array = [<?php echo join(array_map('braces', $array), ',') ?>];
    var count = array.length+1;

    function myLoop () {           //  create a loop function
      setTimeout(function () {    //  call a 3s setTimeout when the loop is called
        $("#database_scan").text(array[i]);
        i++;                     //  increment the counter
        $(".progress > .bar").css('width', (i/count)*100+'%');

        if (i < count) {            //  if the counter < 10, call the loop function
          myLoop();             //  ..  again which will trigger another 
        }                        //  ..  setTimeout()
        else{
          $("#action").fadeOut();
          //$("#finger_scanner").fadeOut();
          $("#finger_scanner").attr("src","images/white_finger.jpg");


<?php if($zone=="red"): ?>
          $("#tongue_scanner").fadeIn();
          $("#tongue_scanner2").fadeIn();
<?php endif; ?>


          if(access_granted){
          $("#access_granted").fadeIn();
          }else{
          $("#access_denied").fadeIn();
          }
          

        }

      }, 500)
    }

    myLoop();                      //  start the loop
  });
</script>

<div class="container">
<div class="row">
  <div class="span6">
    <h1>ФИО:<?php echo $user['name']; ?></h1>
    <h2>Card: <?php echo $user['card_id']; ?></h2>
  </div>
  <div class="span6">
    <div id="action">
    <div class="progress">
      <div class="bar" style="width: 0%;"></div>
    </div>
    <span id="database_scan"></span>
    </div>
    <div class="access">
      <h1 id="access_granted">Доступ РАЗРЕШЕН</h1>
      <h1 id="access_denied">Доступ ЗАПРЕЩЕН</h1>
    </div>
  </div>
</div>
<?php if(! $_GET['card'] == 'true' ): ?>
<div class="row">
  <div class="span3">
    <img id="finger_scanner2" src="images/white_finger.jpg"/>
  </div>
  <div class="span3">
    <img id="finger_scanner" src="images/finger_scanner.gif"/>
  </div>
  <div class="span3">
    <img id="tongue_scanner" style="display:none" src="images/tongue.jpg"/>
  </div>
  <div class="span3">
    <img id="tongue_scanner2" style="display:none" src="images/tongue.jpg"/>
  </div>
</div>
<?php endif; ?>

</div>


</html>
