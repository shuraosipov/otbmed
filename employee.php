<?php
// connect config file
require_once 'config/config.php';
echo "<a href='index.php'>Главная</a> | ";
echo "<a href='add_job.php'>Добавить профессию</a> | ";
echo "<a href='add_department.php'>Добавить подразделение</a> | ";
echo "<a href='add_bad_conditions.php'>Добавить вредные условия</a> | ";
echo "<a href='add_employee.php'>Добавить сотрудника</a><br><br><br>";


echo "Сотрудники: <br>";
// request to extract all records
$query_text_all_records = "SELECT name, surname, secondname, job.title, department.title, employee_id 
							FROM employee, job, department
							WHERE 
								employee.department_id = department.department_id
							AND 
								employee.job_id = job.job_id";
$all_records_result = mysql_query($query_text_all_records);
while ($query_result = mysql_fetch_array($all_records_result))
{
	$employee_id = $query_result[5];
	echo "<br>";
echo <<<HEREDOC
	<a href="view_employee.php?employee_id=$employee_id">$query_result[0] $query_result[1] $query_result[2] -  $query_result[3] $query_result[4]</a>
	<br>
HEREDOC;

}