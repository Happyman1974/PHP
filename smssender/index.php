<?php
/**
 * Created by IntelliJ IDEA.
 * User: user
 * Date: 03.10.15
 * Time: 17:21
 
 CREATE TABLE `sms` (
  `number` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=koi8r;
 
 
 */
include 'dbconfig.php';
?>
 
 
<form method="get" action="send.php">
 <h3>Введите время формат(часы:минуты)</h3>
 <input type="time" name="time"><br>
 <h3>Введите текст СМС для рассылки</h3>
 <input type="text" name="text" maxlength="690"><br> // СМС не более 690 символов"
 <h3>Пароль</h3>
 <input type="text" name="token"><br><br>
 <input type="submit" name="submit" value="Отправить СМС">
</form>
