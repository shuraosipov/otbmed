<?php
require_once 'config/config.php';

echo "<a href='index.php'>Главная</a> | ";
echo "<a href='employee.php'>Сотрудники</a> | ";
echo "<a href=\"expiraton.php\">Отчеты</a><br><br><br>";
$start_date = $_GET['y'].$_GET['m'].$_GET['d'];
$expiration_date = $_GET['yn'].$_GET['mn'].$_GET['dn'];

echo <<<HEREDOC

<table width="100%" border="0">

<tr>
	<td width="25%" align="center">СОГЛАСОВАНО</td>
	<td width="50%"></td>
	<td width="25%" align="center">УТВЕРЖДАЮ</td>
</tr>

<tr>
	<td>Управление Роспотребнадзора по РК</td>
	<td></td>
	<td>Директор _________________________</td>
</tr>

<tr>
	<td>_____________Подпись ____________ФИО</td>
	<td></td>
	<td>_____________Подпись ____________ФИО</td>
</tr>

<tr>
	<td>"_______" ___________________20______г.</td>
	<td></td>
	<td>"_______" ___________________20______г.</td>
</tr>


</table>
<br><BR>



<center>
<b>ПЕРЕЧЕНЬ</b>
<br>
<B> работников с вредными условиями труда по ____________ для прохождения медосмотра на 20____ год.</B>
<br>
<B>__________________________________, в соответствии с приказом № ________ от _______________</B>
</center>
          
<br><BR>


HEREDOC;

echo <<<HEREDOC
<table border="1" align="center">
	<tr>
		<td align="center">№</td>
		<td align="center" >Ф.И.О.</td>
		<td align="center" >Адрес</td>
		<td align="center" >Год рождения</td>
		<td align="center">Профессия<br>(должность)</td>
		<td align="center" >Вредные условия</td>
		<td align="center">Наименование медосмотра</td>
		<td align="center">Стаж</td>
		<td align="center">Лабораторные инстр. исследования</td>
		<td align="center">Привлек. спец.</td>
		<td align="center">Послений год прохождения мед-ра</td>
		<td align="center">Следующий год прохождения мед-ра</td>
	</tr>
	<tr>
		<td align="center">1</td>
		<td align="center">2</td>
		<td align="center">3</td>
		<td align="center">4</td>
		<td align="center">5</td>
		<td align="center">6</td>
		<td align="center">7</td>
		<td align="center">8</td>
		<td align="center">9</td>
		<td align="center">10</td>
		<td align="center">11</td>
		<td align="center">12</td>
	</tr>



		
HEREDOC;



$q_checkup_expirate = "Select * 
						FROM checkup 
						WHERE next 
						BETWEEN '$start_date' AND '$expiration_date'";
$result = mysql_query($q_checkup_expirate);
while ($q = mysql_fetch_array($result))
{
	$checkup_linkkey = $q[1];
	
	
	$query = "SELECT name,surname,secondname,department.title,job.title, employee_id, bad_condition.title
	FROM employee,department,job,bad_condition
	WHERE employee_id = '$checkup_linkkey'
	AND employee.department_id = department.department_id
	AND employee.job_id = job.job_id
	AND bad_condition.bad_condition_linkkey = '$checkup_linkkey'
	GROUP BY surname";
	$result_employee = mysql_query($query);
	while ($r = mysql_fetch_array($result_employee))
	{
echo <<<HEREDOC
	<tr>
		<td align="center">$r[5]</td>
		<td align="center">$r[0] $r[1] $r[2]</td>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
		<td align="center">$r[4]</td>
		<td align="center">$r[6]</td>
		<td align="center">$q[2]</td>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
		<td align="center">$q[3]</td>
		<td align="center">$q[4]</td>
	</tr>	
	<tr>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
	</tr>
HEREDOC;
	}
	

}


echo "</table>";
echo <<<HEREDOC
<br><br>
<center>
_______________/______________<br>
    подпись         Ф.И.О. <br>
    
    

_______________/______________<br>
	подпись         Ф.И.О.<br>
	
</center>
<br><br>
HEREDOC;

