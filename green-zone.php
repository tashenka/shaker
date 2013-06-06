<?php
include 'header.php';
include 'config.php';
?>
<div class="hero-unit">
  <h1 align="center">Зеленая зона</h1>
  <table width="100%" border="2">
  <tr>
  <td width="50%">
	    <h2 align="center">Схема порта:<h2>
		<img src="images/port.jpg" style="width:100%" class="img-rounded">
	</td>
	<td>
	  <h2 align="center">Данные о зоне:</h2>
	</td>
  </tr>
  <tr>
	<td>
	  <h2 align="center">Аппаратные составляющие:</h2>
		
	</td>
	<td>
	  <h2 align="center">Данные о сотрудниках</h2>
	  <p>Имеют право доступа: <?php echo $user['']; ?></p>
	  <p>Находятся: <?php echo $user['']; ?></p>
	</td>
  </tr>
  <table>
</div>
</html>
