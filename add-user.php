<html>

<form action="add-u.php" method="get">

<table class="table">
  <thead>
    <tr>
      <th>ФИО</th>
      <th>Должность</th>
      <th>Время</th>
      <th>№ Карты</th>
      <th>Зеленая</th>
      <th>Желтая</th>
      <th>Красная</th>
    </tr>
  <thead>
  <tbody>
<?php while ($row = mysql_fetch_assoc($users)): ?>
   <tr>
  <td><?php echo $row['name']; ?></td>
	<td><?php echo $row['position']; ?></td>
	<td><?php echo $row['time']; ?></td>
	<td><?php echo $row['card_id']; ?></td>
	<td><input type="radio" name="access" value="y1">Да
		<input type="radio" name="access" value="n1">Нет
	</td>
	<td><input type="radio" name="access" value="y2">Да
		<input type="radio" name="access" value="n2">Нет
	</td>
	<td><input type="radio" name="access" value="y3">Да
		<input type="radio" name="access" value="n3">Нет
	</td>
   </tr>

<?php endwhile ?>
</tbody>
  
</form>

</html>
