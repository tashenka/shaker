<html>
<?php
include 'header.php';
include 'config.php';

$id = mysql_escape_string($_GET['id']);

$users = mysql_query("SELECT * FROM users WHERE id = $id", $mysql);
$user = mysql_fetch_assoc($users);
?>

<div class="hero-unit">
<img src="images/users/<?php echo $user['id'] ?>.jpg" style="width:100px" class="img-rounded">
  <h1><?php echo $user['name']; ?></h1>
  <p>Должность: <?php echo $user['position']; ?></p>
  <p>Сотрудник добавлен: <?php echo $user['created_at']; ?></p>
  <p>Номер карты доступа: <?php echo $user['card_id']; ?></p>
  <p>Доступ в зоны:</p>
  <ul>
    <?php if($user['zone_green']): ?>
    <li>Зеленая</li>
    <?php endif; ?>
    <?php if($user['zone_yellow']): ?>
    <li>Желтая</li>
    <?php endif; ?>
    <?php if($user['zone_red']): ?>
    <li>Красная</li>
    <?php endif; ?>
  </ul>
</div>
</html>
