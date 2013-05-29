<html>
<?php
include 'header.php';
include 'config.php';

$users = mysql_query("SELECT * FROM users", $mysql);
?>

<table class="table">
  <thead>
    <tr>
      <th colspan="4"></th>
      <th colspan="3">Разрешение допуска</th>
    </tr>
    <tr>
      <th>ФИО</th>
      <th>Должность</th>
      <th>Время</th>
      <th>№ Карты</th>
      <th>Зеленая</th>
      <th>Желтая</th>
      <th>Красная</th>
      <th>Сканер отпечатков</th>
    </tr>
  <thead>
  <tbody>
<?php while ($row = mysql_fetch_assoc($users)): ?>
<tr class="<?php echo $row['temprary']? 'warning' : '' ?>">
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['position']; ?></td>
<td><?php echo $row['time']; ?></td>
<td><?php echo $row['card_id']; ?></td>
<td><?php echo ($row['zone_green'] ? 'ДА' : 'НЕТ'); ?></td>
<td><?php echo ($row['zone_yellow'] ? 'ДА' : 'НЕТ'); ?></td>
<td><?php echo ($row['zone_red'] ? 'ДА' : 'НЕТ'); ?></td>
<td>
<a class="btn btn-success" href="access.php?id=<?php echo $row['id'] ?>&zone=green">Сканер</a>
<a class="btn btn-warning" href="access.php?id=<?php echo $row['id'] ?>&zone=yellow">Сканер</a>
<a class="btn btn-danger" href="access.php?id=<?php echo $row['id'] ?>&zone=red">Сканер</a>
</td>
</tr>
<?php endwhile ?>
  </tbody>
</table>
</html>

