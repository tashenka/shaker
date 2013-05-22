<html>

<form action="add-u.php" method="get">

<table class="table" border="1">
  <thead>
    <tr>
      <th>ФИО</th>
      <th>Должность</th>
      <th>Время</th>
      <th>№ карты</th>
      <th>Зеленая</th>
      <th>Желтая</th>
      <th>Красная</th>
    </tr>
  <thead>
  <tbody>

   <tr>
        <td><?php echo $row['name']; ?></td>
	<td><?php echo $row['position']; ?></td>
<!--	<td><?php echo $row['time']; ?></td> -->
	<td><?php echo $row['card_id']; ?></td>
	<td><input type="radio" name="access1" value="y1">Да
	    <input type="radio" name="access1" value="n1">Нет
	</td>
	<td><input type="radio" name="access2" value="y2">Да
	    <input type="radio" name="access2" value="n2">Нет
	</td>
	<td><input type="radio" name="access3" value="y3">Да
	    <input type="radio" name="access3" value="n3">Нет
	</td>
   </tr>


</tbody>
<input type="submit" name="button" value="Добавить" />  
</form>

</html>
