<?php

require_once 'config/config.php';

$employee_id = $_GET['employee_id'];
$name = $_GET['name'];
$surname = $_GET['surname'];
$secondname = $_GET['secondname'];
$department = $_GET['department'];
$job = $_GET['job'];


echo "<a href='index.php'>�������</a> | ";
echo "<a href='employee.php'>����������</a><br><br><br>";

error_reporting(1);




if (isset($_GET['update_button']))
{
	if ($name == '' || $surname == '' || $secondname == '' || $department == '' || $job == '')
	{
		echo "��������� ��� ����!";
		echo "<br><br><a href=\"edit_employee.php?employee_id=$employee_id\">�����</a>";
	}
	else
	{
		$query = "UPDATE employee, department, job
				  SET name='$name',surname='$surname' ,secondname='$secondname', department.title='$department', job.title='$job'
				  WHERE employee_id = '$employee_id'
				  AND employee.department_id = department.department_id
				  AND employee.job_id = job.job_id";
		$result = mysql_query($query) or die ("������ � ������� �1 : ".mysql_error());
		echo "������ ������� ���������!";
		echo "<br><br><a href=\"view_employee.php?employee_id=$employee_id\">�����</a>";
	}
}