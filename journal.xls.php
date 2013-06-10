<?php
include 'config.php';

$journal = mysql_query("SELECT * FROM journal LEFT OUTER JOIN users ON journal.user_id = users.id ORDER BY time DESC", $mysql);
mysql_query("DELETE FROM journal", $mysql);
$content = "";
$content .= "Время\tСообщение\tВход/Выход\tФИО\tДолжность\t№ Карты\tЗона\tОтпечаток пальца\tОтпечаток языка\n";


while($row = mysql_fetch_assoc($journal)) {
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
$content .= $row['time'];
$content .= "\t";
$content .= $message;
$content .= "\t";
$content .= ($row['message'] ? '' : 'Вход') ;
$content .= "\t";
$content .= $row['name'];
$content .= "\t";
$content .= $row['position'];
$content .= "\t";
$content .= $row['card_id'];
$content .= "\t";
$content .= $row['zone'];
$content .= "\t";
$content .= ($row['message'] ? '' : 'Прошел') ;
$content .= "\t";
if(!$row['message']){
  $content .= $row['allowed'] ? "Прошел" : "Сканер не сработал";
}
$content .= "\n";
}



$length = strlen($content);

$content = mb_convert_encoding($content, "WINDOWS-1251", "UTF-8");

header('Content-Description: File Transfer');
header('Content-Type: text/plain');//<<<<
header('Content-Disposition: attachment; filename=journal.xls');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . $length);
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Expires: 0');
header('Pragma: public');

echo $content;
exit;
?>
