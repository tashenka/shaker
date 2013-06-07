<html>
<?php
include 'header.php';
include 'config.php';

$journal = mysql_query("SELECT * FROM journal LEFT OUTER JOIN users ON journal.user_id = users.id ORDER BY time DESC", $mysql);
?>
<a href="journal.xls.php" class="btn btn-success">Сохранить журнал в Excel файл</a>

<table class="table">
  <thead>
    <tr>
      <th>Время</th>
      <th>Сообщение</th>
      <th>Вход/Выход</th>
      <th>ФИО</th>
      <th>Должность</th>
      <th>№ Карты</th>
      <th>Зона</th>
      <th>Отпечаток пальца</th>
      <th>Отпечаток языка</th>
    </tr>
  <thead>
  <tbody>
<?php while ($row = mysql_fetch_assoc($journal)): ?>
  <?php
    if(!$row['message']){
    switch ($row['allowed']) {
    case 1:
        $tr_class = 'success';
        break;
    case 0:
        $tr_class = 'error';
        break;
}
    }

    switch ($row['message']) {
    case 'alarm':
      $message = 'Включена аварийная сигнализация';
      break;
    case 'adduser':
      $message = 'Добавлен пользователь';
      break;
    case 'deluser':
      $message = 'Удален пользователь';
      break;
    case 'unblock':
      $message = 'Входы/выходы разблокированы';
      break;
    case 'block':
      $message = 'Входы/выходы заблокированы';
      break;
    default:
      $message = 'Доступ';
    }
?>
  <tr class="<?php echo $tr_class?>">
  <td><?php echo $row['time']; ?></td>
  <td><?php echo $message ?></td>
  <td><?php echo $row['message'] ? '' : 'Вход' ?></td>
  <td><?php echo $row['name']; ?></td>
  <td><?php echo $row['position']; ?></td>
  <td><?php echo $row['card_id']; ?></td>
  <td><?php echo $row['zone']; ?></td>
  <td><?php echo $row['message'] ? '' : 'Прошел' ?></td>
  <td>
    <?php if(!$row['message']): ?>
    <?php echo $row['allowed'] ? "Прошел" : "Сканер не сработал" ?>
    <?php endif; ?>
</td>
  </tr>
<?php endwhile ?>
  </tbody>
</table>
