<?php

$strExten=$_POST['number'];
if (is_numeric($strExten))
{
$oSocket=fsockopen("localhost",5038,$errnum,$errdesc) or die("Connection to host failed");
fputs($oSocket, "Action: login\r\n");
fputs($oSocket, "Events: off\r\n");
fputs($oSocket, "Username: web_call\r\n");
fputs($oSocket, "Secret: secret\r\n\r\n");
fputs($oSocket, "Action: originate\r\n");
fputs($oSocket, "Channel: SIP/to-router/7$strExten\r\n");
fputs($oSocket, "WaitTime: 30000\r\n");
fputs($oSocket, "CallerId: 1234567\r\n");
fputs($oSocket, "Exten: 1111\r\n");
fputs($oSocket, "Context: full\r\n");
fputs($oSocket, "Priority: 1\r\n\r\n");
fputs($oSocket, "Action: Logoff\r\n\r\n");
sleep (1);
fclose($oSocket);
?>
<p>
<table border="1" bordercolor="#8CAAE6" cellpadding="3" cellspacing="1">
<tr><td>
<font size="2" face="verdana,georgia" color="#0066CC">Производится вызов ... Если телефон не позвонил в течении минуты попробуйте.<br><a href="/<?php echo $_SERVER['PHP_SELF'] ?>">Еще раз</a></font>
</td></tr>
</table>
</p>
<?php
}
else
{
?>
<p>
<table border="1" bordercolor="#8CAAE6" cellpadding="3" cellspacing="1">
<tr><td>
<font size="2" face="verdana,arial,georgia" color="#0066CC">&nbsp;Звонок с сайта на Ваш номер(495XXXXXXX) или (9XXXXXXXXX)</font>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" >
<input type="text" size="15" maxlength="10" name="number" style="vertical-align: bottom">&nbsp;
<input type="image" src="/tel.gif" width="22" height="24" align="bottom" value="Submit" alt="Позвонить!">
</form>
</td></tr>
</table>
</p>
<?php
}
?>
