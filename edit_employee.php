<?php

require_once 'config/config.php';

$employee_id = $_GET['employee_id'];
echo "<a href='index.php'>Главная</a> | ";
echo "<a href='employee.php'>Сотрудники</a><br><br><br>";

error_reporting(1);

$query = "SELECT name, surname, secondname, job.title, department.title
		  FROM employee, department, job
		  WHERE employee_id='$employee_id'
		  AND employee.department_id = department.department_id
		  AND employee.job_id = job.job_id";

$result = mysql_query($query) or die ("Ошибка в запросе".mysql_error());

$q = mysql_fetch_array($result);



echo <<<HEREDOC
Редактирование данных сотрудника: <br>
<form method="GET" action="update_employee.php">

	<input type="text" name="name" value="$q[0]"><br>
	<input type="text" name="surname" value="$q[1]"><br>
	<input type="text" name="secondname" value="$q[2]"><br>
	<input type="text" name="department" value="$q[3]"><br>
	<input type="text" name="job" value="$q[4]"><br>
	<input type="hidden" name="employee_id" value="$employee_id"><br>
	<input type="submit" name="update_button"><br>
</form>
HEREDOC;


echo "<br><br><a href=\"view_employee.php?employee_id=$employee_id\">Назад</a>";
?>




