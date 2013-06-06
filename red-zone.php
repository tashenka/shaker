<?php
include 'header.php';
include 'config.php';

$area = $_GET['area'];
?>


<?php if($area == '1'): ?>

<div class="hero-unit">
  <h1 align="center">Красная зона</h1>
  <table width="100%" border="0">
  <tr>
  <td width="50%">
	    <h2 align="center">Изображение зоны:<h2>
		<img src="images/red1.jpeg" style="width:100%" class="img-rounded">
	</td>
	<td rowspan="2">
	  <h2 align="center">Данные о зоне:</h2>
	    <h3 align="center">Информация о сотрудниках</h3>
	  <p>Имеют право доступа: <?php echo $user['']; ?></p>
	  <p>Находятся: <?php echo $user['']; ?></p>
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

<?php endif; ?>

<?php if($area == '2'): ?>
<div class="hero-unit">
  <h1 align="center">Красная зона</h1>
  <table width="100%" border="0">
  <tr>
	<td width="50%">
	    <h2 align="center">Изображение зоны:<h2>
		<img src="images/red2.jpg" style="width:100%" class="img-rounded">
	</td>
	  <td rowspan="2">
	  <h2 align="center">Данные о зоне:</h2>
	    <h3 align="center">Информация о сотрудниках</h3>
	  <p>Имеют право доступа: <?php echo $user['']; ?></p>
	  <p>Находятся: <?php echo $user['']; ?></p>
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

<?php endif; ?>

<?php if($area == '3'): ?>
<div class="hero-unit">
  <h1 align="center">Красная зона</h1>
  <table width="100%" border="0">
  <tr>
	<td width="50%">
	    <h2 align="center">Изображение зоны:<h2>
		<img src="images/red3.jpg" style="width:100%" class="img-rounded">
	</td>
	<td rowspan="2">
	  <h2 align="center">Данные о зоне:</h2>
	    <h3 align="center">Информация о сотрудниках</h3>
	  <p>Имеют право доступа: <?php echo $user['']; ?></p>
	  <p>Находятся: <?php echo $user['']; ?></p>
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

<?php endif; ?>
