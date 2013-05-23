<html>
<?php
include 'header.php';
include 'config.php';
?>
<h2>Добавление сотрудника/посетителя</h1>

<form action="create-user.php" method="post">
  <input id="name" name="name" type="text" placeholder="Введите ФИО" />
  <br/>
  <input id="position" name="position" type="text" placeholder="Введите должность" />
  <br/>
  <input id="card_id" name="card_id" type="text" placeholder="Введите номер карты доступа" />
  <br/>
  <label class="checkbox">
    <input id="zone_green" name="zone_green" type="checkbox" value="1"> Зеленая зона
  </label>
  <label class="checkbox">
    <input id="zone_yellow" name="zone_yellow" type="checkbox" value="1"> Желтая зона
  </label>
  <label class="checkbox">
    <input id="zone_red" name="zone_red" type="checkbox" value="1"> Красная зона
  </label>

  <label class="checkbox">
    <input id="temprary" name="temprary" type="checkbox" value="1"> Временный доступ
  </label>
  <input name="commit" type="submit" value="Создать пользователя" />
</form>

</html>
