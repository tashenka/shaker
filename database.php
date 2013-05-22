<html>
<?php
include 'config.php';

$users = mysql_query("SELECT * FROM users", $mysql);
?>

<a href="add-user.php">Добавить сотрудника/посетителя</a>

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
<td><?php echo ($row['zone_green'] ? 'ДА' : 'НЕТ'); ?></td>
<td><?php echo ($row['zone_yellow'] ? 'ДА' : 'НЕТ'); ?></td>
<td><?php echo ($row['zone_red'] ? 'ДА' : 'НЕТ'); ?></td>
</tr>
<?php endwhile ?>
  </tbody>
</table>
</html>

