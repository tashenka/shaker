<html>
<?php
include 'header.php';
include 'config.php';

$journal = mysql_query("SELECT * FROM journal INNER JOIN users WHERE journal.user_id = users.id ORDER BY time DESC", $mysql);
?>
<table class="table">
  <thead>
    <tr>
      <th>Время</th>
      <th>ФИО</th>
      <th>Должность</th>
      <th>№ Карты</th>
      <th>Зона</th>
    </tr>
  <thead>
  <tbody>
<?php while ($row = mysql_fetch_assoc($journal)): ?>
  <?php
    switch ($row['allowed']) {
    case 1:
        $tr_class = 'success';
        break;
    case 0:
        $tr_class = 'error';
        break;
}
?>
  <tr class="<?php echo $tr_class?>">
  <td><?php echo $row['time']; ?></td>
  <td><?php echo $row['name']; ?></td>
  <td><?php echo $row['position']; ?></td>
  <td><?php echo $row['card_id']; ?></td>
  <td><?php echo $row['zone']; ?></td>
  </tr>
<?php endwhile ?>
  </tbody>
</table>
