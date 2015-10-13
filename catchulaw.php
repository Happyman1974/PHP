#!/usr/bin/php -q
<?php

//результат ложим(перезатираем) в файл
`asterisk -rx "sip show channels" | grep ulaw > 111.txt`;

$mes = `asterisk -rx "sip show channels" | grep ulaw`;

$to = 's.shurubov@irkpk.ru';
$subject = 'Внимание Ulaw';
$subject = iconv('UTF-8', 'Windows-1251', $subject); //делаем кракозябры на русском
$message = date("d/m/y H:i:s").$mes;
//$message = date("d/m/y H:i:s")."\n\n кто то использует ulaw";
//$message = iconv('UTF-8', 'Windows-1251', $message); //делаем кракозябры на русском
$message = iconv('UTF-8', 'koi8-r', $message); //делаем кракозябры на русском
$subheaders = 'From: Телефония';
$subheaders = iconv('UTF-8', 'Windows-1251', $subheaders); //делаем кракозябры на русском
$headers = $subheaders . "\r\n" .

'Reply-To: s.shurubov@irkpk.ru' . "\r\n" .
'X-Mailer: PHP/' . phpversion();

// Пример вывода: Размер файла
$filename = '/root/111.txt';
echo '<br>Размер файла ' . $filename . ': ' . filesize($filename) . ' байт<br>';
if (filesize($filename) != 0)

{
echo "<br>hi Sergey";
mail($to, $subject, $message, $headers);
}
?>
