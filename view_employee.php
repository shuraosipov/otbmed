<?php
// connect config file
require_once 'config/config.php';


// get id employee from employee.php
$employee_id = $_GET['employee_id'];

echo "<a href='index.php'>�������</a> | ";
echo "<a href='employee.php'>����������</a> | ";
echo "<a href='edit_employee.php'>�������� ������ ����������</a> | ";
echo "<a href='add_checkup.php?employee_id=$employee_id'>�������� ���������</a> |";
echo "<a href='delete_employee.php?employee_id=$employee_id'>������� ����������</a> <br><br><br>";




// show full information adout employee
$query_employee_info = "SELECT surname, name, secondname, department.title, job.title

						FROM employee, job, department
						 
						WHERE employee_id='$employee_id'
						AND employee.department_id = department.department_id
						AND employee.job_id = job.job_id";




$employee_info_result = mysql_query($query_employee_info);
while ($query_result = mysql_fetch_array($employee_info_result))
{
	echo " $query_result[4] &nbsp $query_result[3]<br><br>";
	echo "$query_result[1] $query_result[0] $query_result[2] <br>";
	
	$query_checkup_info = "SELECT title,date,next FROM checkup WHERE checkup_linkkey='$employee_id'";
	$checkup_info_result = mysql_query($query_checkup_info);
	while ($query_result = mysql_fetch_array($checkup_info_result))
	{
		echo "<br>&nbsp&nbsp&nbsp$query_result[0] c $query_result[1] �� $query_result[2]<br>";
	}
	
}