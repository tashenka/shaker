<head>
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/application.css" rel="stylesheet">
  <script type="text/javascript" src="javascripts/bootstrap.js"></script>
  <script type="text/javascript" src="javascripts/jquery-2.0.1.min.js"></script>
  <script type="text/javascript" src="javascripts/application.js"></script>
  <script type="text/javascript" src="javascripts/jqClock.min.js"></script>
</head>
<div class="navbar">
  <div class="navbar-inner">
<ul class="nav">
  <?php $file_name = basename($_SERVER['REQUEST_URI']); ?>
  <li class="<?php echo ($file_name == 'index.php' || $file_name == '')? 'active' : '' ?>">
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
  <li>
    <div id="clock"></div>
  </li>
 </div>
</div>
</ul>
