<?php
include 'config.php';

$journal = mysql_query("SELECT * FROM journal INNER JOIN users WHERE journal.user_id = users.id ORDER BY time DESC", $mysql);
mysql_query("DELETE FROM journal", $mysql);
?>
Время, Вход/Выход, ФИО, Должность, № Карты, Зона, Отпечаток пальца, Отпечаток языка
<?php while ($row = mysql_fetch_assoc($journal)): ?>
  <?php echo $row['time']; ?></td>
  Вход
  <?php echo $row['name']; ?></td>
  <?php echo $row['position']; ?></td>
  <?php echo $row['card_id']; ?></td>
  <?php echo $row['zone']; ?></td>
  Прошел</td>
  <td><?php echo $row['allowed'] ? "Прошел" : "Сканер не сработал" ?> </td>
  </tr>
<?php endwhile ?>
