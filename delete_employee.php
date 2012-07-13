<?php
require_once 'config/config.php';

$employee_id = $_GET['employee_id'];
echo "Вы уверены, что хотите удалить все данные о сотруднике?";


echo <<<HEREDOC

<form method="GET" action="delete_employee.php">
	<input type="hidden" name="employee_id" value='$employee_id'>
	<input type="submit" name="delete_button" value="Удалить">

</form>


HEREDOC;


echo "<a href=\"view_employee.php?employee_id=$employee_id\">Назад</a>";

if (isset($_GET['delete_button']))
{
	$query = "DELETE FROM employee WHERE employee_id = '$employee_id'";
	$result = mysql_query($query) or die ("Ошибка в запросе № 1".mysql_error());
	
	$query = "DELETE FROM checkup WHERE checkup_linkkey = '$employee_id'";
	$result = mysql_query($query) or die ("Ошибка в запросе № 2".mysql_error());;
	
	
	echo "Данные сотрудника удалены<br><br>";
	echo "<a href=\"employee.php\">Сотрудники</a>";
}


