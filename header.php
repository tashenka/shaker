<head>
  <link href="css/bootstrap.css" rel="stylesheet">
</head>
<ul class="nav nav-tabs">
  <?php $file_name = basename($_SERVER['REQUEST_URI']); ?>
  <li class="<?php echo ($file_name == 'index.php')? 'active' : '' ?>">
    <a href="index.php">Схема порта</a>
  </li>
  <li class="<?php echo ($file_name == 'database.php')? 'active' : '' ?>">
    <a href="database.php">БД Сотрудников</a>
  </li>
  <li class="<?php echo ($file_name == 'add-user.php')? 'active' : '' ?>">
    <a href="add-user.php">Добавить сотрудника</a>
  </li>
  <li class="<?php echo ($file_name == 'access.php')? 'active' : '' ?>">
    <a href="access.php">Проход в зоны</a>
  </li>
</ul>
