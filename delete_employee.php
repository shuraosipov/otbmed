<?php 
require_once 'config/config.php';
$employee_id = $_GET['employee_id'];

if (isset($_GET['delete_button']))
{
	$query = "DELETE FROM employee WHERE employee_id = '$employee_id'";
	$result = mysql_query($query) or die ("������ � ������� � 1".mysql_error());
	
	$query = "DELETE FROM  bad_condition_for_employee WHERE bcfe_linkkey = '$employee_id'";
	$result = mysql_query($query) or die ("������ � ������� � 2".mysql_error());;
	
	
	echo "������ ���������� �������<br><br>";
	echo "<a href=\"employee.php\">����������</a>";
}


