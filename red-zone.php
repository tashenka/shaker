<?php
include 'header.php';
include 'config.php';

$area = $_GET['area'];
$users = mysql_query("SELECT DISTINCT users.name FROM journal INNER JOIN users WHERE journal.user_id = users.id AND journal.zone = 'red' and journal.allowed = 1 and users.deleted = 0 ORDER BY time DESC", $mysql);
$users_access = mysql_query("SELECT * FROM users WHERE zone_red = 1 and users.deleted = 0", $mysql);
?>



<div class="hero-unit">
  <h1 align="center">Красная зона</h1>
  <table width="100%" border="0">
  <tr>
  <td width="50%">
	    <h2 align="center">Изображение зоны:<h2>
<?php if($area == '1'): ?>
		<img src="images/red1.jpg" style="width:100%" class="img-rounded">
<?php endif; ?>
<?php if($area == '2'): ?>
		<img src="images/red2.jpg" style="width:100%" class="img-rounded">
<?php endif; ?>
<?php if($area == '3'): ?>
		<img src="images/red3.jpg" style="width:100%" class="img-rounded">
<?php endif; ?>
<?php if($area == '4'): ?>
		<img src="images/red3.jpg" style="width:100%" class="img-rounded">
<?php endif; ?>
	</td>
	<td rowspan="2">
	  <h2 align="center">Данные о зоне:</h2>
	    <h3 align="center">Информация о сотрудниках</h3>
	  <p>Имеют право доступа:</p>
<ul>
  <?php while ($row_y = mysql_fetch_assoc($users_access)): ?>
<li><?php echo $row_y['name']; ?></li>
  <?php endwhile ?>
    </ul>
	  <p>Находятся: <?php echo $user['']; ?></p>

    <ul>
  <?php while ($row_y = mysql_fetch_assoc($users)): ?>
<li><?php echo $row_y['name']; ?></li>
  <?php endwhile ?>
    </ul>
	</td>
  </tr>
  <tr>
	<td>
	  <h2 align="center">Аппаратные составляющие:</h2>
		<ul>
		<li>Устройство идентификации,двусторонний считыватель</li>
		<li>Турникет</li>
		<li>Картоприемник</li>
		<br>
		<li>Cчитыватель биометрических данных</li>
		<br>
		<li>Шлюзовая кабина</li>
		<li>Cчитыватель биометрических данных</li>
	   </ul>
	</td>
  </tr>
  </table>
</div>
</html>

