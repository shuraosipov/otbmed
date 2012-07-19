<?php
require_once 'config/config.php';
error_reporting(E_ALL);
echo "<a href='index.php'>Главная</a> | ";
echo "<a href='employee.php'>Сотрудники</a> | ";
echo "<a href=\"expiraton.php\">Отчеты</a><br><br><br>";


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
		<td align="center" >Вредные производственные факторы</td>
		
		<td align="center">Стаж</td>
		<td align="center">Лабораторные инстр. исследования</td>
		<td align="center">Привлек. спец.</td>
		<td align="center">Послений год прохождения мед-ра</td>
		
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
		
	</tr>
	


		
HEREDOC;

$start_date = $_GET['y'].$_GET['m'].$_GET['d'];
$expiration_date = $_GET['yn'].$_GET['mn'].$_GET['dn'];

$counter = '1';




$q_checkup_expirate =  "  SELECT title, employee.department_id
						  FROM department,employee 
						  WHERE department.department_id = employee.department_id
						  AND last_checkup
						  BETWEEN '$start_date'
						  AND '$expiration_date'
						  GROUP BY title
						  ORDER BY employee.department_id";

$result = mysql_query($q_checkup_expirate) or die ("Ошибка в 1 запросе".mysql_error());
while ($q = mysql_fetch_array($result))
{
$department_id = $q[1];

echo "<tr><td colspan='100%'><b>$q[0]</b></td></tr>";

$q_e_data = "SELECT employee_id, surname, name, secondname, job.title, last_checkup
			 FROM employee, job
			 WHERE department_id = '$department_id'
			 AND last_checkup
			 BETWEEN '$start_date'
			 AND '$expiration_date'
			 AND job.job_id = employee.job_id";
$r_e_data = mysql_query($q_e_data) or die ("Ошибка в 2 запросе".mysql_error());
while ($q_e = mysql_fetch_array($r_e_data))
{
	
	

echo "<tr>
		<td>$counter</td>
		<td>$q_e[2] $q_e[1] $q_e[3]</td>
		<td>&nbsp</td>
		<td>&nbsp</td>
		<td>$q_e[4]</td>";
echo 	"<td>";
$counter++;

$q_bcfe = "SELECT bad_condition.title
		 FROM bad_condition, bad_condition_for_employee
		 WHERE bad_condition.bad_condition_id = bad_condition_for_employee.bc_id
		 AND bad_condition_for_employee.bcfe_linkkey = '$q_e[0]'";
$r_bcfe = mysql_query($q_bcfe) or die ("Ошибка в 3 запросе". mysql_error());
while ($q_bc = mysql_fetch_array($r_bcfe))
{
	echo "<ul>";
		echo "<li>$q_bc[0]</li>";
	echo "</ul>";
}

echo   "</td>
		<td>&nbsp</td>
		<td>&nbsp</td>
		<td>&nbsp</td>
		<td>$q_e[5]</td>
	  </tr>";
}

}





echo "</table>";


$query_count = "SELECT employee_id, count(*) 
				FROM employee
				WHERE last_checkup
				BETWEEN '$start_date'
				AND '$expiration_date'";
$result_count = mysql_query($query_count) or die ("Ошибка в 4 запросе".mysql_error());
$q_c = mysql_fetch_array($result_count);





echo <<<HEREDOC
<br><br>
<center>
Подлежит осмотру - $q_c[1] человек <br><br>
<br><br>

_______________/______________<br>
    подпись         Ф.И.О. <br>
    
    

_______________/______________<br>
	подпись         Ф.И.О.<br>
	
</center>
<br><br>
HEREDOC;

